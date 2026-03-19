<?php
/**
 * SteveGet.com — Single Product Review Page
 * Full Wirecutter-style product review with:
 * - Hero image + award badge
 * - Steve's photo proof + badge
 * - Pros/cons table
 * - Specs table
 * - Steve's personal notes
 * - Big Amazon Buy Now button
 * - JSON-LD Product + Review + AggregateRating schema
 * - Related products from same category
 *
 * URL: /product.php?slug=best-chef-knife-2026
 */

require_once __DIR__ . '/includes/functions.php';

// ─── Get Product ────────────────────────────────────────────────
$slug    = isset($_GET['slug']) ? preg_replace('/[^a-z0-9-]/', '', $_GET['slug']) : '';
$product = get_product_by_slug($slug);

if (!$product) {
    http_response_code(404);
    $page_title = 'Product Not Found | ' . SITE_NAME;
    require_once __DIR__ . '/includes/header.php';
    echo '<div class="container" style="padding:4rem 0;text-align:center;"><h1>Product Not Found</h1><p>The review you\'re looking for doesn\'t exist.</p><p><a href="/" class="cta-link">← Back to Homepage</a></p></div>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$cat = get_category($product['category']);

// ─── SEO Setup ──────────────────────────────────────────────────
$page_title     = e($product['name']) . ' Review ' . SITE_YEAR . ' — ' . $product['award'] . ' | ' . SITE_NAME;
$page_desc      = 'Steve\'s hands-on review of the ' . $product['name'] . '. ' . mb_strimwidth($product['description'], 0, 130, '…');
$page_keywords  = $product['keywords'];
$page_canonical = SITE_URL . '/product.php?slug=' . $product['slug'];

// Breadcrumbs
$breadcrumb_data = [
    ['name' => 'Home',           'url' => SITE_URL],
    ['name' => $cat['name'],     'url' => SITE_URL . '/category.php?cat=' . $cat['slug']],
    ['name' => $product['name'], 'url' => $page_canonical],
];

// Product schema
$page_schema = schema_product($product);

require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════ PRODUCT REVIEW HERO ═══════════════ -->
<section class="review-hero">
  <div class="container">
    <div class="review-hero__inner">

      <!-- Product Image -->
      <div class="review-hero__image">
        <img
          src="<?= e($product['image']) ?>"
          alt="<?= e($product['name']) ?> — <?= e($product['award']) ?> <?= e($cat['name']) ?> pick <?= SITE_YEAR ?>"
          width="600"
          height="450"
          loading="eager"
        >
      </div>

      <!-- Product Info -->
      <div class="review-hero__content">
        <span class="award review-hero__award <?= $product['award'] === 'Best Overall' ? 'award--overall' : ($product['award'] === 'Best Budget' ? 'award--budget' : 'award--value') ?>">
          <?= e($product['award']) ?> — <?= e($cat['name']) ?>
        </span>

        <h1 class="review-hero__title"><?= e($product['name']) ?></h1>

        <div class="review-hero__meta">
          <?= render_stars($product['rating']) ?>
          <span><?= e($product['review_count']) ?> reviews</span>
          <span>Category: <a href="/category.php?cat=<?= e($cat['slug']) ?>"><?= e($cat['name']) ?></a></span>
        </div>

        <p class="review-hero__price">$<?= e($product['price']) ?></p>

        <!-- Steve Badge -->
        <?= render_steve_badge($product['steve_photo']) ?>

        <!-- Buy Button -->
        <div class="mt-4">
          <?= render_buy_button($product) ?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════ REVIEW BODY ═══════════════ -->
<div class="review-body">
  <div class="container">

    <!-- Steve's Verdict -->
    <h2>Steve's Verdict: <?= e($product['award']) ?></h2>
    <p><?= e($product['description']) ?></p>

    <!-- Steve's Notes -->
    <div class="steve-notes">
      <div class="steve-notes__heading">
        📝 Steve's Personal Notes
      </div>
      <p class="steve-notes__text">"<?= e($product['steve_notes']) ?>"</p>
    </div>

    <!-- Steve's Photo Proof -->
    <h2>Steve's Photo Proof</h2>
    <p>Every product on SteveGet is owned and tested by Steve. Here's the proof:</p>
    <figure style="margin: 1.5rem 0;">
      <img
        src="<?= e($product['steve_photo']) ?>"
        alt="Steve using the <?= e($product['name']) ?> — real owner photo proof"
        loading="lazy"
        width="800"
        height="600"
        style="border-radius: 8px; width: 100%;"
      >
      <figcaption style="font-size: 0.875rem; color: #6b7280; margin-top: 0.5rem; text-align: center;">
        📸 Steve's real photo — taken in his own home
      </figcaption>
    </figure>

    <!-- Pros & Cons -->
    <h2>Pros &amp; Cons</h2>
    <?= render_pros_cons($product['pros'], $product['cons']) ?>

    <!-- Specifications -->
    <h2>Key Specifications</h2>
    <?= render_specs($product['specs']) ?>

    <!-- Final Buy CTA -->
    <h2>Where to Buy</h2>
    <p>The <?= e($product['name']) ?> is available on Amazon with free Prime shipping. Steve recommends buying from Amazon for the best return policy and price.</p>
    <?= render_buy_button($product) ?>

    <!-- Affiliate Disclosure -->
    <p style="font-size: 0.75rem; color: #9ca3af; text-align: center; margin-top: 1rem;">
      <em>Affiliate disclosure: SteveGet earns a commission on purchases made through our links at no extra cost to you. <a href="/disclosure.php">Learn more</a>.</em>
    </p>

  </div>
</div>

<!-- ═══════════════ RELATED PRODUCTS ═══════════════ -->
<?php
$related = array_filter($products, fn($p) => $p['category'] === $product['category'] && $p['slug'] !== $product['slug']);
if (!empty($related)):
?>
<section class="related-section">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">More in <?= e($cat['name']) ?></h2>
      <p class="section__subtitle">Other products Steve has tested in this category</p>
    </div>
    <div class="product-grid">
      <?php foreach ($related as $rp): ?>
        <?= render_product_card($rp) ?>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-8">
      <a href="/category.php?cat=<?= e($cat['slug']) ?>" class="cta-link">
        View all <?= e($cat['name']) ?> reviews →
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Sticky Buy Bar (Mobile) -->
<div class="sticky-buy-bar" id="sticky-buy-bar">
  <a href="<?= amazon_link($product['asin']) ?>" target="_blank" rel="nofollow noopener sponsored" class="btn-buy">
    <span class="btn-buy__text">Buy on Amazon — $<?= e($product['price']) ?></span>
  </a>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
