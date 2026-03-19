<?php
/**
 * SteveGet.com — Privacy Policy
 */
$page_title     = 'Privacy Policy | SteveGet';
$page_desc      = 'SteveGet.com privacy policy: how we handle your data, cookies, and third-party services.';
$page_keywords  = 'privacy policy, steveget privacy, data collection';
$page_canonical = 'https://www.steveget.com/privacy.php';
$breadcrumb_data = [
    ['name' => 'Home',           'url' => SITE_URL],
    ['name' => 'Privacy Policy', 'url' => $page_canonical],
];
require_once __DIR__ . '/includes/header.php';
?>

<section class="section">
  <div class="container" style="max-width:720px;">
    <h1 class="section__title" style="text-align:left;margin-bottom:1.5rem;">Privacy Policy</h1>
    <p><strong>Last updated:</strong> <?= date('F j, Y') ?></p>

    <h2>Information We Collect</h2>
    <p><?= SITE_NAME ?> does not collect personal information unless you voluntarily contact us via email. We do not have user accounts, login systems, or forms that collect personal data.</p>

    <h2>Cookies &amp; Analytics</h2>
    <p>We may use basic analytics tools (such as Google Analytics) to understand how visitors use our site. These tools may use cookies to collect anonymized usage data. You can disable cookies in your browser settings.</p>

    <h2>Third-Party Links</h2>
    <p>Our site contains affiliate links to Amazon.com and other retailers. When you click these links, you leave <?= SITE_NAME ?> and are subject to the privacy policies of those sites.</p>

    <h2>Amazon Associates</h2>
    <p>As an Amazon Associate, we earn from qualifying purchases. Amazon may use cookies and tracking to attribute sales. For Amazon's privacy practices, see <a href="https://www.amazon.com/privacy" target="_blank" rel="noopener">Amazon's Privacy Notice</a>.</p>

    <h2>Contact</h2>
    <p>Questions about this policy? Email <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>.</p>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
