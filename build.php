<?php
/**
 * SteveGet.com — Static Site Builder
 *
 * Renders all PHP pages to static HTML files in the /dist/ directory.
 * Run: php build.php
 * Then push /dist/ contents to GitHub for Cloudflare Pages.
 */

$srcDir  = __DIR__;
$distDir = __DIR__ . '/dist';

// Clean and create dist directory
if (is_dir($distDir)) {
    shell_exec("rm -rf " . escapeshellarg($distDir));
}
mkdir($distDir, 0755, true);

echo "Building static site...\n";

// ─── Helper: render a PHP page using a subprocess ────────────────
function render_page(string $phpFile, array $getParams = []): string {
    $srcDir = dirname($phpFile);
    $get = var_export($getParams, true);
    $configFile = $srcDir . '/includes/config.php';
    $dataFile   = $srcDir . '/includes/data.php';
    $wrapper = <<<PHP
<?php
\$_GET = $get;
\$_SERVER['HTTPS'] = 'on';
\$_SERVER['HTTP_HOST'] = 'www.steveget.com';
\$_SERVER['REQUEST_URI'] = '/';
\$_SERVER['SERVER_NAME'] = 'www.steveget.com';
require_once '$configFile';
require_once '$dataFile';
include '$phpFile';
PHP;
    $tmpFile = sys_get_temp_dir() . '/steveget_render_' . uniqid() . '.php';
    file_put_contents($tmpFile, $wrapper);
    $html = shell_exec('php ' . escapeshellarg($tmpFile) . ' 2>&1') ?? '';
    unlink($tmpFile);
    return $html;
}

// ─── Load data to know what categories/products exist ────────────
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';

// ─── 1. Static pages (no query params) ──────────────────────────
$staticPages = [
    'index.php'       => 'index.html',
    'about.php'       => 'about.html',
    'contact.php'     => 'contact.html',
    'disclosure.php'  => 'disclosure.html',
    'privacy.php'     => 'privacy.html',
    'terms.php'       => 'terms.html',
    'how-we-test.php' => 'how-we-test.html',
    '404.php'         => '404.html',
];

foreach ($staticPages as $phpFile => $htmlFile) {
    $srcFile = $srcDir . '/' . $phpFile;
    if (!file_exists($srcFile)) {
        echo "  SKIP: $phpFile (not found)\n";
        continue;
    }
    $html = render_page($srcFile);
    file_put_contents($distDir . '/' . $htmlFile, $html);
    echo "  OK: $htmlFile\n";
}

// ─── 2. Category pages ──────────────────────────────────────────
mkdir($distDir . '/category', 0755, true);
foreach ($categories as $slug => $cat) {
    $html = render_page($srcDir . '/category.php', ['cat' => $slug]);
    file_put_contents($distDir . '/category/' . $slug . '.html', $html);
    echo "  OK: category/$slug.html\n";
}

// ─── 3. Product pages ────────────────────────────────────────────
mkdir($distDir . '/product', 0755, true);
foreach ($products as $p) {
    $html = render_page($srcDir . '/product.php', ['slug' => $p['slug']]);
    file_put_contents($distDir . '/product/' . $p['slug'] . '.html', $html);
    echo "  OK: product/{$p['slug']}.html\n";
}

// ─── 4. Copy static assets ──────────────────────────────────────
echo "\nCopying assets...\n";

if (is_dir($srcDir . '/assets')) {
    shell_exec("cp -r " . escapeshellarg($srcDir . '/assets') . " " . escapeshellarg($distDir . '/assets'));
    echo "  OK: assets/\n";
}

$staticFiles = ['favicon.ico', 'robots.txt', 'sitemap.xml', 'sitemap.xml.gz'];
foreach ($staticFiles as $f) {
    if (file_exists($srcDir . '/' . $f)) {
        copy($srcDir . '/' . $f, $distDir . '/' . $f);
        echo "  OK: $f\n";
    }
}

if (is_dir($srcDir . '/sitemap')) {
    shell_exec("cp -r " . escapeshellarg($srcDir . '/sitemap') . " " . escapeshellarg($distDir . '/sitemap'));
    echo "  OK: sitemap/\n";
}

echo "\nBuild complete! Output in: dist/\n";
$htmlCount = count(glob($distDir . '/*.html') ?: [])
           + count(glob($distDir . '/category/*.html') ?: [])
           + count(glob($distDir . '/product/*.html') ?: []);
echo "Total HTML files: $htmlCount\n";
