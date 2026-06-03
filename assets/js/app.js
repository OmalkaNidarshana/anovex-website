/**
 * Anovex Technologies v4 — assets/js/app.js
 * Full-page vertical scroll layout
 */

document.addEventListener("DOMContentLoaded", () => {

  /* --------------------------------------------------
     Particle field in hero
  -------------------------------------------------- */
  const container = document.getElementById("particles");
  if (container) {
    for (let i = 0; i < 50; i++) {
      const dot   = document.createElement("div");
      const size  = Math.random() * 2.8 + 0.8;
      const x     = Math.random() * 100;
      const y     = Math.random() * 100;
      const dur   = (Math.random() * 10 + 6).toFixed(1);
      const delay = (Math.random() * 8).toFixed(1);
      const blue  = Math.random() > 0.45;
      Object.assign(dot.style, {
        position:      "absolute",
        left:          `${x}%`,
        top:           `${y}%`,
        width:         `${size}px`,
        height:        `${size}px`,
        borderRadius:  "50%",
        background:    blue ? "rgba(30,120,255,0.6)" : "rgba(0,212,255,0.5)",
        boxShadow:     blue ? "0 0 5px rgba(30,120,255,0.7)" : "0 0 5px rgba(0,212,255,0.7)",
        animation:     `pdrift ${dur}s ${delay}s ease-in-out infinite`,
        pointerEvents: "none",
      });
      container.appendChild(dot);
    }
    if (!document.getElementById("pdrift-kf")) {
      const s = document.createElement("style");
      s.id = "pdrift-kf";
      s.textContent = `
        @keyframes pdrift {
          0%,100%{ transform:translate(0,0); opacity:.55; }
          25%    { transform:translate(${r(-20,20)}px,${r(-15,15)}px); opacity:.9; }
          50%    { transform:translate(${r(-12,12)}px,${r(-22,22)}px); opacity:.35; }
          75%    { transform:translate(${r(-18,18)}px,${r(-10,10)}px); opacity:.75; }
        }
      `;
      document.head.appendChild(s);
    }
  }
  function r(a, b) { return (Math.random() * (b - a) + a).toFixed(1); }

  /* --------------------------------------------------
     Sticky nav shadow + active link highlight
  -------------------------------------------------- */
  const nav = document.querySelector(".site-nav");
  window.addEventListener("scroll", () => {
    nav.style.boxShadow = window.scrollY > 40
      ? "0 4px 32px rgba(0,0,0,0.65)"
      : "none";
  }, { passive: true });

  /* Highlight active nav link based on scroll position */
  const sections  = document.querySelectorAll("section[id]");
  const navLinks  = document.querySelectorAll(".nav-link");
  const secObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      navLinks.forEach(a => {
        const active = a.getAttribute("href") === `#${e.target.id}`;
        a.style.color = active ? "var(--cyan)" : "";
      });
    });
  }, { threshold: 0.4 });
  sections.forEach(s => secObs.observe(s));

  /* --------------------------------------------------
     Mobile burger menu
  -------------------------------------------------- */
  const burger = document.getElementById("burger");
  const navLinksEl = document.querySelector(".nav-links");
  if (burger && navLinksEl) {
    burger.addEventListener("click", () => {
      const open = navLinksEl.style.display === "flex";
      if (!open) {
        navLinksEl.style.cssText = `
          display:flex; flex-direction:column;
          position:fixed; top:64px; left:0; right:0;
          background:rgba(6,12,24,0.97); padding:1.5rem;
          border-bottom:1px solid rgba(30,120,255,0.15);
          backdrop-filter:blur(18px); z-index:199; gap:0.5rem;
        `;
      } else {
        navLinksEl.style.display = "";
        navLinksEl.style.cssText = "";
      }
    });
  }

  /* --------------------------------------------------
     Scroll-reveal for .reveal elements
  -------------------------------------------------- */
  const revealEls = document.querySelectorAll(".reveal");
  const revObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add("in-view");
        revObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  revealEls.forEach(el => revObs.observe(el));

  /* --------------------------------------------------
     Ripple on primary buttons
  -------------------------------------------------- */
  document.querySelectorAll(".btn-primary, .btn-outline, .contact-btn").forEach(btn => {
    btn.addEventListener("click", function (e) {
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height) * 1.5;
      const rip  = document.createElement("span");
      Object.assign(rip.style, {
        position:      "absolute",
        borderRadius:  "50%",
        width:         `${size}px`,
        height:        `${size}px`,
        left:          `${e.clientX - rect.left - size / 2}px`,
        top:           `${e.clientY - rect.top - size / 2}px`,
        background:    "rgba(0,212,255,0.18)",
        transform:     "scale(0)",
        animation:     "ripple 0.55s ease-out forwards",
        pointerEvents: "none",
        zIndex:        "10",
      });
      this.style.position = "relative";
      this.style.overflow = "hidden";
      this.appendChild(rip);
      setTimeout(() => rip.remove(), 600);
    });
  });
  const rs = document.createElement("style");
  rs.textContent = "@keyframes ripple{to{transform:scale(2.5);opacity:0;}}";
  document.head.appendChild(rs);

  /* --------------------------------------------------
     Ecosystem: ripple-glow across nodes on hover
  -------------------------------------------------- */
  const ecoNodes = document.querySelectorAll(".eco-node");
  ecoNodes.forEach((node, i) => {
    node.addEventListener("mouseenter", () => {
      ecoNodes.forEach((n, j) => {
        const d = Math.abs(i - j) * 90;
        setTimeout(() => {
          n.style.borderColor = "rgba(0,212,255,0.55)";
          n.style.color       = "var(--cyan)";
        }, d);
        setTimeout(() => {
          n.style.borderColor = "";
          n.style.color       = "";
        }, d + 480);
      });
    });
  });

  /* --------------------------------------------------
     Animated chart bars (live feel)
  -------------------------------------------------- */
  function animateBars() {
    document.querySelectorAll(".bar").forEach(bar => {
      bar.style.height = `${Math.floor(Math.random() * 55 + 28)}%`;
    });
  }
  setInterval(animateBars, 2600);

  /* --------------------------------------------------
     Smooth scroll for CTA button → first section
  -------------------------------------------------- */
  document.querySelector(".btn-primary")?.addEventListener("click", () => {
    document.getElementById("services")?.scrollIntoView({ behavior: "smooth" });
  });

  console.log("%cAnovex Technologies v4 loaded ✓", "color:#00d4ff;font-weight:700;font-size:13px");
});