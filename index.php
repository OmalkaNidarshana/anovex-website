<?php
$company     = "Anovex Technologies";
$tagline     = "AI-Powered Enterprise Solutions";
$description = "AI-powered enterprise infrastructure for governments and corporations across Asia.";
$year        = date("Y");

$nav_links = [
    "Platform", "Solutions", "GovTech", "Pricing", "Company"
];

$announcement = [
    "label" => "New",
    "text"  => "<b>Anovex AI Engine v3.0</b> — now with real-time predictive analytics and multi-tenant ERP modules.",
    "link"  => "Read the announcement",
];

$stats = [
    ["num" => "4+",     "color" => "c1", "label" => "Core domains",        "sub" => "AI · ERP · Gov · Analytics"],
    ["num" => "99.9%",  "color" => "c2", "label" => "Uptime SLA",          "sub" => "Enterprise-grade reliability"],
    ["num" => "3×",     "color" => "c3", "label" => "Faster deployment",    "sub" => "vs. traditional ERP"],
    ["num" => "LKR→$",  "color" => "c4", "label" => "Multi-currency",       "sub" => "140+ locales supported"],
];

$marquee_items = [
    "Ministry of Finance", "National Transport Authority", "Digital Health Lanka",
    "CeylonBank Group", "Port Authority", "Ministry of Education",
    "Colombo Smart City", "National Revenue Office",
];

$services = [
    [
        "color" => "c-blue",
        "icon"  => "ti-brain",
        "name"  => "AI Automation",
        "desc"  => "Intelligent process automation that learns, adapts, and scales — eliminating bottlenecks across the entire enterprise stack. Connect any workflow, automate decisions, and surface insights in real time.",
        "tag"   => "Machine Learning",
    ],
    [
        "color" => "c-teal",
        "icon"  => "ti-building-skyscraper",
        "name"  => "ERP & Business OS",
        "desc"  => "Modular AI-augmented ERP that unifies finance, operations, HR, and supply chain. Replace legacy systems without the usual pain. Deploy in weeks, not years.",
        "tag"   => "Enterprise",
    ],
    [
        "color" => "c-purple",
        "icon"  => "ti-landmark",
        "name"  => "GovTech",
        "desc"  => "Secure, audit-ready digital government infrastructure. From citizen service portals to central back-office transformation — designed to meet ISO, NIST, and local regulatory standards.",
        "tag"   => "Compliance-Ready",
    ],
    [
        "color" => "c-amber",
        "icon"  => "ti-chart-dots-3",
        "name"  => "Data Analytics",
        "desc"  => "Real-time dashboards, predictive models, and decision intelligence. Turn siloed enterprise data into a strategic asset — with drill-downs, anomaly alerts, and executive-level reporting.",
        "tag"   => "Real-Time",
    ],
];

$features = [
    ["icon" => "ti-cpu",          "color" => "fb", "num" => "01", "title" => "AI-First Architecture",  "desc" => "Every module ships with embedded intelligence — not bolted on after the fact."],
    ["icon" => "ti-shield-check", "color" => "ft", "num" => "02", "title" => "Compliance Built-In",    "desc" => "Designed from day one to meet government and enterprise regulatory standards globally."],
    ["icon" => "ti-server",       "color" => "fp", "num" => "03", "title" => "Infinite Scale",         "desc" => "Cloud-native infrastructure that grows with your org — no ceiling, no rearchitecting."],
];

$kpis = [
    ["val" => "8", "sup" => "yrs", "key" => "Platform experience"],
    ["val" => "40", "sup" => "+",  "key" => "Govt. deployments"],
    ["val" => "LK", "sup" => "→SG","key" => "Regional reach"],
    ["val" => "24/7", "sup" => "", "key" => "Enterprise support"],
];

$tech_stack = [
    ["icon" => "ti-brand-python",  "label" => "Python"],
    ["icon" => "ti-topology-star", "label" => "TensorFlow"],
    ["icon" => "ti-brand-docker",  "label" => "Kubernetes"],
    ["icon" => "ti-database",      "label" => "PostgreSQL"],
    ["icon" => "ti-brand-react",   "label" => "React"],
    ["icon" => "ti-api",           "label" => "FastAPI"],
    ["icon" => "ti-cloud",         "label" => "AWS"],
    ["icon" => "ti-settings",      "label" => "Terraform"],
];

$terminal_lines = [
    ["lnum" => 1,  "code" => '<span class="t-cmt">// Anovex Platform v3.0</span>'],
    ["lnum" => 2,  "code" => ""],
    ["lnum" => 3,  "code" => '<span class="t-k">import</span> <span class="t-v">{ Platform }</span> <span class="t-k">from</span> <span class="t-s">\'@anovex/core\'</span>'],
    ["lnum" => 4,  "code" => ""],
    ["lnum" => 5,  "code" => '<span class="t-k">export const</span> <span class="t-v">config</span> = <span class="t-k">new</span> <span class="t-b">Platform</span>({'],
    ["lnum" => 6,  "code" => '&nbsp;&nbsp;<span class="t-v">name</span>: <span class="t-s">"Anovex OS"</span>,'],
    ["lnum" => 7,  "code" => '&nbsp;&nbsp;<span class="t-v">version</span>: <span class="t-s">"3.0.1"</span>,'],
    ["lnum" => 8,  "code" => '&nbsp;&nbsp;<span class="t-v">modules</span>: ['],
    ["lnum" => 9,  "code" => '&nbsp;&nbsp;&nbsp;&nbsp;<span class="t-s">"ai-engine"</span>, <span class="t-s">"erp-core"</span>,'],
    ["lnum" => 10, "code" => '&nbsp;&nbsp;&nbsp;&nbsp;<span class="t-s">"govtech"</span>, <span class="t-s">"analytics"</span>'],
    ["lnum" => 11, "code" => '&nbsp;&nbsp;],'],
    ["lnum" => 12, "code" => '&nbsp;&nbsp;<span class="t-v">ai</span>: <span class="t-b">true</span>,'],
    ["lnum" => 13, "code" => '&nbsp;&nbsp;<span class="t-v">compliance</span>: <span class="t-s">"iso-27001"</span>,'],
    ["lnum" => 14, "code" => '&nbsp;&nbsp;<span class="t-v">region</span>: <span class="t-s">"ap-south-1"</span>'],
    ["lnum" => 15, "code" => '});<span class="t-cursor"></span>'],
];

$team = [
    [
        "initials" => "GON",
        "name"     => "Garumuni Omalka Nidarshana",
        "role"     => "Founder & CEO",
        "bio"      => "Visionary technologist driving Anovex's mission to bring intelligent enterprise software to governments and corporations across Asia. 10+ years building mission-critical systems.",
        "tags"     => ["Enterprise AI", "GovTech", "Platform Strategy"],
        "socials"  => [
            ["icon" => "ti-brand-linkedin", "label" => "LinkedIn"],
            ["icon" => "ti-brand-x",        "label" => "Twitter"],
            ["icon" => "ti-mail",           "label" => "Email"],
        ],
    ],
];

$ticker_items = [
    "AI Automation", "ERP Solutions", "GovTech", "Data Analytics",
    "Machine Learning", "Digital Transformation", "Cloud Infrastructure", "Business Intelligence",
];

$footer_cols = [
    "Platform" => ["AI Engine", "ERP Suite", "GovTech", "Analytics"],
    "Company"  => ["About", "Careers", "Blog", "Press"],
    "Legal"    => ["Privacy", "Terms", "Security", "Compliance"],
];

$compliance_badges = ["ISO 27001", "SOC 2", "GDPR"];
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
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ===== NAV ===== -->
<nav>
  <div class="logo">
    <div class="logo-mark">A</div>
    <div class="logo-txt">Anov<span>ex</span></div>
  </div>
  <ul class="nav-pills">
    <?php foreach ($nav_links as $link): ?>
      <li><button class="nav-pill"><?= htmlspecialchars($link) ?></button></li>
    <?php endforeach; ?>
  </ul>
  <div class="nav-end">
    <button class="nav-signin">Sign in</button>
    <button class="nav-btn">Get Started &rarr;</button>
  </div>
</nav>

<!-- ===== ANNOUNCEMENT BAND ===== -->
<div class="band" role="banner">
  <div class="band-pill"><?= htmlspecialchars($announcement['label']) ?></div>
  <div class="band-txt"><?= $announcement['text'] ?></div>
  <div class="band-link">
    <?= htmlspecialchars($announcement['link']) ?>
    <i class="ti ti-arrow-right" aria-hidden="true"></i>
  </div>
</div>

<!-- ===== HERO ===== -->
<section class="hero" id="home">
  <div class="hero-mesh" aria-hidden="true">
    <div class="mesh-circle mc1"></div>
    <div class="mesh-circle mc2"></div>
    <div class="mesh-circle mc3"></div>
  </div>
  <div class="hero-grid-lines" aria-hidden="true"></div>

  <div class="hero-inner">
    <div class="hero-eyebrow">
      <div class="eyebrow-dot"></div>
      <div class="eyebrow-txt">Trusted by <b>governments &amp; enterprises</b> across Asia</div>
    </div>

    <h1 class="hero-h">
      The Operating System<br>
      <span class="line2">for Modern Enterprise</span>
    </h1>

    <p class="hero-p"><?= htmlspecialchars($description) ?> Built for institutions that can't afford to fail — and won't settle for slow.</p>

    <div class="hero-ctas">
      <button class="cta-main">
        <i class="ti ti-rocket" aria-hidden="true"></i>
        Start for free
      </button>
      <button class="cta-sec">
        <i class="ti ti-player-play" aria-hidden="true"></i>
        Watch demo
      </button>
      <span class="cta-note">No credit card &nbsp;&middot;&nbsp; <span>14-day free trial</span></span>
    </div>

    <div class="hero-proof">
      <div class="proof-avatars" aria-label="Customer avatars">
        <div class="proof-av pa1" aria-hidden="true">MF</div>
        <div class="proof-av pa2" aria-hidden="true">KR</div>
        <div class="proof-av pa3" aria-hidden="true">SL</div>
        <div class="proof-av pa4" aria-hidden="true">AJ</div>
      </div>
      <div class="proof-txt"><b>2,400+</b> enterprises on the platform</div>
      <div class="proof-sep" aria-hidden="true"></div>
      <div class="proof-rating">
        <div class="stars" aria-label="5 stars">
          <?php for ($i = 0; $i < 5; $i++): ?>
            <i class="ti ti-star" aria-hidden="true"></i>
          <?php endfor; ?>
        </div>
        <div class="rating-txt">4.9 / 5 on G2</div>
      </div>
    </div>
  </div>
</section>

<!-- ===== STATS ROW ===== -->
<div class="stats-row" role="list" aria-label="Key statistics">
  <?php foreach ($stats as $s): ?>
    <div class="stat-cell" role="listitem">
      <div class="stat-n <?= htmlspecialchars($s['color']) ?>"><?= htmlspecialchars($s['num']) ?></div>
      <div class="stat-l"><?= htmlspecialchars($s['label']) ?></div>
      <div class="stat-sub"><?= htmlspecialchars($s['sub']) ?></div>
    </div>
  <?php endforeach; ?>
</div>

<!-- ===== MARQUEE ===== -->
<div class="mq-wrap" aria-label="Trusted partners">
  <div class="mq-label">Trusted across industries</div>
  <div class="mq-track" aria-hidden="true">
    <?php
    $all_mq = array_merge($marquee_items, $marquee_items);
    foreach ($all_mq as $item): ?>
      <div class="mq-item">
        <div class="mq-sep"></div>
        <?= htmlspecialchars($item) ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ===== SERVICES ===== -->
<section class="section" id="services">
  <div class="sec-eyebrow"><div class="sec-dot"></div>Core platform</div>
  <h2 class="sec-h">Everything enterprise needs, unified.</h2>
  <p class="sec-p">Four verticals. One platform. Designed from day one to share data, identity, and intelligence across your entire organization.</p>

  <div class="svc-grid">
    <?php foreach ($services as $svc): ?>
      <div class="svc-card <?= htmlspecialchars($svc['color']) ?>">
        <div class="svc-top">
          <div class="svc-icon-wrap">
            <i class="ti <?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
          </div>
          <i class="ti ti-arrow-up-right svc-arrow" aria-hidden="true"></i>
        </div>
        <div class="svc-name"><?= htmlspecialchars($svc['name']) ?></div>
        <div class="svc-desc"><?= htmlspecialchars($svc['desc']) ?></div>
        <div class="svc-footer">
          <div class="svc-tag"><?= htmlspecialchars($svc['tag']) ?></div>
          <div class="svc-learn">Learn more <i class="ti ti-arrow-right" aria-hidden="true"></i></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Feature belt -->
  <div class="feat-belt">
    <?php foreach ($features as $f): ?>
      <div class="feat-card <?= htmlspecialchars($f['color']) ?>">
        <div class="feat-icon-row">
          <i class="ti <?= htmlspecialchars($f['icon']) ?> feat-ico" aria-hidden="true"></i>
          <div class="feat-num-badge"><?= htmlspecialchars($f['num']) ?></div>
        </div>
        <div class="feat-title"><?= htmlspecialchars($f['title']) ?></div>
        <div class="feat-desc"><?= htmlspecialchars($f['desc']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ===== ABOUT ===== -->
<section class="section about-wrap" id="platform">
  <div class="about-inner">
    <div class="about-text">
      <div class="sec-eyebrow"><div class="sec-dot sec-dot--teal"></div>Built different</div>
      <h2 class="sec-h">Intelligence infrastructure for tomorrow</h2>
      <p class="sec-p">Founded in Sri Lanka and built for the world. We combine deep technical expertise with real-world enterprise experience — shipping software that actually works at scale.</p>

      <div class="about-kpi-grid">
        <?php foreach ($kpis as $k): ?>
          <div class="kpi-cell">
            <div class="kpi-val"><?= htmlspecialchars($k['val']) ?><span><?= htmlspecialchars($k['sup']) ?></span></div>
            <div class="kpi-key"><?= htmlspecialchars($k['key']) ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="tech-cloud">
        <?php foreach ($tech_stack as $t): ?>
          <div class="t-pill">
            <i class="ti <?= htmlspecialchars($t['icon']) ?>" aria-hidden="true"></i>
            <?= htmlspecialchars($t['label']) ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="about-terminal">
      <div class="terminal">
        <div class="term-header">
          <div class="t-btn tb-r"></div>
          <div class="t-btn tb-y"></div>
          <div class="t-btn tb-g"></div>
          <div class="t-tab">anovex.config.ts</div>
        </div>
        <div class="term-body">
          <?php foreach ($terminal_lines as $line): ?>
            <div class="ln">
              <span class="lnum"><?= $line['lnum'] ?></span>
              <?= $line['code'] ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== TEAM ===== -->
<section class="section" id="team">
  <div class="sec-eyebrow"><div class="sec-dot sec-dot--purple"></div>Leadership</div>
  <h2 class="sec-h">The people behind the platform</h2>

  <div class="team-inner">
    <?php foreach ($team as $m): ?>
      <div class="tm-card">
        <div class="tm-head">
          <div class="tm-av"><?= htmlspecialchars($m['initials']) ?></div>
          <div>
            <div class="tm-name"><?= htmlspecialchars($m['name']) ?></div>
            <div class="tm-role r-blue"><?= htmlspecialchars($m['role']) ?></div>
          </div>
        </div>
        <div class="tm-bio"><?= htmlspecialchars($m['bio']) ?></div>
        <div class="tm-tags">
          <?php foreach ($m['tags'] as $tag): ?>
            <div class="tm-tag"><?= htmlspecialchars($tag) ?></div>
          <?php endforeach; ?>
        </div>
        <div class="tm-socials">
          <?php foreach ($m['socials'] as $s): ?>
            <button class="s-btn" aria-label="<?= htmlspecialchars($s['label']) ?>">
              <i class="ti <?= htmlspecialchars($s['icon']) ?>" aria-hidden="true"></i>
            </button>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ===== TICKER ===== -->
<div class="ticker-wrap" aria-hidden="true">
  <div class="ticker-inner">
    <?php
    $all_ticker = array_merge($ticker_items, $ticker_items);
    foreach ($all_ticker as $item): ?>
      <div class="tk-item"><em>&#x2B21;</em><?= htmlspecialchars($item) ?></div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ===== CTA ===== -->
<section class="cta-sec" id="contact">
  <div class="cta-rings" aria-hidden="true">
    <div class="ring rg1"></div>
    <div class="ring rg2"></div>
    <div class="ring rg3"></div>
  </div>
  <div class="cta-glow" aria-hidden="true"></div>
  <div class="cta-inner">
    <div class="cta-badge">
      <i class="ti ti-rocket" aria-hidden="true"></i>
      Get early access
    </div>
    <h2 class="cta-h">Let's build your enterprise future, together.</h2>
    <p class="cta-p">Talk to our team about your ERP, AI, or GovTech project.</p>
    <div class="cta-form">
      <input class="cta-input" type="email" placeholder="your@company.com" aria-label="Work email">
      <button class="cta-input-btn" type="submit">Get Started</button>
    </div>
    <div class="cta-fine">No spam. No credit card. Cancel anytime.</div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer>
  <div class="foot-top">
    <div class="foot-brand">
      <div class="fl">
        <div class="fl-mark">A</div>
        Anov<span>ex</span>
      </div>
      <p><?= htmlspecialchars($description) ?></p>
    </div>
    <?php foreach ($footer_cols as $heading => $links): ?>
      <div class="foot-col">
        <h4><?= htmlspecialchars($heading) ?></h4>
        <?php foreach ($links as $link): ?>
          <a href="#"><?= htmlspecialchars($link) ?></a>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="foot-bottom">
    <div class="foot-copy">&copy; <?= $year ?> <?= htmlspecialchars($company) ?>. All rights reserved.</div>
    <div class="foot-badges">
      <?php foreach ($compliance_badges as $badge): ?>
        <div class="fbadge"><?= htmlspecialchars($badge) ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</footer>

<script src="assets/js/app.js"></script>
</body>
</html>