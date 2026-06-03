<?php
$company = "Anovex Technologies";
$year    = date("Y");

/* ── Navigation ── */
$nav_items = [
    ["label" => "Services",   "dropdown" => true],
    ["label" => "Ecosystem",  "dropdown" => true],
    ["label" => "Our Tech",   "dropdown" => false],
];

/* ── Hero ── */
$hero = [
    "headline_1" => "TRANSFORMING ENTERPRISES",
    "headline_2" => "THROUGH",
    "headline_3" => "<INTELLIGENT DIGITAL SOLUTIONS>",
    "sub"        => "Anovex Technologies builds next-generation AI, automation, integrated operating systems, and data infrastructure for enterprise and GovTech sectors.",
    "cta"        => "Explore Our Solutions",
];

/* ── Core Service Areas ── */
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
        "desc"   => "Anovex technologies builds next-generate, AI, automation, integrations and GovTech solutions.",
        "points" => ["Integration middleware", "Integration middleware", "Integration centaware"],
    ],
    [
        "icon"   => "ti-building-community",
        "title"  => "GovTech & Digital Transformation",
        "desc"   => "Digital Technologies builds sa-nenerate AI infrastructure for enterprises and GovTech sectors.",
        "points" => ["Smart City Systems", "Government kluden Systems", "Constitution Systems", "Digital Seekers", "Fornt. Management"],
    ],
    [
        "icon"   => "ti-chart-bar",
        "title"  => "AI Data Analytics",
        "desc"   => "AI Data technologies crewtlis move-mantier cangrating rner and data analytics.",
        "points" => ["Predictive forecasting models", "Predictive forecasting models", "Analyze a chinach models", "Success and predkirianle dheluning"],
    ],
];

/* ── Anovex Direction (right panel top) ── */
$direction_cards = [
    [
        "icon"    => "ti-settings-automation",
        "title"   => "AI-Powered Enterprise Systems",
        "desc"    => "AI-caneremized enterprise automation solution.",
        "points"  => ["Automated approval engines","Automated business operating systems","Automated basic automation middleware","Smart City systems","Sealcity","Gemernance processing and marset systems"],
        "featured"=> false,
    ],
    [
        "icon"    => "ti-building-arch",
        "title"   => "Govenex & GovTech",
        "desc"    => "Smart City Systems",
        "points"  => [],
        "featured"=> true,
        "image"   => true,
    ],
    [
        "icon"    => "ti-chart-dots-3",
        "title"   => "AI Data Analytics",
        "desc"    => "Gananize forecastios and analytics cemenmeles.",
        "points"  => ["Predictive forecasting models","Predictive forecasting models","Predictive forecasting models","Predictive enerytic models","Predictive delas models","Predictive forecasting models"],
        "featured"=> false,
    ],
];

/* ── Ecosystem flow ── */
$ecosystem_nodes = ["Anovex AI", "Anovex ERP", "Anovex GovTech", "Anovex Analytics"];

/* ── Tech Stack ── */
$tech_stack = [
    ["icon" => "ti-code",     "label" => "Backend",        "detail" => "(Django/PHP/APIs)"],
    ["icon" => "ti-layout",   "label" => "Frontend",       "detail" => "(React.js/TypeScript)"],
    ["icon" => "ti-cloud",    "label" => "Infrastructure", "detail" => "(AWS Lightsail/Cloud)"],
    ["icon" => "ti-database", "label" => "Databases",      "detail" => "(PostgreSQL/MySQL)"],
];

/* ── Footer ── */
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
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Exo+2:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ========================================================
     SPLIT LAYOUT WRAPPER
     Left = dark hero + services | Right = direction panel
     ======================================================== -->
<div class="split-root">

  <!-- ══════════════ LEFT PANEL ══════════════ -->
  <div class="panel-left">

    <!-- NAV -->
    <header class="site-nav">
      <div class="nav-brand">
        <div class="brand-logo">
          <span class="brand-a">ANOV</span><span class="brand-x">EX</span>
        </div>
        <div class="brand-sub">TECHNOLOGIES</div>
      </div>
      <nav class="nav-links" role="navigation" aria-label="Primary">
        <?php foreach ($nav_items as $item): ?>
          <div class="nav-item <?= $item['dropdown'] ? 'has-dropdown' : '' ?>">
            <button class="nav-btn" aria-haspopup="<?= $item['dropdown'] ? 'true' : 'false' ?>">
              <?= htmlspecialchars($item['label']) ?>
              <?php if ($item['dropdown']): ?>
                <i class="ti ti-chevron-down" aria-hidden="true"></i>
              <?php endif; ?>
            </button>
          </div>
        <?php endforeach; ?>
      </nav>
      <button class="contact-btn">Contact Us</button>
    </header>

    <!-- HERO -->
    <section class="hero" id="home">
      <div class="hero-bg-city" aria-hidden="true">
        <div class="city-overlay"></div>
        <div class="city-grid"></div>
        <div class="city-particles" id="particles"></div>
      </div>
      <div class="hero-content">
        <h1 class="hero-h">
          <span class="h-line1"><?= htmlspecialchars($hero['headline_1']) ?></span>
          <span class="h-line2">
            <?= htmlspecialchars($hero['headline_2']) ?>
            <span class="h-accent"><?= $hero['headline_3'] ?></span>
          </span>
        </h1>
        <p class="hero-p"><?= htmlspecialchars($hero['sub']) ?></p>
        <button class="hero-cta">
          <?= htmlspecialchars($hero['cta']) ?>
          <i class="ti ti-arrow-right" aria-hidden="true"></i>
        </button>
      </div>
    </section>

    <!-- CORE SERVICES -->
    <section class="services-section" id="services">
      <div class="services-header">
        <div class="divider-line"></div>
        <h2 class="services-title">Core Service Areas</h2>
        <div class="divider-line"></div>
      </div>
      <div class="services-grid">
        <?php foreach ($services as $svc): ?>
          <div class="svc-card">
            <div class="svc-card-head">
              <div class="svc-icon-wrap">
                <i class="ti <?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
              </div>
              <h3 class="svc-title"><?= htmlspecialchars($svc['title']) ?></h3>
            </div>
            <p class="svc-desc"><?= htmlspecialchars($svc['desc']) ?></p>
            <ul class="svc-points">
              <?php foreach ($svc['points'] as $pt): ?>
                <li><?= htmlspecialchars($pt) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- FOOTER LEFT -->
    <footer class="footer-left">
      <div class="footer-brand">
        <div class="brand-logo sm">
          <span class="brand-a">ANOV</span><span class="brand-x">EX</span>
        </div>
        <div class="brand-sub sm">TECHNOLOGIES</div>
      </div>
      <div class="footer-meta">
        <div>Date, Fox, <?= $year ?></div>
        <div>&copy; Copyright <?= $year ?> - Technologies, Inc.</div>
      </div>
    </footer>

  </div><!-- /panel-left -->

  <!-- ══════════════ RIGHT PANEL ══════════════ -->
  <div class="panel-right">

    <!-- ANOVEX DIRECTION -->
    <section class="direction-section" id="direction">
      <h2 class="right-section-title">The Anovex Direction</h2>
      <div class="direction-grid">
        <?php foreach ($direction_cards as $card): ?>
          <div class="dir-card <?= $card['featured'] ? 'dir-card--featured' : '' ?>">
            <div class="dir-card-top">
              <div class="dir-icon">
                <i class="ti <?= htmlspecialchars($card['icon']) ?>" aria-hidden="true"></i>
              </div>
              <h3 class="dir-title"><?= htmlspecialchars($card['title']) ?></h3>
              <p class="dir-desc"><?= htmlspecialchars($card['desc']) ?></p>
            </div>
            <?php if (!empty($card['points'])): ?>
              <ul class="dir-points">
                <?php foreach ($card['points'] as $pt): ?>
                  <li><?= htmlspecialchars($pt) ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            <?php if (!empty($card['image'])): ?>
              <div class="dir-card-visual" aria-hidden="true">
                <div class="visual-chart">
                  <div class="chart-bars">
                    <?php foreach ([40,65,50,80,60,90,70] as $h): ?>
                      <div class="bar" style="height:<?= $h ?>%"></div>
                    <?php endforeach; ?>
                  </div>
                  <div class="chart-glow"></div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- ECOSYSTEM -->
    <section class="ecosystem-section" id="ecosystem">
      <div class="divider-line"></div>
      <h2 class="right-section-title">The Anovex Ecosystem</h2>
      <p class="ecosystem-sub">Unified flowable-Anovex becomes a unified flow.</p>
      <div class="ecosystem-flow">
        <?php foreach ($ecosystem_nodes as $i => $node): ?>
          <div class="eco-node"><?= htmlspecialchars($node) ?></div>
          <?php if ($i < count($ecosystem_nodes) - 1): ?>
            <div class="eco-arrow" aria-hidden="true">
              <i class="ti ti-arrow-right"></i>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <div class="ecosystem-bg-lines" aria-hidden="true"></div>
    </section>

    <!-- TECH DIRECTION -->
    <section class="tech-section" id="tech">
      <h2 class="right-section-title">Technology Direction</h2>
      <div class="tech-grid">
        <?php foreach ($tech_stack as $t): ?>
          <div class="tech-item">
            <div class="tech-icon">
              <i class="ti <?= htmlspecialchars($t['icon']) ?>" aria-hidden="true"></i>
            </div>
            <div class="tech-label">
              <span class="tl-name"><?= htmlspecialchars($t['label']) ?></span>
              <span class="tl-detail"><?= htmlspecialchars($t['detail']) ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- FOOTER RIGHT -->
    <footer class="footer-right">
      <a href="https://anovextechnologies.com" class="footer-url">anovextechnologies.com</a>
      <nav class="footer-links" aria-label="Footer">
        <?php foreach ($footer_links as $lnk): ?>
          <a href="#"><?= htmlspecialchars($lnk) ?></a>
        <?php endforeach; ?>
      </nav>
      <div class="footer-socials">
        <?php foreach ($social_icons as $s): ?>
          <a href="#" class="social-ico" aria-label="<?= htmlspecialchars($s['label']) ?>">
            <i class="ti <?= htmlspecialchars($s['icon']) ?>" aria-hidden="true"></i>
          </a>
        <?php endforeach; ?>
      </div>
    </footer>

  </div><!-- /panel-right -->

</div><!-- /split-root -->

<script src="assets/js/app.js"></script>
</body>
</html>