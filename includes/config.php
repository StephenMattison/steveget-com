<?php
/**
 * SteveGet.com — Global Configuration
 * Drop-in affiliate site config. Edit these values once.
 */

// ─── Site Identity ──────────────────────────────────────────────
define('SITE_NAME',        'SteveGet');
define('SITE_TAGLINE',     'What Steve Loves — Tested, Trusted, Reviewed');
define('SITE_DOMAIN',      'steveget.com');
define('SITE_URL',         'https://www.' . SITE_DOMAIN);
define('SITE_EMAIL',       'steve@' . SITE_DOMAIN);
define('SITE_YEAR',        date('Y'));
define('SITE_AUTHOR',      'Steve');

// ─── SEO Defaults ───────────────────────────────────────────────
define('DEFAULT_META_TITLE',       'Best Products ' . SITE_YEAR . ' — Tested & Reviewed by Steve | ' . SITE_NAME);
define('DEFAULT_META_DESC',        'Honest, hands-on product reviews and recommendations. Steve buys, tests, and ranks the best gear in kitchen, tech, home, outdoors & more.');
define('DEFAULT_META_KEYWORDS',    'best products 2026, product reviews, steve recommendations, affiliate reviews, best kitchen gadgets, best tech gear');

// ─── Social / Open Graph ────────────────────────────────────────
define('OG_IMAGE',         SITE_URL . '/assets/img/social-cards/steveget-facebook-card.jpg');
define('TW_IMAGE',         SITE_URL . '/assets/img/social-cards/steveget-twitter-card.jpg');
define('GOOGLE_LOGO',      SITE_URL . '/assets/img/social-cards/steveget-google-card.jpg');
define('FB_APP_ID',        '0000000000');
define('TWITTER_HANDLE',   '@steveget');

// ─── Amazon Affiliate ───────────────────────────────────────────
define('AMAZON_TAG',       'steveget-20'); // Your Amazon Associates tag
define('AMAZON_BASE',      'https://www.amazon.com/dp/');

// ─── File Paths ─────────────────────────────────────────────────
define('ROOT_PATH',        dirname(__DIR__));
define('INCLUDES_PATH',    ROOT_PATH . '/includes');
define('ASSETS_URL',       '/assets');

// ─── Steve's Photo Proof ────────────────────────────────────────
define('STEVE_PHOTO',      ASSETS_URL . '/img/steve/steve-profile.webp');
define('STEVE_BADGE_TEXT', 'Steve owns &amp; uses daily');

/**
 * Build an Amazon affiliate link from an ASIN.
 */
function amazon_link(string $asin): string {
    return AMAZON_BASE . $asin . '?tag=' . AMAZON_TAG;
}

/**
 * Generate an SEO-ready meta title for a page.
 */
function meta_title(string $page_title = ''): string {
    if ($page_title) {
        return htmlspecialchars($page_title) . ' | ' . SITE_NAME;
    }
    return DEFAULT_META_TITLE;
}

/**
 * Sanitize output for HTML.
 */
function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Get the current full URL.
 */
function current_url(): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $protocol . '://' . ($_SERVER['HTTP_HOST'] ?? SITE_DOMAIN) . ($_SERVER['REQUEST_URI'] ?? '/');
}
