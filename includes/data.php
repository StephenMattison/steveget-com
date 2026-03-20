<?php
/**
 * SteveGet.com — Product & Category Data
 *
 * ALL product data lives here. Edit this file to add/remove products.
 * Drop your photos into assets/img/products/{product-slug}/ and
 * assets/img/categories/.
 *
 * Each product has:
 *   - slug, name, category, badge (Steve's #1 Pick / Best Value Pick / Best Budget Pick)
 *   - award (optional — real third-party awards only, e.g. "Amazon's Choice")
 *   - asin (Amazon), price, rating (1-5), review_count
 *   - image, steve_photo (your real photo), description, steve_notes
 *   - pros[], cons[], specs[]
 *   - video (optional — your YouTube review URL)
 *   - keywords (for meta)
 */

$categories = [
    'kitchen' => [
        'name'        => 'Kitchen',
        'slug'        => 'kitchen',
        'icon'        => '🍳',
        'description' => 'The best kitchen gadgets, cookware, and appliances of ' . SITE_YEAR . ', tested by Steve in his own kitchen.',
        'meta_title'  => 'Best Kitchen Products ' . SITE_YEAR . ' — Tested by Steve',
        'meta_desc'   => 'Steve\'s top-rated kitchen gear: knives, cookware, blenders, air fryers & more. Every product purchased, tested & photographed.',
        'image'       => ASSETS_URL . '/img/categories/kitchen.webp',
    ],
    'tech' => [
        'name'        => 'Tech & Electronics',
        'slug'        => 'tech',
        'icon'        => '💻',
        'description' => 'Top tech picks for ' . SITE_YEAR . ': laptops, headphones, chargers, and smart home devices Steve actually uses.',
        'meta_title'  => 'Best Tech & Electronics ' . SITE_YEAR . ' — Steve\'s Picks',
        'meta_desc'   => 'Hands-on tech reviews: headphones, laptops, chargers, smart home gear. Steve tests everything before recommending.',
        'image'       => ASSETS_URL . '/img/categories/tech.webp',
    ],
    'home' => [
        'name'        => 'Home & Living',
        'slug'        => 'home',
        'icon'        => '🏠',
        'description' => 'Upgrade your home with Steve\'s top picks for furniture, bedding, cleaning, and organization in ' . SITE_YEAR . '.',
        'meta_title'  => 'Best Home & Living Products ' . SITE_YEAR . ' — Steve\'s Favorites',
        'meta_desc'   => 'Steve\'s honest home product reviews: mattresses, vacuums, organizers, décor. All tested in his own home.',
        'image'       => ASSETS_URL . '/img/categories/home.webp',
    ],
    'outdoors' => [
        'name'        => 'Outdoors & Camping',
        'slug'        => 'outdoors',
        'icon'        => '⛺',
        'description' => 'Best outdoor and camping gear for ' . SITE_YEAR . '. Steve takes it all into the field.',
        'meta_title'  => 'Best Outdoor & Camping Gear ' . SITE_YEAR . ' — Field Tested by Steve',
        'meta_desc'   => 'Camping tents, hiking boots, coolers, flashlights — all field-tested by Steve. Honest reviews with real photos.',
        'image'       => ASSETS_URL . '/img/categories/outdoors.webp',
    ],
    'fitness' => [
        'name'        => 'Fitness & Health',
        'slug'        => 'fitness',
        'icon'        => '💪',
        'description' => 'Top fitness equipment, supplements, and activewear Steve relies on daily in ' . SITE_YEAR . '.',
        'meta_title'  => 'Best Fitness & Health Products ' . SITE_YEAR . ' — Steve\'s Daily Drivers',
        'meta_desc'   => 'Steve reviews fitness gear he uses every day: dumbbells, resistance bands, protein powders, running shoes & more.',
        'image'       => ASSETS_URL . '/img/categories/fitness.webp',
    ],
    'automotive' => [
        'name'        => 'Automotive & Garage',
        'slug'        => 'automotive',
        'icon'        => '🚗',
        'description' => 'Best car accessories, tools, and garage gear Steve keeps in his shop in ' . SITE_YEAR . '.',
        'meta_title'  => 'Best Automotive & Garage Products ' . SITE_YEAR . ' — Steve\'s Garage Picks',
        'meta_desc'   => 'Dash cams, floor jacks, detailing kits — Steve reviews the auto gear he actually owns and uses.',
        'image'       => ASSETS_URL . '/img/categories/automotive.webp',
    ],
    'pet' => [
        'name'        => 'Pets',
        'slug'        => 'pet',
        'icon'        => '🐾',
        'description' => 'Best pet products of ' . SITE_YEAR . ' for dogs, cats, and more — Steve\'s family tested.',
        'meta_title'  => 'Best Pet Products ' . SITE_YEAR . ' — Tested by Steve\'s Pets',
        'meta_desc'   => 'Dog beds, cat trees, feeders, toys — all tested on Steve\'s pets. Honest reviews with real photos.',
        'image'       => ASSETS_URL . '/img/categories/pet.webp',
    ],
    'office' => [
        'name'        => 'Office & Desk',
        'slug'        => 'office',
        'icon'        => '🖥️',
        'description' => 'Steve\'s top desk setup picks for ' . SITE_YEAR . ': monitors, chairs, keyboards, and more.',
        'meta_title'  => 'Best Office & Desk Products ' . SITE_YEAR . ' — Steve\'s WFH Setup',
        'meta_desc'   => 'Steve reviews the desk gear he works with daily: standing desks, ergonomic chairs, monitors, and accessories.',
        'image'       => ASSETS_URL . '/img/categories/office.webp',
    ],
];

/**
 * Products — grouped by category slug.
 *
 * INSTRUCTIONS:
 * 1. Replace ASIN placeholders (B0XXXXXXXXX) with real Amazon ASINs.
 * 2. Drop your product images into assets/img/products/{product-slug}/
 *    - main.webp        (hero image)
 *    - steve-using.webp  (your photo proof)
 *    - gallery-1.webp, gallery-2.webp … (optional)
 * 3. Fill in steve_notes with your personal take.
 */
$products = [

    // ═══════════════ KITCHEN ═══════════════
    [
        'slug'          => 'best-chef-knife-2026',
        'name'          => 'Victorinox Fibrox Pro 8" Chef\'s Knife',
        'category'      => 'kitchen',
        'badge'         => "Steve's #1 Pick",
        'award'         => '',
        'asin'          => 'B008M5U1C2',
        'price'         => '34.95',
        'rating'        => 4.8,
        'review_count'  => 312,
        'image'         => ASSETS_URL . '/img/products/best-chef-knife-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-chef-knife-2026/steve-using.webp',
        'description'   => 'After testing 15 chef\'s knives over 3 months of daily cooking, the Victorinox Fibrox Pro remains unbeatable at its price. Razor-sharp out of the box, comfortable grip, dishwasher-safe (though I hand-wash mine).',
        'steve_notes'   => 'I\'ve owned this knife for 4 years. It\'s the one I grab every single time. I\'ve sharpened it maybe twice. For under $35, nothing comes close.',
        'pros'          => ['Incredible value for money', 'Stays sharp for months', 'Comfortable non-slip grip', 'Lightweight — great for long prep sessions'],
        'cons'          => ['Blade is thinner than premium options', 'Handle isn\'t the most elegant', 'No full tang construction'],
        'specs'         => ['Blade: 8" stainless steel', 'Weight: 5.6 oz', 'Handle: Fibrox Pro (TPE)', 'Made in Switzerland'],
        'keywords'      => 'best chef knife 2026, victorinox fibrox pro review, best budget chef knife',
        'video'         => '',
    ],
    [
        'slug'          => 'best-air-fryer-2026',
        'name'          => 'Cosori Pro LE Air Fryer 5-Qt',
        'category'      => 'kitchen',
        'badge'         => 'Best Value Pick',
        'award'         => '',
        'asin'          => 'B0936FGLQS',
        'price'         => '69.99',
        'rating'        => 4.7,
        'review_count'  => 248,
        'image'         => ASSETS_URL . '/img/products/best-air-fryer-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-air-fryer-2026/steve-using.webp',
        'description'   => 'The Cosori Pro LE nails the sweet spot between size, performance, and price. 5-quart basket fits a full batch of wings, heats up in 2 minutes, and cleans up easily.',
        'steve_notes'   => 'I use this thing 4-5 times a week. Fries, chicken, veggies, even reheating pizza. It replaced my toaster oven.',
        'pros'          => ['Heats up fast — 2 minutes', 'Compact footprint', '9 preset cooking functions', 'Dishwasher-safe basket'],
        'cons'          => ['Basket could be slightly larger', 'No window to check food', 'App requires account signup'],
        'specs'         => ['Capacity: 5 Qt', 'Power: 1500W', 'Temp Range: 170–400°F', 'Dimensions: 11.8 x 9.3 x 12.6"'],
        'keywords'      => 'best air fryer 2026, cosori pro le review, best value air fryer',
        'video'         => '',
    ],
    [
        'slug'          => 'best-budget-blender-2026',
        'name'          => 'Ninja Professional Blender BL610',
        'category'      => 'kitchen',
        'badge'         => 'Best Budget Pick',
        'award'         => '',
        'asin'          => 'B00939I7EK',
        'price'         => '59.99',
        'rating'        => 4.6,
        'review_count'  => 189,
        'image'         => ASSETS_URL . '/img/products/best-budget-blender-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-budget-blender-2026/steve-using.webp',
        'description'   => 'The Ninja BL610 crushes ice, blends smoothies, and purees soups for under $60. It\'s loud, but it gets the job done every single time.',
        'steve_notes'   => 'My morning smoothie machine for 2 years straight. Still works perfectly. I\'ve tried blenders 3x the price — this one holds its own.',
        'pros'          => ['Powerful 1000W motor', 'Crushes ice effortlessly', '72-oz pitcher — great for families', 'Simple 3-speed + pulse controls'],
        'cons'          => ['Very loud at top speed', 'Plastic pitcher (not glass)', 'Hand-wash only for blades'],
        'specs'         => ['Motor: 1000W', 'Capacity: 72 oz', 'Speeds: 3 + Pulse', 'BPA-free Tritan pitcher'],
        'keywords'      => 'best budget blender 2026, ninja bl610 review, best cheap blender',
        'video'         => '',
    ],

    // ═══════════════ TECH ═══════════════
    [
        'slug'          => 'best-wireless-earbuds-2026',
        'name'          => 'Sony WF-1000XM5 Wireless Earbuds',
        'category'      => 'tech',
        'badge'         => "Steve's #1 Pick",
        'award'         => '',
        'asin'          => 'B0C33XXS56',
        'price'         => '279.99',
        'rating'        => 4.9,
        'review_count'  => 421,
        'image'         => ASSETS_URL . '/img/products/best-wireless-earbuds-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-wireless-earbuds-2026/steve-using.webp',
        'description'   => 'The Sony XM5 earbuds deliver the best noise cancellation and sound quality in any true wireless earbud. Period. LDAC codec support, 24-hour total battery, and a case that fits in your pocket.',
        'steve_notes'   => 'These are on my ears 6+ hours a day. Calls, music, podcasts. The noise cancellation on planes is a game-changer. Worth every penny.',
        'pros'          => ['Industry-leading ANC', 'Exceptional sound quality', '24hr total battery life', 'Comfortable for all-day wear'],
        'cons'          => ['Premium price tag', 'No multipoint for 3+ devices', 'Touch controls take practice'],
        'specs'         => ['Driver: 8.4mm', 'ANC: Adaptive', 'Battery: 8hr (buds) + 16hr (case)', 'Codec: LDAC, AAC, SBC'],
        'keywords'      => 'best wireless earbuds 2026, sony wf-1000xm5 review, best noise cancelling earbuds',
        'video'         => '',
    ],
    [
        'slug'          => 'best-usb-c-charger-2026',
        'name'          => 'Anker 737 GaNPrime 120W Charger',
        'category'      => 'tech',
        'badge'         => 'Best Value Pick',
        'award'         => '',
        'asin'          => 'B09W2PNLX7',
        'price'         => '75.99',
        'rating'        => 4.7,
        'review_count'  => 276,
        'image'         => ASSETS_URL . '/img/products/best-usb-c-charger-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-usb-c-charger-2026/steve-using.webp',
        'description'   => 'One charger for your laptop, phone, and tablet. The Anker 737 delivers 120W across 3 ports with GaN technology that keeps it cool and compact.',
        'steve_notes'   => 'This replaced 3 chargers on my desk. I travel with it everywhere. It charges my MacBook Pro to 50% in 30 minutes.',
        'pros'          => ['120W total — charges laptops', '3 ports (2x USB-C, 1x USB-A)', 'GaN tech — stays cool', 'Compact travel size'],
        'cons'          => ['Pricey for a charger', 'No included cables', 'Power splits when using multiple ports'],
        'specs'         => ['Output: 120W max', 'Ports: 2x USB-C + 1x USB-A', 'Tech: GaN Prime', 'Weight: 6.7 oz'],
        'keywords'      => 'best usb c charger 2026, anker 737 review, best multi-port charger',
        'video'         => '',
    ],
    [
        'slug'          => 'best-budget-tablet-2026',
        'name'          => 'Amazon Fire HD 10 (2025)',
        'category'      => 'tech',
        'badge'         => 'Best Budget Pick',
        'award'         => "Amazon's Choice",
        'asin'          => 'B0BHZT5S12',
        'price'         => '149.99',
        'rating'        => 4.4,
        'review_count'  => 198,
        'image'         => ASSETS_URL . '/img/products/best-budget-tablet-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-budget-tablet-2026/steve-using.webp',
        'description'   => 'For $150, the Fire HD 10 is unbeatable for media consumption, reading, and basic productivity. It won\'t replace an iPad, but it\'s not trying to.',
        'steve_notes'   => 'My couch tablet. Netflix, Kindle, and casual browsing. I bought one for every family member. At this price, why not?',
        'pros'          => ['Incredible price', '10.1" Full HD display', '13-hour battery life', 'Alexa built-in'],
        'cons'          => ['Amazon app store limitations', 'Camera is mediocre', 'Not for heavy gaming'],
        'specs'         => ['Display: 10.1" 1080p', 'Storage: 32/64GB + microSD', 'Battery: 13 hours', 'RAM: 3GB'],
        'keywords'      => 'best budget tablet 2026, fire hd 10 review, best cheap tablet',
        'video'         => '',
    ],

    // ═══════════════ HOME ═══════════════
    [
        'slug'          => 'best-robot-vacuum-2026',
        'name'          => 'roborock Q7 Max+ Robot Vacuum',
        'category'      => 'home',
        'badge'         => "Steve's #1 Pick",
        'award'         => '',
        'asin'          => 'B09NNKBCRS',
        'price'         => '439.99',
        'rating'        => 4.8,
        'review_count'  => 356,
        'image'         => ASSETS_URL . '/img/products/best-robot-vacuum-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-robot-vacuum-2026/steve-using.webp',
        'description'   => 'The roborock Q7 Max+ vacuums AND mops, empties its own dustbin, and maps your entire house with LiDAR. Set it and forget it.',
        'steve_notes'   => 'Runs every day while I\'m at work. I haven\'t touched a vacuum in months. The auto-empty dock is the killer feature — no maintenance.',
        'pros'          => ['Vacuums + mops in one pass', 'Auto-empty dock', 'LiDAR navigation — no bumping', 'App-controlled room zones'],
        'cons'          => ['Higher price point', 'Mop is basic (no scrubbing)', 'Dock is bulky'],
        'specs'         => ['Suction: 4200Pa', 'Battery: 180 min', 'Dustbin: 470ml + auto-empty', 'Mapping: LiDAR'],
        'keywords'      => 'best robot vacuum 2026, roborock q7 max review, best self-emptying vacuum',
        'video'         => '',
    ],
    [
        'slug'          => 'best-bed-sheets-2026',
        'name'          => 'Brooklinen Luxe Core Sheet Set',
        'category'      => 'home',
        'badge'         => 'Best Value Pick',
        'award'         => '',
        'asin'          => 'B07QG6LCRK',
        'price'         => '149.00',
        'rating'        => 4.7,
        'review_count'  => 203,
        'image'         => ASSETS_URL . '/img/products/best-bed-sheets-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-bed-sheets-2026/steve-using.webp',
        'description'   => 'Buttery soft 480-thread-count long-staple cotton. These Brooklinen sheets get softer with every wash and come in 30+ colors.',
        'steve_notes'   => 'I\'ve slept on these for 2 years. Bought 3 sets. They\'re the only sheets that don\'t pill after washing. Deep pockets fit my thick mattress.',
        'pros'          => ['Incredibly soft sateen weave', 'Gets softer over time', 'Deep pocket design', '30+ color options'],
        'cons'          => ['Sateen wrinkles easily', 'Not for hot sleepers (warm)', 'Pricier than big-box brands'],
        'specs'         => ['Material: 480TC Long-Staple Cotton', 'Weave: Sateen', 'Pocket Depth: 15"', 'Care: Machine washable'],
        'keywords'      => 'best bed sheets 2026, brooklinen luxe review, best cotton sheets',
        'video'         => '',
    ],

    // ═══════════════ OUTDOORS ═══════════════
    [
        'slug'          => 'best-camping-tent-2026',
        'name'          => 'REI Co-op Half Dome SL 2+',
        'category'      => 'outdoors',
        'badge'         => "Steve's #1 Pick",
        'award'         => '',
        'asin'          => 'B0BK1JBV1M',
        'price'         => '329.00',
        'rating'        => 4.8,
        'review_count'  => 187,
        'image'         => ASSETS_URL . '/img/products/best-camping-tent-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-camping-tent-2026/steve-using.webp',
        'description'   => 'The Half Dome SL 2+ is the perfect backpacking tent: roomy 2-person interior, easy color-coded setup, and bombproof weather protection.',
        'steve_notes'   => 'Took this through 3 rainstorms and a 40mph wind night. Bone dry inside. Sets up in 5 minutes solo. My go-to tent for every trip.',
        'pros'          => ['Freestanding — pitch anywhere', 'Two doors + two vestibules', 'Color-coded poles — fast setup', 'Handles serious weather'],
        'cons'          => ['Heavier than ultralight options (4lb 2oz)', 'Vestibules could be larger', 'Premium price'],
        'specs'         => ['Capacity: 2+ person', 'Weight: 4 lb 2 oz', 'Seasons: 3', 'Floor area: 33.8 sq ft'],
        'keywords'      => 'best camping tent 2026, rei half dome review, best 2 person tent',
        'video'         => '',
    ],
    [
        'slug'          => 'best-cooler-2026',
        'name'          => 'YETI Roadie 24 Hard Cooler',
        'category'      => 'outdoors',
        'badge'         => 'Best Value Pick',
        'award'         => '',
        'asin'          => 'B083GBBJFK',
        'price'         => '250.00',
        'rating'        => 4.7,
        'review_count'  => 234,
        'image'         => ASSETS_URL . '/img/products/best-cooler-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-cooler-2026/steve-using.webp',
        'description'   => 'The YETI Roadie 24 keeps ice for 3+ days, fits tall bottles upright, and is practically indestructible. The perfect day-trip and tailgate cooler.',
        'steve_notes'   => 'My 3-year-old Roadie still looks brand new despite being tossed around trucks, boats, and campgrounds. Ice lasts a full weekend.',
        'pros'          => ['3+ day ice retention', 'Fits tall wine bottles upright', 'Nearly indestructible', 'Easy one-hand carry'],
        'cons'          => ['Heavy for its size (12.8 lbs empty)', 'Expensive for a cooler', 'No wheels'],
        'specs'         => ['Capacity: 24 cans / 18L', 'Insulation: PermaFrost', 'Weight: 12.8 lbs', 'Dimensions: 16.5 x 13.5 x 17.5"'],
        'keywords'      => 'best cooler 2026, yeti roadie 24 review, best hard cooler',
        'video'         => '',
    ],

    // ═══════════════ FITNESS ═══════════════
    [
        'slug'          => 'best-running-shoes-2026',
        'name'          => 'Brooks Ghost 16',
        'category'      => 'fitness',
        'badge'         => "Steve's #1 Pick",
        'award'         => '',
        'asin'          => 'B0BVKFZ4HD',
        'price'         => '139.95',
        'rating'        => 4.8,
        'review_count'  => 398,
        'image'         => ASSETS_URL . '/img/products/best-running-shoes-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-running-shoes-2026/steve-using.webp',
        'description'   => 'The Brooks Ghost 16 is the ultimate daily trainer: soft DNA LOFT cushioning, smooth transitions, and a fit that works for almost every foot shape.',
        'steve_notes'   => '500+ miles on my pair and they still feel great. I run 3-4x per week. These replaced my Nike Pegasus and I\'m never going back.',
        'pros'          => ['Plush cushioning for daily miles', 'Smooth heel-to-toe transition', 'Wide toe box option available', 'Durable outsole — 500+ miles'],
        'cons'          => ['Not the lightest for racing', 'Neutral only (no stability version)', 'Break-in period of ~20 miles'],
        'specs'         => ['Drop: 12mm', 'Weight: 9.4 oz (M)', 'Cushion: DNA LOFT v2', 'Surface: Road'],
        'keywords'      => 'best running shoes 2026, brooks ghost 16 review, best daily running shoe',
        'video'         => '',
    ],
    [
        'slug'          => 'best-adjustable-dumbbells-2026',
        'name'          => 'Bowflex SelectTech 552 Dumbbells',
        'category'      => 'fitness',
        'badge'         => 'Best Value Pick',
        'award'         => '',
        'asin'          => 'B001ARYU58',
        'price'         => '349.00',
        'rating'        => 4.7,
        'review_count'  => 287,
        'image'         => ASSETS_URL . '/img/products/best-adjustable-dumbbells-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-adjustable-dumbbells-2026/steve-using.webp',
        'description'   => 'Replace 15 sets of dumbbells with one pair. The Bowflex 552s adjust from 5 to 52.5 lbs in seconds with a simple dial mechanism.',
        'steve_notes'   => 'These are the centerpiece of my home gym. From shoulder presses to heavy rows — one pair does it all. Saved me thousands vs. a full rack.',
        'pros'          => ['Replace 15 pairs of dumbbells', 'Quick dial adjustment', 'Compact — fit anywhere', '5-52.5 lb range'],
        'cons'          => ['Bulky at heavier weights', 'Plastic cradle feels cheap', 'Not for drops — handle with care'],
        'specs'         => ['Range: 5-52.5 lbs', 'Increments: 2.5 lb (to 25), 5 lb (to 52.5)', 'Length: 16.9"', 'Warranty: 2 years'],
        'keywords'      => 'best adjustable dumbbells 2026, bowflex 552 review, best home dumbbells',
        'video'         => '',
    ],

    // ═══════════════ AUTOMOTIVE ═══════════════
    [
        'slug'          => 'best-dash-cam-2026',
        'name'          => 'Viofo A129 Pro Duo Dash Cam',
        'category'      => 'automotive',
        'badge'         => "Steve's #1 Pick",
        'award'         => '',
        'asin'          => 'B07RXQJ8XB',
        'price'         => '199.99',
        'rating'        => 4.7,
        'review_count'  => 321,
        'image'         => ASSETS_URL . '/img/products/best-dash-cam-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-dash-cam-2026/steve-using.webp',
        'description'   => 'Front + rear 4K recording, GPS tracking, parking mode, and Wi-Fi app control. The Viofo A129 Pro Duo covers every angle.',
        'steve_notes'   => 'This has been running in my truck for 14 months straight. Already captured one fender-bender (the other guy\'s fault — footage proved it). Essential.',
        'pros'          => ['4K front + 1080p rear', 'GPS speed & location logging', 'Parking mode with motion detection', 'Compact & discreet'],
        'cons'          => ['Rear camera cable routing is tricky', 'App can be slow', 'Capacitor (no battery) — needs hardwire for parking'],
        'specs'         => ['Resolution: 4K front / 1080p rear', 'Storage: microSD up to 256GB', 'GPS: Built-in', 'Power: Capacitor'],
        'keywords'      => 'best dash cam 2026, viofo a129 pro duo review, best front rear dash cam',
        'video'         => '',
    ],

    // ═══════════════ PET ═══════════════
    [
        'slug'          => 'best-dog-bed-2026',
        'name'          => 'Casper Dog Bed (Large)',
        'category'      => 'pet',
        'badge'         => "Steve's #1 Pick",
        'award'         => '',
        'asin'          => 'B07P9CJ3ZS',
        'price'         => '139.00',
        'rating'        => 4.6,
        'review_count'  => 176,
        'image'         => ASSETS_URL . '/img/products/best-dog-bed-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-dog-bed-2026/steve-using.webp',
        'description'   => 'Memory foam support with bolstered edges. The Casper Dog Bed is essentially a premium mattress for your pup — and they know it.',
        'steve_notes'   => 'My golden retriever refuses to sleep anywhere else. The cover is machine washable, which is a lifesaver. Still holds its shape after a year.',
        'pros'          => ['Pressure-relieving memory foam', 'Machine-washable cover', 'Supportive bolstered edges', 'Durable ripstop bottom'],
        'cons'          => ['Expensive for a dog bed', 'Only 3 sizes available', 'Takes 24hr to fully expand'],
        'specs'         => ['Size: 35 x 25 x 7" (L)', 'Material: Memory foam + support foam', 'Cover: Removable, machine wash', 'Supports: Dogs up to 80 lbs'],
        'keywords'      => 'best dog bed 2026, casper dog bed review, best memory foam dog bed',
        'video'         => '',
    ],

    // ═══════════════ OFFICE ═══════════════
    [
        'slug'          => 'best-standing-desk-2026',
        'name'          => 'FlexiSpot E7 Standing Desk',
        'category'      => 'office',
        'badge'         => "Steve's #1 Pick",
        'award'         => '',
        'asin'          => 'B08GC31F9P',
        'price'         => '479.99',
        'rating'        => 4.8,
        'review_count'  => 305,
        'image'         => ASSETS_URL . '/img/products/best-standing-desk-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-standing-desk-2026/steve-using.webp',
        'description'   => 'The FlexiSpot E7 is whisper-quiet, holds 355 lbs, and transitions from sitting to standing in seconds. Anti-collision sensor included.',
        'steve_notes'   => 'This is my daily driver desk. Holds 3 monitors, a PC, and a full audio setup without wobble. The 4 memory presets mean I never fiddle with height.',
        'pros'          => ['355 lb weight capacity', 'Whisper-quiet dual motors', '4 programmable height presets', 'Anti-collision technology'],
        'cons'          => ['Heavy — 2-person assembly recommended', 'Desktop sold separately on some models', 'Cable management sold separately'],
        'specs'         => ['Height Range: 22.8-48.4"', 'Load Capacity: 355 lbs', 'Speed: 1.5"/sec', 'Frame: Dual motor steel'],
        'keywords'      => 'best standing desk 2026, flexispot e7 review, best electric standing desk',
        'video'         => '',
    ],
    [
        'slug'          => 'best-office-chair-2026',
        'name'          => 'Herman Miller Aeron (Remastered)',
        'category'      => 'office',
        'badge'         => 'Best Value Pick',
        'award'         => '',
        'asin'          => 'B01DGC1QM2',
        'price'         => '1,395.00',
        'rating'        => 4.9,
        'review_count'  => 412,
        'image'         => ASSETS_URL . '/img/products/best-office-chair-2026/main.webp',
        'steve_photo'   => ASSETS_URL . '/img/products/best-office-chair-2026/steve-using.webp',
        'description'   => 'The Aeron is the gold standard for ergonomic office chairs. PostureFit SL support, 8Z Pellicle mesh, and a 12-year warranty.',
        'steve_notes'   => 'I spend 10+ hours a day in this chair. Zero back pain since switching from a gaming chair. Yes it\'s expensive — but amortize it over 12 years and it\'s $0.32/day.',
        'pros'          => ['Legendary ergonomic support', 'Breathable mesh — no sweat', '12-year warranty', 'Fully adjustable everything'],
        'cons'          => ['Very expensive upfront', 'No headrest (unless aftermarket)', 'Hard seat edge isn\'t for everyone'],
        'specs'         => ['Sizes: A, B, C', 'Material: 8Z Pellicle mesh', 'Lumbar: PostureFit SL', 'Warranty: 12 years'],
        'keywords'      => 'best office chair 2026, herman miller aeron review, best ergonomic chair',
        'video'         => '',
    ],
];

/**
 * Helper: get products by category.
 */
function get_products_by_category(string $cat_slug): array {
    global $products;
    return array_filter($products, fn($p) => $p['category'] === $cat_slug);
}

/**
 * Helper: get a single product by slug.
 */
function get_product_by_slug(string $slug): ?array {
    global $products;
    foreach ($products as $p) {
        if ($p['slug'] === $slug) return $p;
    }
    return null;
}

/**
 * Helper: get category by slug.
 */
function get_category(string $slug): ?array {
    global $categories;
    return $categories[$slug] ?? null;
}

/**
 * Helper: get all category slugs.
 */
function get_category_slugs(): array {
    global $categories;
    return array_keys($categories);
}

/**
 * Helper: count products in a category.
 */
function count_products_in_category(string $cat_slug): int {
    return count(get_products_by_category($cat_slug));
}
