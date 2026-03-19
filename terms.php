<?php
/**
 * SteveGet.com — Terms of Use
 */
$page_title     = 'Terms of Use | SteveGet';
$page_desc      = 'SteveGet.com terms of use: rules for using our site, affiliate link policies, and content usage.';
$page_keywords  = 'terms of use, steveget terms, site rules';
$page_canonical = 'https://www.steveget.com/terms.php';
$breadcrumb_data = [
    ['name' => 'Home',         'url' => SITE_URL],
    ['name' => 'Terms of Use', 'url' => $page_canonical],
];
require_once __DIR__ . '/includes/header.php';
?>

<section class="section">
  <div class="container" style="max-width:720px;">
    <h1 class="section__title" style="text-align:left;margin-bottom:1.5rem;">Terms of Use</h1>
    <p><strong>Last updated:</strong> <?= date('F j, Y') ?></p>

    <h2>General</h2>
    <p>By accessing <?= SITE_NAME ?> (<?= SITE_URL ?>), you agree to these terms. If you disagree, please do not use our site.</p>

    <h2>Content</h2>
    <p>All content on <?= SITE_NAME ?> — including text, images, and reviews — is the property of <?= SITE_NAME ?> and is protected by copyright. You may not reproduce, distribute, or republish content without written permission.</p>

    <h2>Reviews &amp; Opinions</h2>
    <p>Product reviews on <?= SITE_NAME ?> represent the personal opinions and experiences of the reviewer. Results may vary. We make no guarantees about product performance for individual users.</p>

    <h2>Affiliate Links</h2>
    <p><?= SITE_NAME ?> contains affiliate links. When you purchase through these links, we may earn a commission. This does not affect the price you pay. See our <a href="/disclosure.php">Affiliate Disclosure</a> for details.</p>

    <h2>Pricing</h2>
    <p>Prices listed on <?= SITE_NAME ?> are approximate and may change. Always verify the current price on the retailer's website before purchasing.</p>

    <h2>Limitation of Liability</h2>
    <p><?= SITE_NAME ?> is provided "as is" without warranties of any kind. We are not liable for any damages arising from the use of our site or the products reviewed.</p>

    <h2>Contact</h2>
    <p>Questions? Email <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>.</p>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
