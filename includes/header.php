<?php
/**
 * SteveGet.com — Header Include
 * Include at top of every page. Sets $page_title, $page_desc, $page_keywords, $page_canonical before including.
 */
require_once __DIR__ . '/functions.php';

$page_title    = $page_title    ?? '';
$page_desc     = $page_desc     ?? '';
$page_keywords = $page_keywords ?? '';
$page_canonical = $page_canonical ?? '';
$page_schema   = $page_schema   ?? '';
$breadcrumb_data = $breadcrumb_data ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php render_head($page_title, $page_desc, $page_keywords, $page_canonical); ?>
  <?php if ($page_schema) echo $page_schema; ?>
  <?php if (!empty($breadcrumb_data)) echo schema_breadcrumbs($breadcrumb_data); ?>
</head>
<body>

<!-- Skip to content for accessibility -->
<a href="#main-content" class="skip-link">Skip to content</a>

<!-- ─── HEADER ─────────────────────────────────────────────── -->
<header class="site-header" id="site-header">
  <div class="container site-header__inner">
    <a href="/" class="site-header__logo" aria-label="<?= SITE_NAME ?> Home">
      <span class="logo-icon">🔥</span>
      <span class="logo-text"><?= SITE_NAME ?></span>
      <span class="logo-tag"><?= SITE_TAGLINE ?></span>
    </a>

    <button class="mobile-nav-toggle" id="mobile-nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
      <span class="hamburger"></span>
    </button>

    <nav class="site-nav" id="site-nav" aria-label="Main navigation">
      <ul class="site-nav__list">
        <?php
        global $categories;
        foreach ($categories as $slug => $cat): ?>
          <li class="site-nav__item">
            <a href="/category.php?cat=<?= e($slug) ?>" class="site-nav__link">
              <span class="site-nav__icon"><?= $cat['icon'] ?></span>
              <?= e($cat['name']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>

<?php if (!empty($breadcrumb_data)): ?>
<div class="container">
  <?= render_breadcrumbs($breadcrumb_data) ?>
</div>
<?php endif; ?>

<main id="main-content">
