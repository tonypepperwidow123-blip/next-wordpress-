/**
 * Kami K1 Elementor Addon - Production-Ready Scrollytelling Engine
 */

document.addEventListener("DOMContentLoaded", () => {
  // Support multiple instances by looping through all wrappers
  const wrappers = document.querySelectorAll(".kami-k1-addon-wrapper");
  
  wrappers.forEach((wrapper) => {
    const container = wrapper.querySelector(".kami-k1-scrollytelling-container");
    if (!container) return;

    const canvas = wrapper.querySelector("#kami-k1-canvas");
    const preloader = wrapper.querySelector("#kami-k1-preloader");
    const percentText = wrapper.querySelector("#kami-k1-preloader-percent");
    const progressBar = wrapper.querySelector("#kami-k1-preloader-bar");
    const phraseText = wrapper.querySelector("#kami-k1-preloader-phrase");
    const decodedText = wrapper.querySelector("#kami-k1-preloader-decoded");

    // HUD elements scoped to this widget instance
    const hudFrameNum = wrapper.querySelector("#kami-hud-frame-num");
    const hudTelemetryPercent = wrapper.querySelector("#kami-hud-telemetry-percent");
    const hudTelemetryAngle = wrapper.querySelector("#kami-hud-telemetry-angle");
    const hudStatusState = wrapper.querySelector("#kami-hud-status-state");
    const hudNodes = wrapper.querySelectorAll(".kami-k1-hud-node");

    // Narrative overlays scoped to this instance
    const narrativeBoxes = wrapper.querySelectorAll(".kami-k1-narrative-box");

    // Configuration
    const totalFrames = 192;
    const images = [];
    let loadedCount = 0;
    let isReady = false;
    let lastIndex = 0;
    let animationFrameId = null;

    const TECH_PHRASES = [
      "DECODING HARDWARE GEOMETRY...",
      "BUFFERING HIGH-FIDELITY ASSETS...",
      "ESTABLISHING WEBGL FRAMEBUFFER...",
      "SYNCRONIZING SCROLL-TRIGGERS...",
      "OPTIMIZING COMPONENT EXPLOSION MAP...",
      "CALIBRATING TACTILE ACTUATION CURVES...",
      "STABILIZING 2.4GHZ WIRELESS SIMULATOR...",
      "COMPASS ALIGNMENT COMPLETED...",
      "ALL SYSTEMS OPERATIONAL..."
    ];

    // Detect if we are inside the Elementor editor
    const isEditorMode = document.body.classList.contains("elementor-editor-active") || 
                         (typeof window.elementorFrontend !== "undefined" && window.elementorFrontend.isEditMode());

    // Get localized path from localization object (fallback to local if not localized)
    const framesBaseUrl = typeof KamiK1Addon !== "undefined" ? KamiK1Addon.framesUrl : "/wp-content/plugins/kami-k1-elementor-addon/assets/frames/";

    // Preloader phrases rotation
    let phraseIndex = 0;
    const phraseInterval = setInterval(() => {
      if (isReady) {
        clearInterval(phraseInterval);
        return;
      }
      phraseIndex = (phraseIndex + 1) % (TECH_PHRASES.length - 1);
      if (phraseText) {
        phraseText.textContent = TECH_PHRASES[phraseIndex];
      }
    }, 1200);

    // Safety timeout: Auto-dismiss loader after 6 seconds to prevent locking site on slow connections
    const safetyTimeout = setTimeout(() => {
      if (!isReady) {
        console.warn("Kami K1: Preload safety timeout reached. Forcing site activation.");
        onPreloadComplete();
      }
    }, 6000);

    // Preload Images
    const preloadImages = () => {
      // If in Editor Mode, we can load just the first and last frames to speed up editing
      const framesToLoad = isEditorMode ? [0, 48, 96, 144, 191] : Array.from({length: totalFrames}, (_, i) => i);
      const totalToLoad = framesToLoad.length;

      framesToLoad.forEach((i) => {
        const img = new Image();
        const frameIndexStr = String(i).padStart(3, "0");
        img.src = `${framesBaseUrl}frame_${frameIndexStr}.jpg`;
        img.onload = () => handleImageLoad(totalToLoad);
        img.onerror = () => handleImageError(totalToLoad);
        images[i] = img; // Keep absolute positioning
      });
    };

    const handleImageLoad = (totalToLoad) => {
      loadedCount++;
      const progressPercent = Math.round((loadedCount / totalToLoad) * 100);
      
      // Update preloader DOM
      if (percentText) percentText.childNodes[0].nodeValue = `${progressPercent}%`;
      if (progressBar) progressBar.style.width = `${progressPercent}%`;
      if (decodedText) decodedText.textContent = `${Math.round(progressPercent * 1.92)} / 192 FRAMES`;

      if (loadedCount === totalToLoad) {
        onPreloadComplete();
      }
    };

    const handleImageError = (totalToLoad) => {
      loadedCount++;
      if (loadedCount === totalToLoad) {
        onPreloadComplete();
      }
    };

    const onPreloadComplete = () => {
      if (isReady) return;
      isReady = true;
      clearTimeout(safetyTimeout);
      clearInterval(phraseInterval);
      if (phraseText) phraseText.textContent = TECH_PHRASES[TECH_PHRASES.length - 1];

      setTimeout(() => {
        if (preloader) {
          preloader.classList.add("fade-out");
        }
        // Restore scrolling only if we locked it and not in editor
        if (!isEditorMode) {
          document.body.style.overflow = "";
        }
        handleResize();
        drawFrame(0);
        updateScrollStates();
      }, 800);
    };

    // Draw Frame to Canvas (Object-fit cover behavior in 2D context)
    const drawFrame = (index) => {
      if (!canvas) return;
      const ctx = canvas.getContext("2d");
      if (!ctx) return;

      // Find closest loaded frame if the target index is missing (e.g. editor mode optimization)
      let img = images[index];
      if (!img || !img.complete) {
        // Search downwards for nearest loaded frame
        for (let i = index; i >= 0; i--) {
          if (images[i] && images[i].complete) {
            img = images[i];
            break;
          }
        }
      }
      
      if (!img || !img.complete) return;

      const canvasW = canvas.width;
      const canvasH = canvas.height;
      const imgW = img.width;
      const imgH = img.height;

      ctx.clearRect(0, 0, canvasW, canvasH);

      const canvasRatio = canvasW / canvasH;
      const imgRatio = imgW / imgH;

      let drawW = canvasW;
      let drawH = canvasH;
      let offsetX = 0;
      let offsetY = 0;

      if (canvasRatio > imgRatio) {
        drawH = canvasW / imgRatio;
        offsetY = (canvasH - drawH) / 2;
      } else {
        drawW = canvasH * imgRatio;
        offsetX = (canvasW - drawW) / 2;
      }

      ctx.drawImage(img, offsetX, offsetY, drawW, drawH);
      lastIndex = index;
    };

    // Resize canvas for device pixel ratio with debouncing
    let resizeTimeout;
    const handleResize = () => {
      if (!canvas) return;
      
      const dpr = Math.min(window.devicePixelRatio || 1, 2);
      canvas.width = window.innerWidth * dpr;
      canvas.height = window.innerHeight * dpr;
      
      drawFrame(lastIndex);
    };

    const debouncedResize = () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(handleResize, 100);
    };

    // Calculate Scroll Progress and Trigger Actions
    const updateScrollStates = () => {
      if (!isReady || !container) return;

      const containerTop = container.offsetTop;
      const containerHeight = container.offsetHeight;
      const viewportHeight = window.innerHeight;
      const scrolledAmt = window.scrollY - containerTop;
      const maxScroll = containerHeight - viewportHeight;

      // Normalize progress 0.0 -> 1.0
      let progress = scrolledAmt / maxScroll;
      progress = Math.min(Math.max(progress, 0), 1);

      // Map scroll [0.0, 0.8] to frame index [0, 191]
      let frameIndex = 0;
      if (progress <= 0.8) {
        frameIndex = Math.round((progress / 0.8) * (totalFrames - 1));
      } else {
        frameIndex = totalFrames - 1;
      }
      frameIndex = Math.min(Math.max(frameIndex, 0), totalFrames - 1);

      // Request animation frame for canvas draw
      if (animationFrameId !== null) {
        cancelAnimationFrame(animationFrameId);
      }
      animationFrameId = requestAnimationFrame(() => {
        drawFrame(frameIndex);
      });

      // Update HUD values
      const percent = Math.min(Math.round(progress * 100), 100);
      const fakeAngle = Math.round(progress * 360);

      if (hudFrameNum) hudFrameNum.textContent = String(frameIndex).padStart(3, "0");
      if (hudTelemetryPercent) hudTelemetryPercent.textContent = `${percent}%`;
      if (hudTelemetryAngle) hudTelemetryAngle.textContent = `${fakeAngle}°`;

      if (hudStatusState) {
        if (progress <= 0.05) {
          hudStatusState.textContent = "SYS_STABLE / ASSEMBLED";
          hudStatusState.style.color = "#737373";
        } else if (progress >= 0.75) {
          hudStatusState.textContent = "CRIT_EXPLODED / SHUTDOWN";
          hudStatusState.style.color = "#ef4444";
        } else {
          hudStatusState.textContent = "SYS_TRANSITION / ACTIVE";
          hudStatusState.style.color = "#f97316";
        }
      }

      // Determine Active HUD Section (0 to 3)
      let activeHUD = 0;
      if (progress < 0.22) {
        activeHUD = 0;
      } else if (progress < 0.44) {
        activeHUD = 1;
      } else if (progress < 0.66) {
        activeHUD = 2;
      } else {
        activeHUD = 3;
      }

      // Update HUD Node styling
      hudNodes.forEach((node, idx) => {
        if (idx === activeHUD) {
          node.classList.add("active");
        } else {
          node.classList.remove("active");
        }

        if (idx < activeHUD) {
          node.classList.add("active-path");
        } else {
          node.classList.remove("active-path");
        }
      });

      // Handle Narratives fading in/out
      // Respect prefers-reduced-motion settings
      const motionQuery = window.matchMedia("(prefers-reduced-motion: reduce)");
      
      const numNarratives = narrativeBoxes.length;
      const segmentWidth = 0.8 / numNarratives;
      const activeNarrativeIdx = Math.min(Math.floor(progress / segmentWidth), numNarratives - 1);

      narrativeBoxes.forEach((box, idx) => {
        if (idx === activeNarrativeIdx && progress > 0.01 && progress < 0.95) {
          if (motionQuery.matches) {
            box.style.transition = "none";
            box.style.transform = "none";
          }
          box.classList.add("visible");
        } else {
          box.classList.remove("visible");
        }
      });
    };

    // Nav HUD Node clicks
    hudNodes.forEach((node, idx) => {
      node.addEventListener("click", (e) => {
        e.preventDefault();
        const progressMap = [0.0, 0.33, 0.55, 0.88];
        const p = progressMap[idx];
        const containerTop = container.offsetTop;
        const containerHeight = container.offsetHeight;
        const viewportHeight = window.innerHeight;
        const targetScrollY = containerTop + p * (containerHeight - viewportHeight);

        window.scrollTo({
          top: targetScrollY,
          behavior: "smooth"
        });
      });
    });

    // Init
    // Only lock scroll when loaded if not in editor mode
    if (!isEditorMode) {
      document.body.style.overflow = "hidden";
    } else {
      if (preloader) preloader.style.display = "none";
    }

    preloadImages();

    // Listeners
    window.addEventListener("resize", debouncedResize);
    window.addEventListener("scroll", updateScrollStates);
  });
});
