<?php
$company     = "Anovex Technologies";
$tagline     = "AI-Powered Enterprise Solutions";
$description = "Anovex Technologies delivers next-generation ERP, GovTech, AI automation, and analytics solutions built for the demands of modern enterprise.";
$year        = date("Y");
$hq          = "Sri Lanka";

$services = [
    [
        "icon"  => "ti-brain",
        "name"  => "AI Automation",
        "desc"  => "Intelligent process automation that learns, adapts, and scales — eliminating bottlenecks across the entire enterprise stack.",
        "tag"   => "Machine Learning",
    ],
    [
        "icon"  => "ti-building-skyscraper",
        "name"  => "ERP & Business OS",
        "desc"  => "Modular AI-augmented ERP systems that unify finance, operations, HR, and supply chain into one platform.",
        "tag"   => "Enterprise",
    ],
    [
        "icon"  => "ti-landmark",
        "name"  => "GovTech",
        "desc"  => "Secure, compliant digital government infrastructure — from citizen portals to full back-office transformation.",
        "tag"   => "Compliance-Ready",
    ],
    [
        "icon"  => "ti-chart-dots-3",
        "name"  => "Data Analytics",
        "desc"  => "Real-time dashboards, predictive models, and decision intelligence turning enterprise data into competitive advantage.",
        "tag"   => "Real-Time",
    ],
];

$features = [
    ["num" => "01", "title" => "AI-First Architecture",  "desc" => "Every module ships with embedded intelligence — not bolted on after the fact."],
    ["num" => "02", "title" => "Compliance Built-In",    "desc" => "Designed from the ground up to meet government and enterprise regulatory standards."],
    ["num" => "03", "title" => "Scale Without Limits",   "desc" => "Cloud-native infrastructure that grows with your organization — no ceiling, no rearchitecting."],
];

$stats = [
    ["num" => "4<span>+</span>",           "label" => "Core Domains"],
    ["num" => "100<span>%</span>",         "label" => "AI-Native"],
    ["num" => "Gov<span>&mdash;</span>Corp","label" => "Sector Reach"],
];

$tech_stack = ["Python","TensorFlow","Kubernetes","PostgreSQL","React","FastAPI","AWS","Terraform"];

$ticker_items = [
    "AI Automation","Enterprise ERP","GovTech Solutions","Data Analytics",
    "Machine Learning","Digital Transformation","Cloud Infrastructure","Business Intelligence",
];

$marquee_items = [
    "Ministry of Finance","National Transport Authority","Digital Health Lanka",
    "CeylonBank Group","Port Authority","Ministry of Education",
    "Colombo Smart City","National Revenue Office",
];

$team = [
    [
        "initials" => "GON",
        "name"     => "Garumuni Omalka Nidarshana",
        "role"     => "Founder & CEO",
        "bio"      => "Visionary technologist driving Anovex's mission to bring intelligent enterprise solutions to governments and corporations across the region.",
        "socials"  => [
            ["icon" => "ti-brand-linkedin", "label" => "LinkedIn"],
            ["icon" => "ti-brand-x",        "label" => "Twitter"],
            ["icon" => "ti-mail",           "label" => "Email"],
        ],
    ],
];

$nav_links = [
    ["href" => "#services", "label" => "Services"],
    ["href" => "#platform", "label" => "Platform"],
    ["href" => "#team",     "label" => "Team"],
    ["href" => "#contact",  "label" => "Contact"],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= htmlspecialchars($description) ?>">
  <title><?= htmlspecialchars($company) ?> &mdash; <?= htmlspecialchars($tagline) ?></title>

  <!-- Tabler Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ========== NAV ========== -->
<nav>
  <div class="nav-logo">Anov<span>ex</span></div>
  <ul class="nav-links">
    <?php foreach ($nav_links as $link): ?>
      <li><a href="<?= htmlspecialchars($link['href']) ?>"><?= htmlspecialchars($link['label']) ?></a></li>
    <?php endforeach; ?>
  </ul>
  <button class="nav-cta">Get in Touch</button>
</nav>

<!-- ========== TICKER ========== -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <?php
    // Duplicate for seamless loop
    $all_ticker = array_merge($ticker_items, $ticker_items);
    foreach ($all_ticker as $item): ?>
      <div class="ticker-item"><span>&#x2B21;</span><?= htmlspecialchars($item) ?></div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ========== HERO ========== -->
<section class="hero" id="home">
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-orb orb1" aria-hidden="true"></div>
  <div class="hero-orb orb2" aria-hidden="true"></div>

  <div class="hero-inner">
    <div class="hero-badge">
      <div class="badge-dot"></div>
      Enterprise Intelligence Platform
    </div>

    <h1 class="hero-title">
      Where <span class="acc">AI</span> Meets<br>
      <span class="underline-anim">Enterprise</span> <span class="acc2">Scale</span>
    </h1>

    <p class="hero-sub"><?= htmlspecialchars($description) ?></p>

    <div class="hero-actions">
      <button class="btn-p">Explore Solutions</button>
      <button class="btn-g">View Case Studies</button>
    </div>

    <div class="hero-stats">
      <?php foreach ($stats as $stat): ?>
        <div class="stat">
          <div class="stat-num"><?= $stat['num'] ?></div>
          <div class="stat-label"><?= htmlspecialchars($stat['label']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========== MARQUEE ========== -->
<div class="marquee-section" aria-label="Trusted partners">
  <div class="marquee-label">Trusted across industries</div>
  <div class="marquee-track">
    <?php
    $all_marquee = array_merge($marquee_items, $marquee_items);
    foreach ($all_marquee as $item): ?>
      <div class="marquee-item">
        <div class="marquee-dot" aria-hidden="true"></div>
        <?= htmlspecialchars($item) ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ========== SERVICES ========== -->
<section class="section" id="services">
  <div class="s-label">What we build</div>
  <h2 class="s-title">Enterprise solutions engineered to last</h2>
  <p class="s-sub">From AI automation to government-grade infrastructure, our platforms handle complexity at scale.</p>

  <div class="services-grid">
    <?php foreach ($services as $svc): ?>
      <div class="svc">
        <i class="ti <?= htmlspecialchars($svc['icon']) ?> svc-arrow-icon ti-arrow-up-right" aria-hidden="true"></i>
        <div class="svc-icon"><i class="ti <?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i></div>
        <div class="svc-name"><?= htmlspecialchars($svc['name']) ?></div>
        <div class="svc-desc"><?= htmlspecialchars($svc['desc']) ?></div>
        <div class="svc-tag"><?= htmlspecialchars($svc['tag']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Feature Cards -->
  <div class="features-row">
    <?php foreach ($features as $feat): ?>
      <div class="feat">
        <div class="feat-num"><?= htmlspecialchars($feat['num']) ?></div>
        <div class="feat-title"><?= htmlspecialchars($feat['title']) ?></div>
        <div class="feat-desc"><?= htmlspecialchars($feat['desc']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ========== ABOUT ========== -->
<section class="section about-section" id="platform">
  <div class="about-layout">
    <div class="about-text">
      <div class="s-label">Our mission</div>
      <h2 class="s-title">Intelligence infrastructure for tomorrow's enterprise</h2>
      <p class="s-sub">
        Founded in <?= htmlspecialchars($hq) ?> and built for the world. We combine deep technical expertise
        with real enterprise experience to ship software that works at scale.
      </p>
      <div class="tech-row">
        <?php foreach ($tech_stack as $tech): ?>
          <div class="tech-pill"><?= htmlspecialchars($tech) ?></div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="about-terminal">
      <div class="term-bar">
        <div class="term-dot td-red"></div>
        <div class="term-dot td-yellow"></div>
        <div class="term-dot td-green"></div>
        <span class="term-filename">anovex.config.ts</span>
      </div>
      <div class="term-content">
        <div class="t-comment">// <?= htmlspecialchars($company) ?> Platform Config</div>
        <div><span class="t-key">const</span> <span class="t-val">platform</span> = {</div>
        <div class="t-indent"><span class="t-val">name</span>: <span class="t-str">"Anovex OS"</span>,</div>
        <div class="t-indent"><span class="t-val">modules</span>: [</div>
        <?php
        $modules = ["ai-engine","erp-core","govtech","analytics"];
        foreach ($modules as $mod): ?>
          <div class="t-indent2"><span class="t-str">"<?= htmlspecialchars($mod) ?>"</span>,</div>
        <?php endforeach; ?>
        <div class="t-indent">],</div>
        <div class="t-indent"><span class="t-val">ai</span>: <span class="t-key">true</span>,</div>
        <div class="t-indent"><span class="t-val">compliance</span>: <span class="t-str">"gov-grade"</span></div>
        <div>};<span class="t-cursor"></span></div>
      </div>
    </div>
  </div>
</section>

<!-- ========== TEAM ========== -->
<section class="section" id="team">
  <div class="s-label">Leadership</div>
  <h2 class="s-title">The people behind the platform</h2>

  <div class="team-grid">
    <?php foreach ($team as $member): ?>
      <div class="team-card">
        <div class="team-av"><?= htmlspecialchars($member['initials']) ?></div>
        <div class="team-name"><?= htmlspecialchars($member['name']) ?></div>
        <div class="team-role"><?= htmlspecialchars($member['role']) ?></div>
        <div class="team-bio"><?= htmlspecialchars($member['bio']) ?></div>
        <div class="team-socials">
          <?php foreach ($member['socials'] as $s): ?>
            <button class="social-btn" aria-label="<?= htmlspecialchars($s['label']) ?>">
              <i class="ti <?= htmlspecialchars($s['icon']) ?>" aria-hidden="true"></i>
            </button>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ========== CTA ========== -->
<section class="cta-section" id="contact">
  <div class="cta-bg" aria-hidden="true"></div>
  <div class="cta-ring r1" aria-hidden="true"></div>
  <div class="cta-ring r2" aria-hidden="true"></div>
  <div class="cta-ring r3" aria-hidden="true"></div>
  <div class="cta-inner">
    <div class="s-label" style="text-align:center;">Ready to transform?</div>
    <h2 class="cta-title">Let's build your enterprise future, together</h2>
    <p class="cta-sub">Talk to our team about your ERP, AI, or GovTech needs.</p>
    <div class="cta-btns">
      <button class="btn-p">Schedule a Demo</button>
      <button class="btn-g">Contact Sales</button>
    </div>
  </div>
</section>

<!-- ========== FOOTER ========== -->
<footer>
  <div class="f-logo">Anov<span>ex</span></div>
  <div class="f-domains">ERP &middot; GovTech &middot; AI &middot; Analytics</div>
  <div class="f-copy">&copy; <?= $year ?> <?= htmlspecialchars($company) ?></div>
</footer>

<!-- Scripts -->
<script src="assets/js/app.js"></script>
</body>
</html>
