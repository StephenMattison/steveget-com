<?php
/**
 * SteveGet.com — Affiliate Disclosure
 */
$page_title     = 'Affiliate Disclosure | SteveGet';
$page_desc      = 'SteveGet.com affiliate disclosure: how we earn money, our commitment to honest reviews, and how affiliate links work.';
$page_keywords  = 'affiliate disclosure, steveget affiliate, amazon affiliate, how steveget makes money';
$page_canonical = 'https://www.steveget.com/disclosure.php';
$breadcrumb_data = [
    ['name' => 'Home',                 'url' => SITE_URL],
    ['name' => 'Affiliate Disclosure', 'url' => $page_canonical],
];
require_once __DIR__ . '/includes/header.php';
?>

<section class="section">
  <div class="container" style="max-width:720px;">
    <h1 class="section__title" style="text-align:left;margin-bottom:1.5rem;">Affiliate Disclosure</h1>

    <p><strong>Last updated:</strong> <?= date('F j, Y') ?></p>

    <h2>How SteveGet Makes Money</h2>
    <p><?= SITE_NAME ?> participates in multiple affiliate programs, including:</p>
    <ul style="list-style:disc;padding-left:1.5rem;margin-bottom:1.5rem;">
      <li><strong>Amazon Services LLC Associates Program</strong> — an affiliate advertising program designed to provide a means for sites to earn advertising fees by advertising and linking to Amazon.com.</li>
      <li><strong>Walmart Affiliate Program</strong> — through Impact.com, allowing us to earn commissions on qualifying purchases at Walmart.com.</li>
      <li><strong>Best Buy Affiliate Program</strong> — allowing us to earn commissions on qualifying purchases at BestBuy.com.</li>
    </ul>

    <h2>What This Means for You</h2>
    <p>When you click a product link on this site and make a purchase at Amazon, Walmart, Best Buy, or any other linked retailer, I earn a small commission at <strong>no extra cost to you</strong>. The price you pay is exactly the same whether you use my link or go to the retailer directly.</p>

    <h2>Does This Affect My Reviews?</h2>
    <p><strong>Absolutely not.</strong> Every product on SteveGet is ranked based on real testing, not commission rates. I've given poor reviews to products with high commissions and great reviews to products with low commissions. My credibility is worth more than any affiliate payment.</p>

    <h2>My Commitment</h2>
    <ul style="list-style:disc;padding-left:1.5rem;margin-bottom:1.5rem;">
      <li>I purchase every product with my own money</li>
      <li>Rankings are based on testing, not commission rates</li>
      <li>All affiliate links are clearly identified</li>
      <li>I will always disclose any material connection</li>
    </ul>

    <p>Questions about this policy? <a href="/contact.html">Contact me</a>.</p>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
