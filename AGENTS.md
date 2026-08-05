# SteveGet — agent instructions

You are working in **one** website repo. Push only to this remote.

- **GitHub:** `StephenMattison/steveget-com` (`origin`)
- **Branch:** usually `main`
- **After every meaningful change:** commit and push here only

## Hosting (production)

- **Host:** Cloudflare Pages (static)
- **Pages project:** `steveget-com`
- **Live site:** https://www.steveget.com
- **Canonical:** `www` (`https://www.steveget.com`)
- **What ships:** static HTML at **repo root** + `category/` + `product/` + `assets/` + `_headers` + `_redirects` + sitemap/robots/`llms.txt`
- **Not executed in production:** PHP (`*.php`, `includes/`, `build.php`) — keep PHP twins consistent as future-host sources only. Never treat PHP as the live entrypoint on Pages (SITE-GUIDE §3.3.1).
- **`dist/`:** optional PHP build output from `build.php`. Prefer editing **root** static HTML (what production serves). If you rebuild `dist/`, do not regress root HTML.
- **Deploy path:** `git push origin main` → Pages auto-build (~1–3 min). Verify live domain after push.
- **Wrangler CLI:** optional for this static site; not needed for routine publish. Global auth: `~/.grok/rules/deploy-and-auth.md`.
- **Cloudflare agent tooling:** skills under `~/.grok/skills/` (`cloudflare`, `wrangler`, `workers-best-practices`, `agents-sdk`, etc.). Official setup: https://developers.cloudflare.com/agent-setup/prompt.md.
- **Supabase:** not used on this site.

## Site type

Affiliate product-review / recommendation site (Wirecutter-style). Amazon Associates tag: `steveget-20` (see `includes/config.php`). Product pages are static reviews with buy links — not a cart/checkout storefront.

## Binding standards

1. Follow **`SITE-GUIDE.md`** in this repo root (copy of canonical `StephenMattison/site-guide`).
2. Always-on digest of non-negotiables is in the user’s Grok rules (`site-guide-core`); **open this repo’s `SITE-GUIDE.md`** for full detail when the task touches a11y, SEO, security, reviews, performance, cache-busting, or new UI.
3. **Never edit** `SITE-GUIDE.md` here. Edit canonical site-guide, then run `./sync-guide.sh`.
4. SITE-GUIDE states Cloudflare Pages as the primary static hosting model; this file names **this** site’s live host so agents do not re-ask.
5. Social previews: every indexable page needs Open Graph + Twitter meta pointing at the **standard brand social cards** under `assets/img/social-cards/`, with `?v=` cache-bust on image URLs.
6. Root **`llms.txt`** is mandatory. Update it with `sitemap.xml` when primary pages change (SITE-GUIDE §5.3.3.2a).
7. Google Review system (SITE-GUIDE §0): floating CTA + dialog + homepage band. Config: `assets/js/site-config.js`. Replace `googleReviewUrl` with the official GBP write-a-review link when available; regenerate the QR and bump `?v=`.

## Layout

| Path | Role |
|------|------|
| `index.html`, `about.html`, `contact.html`, `how-we-test.html`, `disclosure.html`, `privacy.html`, `terms.html`, `404.html` | **Live** static core pages |
| `category/*.html` | **Live** category hubs |
| `product/*.html` | **Live** product review pages |
| `index.php`, `about.php`, `product.php`, `category.php`, … | PHP sources for possible future PHP host / `build.php` — not live on Pages |
| `includes/` | Shared PHP config/header/footer/data (`config.php`, `data.php`, …) |
| `assets/css/styles.css` | Thin entry that imports `steveget.css` |
| `assets/css/steveget.css` | Main design system |
| `assets/js/site-config.js` | Site constants + Google review URL / QR path |
| `assets/js/steveget.js` | Mobile nav, sticky buy bar, review dialog, lazy-load helpers |
| `assets/img/social-cards/` | Brand OG/Twitter/Google cards |
| `assets/img/review/` | Google review QR only |
| `assets/img/products/<slug>/main.webp` | Catalog product image for cards + review heroes |
| `assets/img/products/<slug>/steve-using.webp` | Secondary/lifestyle proof image + badge crop source |
| `assets/img/categories/*.webp` | Category cover images |
| `assets/img/steve/steve-profile.webp` | Shared reviewer avatar when needed |
| `_headers`, `_redirects` | Cloudflare Pages edge headers / redirects |
| `robots.txt`, `sitemap.xml`, `llms.txt` | Crawl + AI discovery |
| `SITE-GUIDE.md` | Full standards (read on demand) |
| `sync-guide.sh` | Refresh `SITE-GUIDE.md` from local `../site-guide/` |
| `scripts/` | Compliance, Lighthouse, `priceValidUntil` refresh |
| `products.csv` | Product data source for PHP pipeline |

When both PHP and static HTML exist for a page, keep behavior and content consistent. **HTML is production.**

## Config / contacts

- Email: `steve@steveget.com`
- Twitter: `@steveget`
- Google review URL + QR: `assets/js/site-config.js` (+ `includes/config.php` for PHP)
- Asset version string: `site-config.js` → `assetVersion` (bump when CSS/JS/review assets change; keep HTML `?v=` in sync)

## URL notes

- Live host often serves clean paths (`/about`, `/category/kitchen`, `/product/best-air-fryer-2026`) with `.html` redirecting via 308.
- Internal links in HTML currently use `.html` suffixes; both work. Sitemap and `llms.txt` prefer **clean canonical-style URLs** without `.html` where the live site redirects that way.
- Sitemap must list **static public pages**, not dead `*.php?…` query URLs.

## Commands

- Compliance: `python3 scripts/check-site-guide-compliance.py`
- Fresh product schema dates (when needed): `python3 scripts/refresh-price-valid-until.py`
- Deploy: `git push origin main` → wait ~1–3 min → verify **https://www.steveget.com**
- Production = **root static HTML** (not PHP / not `dist/`)

## Boundaries

- This remote only; never force-push or amend published history
- Never edit `SITE-GUIDE.md` here (canonical site-guide → `./sync-guide.sh`)
- Never commit secrets, API keys, or `.env`
- Keep affiliate disclosure honest; no review-gating or incentivized Google reviews
- Do not invent ratings or product claims without source

## Security

- No payment secrets on this site; Amazon tag lives in config (`steveget-20`) — do not invent other tags
- Never commit credentials; treat contact form input as untrusted if server-side is added

## Workflow reminders

- Commit and push after website/code changes (this remote only).
- Match SITE-GUIDE for a11y, SEO, security, reviews, performance, and cache-busting.
- Bust CSS/JS/image/favicon `?v=` when those assets change.
- Surgical edits; match existing class names and structure. Prefer existing patterns over redesigns unless asked.
- Product schema: keep `priceValidUntil` fresh (monthly workflow / `scripts/refresh-price-valid-until.py`).
- Affiliate disclosure must remain honest and prominent; no review-gating or incentivized Google reviews.
- Finish = implemented + SITE-GUIDE-aligned for touched areas + committed + pushed

## New chat sessions

User often hits **+** only to reset context. They will **not** paste a long handoff.
On short prompts (“continue”, “next: …”), use git status/log + files; apply rules above. Do not ask them to restate SITE-GUIDE / commit-push / caveman.
