/**
 * Kami K1 Elementor Addon - Production-Ready Reservation CTA Form Handler
 */

document.addEventListener("DOMContentLoaded", () => {
  const wrappers = document.querySelectorAll(".kami-k1-addon-wrapper");

  wrappers.forEach((wrapper) => {
    const ctaSection = wrapper.querySelector(".kami-k1-cta-section");
    if (!ctaSection) return;

    const formStep = wrapper.querySelector("#kami-k1-form-step");
    const terminalStep = wrapper.querySelector("#kami-k1-terminal-step");
    const successStep = wrapper.querySelector("#kami-k1-success-step");

    // Input elements
    const inputName = wrapper.querySelector("#kami-k1-input-name");
    const inputEmail = wrapper.querySelector("#kami-k1-input-email");
    const modelInput = wrapper.querySelector("#kami-k1-selected-model");
    const switchInput = wrapper.querySelector("#kami-k1-selected-switch");

    // Selection buttons
    const modelBtns = wrapper.querySelectorAll(".model-choice-btn");
    const switchBtns = wrapper.querySelectorAll(".switch-choice-btn");

    // Submit button / Form
    const formElement = wrapper.querySelector("#kami-k1-reservation-form");

    // Terminal elements
    const terminalLinesContainer = wrapper.querySelector("#kami-k1-terminal-lines");

    // Success elements
    const successName = wrapper.querySelector("#kami-k1-success-name");
    const successDetails = wrapper.querySelector("#kami-k1-success-details");
    const successResetBtn = wrapper.querySelector("#kami-k1-success-reset");

    // Selected values
    let selectedModel = "carbon";
    let selectedSwitch = "tactile";

    // Handle Model Selection
    modelBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        modelBtns.forEach(b => b.classList.remove("selected"));
        btn.classList.add("selected");
        selectedModel = btn.dataset.value;
        if (modelInput) modelInput.value = selectedModel;
      });
    });

    // Handle Switch Selection
    switchBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        switchBtns.forEach(b => b.classList.remove("selected"));
        btn.classList.add("selected");
        selectedSwitch = btn.dataset.value;
        if (switchInput) switchInput.value = selectedSwitch;
      });
    });

    // Terminal logging phrases
    const steps = [
      "PINGING SECURE STORAGE RELAY...",
      "HANDSHAKE ACCEPTED // RESOLVING KAMI_K1_RESERVE...",
      "TRANSMITTING USER DATA NODE...",
      "ALLOCATING SERIAL: KM-K1-OLED-" + Math.floor(100000 + Math.random() * 900000),
      "COMMIT TRANSACTION OK // RESERVATION SECURED."
    ];

    // Handle Submit
    if (formElement) {
      formElement.addEventListener("submit", (e) => {
        e.preventDefault();
        
        const nameVal = inputName ? inputName.value.trim() : "";
        const emailVal = inputEmail ? inputEmail.value.trim() : "";
        
        if (!nameVal || !emailVal) return;

        // Switch to terminal state
        if (formStep) formStep.classList.add("hidden");
        if (terminalStep) terminalStep.classList.remove("hidden");

        // Clear previous lines
        if (terminalLinesContainer) {
          terminalLinesContainer.innerHTML = "";
        }

        let currentStep = 0;
        
        const logInterval = setInterval(() => {
          if (currentStep >= steps.length) {
            clearInterval(logInterval);
            
            // Switch to success state after delay
            setTimeout(() => {
              if (terminalStep) terminalStep.classList.add("hidden");
              if (successStep) successStep.classList.remove("hidden");

              // Fill success values
              if (successName) successName.textContent = nameVal;
              if (successDetails) {
                successDetails.innerHTML = `Thank you, <span class="highlight">${escapeHTML(nameVal)}</span>. Your reservation request for Kami K1 (<span class="highlight">${escapeHTML(selectedModel).toUpperCase()} Edition</span> / <span class="highlight">${escapeHTML(selectedSwitch).toUpperCase()} switches</span>) is secured. An encrypted receipt has been sent to <span class="highlight">${escapeHTML(emailVal)}</span>.`;
              }
            }, 1000);
            return;
          }

          // Add line
          if (terminalLinesContainer) {
            const line = document.createElement("div");
            line.className = "kami-k1-terminal-line active";
            line.innerHTML = `<span class="prompt">&gt;</span><span class="text">${steps[currentStep]}</span>`;
            terminalLinesContainer.appendChild(line);

            // Highlight previous lines as less bright
            const previousLines = terminalLinesContainer.querySelectorAll(".kami-k1-terminal-line");
            if (previousLines.length > 1) {
              previousLines[previousLines.length - 2].classList.remove("active");
            }
          }

          currentStep++;
        }, 800);
      });
    }

    // Helper function to escape HTML to prevent XSS issues in terminal output
    function escapeHTML(str) {
      return str
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
    }

    // Handle Reset/Submit Another
    if (successResetBtn) {
      successResetBtn.addEventListener("click", () => {
        // Clear fields
        if (inputName) inputName.value = "";
        if (inputEmail) inputEmail.value = "";

        // Reset states
        if (successStep) successStep.classList.add("hidden");
        if (formStep) formStep.classList.remove("hidden");
      });
    }
  });
});
