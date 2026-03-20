<?php
/**
 * SteveGet.com — Homepage
 * Wirecutter-style homepage: hero, category grid, featured picks, trust section.
 */

// ─── Page Setup ─────────────────────────────────────────────────
$page_title     = 'Best Products ' . date('Y') . ' — Tested & Reviewed by Steve | SteveGet';
$page_desc      = 'Honest, hands-on product reviews and recommendations. Steve buys, tests, and ranks the best gear in kitchen, tech, home, outdoors & more.';
$page_keywords  = 'best products 2026, product reviews, steve recommendations, affiliate reviews, best kitchen gadgets, best tech gear, best home products';
$page_canonical = 'https://www.steveget.com';

require_once __DIR__ . '/includes/functions.php';

// Build homepage schema
$page_schema = schema_website();

require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════ HERO ═══════════════ -->
<section class="hero">
  <div class="container">
    <h1 class="hero__title">Every Product Tested.<br>Every Review Honest.</h1>
    <p class="hero__subtitle">
      I buy every product with my own money, test it for weeks, and tell you exactly what I think.
      No free samples. No sponsored rankings. Just Steve's real picks for <?= SITE_YEAR ?>.
    </p>
    <div class="hero__badge">
      🔥 Updated for <?= SITE_YEAR ?> — <?= count($products) ?> products reviewed
    </div>
  </div>
</section>

<!-- ═══════════════ CATEGORY GRID ═══════════════ -->
<section class="section">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">Browse by Category</h2>
      <p class="section__subtitle">Tap into Steve's top picks across every category</p>
    </div>
    <div class="category-grid">
      <?php foreach ($categories as $slug => $cat): ?>
        <a href="/category/<?= e($slug) ?>.html" class="category-card">
          <img
            src="<?= e($cat['image']) ?>"
            alt="Best <?= e($cat['name']) ?> products <?= SITE_YEAR ?>"
            class="category-card__image"
            loading="lazy"
            width="400"
            height="300"
          >
          <div class="category-card__body">
            <span class="category-card__icon"><?= $cat['icon'] ?></span>
            <h3 class="category-card__name"><?= e($cat['name']) ?></h3>
            <p class="category-card__count"><?= count_products_in_category($slug) ?> reviews</p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════ FEATURED PICKS ═══════════════ -->
<section class="section section--alt">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">Steve's Top Picks for <?= SITE_YEAR ?></h2>
      <p class="section__subtitle">The best of the best — across every category</p>
    </div>
    <div class="featured-grid">
      <?php
      // Show "Best Overall" picks from each category
      $featured = array_filter($products, fn($p) => $p['badge'] === "Steve's #1 Pick");
      foreach ($featured as $p):
        $cat = get_category($p['category']);
      ?>
        <div class="featured-card">
          <div class="featured-card__image-wrap">
            <?= render_badge($p['badge']) ?>
            <img
              src="<?= e($p['image']) ?>"
              alt="<?= e($p['name']) ?> — Best <?= e($cat['name']) ?> <?= SITE_YEAR ?>"
              class="featured-card__img"
              loading="lazy"
              width="400"
              height="300"
            >
          </div>
          <div class="featured-card__body">
            <?= render_steve_badge($p['steve_photo']) ?>
            <h3 class="featured-card__title mt-4">
              <a href="/product/<?= e($p['slug']) ?>.html"><?= e($p['name']) ?></a>
            </h3>
            <p class="featured-card__excerpt"><?= e($p['description']) ?></p>
            <div class="product-card__meta mb-4">
              <?= render_stars($p['rating']) ?>
              <span class="product-card__price">$<?= e($p['price']) ?></span>
            </div>
            <a href="/product/<?= e($p['slug']) ?>.html" class="featured-card__cta">
              Read Steve's full review →
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════ WHY TRUST STEVE ═══════════════ -->
<section class="trust-section">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">Why Trust Steve?</h2>
      <p class="section__subtitle">Every product, every review — here's how it works</p>
    </div>
    <div class="trust-grid">
      <div class="trust-item">
        <span class="trust-item__icon">💰</span>
        <h3 class="trust-item__title">I Buy Everything</h3>
        <p class="trust-item__text">Every product is purchased with my own money. No free samples, no PR boxes.</p>
      </div>
      <div class="trust-item">
        <span class="trust-item__icon">⏱️</span>
        <h3 class="trust-item__title">Weeks of Testing</h3>
        <p class="trust-item__text">I use every product for weeks (sometimes months) in real daily life before reviewing.</p>
      </div>
      <div class="trust-item">
        <span class="trust-item__icon">📸</span>
        <h3 class="trust-item__title">My Real Photos</h3>
        <p class="trust-item__text">Every photo on this site is mine. No stock photos. Real products in my real home.</p>
      </div>
      <div class="trust-item">
        <span class="trust-item__icon">🏷️</span>
        <h3 class="trust-item__title">Transparent Pricing</h3>
        <p class="trust-item__text">Affiliate links earn me a small commission at zero extra cost to you. I always disclose.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════ ALL PRODUCTS GRID ═══════════════ -->
<section class="section">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">All Reviews</h2>
      <p class="section__subtitle">Every product Steve has tested and reviewed</p>
    </div>
    <div class="product-grid">
      <?php foreach ($products as $p): ?>
        <?= render_product_card($p) ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
