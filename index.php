<?php
$company = "Anovex Technologies";
$year    = date("Y");

$nav_items = [
    ["label" => "Services",  "dropdown" => true,  "href" => "#services"],
    ["label" => "Ecosystem", "dropdown" => true,  "href" => "#ecosystem"],
    ["label" => "Our Tech",  "dropdown" => false, "href" => "#tech"],
];

$hero = [
    "headline_1" => "TRANSFORMING ENTERPRISES",
    "headline_2" => "THROUGH",
    "headline_3" => "&lt;INTELLIGENT DIGITAL SOLUTIONS&gt;",
    "sub"        => "Anovex Technologies builds next-generation AI, automation, integrated operating systems, and data infrastructure for enterprise and GovTech sectors.",
    "cta"        => "Explore Our Solutions",
];

$services = [
    [
        "icon"   => "ti-settings-automation",
        "title"  => "AI-Powered Enterprise Automation",
        "desc"   => "AI-Powered enterprise solutions and infrastructure systems for enterprise and GovTech sectors.",
        "points" => ["Automated approval engines", "Automated governance", "Automated approval engines"],
    ],
    [
        "icon"   => "ti-briefcase",
        "title"  => "AI + ERP + Business Operating Systems",
        "desc"   => "Anovex technologies builds next-generate AI, automation, integrations and GovTech solutions.",
        "points" => ["Integration middleware", "Integration middleware", "Integration centaware"],
    ],
    [
        "icon"   => "ti-building-community",
        "title"  => "GovTech & Digital Transformation",
        "desc"   => "Digital Technologies builds AI infrastructure for enterprises and GovTech sectors.",
        "points" => ["Smart City Systems", "Government Systems", "Constitution Systems", "Digital Seekers", "Management"],
    ],
    [
        "icon"   => "ti-chart-bar",
        "title"  => "AI Data Analytics",
        "desc"   => "AI Data technologies delivering predictive analytics and data intelligence.",
        "points" => ["Predictive forecasting models", "Data-driven analytics", "Analyse models", "Success metrics"],
    ],
];

$direction_cards = [
    [
        "icon"     => "ti-settings-automation",
        "title"    => "AI-Powered Enterprise Systems",
        "desc"     => "AI-powered enterprise automation solution.",
        "points"   => ["Automated approval engines", "Automated business operating systems", "Automated basic automation middleware", "Smart City systems", "Sealcity", "Governance processing and market systems"],
        "featured" => false,
        "chart"    => false,
    ],
    [
        "icon"     => "ti-building-arch",
        "title"    => "Govenex & GovTech",
        "desc"     => "Smart City Systems",
        "points"   => [],
        "featured" => true,
        "chart"    => true,
    ],
    [
        "icon"     => "ti-chart-dots-3",
        "title"    => "AI Data Analytics",
        "desc"     => "Intelligent forecasting and analytics solutions.",
        "points"   => ["Predictive forecasting models", "Predictive forecasting models", "Predictive forecasting models", "Predictive energetic models", "Predictive delta models", "Predictive forecasting models"],
        "featured" => false,
        "chart"    => false,
    ],
];

$ecosystem_nodes = ["Anovex AI", "Anovex ERP", "Anovex GovTech", "Anovex Analytics"];

$tech_stack = [
    ["icon" => "ti-code",     "label" => "Backend",        "detail" => "(Django/PHP/APIs)"],
    ["icon" => "ti-layout",   "label" => "Frontend",       "detail" => "(React.js/TypeScript)"],
    ["icon" => "ti-cloud",    "label" => "Infrastructure", "detail" => "(AWS Lightsail/Cloud)"],
    ["icon" => "ti-database", "label" => "Databases",      "detail" => "(PostgreSQL/MySQL)"],
];

$footer_links = ["Links", "Contact", "Privacy Policy"];
$social_icons = [
    ["icon" => "ti-brand-linkedin", "label" => "LinkedIn"],
    ["icon" => "ti-brand-twitter",  "label" => "Twitter"],
    ["icon" => "ti-brand-facebook", "label" => "Facebook"],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($company) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Exo+2:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ═══════════════════════════════
     STICKY NAV
═══════════════════════════════ -->
<header class="site-nav" id="top">
  <div class="nav-brand">
    <div class="brand-logo"><span class="ba">ANOV</span><span class="bx">EX</span></div>
    <div class="brand-sub">TECHNOLOGIES</div>
  </div>
  <nav class="nav-links" aria-label="Primary navigation">
    <?php foreach ($nav_items as $item): ?>
      <a href="<?= htmlspecialchars($item['href']) ?>" class="nav-link">
        <?= htmlspecialchars($item['label']) ?>
        <?php if ($item['dropdown']): ?>
          <i class="ti ti-chevron-down" aria-hidden="true"></i>
        <?php endif; ?>
      </a>
    <?php endforeach; ?>
  </nav>
  <button class="contact-btn">Contact Us</button>
  <button class="nav-burger" aria-label="Menu" id="burger">
    <i class="ti ti-menu-2"></i>
  </button>
</header>

<!-- ═══════════════════════════════
     SECTION 1 — HERO
═══════════════════════════════ -->
<section class="hero" id="home">
  <div class="hero-bg" aria-hidden="true">
    <div class="city-layer"></div>
    <div class="grid-layer"></div>
    <div class="particles" id="particles"></div>
    <div class="scan-line" id="scanLine"></div>
  </div>
  <div class="hero-inner">
    <p class="hero-eyebrow">Enterprise &bull; GovTech &bull; AI &bull; Analytics</p>
    <h1 class="hero-h">
      <span class="hl1"><?= $hero['headline_1'] ?></span>
      <span class="hl2">
        <?= $hero['headline_2'] ?>
        <span class="hl-accent"><?= $hero['headline_3'] ?></span>
      </span>
    </h1>
    <p class="hero-p"><?= htmlspecialchars($hero['sub']) ?></p>
    <div class="hero-ctas">
      <button class="btn-primary">
        <?= htmlspecialchars($hero['cta']) ?>
        <i class="ti ti-arrow-right" aria-hidden="true"></i>
      </button>
      <button class="btn-outline">Watch Demo <i class="ti ti-player-play" aria-hidden="true"></i></button>
    </div>
    <div class="hero-scroll-hint" aria-hidden="true">
      <div class="scroll-line"></div>
      <span>Scroll to explore</span>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════
     SECTION 2 — CORE SERVICES
═══════════════════════════════ -->
<section class="page-section" id="services">
  <div class="section-header">
    <div class="sh-line"></div>
    <div class="sh-text">
      <p class="sec-eyebrow">What we do</p>
      <h2 class="sec-title">Core Service Areas</h2>
    </div>
    <div class="sh-line"></div>
  </div>

  <div class="services-grid">
    <?php foreach ($services as $idx => $svc): ?>
      <div class="svc-card reveal" style="--delay:<?= $idx * 0.1 ?>s">
        <div class="svc-head">
          <div class="svc-icon">
            <i class="ti <?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
          </div>
          <h3 class="svc-title"><?= htmlspecialchars($svc['title']) ?></h3>
        </div>
        <p class="svc-desc"><?= htmlspecialchars($svc['desc']) ?></p>
        <ul class="svc-list">
          <?php foreach ($svc['points'] as $pt): ?>
            <li><?= htmlspecialchars($pt) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ═══════════════════════════════
     SECTION 3 — THE ANOVEX DIRECTION
═══════════════════════════════ -->
<section class="page-section page-section--dark" id="direction">
  <div class="section-header">
    <div class="sh-line"></div>
    <div class="sh-text">
      <p class="sec-eyebrow">Our focus</p>
      <h2 class="sec-title">The Anovex Direction</h2>
    </div>
    <div class="sh-line"></div>
  </div>

  <div class="direction-grid">
    <?php foreach ($direction_cards as $idx => $card): ?>
      <div class="dir-card <?= $card['featured'] ? 'dir-card--featured' : '' ?> reveal" style="--delay:<?= $idx * 0.12 ?>s">
        <?php if ($card['featured']): ?>
          <div class="dir-featured-badge">Featured</div>
        <?php endif; ?>
        <div class="dir-icon">
          <i class="ti <?= htmlspecialchars($card['icon']) ?>" aria-hidden="true"></i>
        </div>
        <h3 class="dir-title"><?= htmlspecialchars($card['title']) ?></h3>
        <p class="dir-desc"><?= htmlspecialchars($card['desc']) ?></p>
        <?php if (!empty($card['points'])): ?>
          <ul class="dir-list">
            <?php foreach ($card['points'] as $pt): ?>
              <li><?= htmlspecialchars($pt) ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <?php if ($card['chart']): ?>
          <div class="dir-chart" aria-hidden="true">
            <div class="chart-bars" id="chartBars">
              <?php foreach ([40,65,50,80,60,90,70] as $h): ?>
                <div class="bar" style="height:<?= $h ?>%"></div>
              <?php endforeach; ?>
            </div>
            <div class="chart-glow"></div>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ═══════════════════════════════
     SECTION 4 — ECOSYSTEM
═══════════════════════════════ -->
<section class="page-section" id="ecosystem">
  <div class="section-header">
    <div class="sh-line"></div>
    <div class="sh-text">
      <p class="sec-eyebrow">How it connects</p>
      <h2 class="sec-title">The Anovex Ecosystem</h2>
    </div>
    <div class="sh-line"></div>
  </div>
  <p class="eco-sub">Unified flowable — Anovex becomes a unified flow.</p>

  <div class="eco-flow">
    <?php foreach ($ecosystem_nodes as $i => $node): ?>
      <div class="eco-node reveal" style="--delay:<?= $i * 0.15 ?>s"><?= htmlspecialchars($node) ?></div>
      <?php if ($i < count($ecosystem_nodes) - 1): ?>
        <div class="eco-arrow" aria-hidden="true">
          <div class="arrow-line"></div>
          <i class="ti ti-arrow-right"></i>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <div class="eco-bg-pulse" aria-hidden="true">
    <div class="pulse-ring pr1"></div>
    <div class="pulse-ring pr2"></div>
    <div class="pulse-ring pr3"></div>
  </div>
</section>

<!-- ═══════════════════════════════
     SECTION 5 — TECHNOLOGY DIRECTION
═══════════════════════════════ -->
<section class="page-section page-section--dark" id="tech">
  <div class="section-header">
    <div class="sh-line"></div>
    <div class="sh-text">
      <p class="sec-eyebrow">Built on</p>
      <h2 class="sec-title">Technology Direction</h2>
    </div>
    <div class="sh-line"></div>
  </div>

  <div class="tech-grid">
    <?php foreach ($tech_stack as $idx => $t): ?>
      <div class="tech-card reveal" style="--delay:<?= $idx * 0.1 ?>s">
        <div class="tech-icon">
          <i class="ti <?= htmlspecialchars($t['icon']) ?>" aria-hidden="true"></i>
        </div>
        <div>
          <div class="tech-name"><?= htmlspecialchars($t['label']) ?></div>
          <div class="tech-detail"><?= htmlspecialchars($t['detail']) ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ═══════════════════════════════
     FOOTER
═══════════════════════════════ -->
<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="brand-logo"><span class="ba">ANOV</span><span class="bx">EX</span></div>
      <div class="brand-sub">TECHNOLOGIES</div>
      <p class="footer-tagline">Next-generation AI &amp; enterprise infrastructure.</p>
    </div>
    <nav class="footer-links" aria-label="Footer navigation">
      <?php foreach ($footer_links as $lnk): ?>
        <a href="#"><?= htmlspecialchars($lnk) ?></a>
      <?php endforeach; ?>
    </nav>
    <div class="footer-socials">
      <?php foreach ($social_icons as $s): ?>
        <a href="#" class="soc-btn" aria-label="<?= htmlspecialchars($s['label']) ?>">
          <i class="ti <?= htmlspecialchars($s['icon']) ?>" aria-hidden="true"></i>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="footer-bottom">
    <span>anovextechnologies.com</span>
    <span>&copy; <?= $year ?> <?= htmlspecialchars($company) ?>. All rights reserved.</span>
  </div>
</footer>

<script src="assets/js/app.js"></script>
</body>
</html>