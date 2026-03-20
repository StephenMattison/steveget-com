<?php
/**
 * SteveGet.com — How We Test
 */
$page_title     = 'How We Test Products — Our Review Process | SteveGet';
$page_desc      = 'Learn how SteveGet tests every product: purchased with real money, tested for weeks, photographed by Steve, and ranked honestly.';
$page_keywords  = 'how we test, steveget review process, honest product testing, product review methodology';
$page_canonical = 'https://www.steveget.com/how-we-test.php';
$breadcrumb_data = [
    ['name' => 'Home',        'url' => SITE_URL],
    ['name' => 'How We Test', 'url' => $page_canonical],
];
require_once __DIR__ . '/includes/header.php';
?>

<section class="section">
  <div class="container" style="max-width:720px;">
    <h1 class="section__title" style="text-align:left;margin-bottom:1.5rem;">How We Test Products</h1>

    <p>At SteveGet, every review follows the same rigorous process. Here's exactly how a product goes from Amazon box to published review.</p>

    <h2>Step 1: Research &amp; Purchase</h2>
    <p>I research the top options in each category — reading specs, comparing prices, and narrowing down to the top 3-5 contenders. Then I buy them all with my own money from Amazon or the manufacturer.</p>

    <h2>Step 2: Real-World Testing</h2>
    <p>Every product is tested in real daily use for a minimum of 2 weeks. Kitchen gear gets tested with real meals. Tech gets used in my actual workflow. Outdoor gear goes on real trips. No lab conditions — just real life.</p>

    <h2>Step 3: Documentation</h2>
    <p>I photograph every product with my own camera in my own space. I take notes daily on performance, durability, comfort, and any issues that arise.</p>

    <h2>Step 4: Ranking &amp; Writing</h2>
    <p>After testing, I rank products as <strong>Best Overall</strong>, <strong>Best Budget</strong>, or <strong>Best Value</strong> based on performance, build quality, and price. Then I write the review with real details — not recycled spec sheets.</p>

    <h2>Step 5: Ongoing Updates</h2>
    <p>Products get re-evaluated regularly. If something breaks, degrades, or gets replaced by a better option, the review gets updated with a note.</p>

    <h2>What We Don't Do</h2>
    <ul style="list-style:disc;padding-left:1.5rem;margin-bottom:1.5rem;">
      <li>Accept free products from manufacturers</li>
      <li>Accept payment for positive reviews</li>
      <li>Use stock photos or press images</li>
      <li>Rank products we haven't personally tested</li>
    </ul>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
