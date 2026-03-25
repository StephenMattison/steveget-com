<?php
/**
 * SteveGet.com — Template Functions
 * Reusable rendering and SEO functions.
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data.php';

// ─── Polyfill ───────────────────────────────────────────────────
if (!function_exists('mb_strimwidth')) {
    function mb_strimwidth(string $str, int $start, int $width, string $trim = ''): string {
        if (strlen($str) <= $width) return $str;
        return substr($str, $start, $width - strlen($trim)) . $trim;
    }
}

// ─── SEO / Schema Functions ─────────────────────────────────────

/**
 * Render JSON-LD WebSite schema (for homepage).
 */
function schema_website(): string {
    return '<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"WebSite",
  "name":"' . SITE_NAME . '",
  "url":"' . SITE_URL . '",
  "description":"' . e(DEFAULT_META_DESC) . '",
  "publisher":{
    "@type":"Organization",
    "name":"' . SITE_NAME . '",
    "logo":{"@type":"ImageObject","url":"' . GOOGLE_LOGO . '"}
  },
  "potentialAction":{
    "@type":"SearchAction",
    "target":"' . SITE_URL . '/search.php?q={search_term_string}",
    "query-input":"required name=search_term_string"
  }
}
</script>';
}

/**
 * Render JSON-LD BreadcrumbList.
 */
function schema_breadcrumbs(array $crumbs): string {
    $items = [];
    foreach ($crumbs as $i => $crumb) {
        $items[] = '{
      "@type":"ListItem",
      "position":' . ($i + 1) . ',
      "name":"' . e($crumb['name']) . '",
      "item":"' . e($crumb['url']) . '"
    }';
    }
    return '<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"BreadcrumbList",
  "itemListElement":[' . implode(',', $items) . ']
}
</script>';
}

/**
 * Render JSON-LD Product + Review + AggregateRating for a product page.
 */
function schema_product(array $p): string {
    $cat = get_category($p['category']);
    return '<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"Product",
  "name":"' . e($p['name']) . '",
  "image":"' . SITE_URL . $p['image'] . '",
  "description":"' . e($p['description']) . '",
  "brand":{"@type":"Brand","name":"' . e(explode(' ', $p['name'])[0]) . '"},
  "sku":"' . e($p['asin']) . '",
  "offers":{
    "@type":"Offer",
    "url":"' . amazon_link($p['asin']) . '",
    "priceCurrency":"USD",
    "price":"' . str_replace(',', '', $p['price']) . '",
    "availability":"https://schema.org/InStock",
    "seller":{"@type":"Organization","name":"Amazon"}
  },
  "aggregateRating":{
    "@type":"AggregateRating",
    "ratingValue":"' . $p['rating'] . '",
    "reviewCount":"' . $p['review_count'] . '",
    "bestRating":"5",
    "worstRating":"1"
  },
  "review":{
    "@type":"Review",
    "author":{"@type":"Person","name":"' . SITE_AUTHOR . '"},
    "datePublished":"' . date('Y-m-d') . '",
    "reviewBody":"' . e($p['steve_notes']) . '",
    "reviewRating":{
      "@type":"Rating",
      "ratingValue":"' . $p['rating'] . '",
      "bestRating":"5",
      "worstRating":"1"
    }
  }
}
</script>';
}

/**
 * Render the <head> meta block.
 */
function render_head(string $title = '', string $description = '', string $keywords = '', string $canonical = ''): void {
    $t = $title ?: DEFAULT_META_TITLE;
    $d = $description ?: DEFAULT_META_DESC;
    $k = $keywords ?: DEFAULT_META_KEYWORDS;
    $c = $canonical ?: SITE_URL;
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($t) ?></title>
    <meta name="description" content="<?= e($d) ?>">
    <meta name="keywords" content="<?= e($k) ?>">
    <link rel="canonical" href="<?= e($c) ?>">
    <meta name="author" content="<?= SITE_AUTHOR ?>">
    <meta name="publisher" content="<?= SITE_NAME ?>">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="1 days">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= SITE_NAME ?>">
    <meta property="og:url" content="<?= e($c) ?>">
    <meta property="og:title" content="<?= e($t) ?>">
    <meta property="og:description" content="<?= e($d) ?>">
    <meta property="og:image" content="<?= OG_IMAGE ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="fb:app_id" content="<?= FB_APP_ID ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= TWITTER_HANDLE ?>">
    <meta name="twitter:title" content="<?= e($t) ?>">
    <meta name="twitter:description" content="<?= e($d) ?>">
    <meta name="twitter:image" content="<?= TW_IMAGE ?>">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicons/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicons/site.webmanifest">
    <link rel="shortcut icon" href="/assets/favicons/favicon.ico">
    <meta name="theme-color" content="#1a1a2e">

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/steveget.css">
    <?php
}

/**
 * Render star rating as HTML.
 */
function render_stars(float $rating): string {
    $full  = floor($rating);
    $half  = ($rating - $full) >= 0.3 ? 1 : 0;
    $empty = 5 - $full - $half;
    $html  = '<span class="stars" aria-label="' . $rating . ' out of 5 stars">';
    for ($i = 0; $i < $full; $i++)  $html .= '<span class="star full">★</span>';
    if ($half)                       $html .= '<span class="star half">★</span>';
    for ($i = 0; $i < $empty; $i++) $html .= '<span class="star empty">☆</span>';
    $html .= '<span class="rating-num">' . $rating . '</span></span>';
    return $html;
}

/**
 * Render the Steve badge.
 */
function render_steve_badge(string $photo = ''): string {
    $img = $photo ?: STEVE_PHOTO;
    return '<div class="steve-badge">
    <img src="' . $img . '" alt="Steve using this product" width="48" height="48" loading="lazy" class="steve-badge__photo">
    <div class="steve-badge__text">
      <strong>' . STEVE_BADGE_TEXT . '</strong>
      <span>Verified owner since ' . SITE_YEAR . '</span>
    </div>
  </div>';
}

/**
 * Render badge (Steve's pick designation).
 */
function render_badge(string $badge): string {
    $classes = [
        "Steve's #1 Pick"  => 'award--overall',
        'Best Budget Pick' => 'award--budget',
        'Best Value Pick'  => 'award--value',
    ];
    $cls = $classes[$badge] ?? 'award--overall';
    return '<span class="award ' . $cls . '">' . e($badge) . '</span>';
}

/**
 * Render real third-party award (only shown when not empty).
 */
function render_award(string $award): string {
    if (empty($award)) return '';
    return '<span class="award award--third-party">' . e($award) . '</span>';
}

/**
 * Render YouTube video embed (only shown when URL provided).
 */
function render_video(string $url): string {
    if (empty($url)) return '';
    // Extract video ID from various YouTube URL formats
    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $url, $m)) {
        $id = $m[1];
        return '<div class="video-embed" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;margin:1.5rem 0;border-radius:8px;">
      <iframe src="https://www.youtube-nocookie.com/embed/' . e($id) . '" style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;" allowfullscreen loading="lazy" title="Steve\'s Video Review"></iframe>
    </div>';
    }
    return '';
}

/**
 * Render a product card (for grids).
 */
function render_product_card(array $p): string {
    $cat = get_category($p['category']);
    return '<article class="product-card">
    <a href="/product/' . e($p['slug']) . '.html" class="product-card__link">
      <div class="product-card__image-wrap">
        <img src="' . e($p['image']) . '" alt="' . e($p['name']) . ' — ' . e($p['badge']) . ' ' . e($cat['name']) . ' pick ' . SITE_YEAR . '" loading="lazy" width="400" height="300" class="product-card__img">
        ' . render_badge($p['badge']) . '
      </div>
      <div class="product-card__body">
        ' . render_steve_badge($p['steve_photo']) . '
        <h3 class="product-card__title">' . e($p['name']) . '</h3>
        <p class="product-card__desc">' . e(mb_strimwidth($p['description'], 0, 120, '…')) . '</p>
        <div class="product-card__meta">
          ' . render_stars($p['rating']) . '
          ' . (!empty($p['price']) ? '<span class="product-card__price">$' . e($p['price']) . '</span>' : '') . '
        </div>
      </div>
    </a>
  </article>';
}

/**
 * Render breadcrumb navigation.
 */
function render_breadcrumbs(array $crumbs): string {
    $html = '<nav class="breadcrumbs" aria-label="Breadcrumb"><ol class="breadcrumbs__list">';
    foreach ($crumbs as $i => $crumb) {
        $last = ($i === count($crumbs) - 1);
        if ($last) {
            $html .= '<li class="breadcrumbs__item breadcrumbs__item--active" aria-current="page">' . e($crumb['name']) . '</li>';
        } else {
            $html .= '<li class="breadcrumbs__item"><a href="' . e($crumb['url']) . '">' . e($crumb['name']) . '</a></li>';
        }
    }
    $html .= '</ol></nav>';
    return $html;
}

/**
 * Render pros/cons table.
 */
function render_pros_cons(array $pros, array $cons): string {
    $html = '<div class="pros-cons">
    <div class="pros-cons__col pros-cons__col--pros">
      <h4 class="pros-cons__heading pros-cons__heading--pros">✅ Pros</h4>
      <ul class="pros-cons__list">';
    foreach ($pros as $pro) {
        $html .= '<li>' . e($pro) . '</li>';
    }
    $html .= '</ul></div>
    <div class="pros-cons__col pros-cons__col--cons">
      <h4 class="pros-cons__heading pros-cons__heading--cons">❌ Cons</h4>
      <ul class="pros-cons__list">';
    foreach ($cons as $con) {
        $html .= '<li>' . e($con) . '</li>';
    }
    $html .= '</ul></div></div>';
    return $html;
}

/**
 * Render specs table.
 */
function render_specs(array $specs): string {
    $html = '<table class="specs-table"><tbody>';
    foreach ($specs as $spec) {
        $parts = explode(':', $spec, 2);
        $html .= '<tr><th>' . e(trim($parts[0])) . '</th><td>' . e(trim($parts[1] ?? '')) . '</td></tr>';
    }
    $html .= '</tbody></table>';
    return $html;
}

/**
 * Render buy buttons — Amazon primary, others secondary row below.
 */
function render_buy_button(array $p): string {
    $html = '<div class="buy-buttons">';

    // Amazon — PRIMARY button (large, prominent)
    if (!empty($p['asin'])) {
        $price_text = !empty($p['price']) ? ' — $' . e($p['price']) : '';
        $html .= '<a href="' . amazon_link($p['asin']) . '" target="_blank" rel="nofollow noopener sponsored" class="btn-buy btn-buy--amazon">
        <span class="btn-buy__icon">🛒</span>
        <span class="btn-buy__text">Buy on Amazon' . $price_text . '</span>
        <span class="btn-buy__sub">Free shipping with Prime</span>
      </a>';
    }

    // Secondary retailers — smaller buttons in a row
    $secondary = [];

    if (!empty($p['walmart_url'])) {
        $secondary[] = '<a href="' . e($p['walmart_url']) . '" target="_blank" rel="nofollow noopener sponsored" class="btn-buy-alt btn-buy-alt--walmart">
        <span class="btn-buy-alt__text">Walmart</span>
      </a>';
    }

    if (!empty($p['bestbuy_url'])) {
        $secondary[] = '<a href="' . e($p['bestbuy_url']) . '" target="_blank" rel="nofollow noopener sponsored" class="btn-buy-alt btn-buy-alt--bestbuy">
        <span class="btn-buy-alt__text">Best Buy</span>
      </a>';
    }

    if (!empty($p['target_url'])) {
        $secondary[] = '<a href="' . e($p['target_url']) . '" target="_blank" rel="nofollow noopener sponsored" class="btn-buy-alt btn-buy-alt--target">
        <span class="btn-buy-alt__text">Target</span>
      </a>';
    }

    if (!empty($secondary)) {
        $html .= '<div class="buy-buttons__alt">
        <span class="buy-buttons__alt-label">Also available at</span>
        <div class="buy-buttons__alt-row">' . implode('', $secondary) . '</div>
      </div>';
    }

    $html .= '</div>';
    return $html;
}
