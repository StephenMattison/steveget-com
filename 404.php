<?php
/**
 * SteveGet.com — 404 Not Found
 */
$page_title = 'Page Not Found | SteveGet';
$page_desc  = 'The page you\'re looking for doesn\'t exist.';
require_once __DIR__ . '/includes/header.php';
?>

<section class="section" style="text-align:center;padding:5rem 0;">
  <div class="container">
    <h1 style="font-size:4rem;margin-bottom:1rem;">404</h1>
    <h2 class="section__title">Page Not Found</h2>
    <p class="section__subtitle">The page you're looking for doesn't exist or has been moved.</p>
    <div class="mt-8">
      <a href="/" class="btn-buy" style="display:inline-flex;max-width:300px;">
        <span class="btn-buy__text">← Back to Homepage</span>
      </a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
