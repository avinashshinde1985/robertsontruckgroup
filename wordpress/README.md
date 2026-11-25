# Robertson WordPress Multisite

The static `ote/` and `rts/` sites converted to one WordPress Multisite (subdirectory network):

| Site | Name | Local URL | Theme |
|---|---|---|---|
| 1 (main) | Ote — Ohio Truck Equipment | http://localhost/robertsontruckgroup/wordpress/ | `ote` (child of `rts`) |
| 2 | Rts — Robertson Truck Sales | http://localhost/robertsontruckgroup/wordpress/rts/ | `rts` |

## Install (local XAMPP)

1. Start **Apache** and **MySQL** in the XAMPP control panel.
2. From Git Bash, in the repo root:

   ```bash
   bash wordpress/setup/install.sh
   ```

   It downloads WP-CLI and WordPress core, creates the `robertsontruckgroup` database, installs the
   network (Ote as site 1), creates the Rts site, activates the themes, then runs
   `setup/setup-content.php` to create pages, menus, the 18 blog posts and reading settings.
   The admin login is printed at the end. Re-running is safe.

   Override defaults with env vars, e.g. `ADMIN_EMAIL=you@company.com DB_PASS=secret bash wordpress/setup/install.sh`
   (also `WP_URL`, `WP_BASE`, `DB_NAME`, `DB_USER`, `DB_HOST`, `ADMIN_USER`, `ADMIN_PASS`, `PHP`).

## How the conversion is organised

- **`themes/rts`** is the parent theme. It holds every shared asset (`assets/css|js|images`), the header/footer
  parts and the plumbing. **`themes/ote`** is a child theme that swaps branding and menus and adds its own pages.
- Each static page is a **page template** in `page-templates/` (assigned to a WordPress page by the installer).
  The top of each template calls `rtg_page()` with the page's original `<title>`, meta description, body class
  and its CSS/JS in their original order; `inc/assets.php` enqueues them.
- Links use `rtg_url( 'rts'|'ote', 'slug' )` and files use `rtg_a( 'path' )` / `rtg_a( 'rts:path' )`, so links
  between the two sites keep working on any domain. The shared JS reads `window.RTG_PATHS` (printed in `<head>`).
- Navigation and footer links come from **Appearance → Menus** (Main / Footer locations on each site).
  Add the CSS class `nav__inv` to the item that should get the inventory highlight.
- The **blog** is real WordPress posts: `home.php` (Posts page "Blog") and `single.php`. The posts page lists all
  posts; `blog.js` handles topic chips, search and "Load more" in the browser. Headings in post content get
  ids/anchors automatically for the table of contents.
- Pages created later in the editor use `page.php` (v2 header/footer around the editor content).

## Editing page content (Advanced Custom Fields)

Every converted page, and the Blog page, is edited through ACF fields (the free plugin is enough; the installer
installs and network-activates it). Open **Pages → Edit** and the content is grouped in tabs, one per page
section: headings, text, buttons and links, images, stats, cards, team, locations, photos, etc. A page's
**SEO** tab overrides its browser title and meta description.

- Fields are prefilled with the design's content. Until a page is saved, the page shows exactly the original design.
- **Lists** (cards, stats, photos…) are numbered groups ("Stat 1", "Stat 2"…). Clear an item's first field to
  hide it; the groups marked *(optional)* are spare slots for adding items.
- **Images**: leave empty to keep the design image; choose one from the Media Library to replace it.
- **Links** accept a full URL, `#anchor`, `tel:`/`mailto:`, or a page as `rts:slug` / `ote:slug`
  (e.g. `rts:inventory`, `ote:quote`, `rts:contact#form`, `rts:` for the Rts home page). These keep working
  when the site moves to another domain.
- Text fields accept inline HTML such as `<span class="hl">…</span>` (the highlighted word style) and `<br>`.

For developers: field definitions are code, in `fields/<template>.php` of each theme (the Ote child theme's
`fields/` overrides the parent's on the Ote site), registered by `rts/inc/fields.php`; that file's header
documents the format. Templates read values with `rtg_e()`, `rtg_f()` and `rtg_items()`. Nothing is stored in
the ACF admin's field-group screens, so field changes go through git like the rest of the theme.

Not editable through fields (by design): header/navigation and footer (use **Appearance → Menus**), form
controls, the JS-driven inventory/chat mock data, and labels that the page scripts depend on (gallery and
capabilities filter categories, quote/trade wizard step names).

| Static file | WordPress |
|---|---|
| `ote/index.html` | Ote front page (`ote/page-templates/home.php`) |
| `ote/inventory.html`, `quote.html`, `tutorials.html` | Ote pages `/inventory/`, `/quote/`, `/tutorials/` |
| `rts/index.html` | Rts front page (`rts/page-templates/home.php`) |
| `rts/about, capabilities, contact, gallery, inventory, quote, rtg, trade, wheelbase-sheet .html` | Rts pages with the same slug |
| `rts/blog.html` / `rts/blog-detail.html` | Rts posts page `/blog/` (`home.php`) / each post (`single.php`) |
| `rts/index-classic.html` | Rts page `/home-classic/` (noindex, kept for reference) |
| `rts/index-v2.html` | not needed (it only redirected to the home page) |

## Still to do

- 17 of the 18 posts hold only their excerpt: the design included one full article. Each post stores its live
  URL in the `_rtg_source_url` custom field for migrating the full text.
- Inventory, body inventory, quote/trade forms and chat still use the mock-up's sample data and front-end-only
  forms, exactly as in the static design. Hook them to the live feeds / a form plugin when ready.
- `href="#"` placeholders from the design (Privacy Policy, Finance Application, etc.) are unchanged.
