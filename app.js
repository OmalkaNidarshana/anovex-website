/**
 * Anovex Technologies — app.js
 */

document.addEventListener("DOMContentLoaded", () => {

  /* --------------------------------------------------
     Smooth scroll for nav anchor links
  -------------------------------------------------- */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });
  });

  /* --------------------------------------------------
     Sticky nav: add shadow on scroll
  -------------------------------------------------- */
  const nav = document.querySelector("nav");
  window.addEventListener("scroll", () => {
    if (window.scrollY > 40) {
      nav.style.boxShadow = "0 4px 32px rgba(0,0,0,0.5)";
    } else {
      nav.style.boxShadow = "none";
    }
  }, { passive: true });

  /* --------------------------------------------------
     Scroll-reveal: fade-up elements as they enter view
  -------------------------------------------------- */
  const revealEls = document.querySelectorAll(
    ".svc, .feat, .team-card, .tech-pill, .about-terminal"
  );

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("revealed");
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  revealEls.forEach((el, i) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(28px)";
    el.style.transition = `opacity 0.55s ${i * 0.07}s ease, transform 0.55s ${i * 0.07}s ease`;
    observer.observe(el);
  });

  document.head.insertAdjacentHTML("beforeend", `
    <style>.revealed { opacity: 1 !important; transform: translateY(0) !important; }</style>
  `);

  /* --------------------------------------------------
     Stat counters — animate numbers in hero
  -------------------------------------------------- */
  function animateCounter(el, target, suffix = "", duration = 1600) {
    let start = 0;
    const step = (timestamp) => {
      if (!start) start = timestamp;
      const progress = Math.min((timestamp - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      el.textContent = Math.floor(eased * target) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  }

  const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const numEl = entry.target.querySelector(".stat-num");
        if (numEl) {
          const raw = numEl.textContent.trim();
          if (raw.startsWith("4")) {
            numEl.innerHTML = "";
            const span = document.createElement("span");
            numEl.appendChild(span);
            animateCounter(span, 4, "+");
          } else if (raw.startsWith("100")) {
            numEl.innerHTML = "";
            const span = document.createElement("span");
            numEl.appendChild(span);
            animateCounter(span, 100, "%");
          }
        }
        statsObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll(".stat").forEach(el => statsObserver.observe(el));

  /* --------------------------------------------------
     Nav CTA + hero buttons — ripple effect
  -------------------------------------------------- */
  function addRipple(btn) {
    btn.addEventListener("click", function (e) {
      const rect = this.getBoundingClientRect();
      const ripple = document.createElement("span");
      const size = Math.max(rect.width, rect.height);
      ripple.style.cssText = `
        position:absolute;
        border-radius:50%;
        width:${size}px; height:${size}px;
        left:${e.clientX - rect.left - size / 2}px;
        top:${e.clientY - rect.top - size / 2}px;
        background:rgba(255,255,255,0.2);
        transform:scale(0);
        animation:rippleAnim 0.55s ease-out forwards;
        pointer-events:none;
      `;
      this.style.position = "relative";
      this.style.overflow = "hidden";
      this.appendChild(ripple);
      setTimeout(() => ripple.remove(), 600);
    });
  }

  document.head.insertAdjacentHTML("beforeend", `
    <style>
      @keyframes rippleAnim {
        to { transform: scale(2.5); opacity: 0; }
      }
    </style>
  `);

  document.querySelectorAll(".btn-p, .btn-g, .nav-cta").forEach(addRipple);

  /* --------------------------------------------------
     Active nav link highlight on scroll
  -------------------------------------------------- */
  const sections = document.querySelectorAll("section[id]");
  const navAnchors = document.querySelectorAll(".nav-links a");

  const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navAnchors.forEach(a => a.style.color = "");
        const active = document.querySelector(`.nav-links a[href="#${entry.target.id}"]`);
        if (active) active.style.color = "var(--acc)";
      }
    });
  }, { threshold: 0.4 });

  sections.forEach(s => sectionObserver.observe(s));

  /* --------------------------------------------------
     Social button click — placeholder feedback
  -------------------------------------------------- */
  document.querySelectorAll(".social-btn").forEach(btn => {
    btn.addEventListener("click", function () {
      const label = this.getAttribute("aria-label") || "Link";
      this.style.background = "rgba(0,180,255,0.2)";
      setTimeout(() => (this.style.background = ""), 400);
    });
  });

  console.log("Anovex Technologies — loaded ✓");
});
