<?php
/**
 * SteveGet.com — About Steve
 */
$page_title     = 'About Steve — The Person Behind Every Review | SteveGet';
$page_desc      = 'Meet Steve — the person who buys, tests, and reviews every product on SteveGet.com. No sponsors. No freebies. Just honest reviews.';
$page_keywords  = 'about steveget, who is steve, steveget reviews, honest product reviews';
$page_canonical = 'https://www.steveget.com/about.php';
$breadcrumb_data = [
    ['name' => 'Home',        'url' => SITE_URL],
    ['name' => 'About Steve', 'url' => $page_canonical],
];
require_once __DIR__ . '/includes/header.php';
?>

<section class="section">
  <div class="container" style="max-width:720px;">
    <h1 class="section__title" style="text-align:left;margin-bottom:1.5rem;">About Steve</h1>

    <div class="steve-badge mb-8">
      <img src="<?= STEVE_PHOTO ?>" alt="Steve — SteveGet founder" width="64" height="64" class="steve-badge__photo" style="width:64px;height:64px;">
      <div class="steve-badge__text">
        <strong>Steve — Founder of SteveGet</strong>
        <span>Testing products since 2020</span>
      </div>
    </div>

    <h2>Why I Started SteveGet</h2>
    <p>I got tired of reading product reviews written by people who clearly never touched the product. Stock photos, recycled spec sheets, and affiliate links stuffed into articles by writers who never opened the box.</p>
    <p>So I started SteveGet. Every product on this site is <strong>purchased with my own money</strong>, used in my real daily life, and photographed in my own home. If I wouldn't recommend it to my family, it doesn't make the cut.</p>

    <h2>How I Test</h2>
    <p>I don't rush reviews. I use every product for a minimum of 2 weeks — and often much longer — before writing a single word. I test in real conditions: kitchen gadgets in my actual kitchen, outdoor gear on real camping trips, tech in my daily workflow.</p>

    <h2>My Promise to You</h2>
    <ul style="list-style:disc;padding-left:1.5rem;margin-bottom:1.5rem;">
      <li>Every product is purchased by me — no free samples</li>
      <li>Every photo is mine — no stock photography</li>
      <li>Every review is honest — even when the product is disappointing</li>
      <li>Affiliate links are clearly disclosed — and never influence my ranking</li>
    </ul>

    <p>Have a question or product suggestion? <a href="/contact.php">Get in touch</a>.</p>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
