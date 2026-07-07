/**
 * Kami K1 Elementor Addon - Production-Ready Bento Grid Interactions
 */

document.addEventListener("DOMContentLoaded", () => {
  const grids = document.querySelectorAll(".kami-k1-bento-grid");
  
  grids.forEach((grid) => {
    const cards = grid.querySelectorAll(".kami-k1-bento-card");

    // Initial styling for reveal animation
    cards.forEach(card => {
      card.style.opacity = "0";
      card.style.transform = "translateY(30px)";
      card.style.transition = "opacity 0.6s cubic-bezier(0.215, 0.61, 0.355, 1), transform 0.6s cubic-bezier(0.215, 0.61, 0.355, 1)";
    });

    // Intersection Observer to stagger reveal cards
    const observerOptions = {
      root: null,
      rootMargin: "-50px",
      threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
      let delay = 0;
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const card = entry.target;
          setTimeout(() => {
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
          }, delay);
          delay += 100; // Stagger effect
          observer.unobserve(card);
        }
      });
    }, observerOptions);

    cards.forEach(card => {
      observer.observe(card);
    });
  });
});
