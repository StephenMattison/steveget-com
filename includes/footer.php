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
          <?php global $categories; foreach ($categories as $slug => $cat): ?>
            <li><a href="/category.php?cat=<?= e($slug) ?>"><?= $cat['icon'] ?> <?= e($cat['name']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="site-footer__col">
        <h4 class="site-footer__heading">Info</h4>
        <ul class="site-footer__links">
          <li><a href="/about.php">About Steve</a></li>
          <li><a href="/how-we-test.php">How We Test</a></li>
          <li><a href="/contact.php">Contact</a></li>
          <li><a href="/privacy.php">Privacy Policy</a></li>
          <li><a href="/terms.php">Terms of Use</a></li>
        </ul>
      </div>

      <div class="site-footer__col">
        <h4 class="site-footer__heading">Affiliate Disclosure</h4>
        <p class="site-footer__text site-footer__disclosure"><?= SITE_NAME ?> is reader-supported. When you buy through links on our site, we may earn an affiliate commission at no extra cost to you. <a href="/disclosure.php">Learn more</a>.</p>
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
