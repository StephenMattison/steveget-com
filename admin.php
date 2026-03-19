<?php
/**
 * SteveGet.com — Admin Notes Editor
 * Simple page to view/edit product notes and data.
 * NOT public-facing — add .htaccess protection in production.
 *
 * URL: /admin.php
 */

require_once __DIR__ . '/includes/functions.php';

$message     = '';
$message_type = '';

// ─── Handle Form Submission ─────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    // Read data.php
    $data_file = __DIR__ . '/includes/data.php';
    $data_content = file_get_contents($data_file);

    if ($_POST['action'] === 'update_notes') {
        $slug  = preg_replace('/[^a-z0-9-]/', '', $_POST['slug'] ?? '');
        $notes = $_POST['steve_notes'] ?? '';
        $desc  = $_POST['description'] ?? '';
        $asin  = preg_replace('/[^A-Z0-9]/', '', $_POST['asin'] ?? '');
        $price = preg_replace('/[^0-9.,]/', '', $_POST['price'] ?? '');

        // Quick save: write to a JSON sidecar file per product
        $notes_dir = __DIR__ . '/admin-notes';
        if (!is_dir($notes_dir)) mkdir($notes_dir, 0755, true);

        $note_data = [
            'slug'        => $slug,
            'steve_notes' => $notes,
            'description' => $desc,
            'asin'        => $asin,
            'price'       => $price,
            'updated'     => date('Y-m-d H:i:s'),
        ];

        file_put_contents(
            $notes_dir . '/' . $slug . '.json',
            json_encode($note_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        $message = 'Notes saved for "' . e($slug) . '". To apply changes permanently, update includes/data.php.';
        $message_type = 'success';
    }
}

// ─── Page Setup ─────────────────────────────────────────────────
$page_title = 'Admin — Product Notes Editor | ' . SITE_NAME;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow">
  <title><?= e($page_title) ?></title>
  <link rel="stylesheet" href="/assets/css/styles.css">
  <style>
    .admin-tabs { display: flex; gap: 0.5rem; margin-bottom: 2rem; flex-wrap: wrap; }
    .admin-tab {
      padding: 0.5rem 1rem; border-radius: 6px; font-size: 0.875rem;
      font-weight: 600; cursor: pointer; border: 1px solid #e5e7eb;
      background: #f7f7f7; color: #1a1a2e; text-decoration: none;
    }
    .admin-tab.active, .admin-tab:hover { background: #2563eb; color: #fff; border-color: #2563eb; }
    .product-preview { display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; }
    .product-preview img { width: 60px; height: 60px; object-fit: contain; border-radius: 4px; background: #f7f7f7; }
    .json-note { font-size: 0.75rem; color: #9ca3af; margin-top: 0.5rem; }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="container site-header__inner">
      <a href="/" class="site-header__logo">
        <span class="logo-icon">🔧</span>
        <span class="logo-text"><?= SITE_NAME ?> Admin</span>
      </a>
      <nav style="display:flex;gap:1rem;">
        <a href="/" style="color:#fff;font-size:0.875rem;">← View Site</a>
      </nav>
    </div>
  </header>

  <div class="admin-wrap">
    <h1>📝 Product Notes Editor</h1>
    <p style="color:#6b7280;margin-bottom:2rem;">Edit product descriptions, Steve's notes, ASINs, and prices. Changes save to JSON sidecar files in <code>/admin-notes/</code>. Apply permanently by updating <code>includes/data.php</code>.</p>

    <?php if ($message): ?>
      <div class="admin-msg admin-msg--<?= $message_type ?>"><?= e($message) ?></div>
    <?php endif; ?>

    <!-- Category Tabs -->
    <?php
    $active_cat = $_GET['cat'] ?? array_key_first($categories);
    $active_cat = isset($categories[$active_cat]) ? $active_cat : array_key_first($categories);
    ?>
    <div class="admin-tabs">
      <?php foreach ($categories as $slug => $cat): ?>
        <a href="/admin.php?cat=<?= e($slug) ?>" class="admin-tab <?= $slug === $active_cat ? 'active' : '' ?>">
          <?= $cat['icon'] ?> <?= e($cat['name']) ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Product Forms -->
    <?php
    $cat_products = get_products_by_category($active_cat);
    foreach ($cat_products as $p):
      // Load sidecar notes if they exist
      $sidecar = __DIR__ . '/admin-notes/' . $p['slug'] . '.json';
      $saved = file_exists($sidecar) ? json_decode(file_get_contents($sidecar), true) : null;
    ?>
      <div class="admin-card">
        <div class="product-preview">
          <img src="<?= e($p['image']) ?>" alt="<?= e($p['name']) ?>">
          <div>
            <h3><?= e($p['name']) ?></h3>
            <span class="award <?= $p['award'] === 'Best Overall' ? 'award--overall' : ($p['award'] === 'Best Budget' ? 'award--budget' : 'award--value') ?>" style="position:static;font-size:0.7rem;">
              <?= e($p['award']) ?>
            </span>
          </div>
        </div>

        <form method="POST" action="/admin.php?cat=<?= e($active_cat) ?>">
          <input type="hidden" name="action" value="update_notes">
          <input type="hidden" name="slug" value="<?= e($p['slug']) ?>">

          <div class="admin-field">
            <label for="asin-<?= e($p['slug']) ?>">Amazon ASIN</label>
            <input type="text" id="asin-<?= e($p['slug']) ?>" name="asin" value="<?= e($saved['asin'] ?? $p['asin']) ?>" placeholder="B0XXXXXXXXX">
          </div>

          <div class="admin-field">
            <label for="price-<?= e($p['slug']) ?>">Price ($)</label>
            <input type="text" id="price-<?= e($p['slug']) ?>" name="price" value="<?= e($saved['price'] ?? $p['price']) ?>" placeholder="99.99">
          </div>

          <div class="admin-field">
            <label for="desc-<?= e($p['slug']) ?>">Description</label>
            <textarea id="desc-<?= e($p['slug']) ?>" name="description" rows="3"><?= e($saved['description'] ?? $p['description']) ?></textarea>
          </div>

          <div class="admin-field">
            <label for="notes-<?= e($p['slug']) ?>">Steve's Notes (personal take)</label>
            <textarea id="notes-<?= e($p['slug']) ?>" name="steve_notes" rows="3"><?= e($saved['steve_notes'] ?? $p['steve_notes']) ?></textarea>
          </div>

          <?php if ($saved): ?>
            <p class="json-note">💾 Last saved: <?= e($saved['updated'] ?? 'unknown') ?></p>
          <?php endif; ?>

          <button type="submit" class="admin-btn mt-4">💾 Save Notes</button>
        </form>
      </div>
    <?php endforeach; ?>

    <?php if (empty($cat_products)): ?>
      <div class="admin-card text-center">
        <p>No products in this category yet. Add them in <code>includes/data.php</code>.</p>
      </div>
    <?php endif; ?>

    <!-- Quick Reference -->
    <div class="admin-card">
      <h3>📂 File Structure Quick Reference</h3>
      <table class="specs-table">
        <tbody>
          <tr><th>Product Data</th><td><code>includes/data.php</code> — all products & categories</td></tr>
          <tr><th>Config</th><td><code>includes/config.php</code> — site name, Amazon tag, URLs</td></tr>
          <tr><th>Product Images</th><td><code>assets/img/products/{slug}/main.webp</code></td></tr>
          <tr><th>Steve Photos</th><td><code>assets/img/products/{slug}/steve-using.webp</code></td></tr>
          <tr><th>Category Images</th><td><code>assets/img/categories/{slug}.webp</code></td></tr>
          <tr><th>Steve Profile</th><td><code>assets/img/steve/steve-profile.webp</code></td></tr>
        </tbody>
      </table>
    </div>

  </div>

  <footer class="site-footer">
    <div class="container">
      <div class="site-footer__bottom">
        <p>&copy; <?= SITE_YEAR ?> <?= SITE_NAME ?> — Admin Panel (not public)</p>
      </div>
    </div>
  </footer>
</body>
</html>
