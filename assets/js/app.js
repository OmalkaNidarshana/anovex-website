/**
 * Anovex Technologies v2 — assets/js/app.js
 */

document.addEventListener("DOMContentLoaded", () => {

  /* --------------------------------------------------
     Smooth scroll for anchor links
  -------------------------------------------------- */
  document.querySelectorAll('a[href^="#"], button[data-scroll]').forEach(el => {
    el.addEventListener("click", function () {
      const href = this.getAttribute("href") || this.dataset.scroll;
      const target = document.querySelector(href);
      if (target) target.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  /* --------------------------------------------------
     Sticky nav shadow on scroll
  -------------------------------------------------- */
  const nav = document.querySelector("nav");
  const onScroll = () => {
    nav.style.boxShadow = window.scrollY > 40
      ? "0 4px 32px rgba(0,0,0,0.6)"
      : "none";
  };
  window.addEventListener("scroll", onScroll, { passive: true });

  /* --------------------------------------------------
     Active nav pill on section entry
  -------------------------------------------------- */
  const sections   = document.querySelectorAll("section[id]");
  const navPills   = document.querySelectorAll(".nav-pill");
  const sectionMap = { home: 0, services: 1, platform: 2, team: 4 };

  const sectionObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const idx = sectionMap[entry.target.id];
      navPills.forEach((p, i) => {
        p.style.color      = i === idx ? "var(--txt)"  : "";
        p.style.background = i === idx ? "rgba(255,255,255,0.07)" : "";
      });
    });
  }, { threshold: 0.4 });

  sections.forEach(s => sectionObs.observe(s));

  /* --------------------------------------------------
     Scroll-reveal: fade cards/elements in as they enter
  -------------------------------------------------- */
  const revealSelectors = [
    ".svc-card", ".feat-card", ".tm-card",
    ".kpi-cell", ".t-pill", ".terminal", ".stat-cell"
  ];
  const revealEls = document.querySelectorAll(revealSelectors.join(", "));

  const revealObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add("revealed");
      revealObs.unobserve(entry.target);
    });
  }, { threshold: 0.1 });

  revealEls.forEach((el, i) => {
    el.style.opacity   = "0";
    el.style.transform = "translateY(28px)";
    el.style.transition = `opacity 0.55s ${(i % 6) * 0.07}s ease, transform 0.55s ${(i % 6) * 0.07}s ease`;
    revealObs.observe(el);
  });

  const revealStyle = document.createElement("style");
  revealStyle.textContent = ".revealed { opacity: 1 !important; transform: translateY(0) !important; }";
  document.head.appendChild(revealStyle);

  /* --------------------------------------------------
     Section headers fade up on entry
  -------------------------------------------------- */
  const headerEls = document.querySelectorAll(".sec-eyebrow, .sec-h, .sec-p");
  const headerObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.style.opacity   = "1";
      entry.target.style.transform = "translateY(0)";
      headerObs.unobserve(entry.target);
    });
  }, { threshold: 0.2 });

  headerEls.forEach((el, i) => {
    el.style.opacity    = "0";
    el.style.transform  = "translateY(18px)";
    el.style.transition = `opacity 0.6s ${i * 0.1}s ease, transform 0.6s ${i * 0.1}s ease`;
    headerObs.observe(el);
  });

  /* --------------------------------------------------
     Counter animation for stat numbers
  -------------------------------------------------- */
  function countUp(el, target, suffix, duration = 1400) {
    let start = null;
    const ease = t => 1 - Math.pow(1 - t, 3);
    const step = ts => {
      if (!start) start = ts;
      const p = Math.min((ts - start) / duration, 1);
      el.textContent = Math.floor(ease(p) * target) + suffix;
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  }

  const counterObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target.querySelector(".stat-n");
      if (!el) return;
      const raw = el.textContent.trim();
      if (raw.startsWith("4"))    countUp(el, 4, "+");
      if (raw.startsWith("99"))   countUp(el, 99.9, "%");
      if (raw.startsWith("3"))    countUp(el, 3, "×");
      counterObs.unobserve(entry.target);
    });
  }, { threshold: 0.6 });

  document.querySelectorAll(".stat-cell").forEach(el => counterObs.observe(el));

  /* --------------------------------------------------
     Ripple effect on all primary buttons
  -------------------------------------------------- */
  function attachRipple(btn) {
    btn.addEventListener("click", function (e) {
      const rect   = this.getBoundingClientRect();
      const size   = Math.max(rect.width, rect.height);
      const ripple = document.createElement("span");
      ripple.style.cssText = [
        "position:absolute",
        "border-radius:50%",
        `width:${size}px`,
        `height:${size}px`,
        `left:${e.clientX - rect.left - size / 2}px`,
        `top:${e.clientY - rect.top - size / 2}px`,
        "background:rgba(255,255,255,0.18)",
        "transform:scale(0)",
        "animation:rippleOut 0.55s ease-out forwards",
        "pointer-events:none"
      ].join(";");
      this.style.position = "relative";
      this.style.overflow = "hidden";
      this.appendChild(ripple);
      setTimeout(() => ripple.remove(), 600);
    });
  }

  const rippleStyle = document.createElement("style");
  rippleStyle.textContent = "@keyframes rippleOut { to { transform: scale(2.6); opacity: 0; } }";
  document.head.appendChild(rippleStyle);

  document.querySelectorAll(".cta-main, .cta-sec, .nav-btn, .cta-input-btn").forEach(attachRipple);

  /* --------------------------------------------------
     CTA email form — basic validation feedback
  -------------------------------------------------- */
  const ctaInput = document.querySelector(".cta-input");
  const ctaBtn   = document.querySelector(".cta-input-btn");

  if (ctaInput && ctaBtn) {
    ctaBtn.addEventListener("click", () => {
      const val = ctaInput.value.trim();
      const valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);

      if (!valid) {
        ctaInput.style.borderColor = "rgba(255,80,80,0.5)";
        ctaInput.focus();
        setTimeout(() => (ctaInput.style.borderColor = ""), 2000);
        return;
      }

      ctaBtn.textContent = "✓ You're in!";
      ctaBtn.style.background = "var(--acc2)";
      ctaInput.disabled = true;
      ctaBtn.disabled   = true;
      setTimeout(() => {
        ctaBtn.textContent     = "Get Started";
        ctaBtn.style.background = "";
        ctaInput.value         = "";
        ctaInput.disabled      = false;
        ctaBtn.disabled        = false;
      }, 3500);
    });

    ctaInput.addEventListener("keydown", e => {
      if (e.key === "Enter") ctaBtn.click();
    });
  }

  /* --------------------------------------------------
     Social button press feedback
  -------------------------------------------------- */
  document.querySelectorAll(".s-btn").forEach(btn => {
    btn.addEventListener("click", function () {
      this.style.background = "rgba(79,143,255,0.2)";
      setTimeout(() => (this.style.background = ""), 400);
    });
  });

  /* --------------------------------------------------
     Announcement band close (optional UX touch)
  -------------------------------------------------- */
  const band = document.querySelector(".band");
  if (band) {
    band.addEventListener("click", function (e) {
      if (e.target.classList.contains("band-link") || e.target.closest(".band-link")) return;
    });
  }

  console.log("%cAnovex Technologies v2 — loaded ✓", "color:#4f8fff;font-weight:700;font-size:14px");
});