<?php
/**
 * SteveGet.com — Category Page
 * Displays all products in a category with Wirecutter-style grid layout.
 * URL: /category.php?cat=kitchen
 */

require_once __DIR__ . '/includes/functions.php';

// ─── Get Category ───────────────────────────────────────────────
$cat_slug = isset($_GET['cat']) ? preg_replace('/[^a-z0-9-]/', '', $_GET['cat']) : '';
$cat      = get_category($cat_slug);

if (!$cat) {
    http_response_code(404);
    $page_title = 'Category Not Found | ' . SITE_NAME;
    require_once __DIR__ . '/includes/header.php';
    echo '<div class="container" style="padding:4rem 0;text-align:center;"><h1>Category Not Found</h1><p>The category you\'re looking for doesn\'t exist.</p><p><a href="/" class="cta-link">← Back to Homepage</a></p></div>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$cat_products = get_products_by_category($cat_slug);

// ─── SEO Setup ──────────────────────────────────────────────────
$page_title     = $cat['meta_title'];
$page_desc      = $cat['meta_desc'];
$page_keywords  = 'best ' . strtolower($cat['name']) . ' ' . SITE_YEAR . ', ' . strtolower($cat['name']) . ' reviews, steve ' . strtolower($cat['name']) . ' picks';
$page_canonical = SITE_URL . '/category.php?cat=' . $cat_slug;

// Breadcrumbs
$breadcrumb_data = [
    ['name' => 'Home',           'url' => SITE_URL],
    ['name' => $cat['name'],     'url' => $page_canonical],
];

require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════ CATEGORY HERO ═══════════════ -->
<section class="category-hero">
  <div class="container">
    <span class="category-hero__icon"><?= $cat['icon'] ?></span>
    <h1 class="category-hero__title">Best <?= e($cat['name']) ?> Products <?= SITE_YEAR ?></h1>
    <p class="category-hero__desc"><?= e($cat['description']) ?></p>
  </div>
</section>

<!-- ═══════════════ PRODUCT LISTINGS ═══════════════ -->
<section class="section">
  <div class="container">

    <?php if (empty($cat_products)): ?>
      <div class="text-center" style="padding:2rem 0;">
        <h2>Coming Soon</h2>
        <p>Steve is currently testing products in this category. Check back soon!</p>
        <a href="/" class="cta-link mt-4">← Back to All Reviews</a>
      </div>
    <?php else: ?>

      <!-- Award Winners Summary -->
      <div class="section__header">
        <h2 class="section__title">Steve's <?= e($cat['name']) ?> Picks</h2>
        <p class="section__subtitle"><?= count($cat_products) ?> products tested & reviewed</p>
      </div>

      <!-- Product Grid -->
      <div class="product-grid">
        <?php foreach ($cat_products as $p): ?>
          <?= render_product_card($p) ?>
        <?php endforeach; ?>
      </div>

      <!-- Internal links to other categories -->
      <div class="mt-8 text-center">
        <h3>Explore More Categories</h3>
        <div class="category-grid mt-4">
          <?php foreach ($categories as $slug => $other_cat):
            if ($slug === $cat_slug) continue;
          ?>
            <a href="/category/<?= e($slug) ?>.html" class="category-card">
              <div class="category-card__body">
                <span class="category-card__icon"><?= $other_cat['icon'] ?></span>
                <h3 class="category-card__name"><?= e($other_cat['name']) ?></h3>
                <p class="category-card__count"><?= count_products_in_category($slug) ?> reviews</p>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
