/**
 * Kami K1 Elementor Addon - Scrollytelling Engine
 * Mirrors the original Next.js ScrollCanvas + page.tsx logic exactly:
 *  - Canvas is position:fixed (covers viewport always)
 *  - Scroll progress is derived from the #scrollytelling spacer div
 *  - 192 frames scrub as user scrolls through the 400vh spacer
 */

document.addEventListener("DOMContentLoaded", () => {

  const canvas       = document.getElementById("kami-k1-canvas");
  const canvasLayer  = document.getElementById("kami-k1-canvas-layer");
  const preloader    = document.getElementById("kami-k1-preloader");
  const percentText  = document.getElementById("kami-k1-preloader-percent");
  const progressBar  = document.getElementById("kami-k1-preloader-bar");
  const phraseEl     = document.getElementById("kami-k1-preloader-phrase");
  const decodedEl    = document.getElementById("kami-k1-preloader-decoded");
  const scrollSpacer = document.getElementById("scrollytelling");

  // HUD elements
  const hudFrameNum        = document.getElementById("kami-hud-frame-num");
  const hudTelemetryPct    = document.getElementById("kami-hud-telemetry-percent");
  const hudTelemetryAngle  = document.getElementById("kami-hud-telemetry-angle");
  const hudStatusState     = document.getElementById("kami-hud-status-state");
  const hudNodes           = document.querySelectorAll(".kami-k1-hud-node");
  const narrativeBoxes     = document.querySelectorAll(".kami-k1-narrative-box");

  if (!canvas || !scrollSpacer) {
    console.warn("Kami K1: Required DOM elements not found.");
    return;
  }

  // ─── Config ───────────────────────────────────────────────────────────────
  const TOTAL_FRAMES = 192;
  const framesBaseUrl = (typeof KamiK1Addon !== "undefined")
    ? KamiK1Addon.framesUrl
    : "/wp-content/plugins/next-wordpress-/assets/frames/";

  const TECH_PHRASES = [
    "DECODING HARDWARE GEOMETRY...",
    "BUFFERING HIGH-FIDELITY ASSETS...",
    "ESTABLISHING CANVAS FRAMEBUFFER...",
    "SYNCHRONIZING SCROLL-TRIGGERS...",
    "OPTIMIZING COMPONENT EXPLOSION MAP...",
    "CALIBRATING TACTILE ACTUATION CURVES...",
    "STABILIZING 2.4GHZ WIRELESS SIMULATOR...",
    "COMPASS ALIGNMENT COMPLETED...",
    "ALL SYSTEMS OPERATIONAL..."
  ];

  // ─── State ────────────────────────────────────────────────────────────────
  const images      = new Array(TOTAL_FRAMES);
  let loadedCount   = 0;
  let isReady       = false;
  let lastIndex     = 0;
  let rafId         = null;
  let resizeTimer   = null;

  // ─── Phrase cycling ───────────────────────────────────────────────────────
  let phraseIdx = 0;
  const phraseInterval = setInterval(() => {
    if (isReady) { clearInterval(phraseInterval); return; }
    phraseIdx = (phraseIdx + 1) % (TECH_PHRASES.length - 1);
    if (phraseEl) phraseEl.textContent = TECH_PHRASES[phraseIdx];
  }, 1200);

  // ─── Safety timeout (slow networks) ──────────────────────────────────────
  const safetyTimer = setTimeout(() => {
    if (!isReady) { console.warn("Kami K1: safety timeout — forcing init."); onPreloadComplete(); }
  }, 6000);

  // ─── Canvas: object-fit cover draw ───────────────────────────────────────
  function drawFrame(index) {
    const ctx = canvas.getContext("2d");
    if (!ctx) return;

    // Find nearest loaded frame
    let img = images[index];
    if (!img || !img.complete || !img.naturalWidth) {
      for (let i = index; i >= 0; i--) {
        if (images[i] && images[i].complete && images[i].naturalWidth) { img = images[i]; break; }
      }
    }
    if (!img || !img.naturalWidth) return;

    const cW = canvas.width,  cH = canvas.height;
    const iW = img.naturalWidth, iH = img.naturalHeight;

    ctx.clearRect(0, 0, cW, cH);

    const cRatio = cW / cH;
    const iRatio = iW / iH;
    let dW = cW, dH = cH, oX = 0, oY = 0;

    if (cRatio > iRatio) { dH = cW / iRatio; oY = (cH - dH) / 2; }
    else                  { dW = cH * iRatio; oX = (cW - dW) / 2; }

    ctx.drawImage(img, oX, oY, dW, dH);
    lastIndex = index;
  }

  // ─── Resize (DPR-aware) ───────────────────────────────────────────────────
  function handleResize() {
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    canvas.width  = window.innerWidth  * dpr;
    canvas.height = window.innerHeight * dpr;
    drawFrame(lastIndex);
  }

  window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(handleResize, 100);
  });

  // ─── Preload images ───────────────────────────────────────────────────────
  function preload() {
    for (let i = 0; i < TOTAL_FRAMES; i++) {
      const img = new Image();
      img.src = `${framesBaseUrl}frame_${String(i).padStart(3, "0")}.jpg`;
      img.onload  = () => onOneLoaded();
      img.onerror = () => onOneLoaded();
      images[i] = img;
    }
  }

  function onOneLoaded() {
    loadedCount++;
    const pct = Math.round((loadedCount / TOTAL_FRAMES) * 100);

    // Update preloader UI
    if (percentText) percentText.childNodes[0].nodeValue = `${pct}%`;
    if (progressBar) progressBar.style.width = `${pct}%`;
    if (decodedEl)   decodedEl.textContent = `${Math.round(pct * 1.92)} / 192 FRAMES`;

    if (loadedCount === TOTAL_FRAMES) onPreloadComplete();
  }

  function onPreloadComplete() {
    if (isReady) return;
    isReady = true;
    clearTimeout(safetyTimer);
    clearInterval(phraseInterval);
    if (phraseEl) phraseEl.textContent = TECH_PHRASES[TECH_PHRASES.length - 1];

    setTimeout(() => {
      // Fade out preloader
      if (preloader) preloader.classList.add("fade-out");

      // Show canvas layer
      if (canvasLayer) canvasLayer.classList.add("ready");

      // Restore scroll
      document.body.style.overflow = "";

      // Draw first frame
      handleResize();
      drawFrame(0);

      // Update initial scroll state
      onScroll();
    }, 800);
  }

  // ─── Scroll handler ───────────────────────────────────────────────────────
  function onScroll() {
    if (!isReady) return;

    // Get scroll progress relative to the 400vh spacer div
    const rect       = scrollSpacer.getBoundingClientRect();
    const totalScroll = scrollSpacer.offsetHeight - window.innerHeight;
    const scrolled    = -rect.top; // pixels scrolled into spacer
    let progress      = Math.min(Math.max(scrolled / totalScroll, 0), 1);

    // Hide canvas layer when spacer has fully scrolled past
    if (canvasLayer) {
      if (progress >= 1) {
        canvasLayer.style.display = "none";
      } else if (progress >= 0) {
        canvasLayer.style.display = "";
      }
    }

    // Map progress 0→0.8 → frame 0→191 (matches Next.js useTransform([0,0.8],[0,191]))
    const frameProgress = Math.min(progress / 0.8, 1);
    const frameIndex    = Math.round(frameProgress * (TOTAL_FRAMES - 1));

    if (rafId) cancelAnimationFrame(rafId);
    rafId = requestAnimationFrame(() => drawFrame(frameIndex));

    // ── HUD updates ──
    const pct        = Math.min(Math.round(progress * 100), 100);
    const fakeAngle  = Math.round(progress * 360);

    if (hudFrameNum)       hudFrameNum.textContent       = String(frameIndex).padStart(3, "0");
    if (hudTelemetryPct)   hudTelemetryPct.textContent   = `${pct}%`;
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

    // ── HUD nav dots ──
    let activeHUD = 0;
    if (progress >= 0.66) activeHUD = 3;
    else if (progress >= 0.44) activeHUD = 2;
    else if (progress >= 0.22) activeHUD = 1;

    hudNodes.forEach((node, idx) => {
      node.classList.toggle("active",      idx === activeHUD);
      node.classList.toggle("active-path", idx < activeHUD);
    });

    // ── Narrative text ──
    // 9 narratives over 0→0.8 scroll = each is 0.8/9 ≈ 0.0889 wide
    const SEG = 0.8 / 9;
    const activeNarrative = Math.min(Math.floor(progress / SEG), narrativeBoxes.length - 1);

    const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    narrativeBoxes.forEach((box, idx) => {
      const shouldShow = idx === activeNarrative && progress > 0.005 && progress < 0.98;
      if (shouldShow) {
        if (prefersReduced) { box.style.transition = "none"; box.style.transform = "none"; }
        box.classList.add("visible");
      } else {
        box.classList.remove("visible");
      }
    });
  }

  window.addEventListener("scroll", onScroll, { passive: true });

  // ─── HUD node click navigation ────────────────────────────────────────────
  hudNodes.forEach((node, idx) => {
    node.addEventListener("click", () => {
      const progMap = [0, 0.33, 0.55, 0.88];
      const p = progMap[idx] || 0;
      const spacerTop    = scrollSpacer.offsetTop;
      const spacerHeight = scrollSpacer.offsetHeight;
      const viewH        = window.innerHeight;
      window.scrollTo({ top: spacerTop + p * (spacerHeight - viewH), behavior: "smooth" });
    });
  });

  // ─── Start ────────────────────────────────────────────────────────────────
  // Lock scroll during preload
  document.body.style.overflow = "hidden";
  preload();
});
