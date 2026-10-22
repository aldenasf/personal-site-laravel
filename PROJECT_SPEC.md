# Project Specification: Astro to Laravel Portfolio Migration with Dynamic Post CRUD

This specification outlines the technical architecture, data structures, features, and implementation roadmap for migrating the developer portfolio website from an Astro static site (`repomix-output-aldenasf-personal-site.xml`) to this Laravel 13 web application with an administrative CRUD system for project posts.

---

## 1. System Vision & Objective

### 1.1 For Humans (Developers & Maintainers)
- **Primary Goal:** Replicate the exact design, UX, responsive layouts, color themes, and markdown rendering of the original Astro portfolio (`aldenasf.vercel.app`), while upgrading static content collections into a **database-driven Laravel application with a complete CRUD management system**.
- **Admin Experience:** Eliminate manual `.md`/`.mdx` file authoring and git commits for new projects. Provide an authenticated dashboard to write, edit, pin, hide, publish, and delete posts with image upload support and markdown rendering.
- **Frontend Fidelity:** Preserve dark theme styling, Tailwind CSS utility classes, custom cards (PostCard, ProjectCard, SkillCard, SocialCard), and typography.

### 1.2 For AI Agents (Architectural Constraints & Guidelines)
- **Framework:** Laravel 13 on PHP 8.3 (`declare(strict_types=1);`, explicit return types, constructor promotion).
- **Frontend:** Tailwind CSS v4 via `@tailwindcss/vite`, Blade components, Blade UI Kit icons (`mdi:`, `simpleicon:`).
- **Markdown Processing:** `spatie/laravel-markdown` configured with `shiki` syntax highlighting.
- **Database Engine:** SQLite (development/local) or MySQL/PostgreSQL (production).
- **Code Standards:** Follow Pest PHP testing conventions and run Laravel Pint (`vendor/bin/pint --dirty --format agent`) on all PHP modifications.

---

## 2. Astro vs. Laravel Architecture Comparison

| Domain | Original Astro Site | Target Laravel Implementation |
| :--- | :--- | :--- |
| **Routing** | File-based routing (`pages/index.astro`, `pages/projects/[...slug].astro`, `pages/about.md`) | Explicit routes in `routes/web.php` with Route Model Binding |
| **Content Source** | Static Markdown/MDX (`src/content/posts/**/*.{md,mdx}`) | Eloquent ORM (`Post` model) backed by database table |
| **Post Management** | Git commits of local markdown files | Authenticated Admin CRUD (Resource Controller, Form Requests, Blade Views) |
| **Rendering** | Astro Components (`.astro`) | Blade Components (`<x-layout>`, `<x-post-card>`, `<x-post-layout>`, etc.) |
| **Styling** | Tailwind CSS + `colors.json` | Tailwind CSS v4 (`resources/css/app.css` + `resources/json/colors.json`) |
| **Markdown / Code** | Shiki + rehype plugins in Astro pipeline | `spatie/laravel-markdown` + `shiki` |

---

## 3. Database Schema & Models

### 3.1 Migration: `posts` Table
The original Astro content schema (`src/content.config.ts`) includes:
- `title` (string)
- `description` (string)
- `date` (datetime)
- `updated` (datetime, optional)
- `image` (string/asset URL)
- `color` (string, optional hex/tailwind color)
- `pinned` (boolean, default: false)
- `hidden` (boolean, default: false)
- `slug` (string, unique URL identifier)
- Content body (markdown)

**Target Laravel Schema (`database/migrations/..._create_posts_table.php`):**
```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('slug')->unique();
    $table->string('title');
    $table->text('description');
    $table->longText('content');
    $table->string('image')->nullable();
    $table->string('color')->nullable();
    $table->boolean('pinned')->default(false);
    $table->boolean('hidden')->default(false);
    $table->timestamp('published_at')->nullable();
    $table->timestamps();
});
```

### 3.2 Eloquent Model: `App\Models\Post`
- **Fillable Attributes:** `['title', 'slug', 'description', 'content', 'image', 'color', 'pinned', 'hidden', 'published_at']`
- **Casts:**
  - `pinned` => `boolean`
  - `hidden` => `boolean`
  - `published_at` => `datetime`
- **Route Key:** Uses `slug` for route-model binding:
  ```php
  public function getRouteKeyName(): string
  {
      return 'slug';
  }
  ```
- **Scopes:**
  - `scopePublic($query)`: Filters where `hidden = false`.
  - `scopePinnedFirst($query)`: Orders by `pinned` desc, then `published_at` / `created_at` desc.

---

## 4. Application Feature Requirements

### 4.1 Public Web Experience (1:1 Astro Parity)

1. **Home Page (`GET /`)**:
   - Bio introduction header ("hi, i'm alden!").
   - About section preview with skill groupings (Languages, Frameworks, Tools/Services) driven by `colors.json`.
   - Featured projects section.
   - Social link cards (GitHub, Discord, Spotify, Steam, Email).

2. **About Page (`GET /about`)**:
   - Extended bio and story migrated from Astro's `src/pages/about.md` (Game Modding, Music, Gaming, Tech Journey).

3. **Projects Showcase (`GET /projects`)**:
   - Highlights the pinned post (or latest published post if none is pinned).
   - Responsive multi-column grid of all public project posts (`hidden = false`).
   - Cards display cover image, title, summary description, and date formatting.

4. **Project Detail View (`GET /projects/{post:slug}`)**:
   - Post header featuring back button, publication date, update date, tags, and cover image banner.
   - Prose/Markdown container parsed dynamically via `<x-markdown>` with code syntax highlighting.

---

### 4.2 Administrative CRUD System

Protected under authentication middleware (`auth`):

1. **Post Index (`GET /admin/posts`)**:
   - Table view showing all posts (including drafts/hidden posts).
   - Status indicators: `Pinned`, `Hidden`, `Published Date`.
   - Action controls: Edit, Delete, Toggle Pin/Hidden.

2. **Create Post (`GET /admin/posts/create` & `POST /admin/posts`)**:
   - Form fields: Title, custom or auto-generated Slug, Description, Cover Image upload/URL, Accent Color, Markdown Content editor, Pinned and Hidden toggles, Published Date.
   - Handled by `StorePostRequest` with validation rules:
     - `title`: `required|string|max:255`
     - `slug`: `nullable|string|max:255|unique:posts,slug` (auto-slugged if empty)
     - `description`: `required|string|max:1000`
     - `content`: `required|string`
     - `image`: `nullable|image|max:4096` (or URL string)
     - `pinned`: `boolean`
     - `hidden`: `boolean`
     - `published_at`: `nullable|date`

3. **Edit Post (`GET /admin/posts/{post}/edit` & `PUT/PATCH /admin/posts/{post}`)**:
   - Populated form allowing content updates, replacing cover images, or altering status flags.
   - Validated via `UpdatePostRequest`.

4. **Delete Post (`DELETE /admin/posts/{post}`)**:
   - Deletes post record and purges any associated uploaded assets from `storage/app/public/posts`.

---

## 5. Implementation Roadmap

### Phase 1: Database & Model Refinement
- Update migration `posts` table with `slug`, `hidden`, `color`, and `published_at`.
- Run migrations: `php artisan migrate`.
- Update `App\Models\Post` with fillable attributes, casts, auto-slug logic via `booted()` or `Str::slug`, and scopes.
- Create seeder (`PostSeeder`) populating initial posts from the Astro markdown archive (`guide`, `stb-nas`).

### Phase 2: Public Interface Parity
- Implement `PostController::show(Post $post)` to render dynamic markdown via `projects.post`.
- Update `resources/views/about.blade.php` to match `src/pages/about.md`.
- Match Blade components (`<x-post-card>`, `<x-project-card>`, `<x-skill-card>`) exactly to Astro's HTML and Tailwind classes.

### Phase 3: Admin Auth & CRUD Modules
- Configure authentication for admin access.
- Create `Admin\PostController` handling `index`, `create`, `store`, `edit`, `update`, `destroy`.
- Create Form Request classes: `StorePostRequest`, `UpdatePostRequest`.
- Build admin Blade templates (`resources/views/admin/posts/...`).
- Configure file upload disk (`public` storage link via `php artisan storage:link`).

### Phase 4: Testing & Verification
- Write Pest feature tests (`tests/Feature/PostTest.php` and `tests/Feature/AdminPostTest.php`).
  - Verify public listing only returns non-hidden posts.
  - Verify pinned post ranking logic.
  - Verify unauthorized users cannot access admin CRUD endpoints.
  - Verify CRUD operations (store, update, delete) function correctly.
- Run Pint code formatting (`vendor/bin/pint --format agent`).
