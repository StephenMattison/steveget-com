<?php
/**
 * SteveGet.com — Contact
 */
$page_title     = 'Contact Steve | SteveGet';
$page_desc      = 'Get in touch with Steve for product suggestions, corrections, or business inquiries.';
$page_keywords  = 'contact steveget, email steve, product suggestions';
$page_canonical = 'https://www.steveget.com/contact.php';
$breadcrumb_data = [
    ['name' => 'Home',    'url' => SITE_URL],
    ['name' => 'Contact', 'url' => $page_canonical],
];
require_once __DIR__ . '/includes/header.php';
?>

<section class="section">
  <div class="container" style="max-width:720px;">
    <h1 class="section__title" style="text-align:left;margin-bottom:1.5rem;">Contact Steve</h1>

    <p>Have a product suggestion? Found an error? Want to say hi? I read every email.</p>

    <h2>Email</h2>
    <p>📧 <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></p>

    <h2>Product Suggestions</h2>
    <p>I'm always looking for new products to test. If there's something you think deserves a review, send me the Amazon link and I'll add it to my list.</p>

    <h2>Business Inquiries</h2>
    <p>For business inquiries, partnerships, or press, email <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a> with "Business" in the subject line.</p>

    <h2>Corrections</h2>
    <p>If you spot an error in a review — wrong price, discontinued product, outdated info — please let me know and I'll fix it immediately.</p>

    <div class="steve-notes mt-8">
      <div class="steve-notes__heading">⚠️ Important Note</div>
      <p class="steve-notes__text">I do not accept free products for review. All products on SteveGet are purchased with my own money.</p>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
