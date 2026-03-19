# SteveGet.com — Image Placement Guide

## How to Add Your Images

### 📸 Steve Profile Photo
Place your profile photo here:
```
assets/img/steve/steve-profile.webp    (48x48+ square, your face)
```

### 🏷️ Category Images
Place category hero images (landscape, ~800x600px WebP):
```
assets/img/categories/kitchen.webp
assets/img/categories/tech.webp
assets/img/categories/home.webp
assets/img/categories/outdoors.webp
assets/img/categories/fitness.webp
assets/img/categories/automotive.webp
assets/img/categories/pet.webp
assets/img/categories/office.webp
```

### 📦 Product Images
Each product needs 2 images minimum in its folder:
```
assets/img/products/{product-slug}/main.webp          (product photo, ~600x450px)
assets/img/products/{product-slug}/steve-using.webp    (YOU using the product)
assets/img/products/{product-slug}/gallery-1.webp      (optional extra photos)
assets/img/products/{product-slug}/gallery-2.webp      (optional)
```

### Product Slugs (folder names):
- best-chef-knife-2026
- best-air-fryer-2026
- best-budget-blender-2026
- best-wireless-earbuds-2026
- best-usb-c-charger-2026
- best-budget-tablet-2026
- best-robot-vacuum-2026
- best-bed-sheets-2026
- best-camping-tent-2026
- best-cooler-2026
- best-running-shoes-2026
- best-adjustable-dumbbells-2026
- best-dash-cam-2026
- best-dog-bed-2026
- best-standing-desk-2026
- best-office-chair-2026

### Social Cards
```
assets/img/social-cards/steveget-facebook-card.jpg   (1200x630px)
assets/img/social-cards/steveget-twitter-card.jpg    (1200x628px)
assets/img/social-cards/steveget-google-card.jpg     (1200x630px)
```

### Image Tips
- **Use WebP format** for all product and category images (smaller file size, better quality)
- **Recommended sizes**: Products 600x450px, Categories 800x600px, Steve photo 200x200px+
- **Keep file sizes under 200KB** for fast page load
- **Take real photos** — no stock images. This is the SteveGet difference.

## How to Add Amazon Links
1. Open `includes/data.php`
2. Replace the ASIN placeholder (e.g., `B008M5U1C2`) with the real Amazon ASIN
3. Your Amazon Associates tag is set in `includes/config.php` → `AMAZON_TAG`

## How to Add New Products
1. Open `includes/data.php`
2. Copy any existing product array
3. Change the slug, name, category, ASIN, and all other fields
4. Create the image folder: `assets/img/products/{new-slug}/`
5. Add `main.webp` and `steve-using.webp` to that folder
6. Add the product URL to `sitemap.xml`
