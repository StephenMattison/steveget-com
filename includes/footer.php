<?php
/**
 * SteveGet.com — Footer Include
 */
?>
</main>

<!-- ─── FOOTER ─────────────────────────────────────────────── -->
<footer class="site-footer">
  <div class="container">
    <div class="site-footer__grid">

      <div class="site-footer__col">
        <h4 class="site-footer__heading">About <?= SITE_NAME ?></h4>
        <p class="site-footer__text">Every product on this site is purchased, tested, and photographed by Steve. No free samples. No sponsored rankings. Just honest, hands-on reviews.</p>
      </div>

      <div class="site-footer__col">
        <h4 class="site-footer__heading">Categories</h4>
        <ul class="site-footer__links">
          <?php global $categories; foreach ($categories as $_nav_slug => $_nav_cat): ?>
            <li><a href="/category/<?= e($_nav_slug) ?>.html"><?= $_nav_cat['icon'] ?> <?= e($_nav_cat['name']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="site-footer__col">
        <h4 class="site-footer__heading">Info</h4>
        <ul class="site-footer__links">
          <li><a href="/about.html">About Steve</a></li>
          <li><a href="/how-we-test.html">How We Test</a></li>
          <li><a href="/contact.html">Contact</a></li>
          <li><a href="/privacy.html">Privacy Policy</a></li>
          <li><a href="/terms.html">Terms of Use</a></li>
        </ul>
      </div>

      <div class="site-footer__col">
        <h4 class="site-footer__heading">Affiliate Disclosure</h4>
        <p class="site-footer__text site-footer__disclosure"><?= SITE_NAME ?> is reader-supported. When you buy through links on our site, we may earn an affiliate commission from Amazon, Walmart, Best Buy, and other retailers at no extra cost to you. <a href="/disclosure.html">Learn more</a>.</p>
        <p class="site-footer__text" style="margin-top:0.5rem;font-size:0.85em;">As an Amazon Associate, I earn from qualifying purchases.</p>
      </div>

    </div>

    <div class="site-footer__bottom">
      <p>&copy; <?= SITE_YEAR ?> <?= SITE_NAME ?>. All rights reserved. All product names, logos, and brands are property of their respective owners.</p>
    </div>
  </div>
</footer>

<script src="/assets/js/steveget.js" defer></script>
</body>
</html>
