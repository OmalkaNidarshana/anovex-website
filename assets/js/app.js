/**
 * Anovex Technologies v3 — assets/js/app.js
 */

document.addEventListener("DOMContentLoaded", () => {

  /* --------------------------------------------------
     Particle field in hero
  -------------------------------------------------- */
  const particleContainer = document.getElementById("particles");
  if (particleContainer) {
    const COUNT = 38;
    for (let i = 0; i < COUNT; i++) {
      const p = document.createElement("div");
      const size = Math.random() * 2.5 + 1;
      const x    = Math.random() * 100;
      const y    = Math.random() * 100;
      const dur  = Math.random() * 8 + 5;
      const del  = Math.random() * 6;
      const isBlue = Math.random() > 0.5;
      Object.assign(p.style, {
        position:        "absolute",
        left:            `${x}%`,
        top:             `${y}%`,
        width:           `${size}px`,
        height:          `${size}px`,
        borderRadius:    "50%",
        background:      isBlue ? "rgba(30,120,255,0.55)" : "rgba(0,212,255,0.45)",
        boxShadow:       isBlue
          ? "0 0 6px rgba(30,120,255,0.6)"
          : "0 0 6px rgba(0,212,255,0.6)",
        animation:       `particleDrift ${dur}s ${del}s ease-in-out infinite`,
        pointerEvents:   "none",
      });
      particleContainer.appendChild(p);
    }

    /* inject keyframes once */
    if (!document.getElementById("particle-kf")) {
      const style = document.createElement("style");
      style.id = "particle-kf";
      style.textContent = `
        @keyframes particleDrift {
          0%,100% { transform: translate(0,0); opacity:.6; }
          25%     { transform: translate(${rand(-18,18)}px, ${rand(-14,14)}px); opacity:1; }
          50%     { transform: translate(${rand(-12,12)}px, ${rand(-20,20)}px); opacity:.4; }
          75%     { transform: translate(${rand(-16,16)}px, ${rand(-10,10)}px); opacity:.9; }
        }
      `;
      document.head.appendChild(style);
    }
  }
  function rand(a, b) { return (Math.random() * (b - a) + a).toFixed(1); }

  /* --------------------------------------------------
     Scroll-reveal for cards
  -------------------------------------------------- */
  const revealEls = document.querySelectorAll(
    ".svc-card, .dir-card, .tech-item, .kpi-cell, .eco-node"
  );
  revealEls.forEach((el, i) => {
    el.classList.add("reveal");
    el.style.transitionDelay = `${(i % 5) * 0.07}s`;
  });

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add("visible");
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });

  revealEls.forEach(el => obs.observe(el));

  /* --------------------------------------------------
     Hero CTA ripple
  -------------------------------------------------- */
  document.querySelectorAll(".hero-cta, .contact-btn").forEach(btn => {
    btn.addEventListener("click", function (e) {
      const rect   = this.getBoundingClientRect();
      const size   = Math.max(rect.width, rect.height) * 1.4;
      const ripple = document.createElement("span");
      Object.assign(ripple.style, {
        position:      "absolute",
        borderRadius:  "50%",
        width:         `${size}px`,
        height:        `${size}px`,
        left:          `${e.clientX - rect.left - size / 2}px`,
        top:           `${e.clientY - rect.top - size / 2}px`,
        background:    "rgba(0,212,255,0.2)",
        transform:     "scale(0)",
        animation:     "ripOut 0.55s ease-out forwards",
        pointerEvents: "none",
        zIndex:        "10",
      });
      this.style.position = "relative";
      this.style.overflow = "hidden";
      this.appendChild(ripple);
      setTimeout(() => ripple.remove(), 600);
    });
  });

  const ripStyle = document.createElement("style");
  ripStyle.textContent = "@keyframes ripOut { to { transform: scale(2.4); opacity: 0; } }";
  document.head.appendChild(ripStyle);

  /* --------------------------------------------------
     Ecosystem node hover: propagate glow left-to-right
  -------------------------------------------------- */
  const ecoNodes = document.querySelectorAll(".eco-node");
  ecoNodes.forEach((node, i) => {
    node.addEventListener("mouseenter", () => {
      ecoNodes.forEach((n, j) => {
        const delay = Math.abs(i - j) * 80;
        setTimeout(() => {
          n.style.borderColor = "rgba(0,212,255,0.5)";
          n.style.boxShadow   = "0 0 12px rgba(0,212,255,0.15)";
        }, delay);
        setTimeout(() => {
          n.style.borderColor = "";
          n.style.boxShadow   = "";
        }, delay + 500);
      });
    });
  });

  /* --------------------------------------------------
     Sticky nav: add shadow on scroll
  -------------------------------------------------- */
  const nav = document.querySelector(".site-nav");
  window.addEventListener("scroll", () => {
    nav.style.boxShadow = window.scrollY > 20
      ? "0 4px 24px rgba(0,0,0,0.6)"
      : "none";
  }, { passive: true });

  /* --------------------------------------------------
     Chart bars: randomize heights periodically for live feel
  -------------------------------------------------- */
  function animateBars() {
    const bars = document.querySelectorAll(".bar");
    bars.forEach(bar => {
      const h = Math.floor(Math.random() * 55) + 30;
      bar.style.transition = "height 0.9s ease";
      bar.style.height     = `${h}%`;
    });
  }
  setInterval(animateBars, 2800);

  console.log("%cAnovex Technologies v3 ✓", "color:#00d4ff;font-weight:700;font-size:13px");
});