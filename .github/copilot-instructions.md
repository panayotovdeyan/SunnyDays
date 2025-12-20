This repository is a small PHP web application (SunnyDays) intended to run under XAMPP/Apache on Windows.

Summary
- Language: PHP (procedural with small OOP models in `classes/`).
- Runtime: typical LAMP stack on Windows (tested path: `C:\xampp\htdocs\sunnydays`).
- DB: MySQL/MariaDB accessed via `mysqli`. Connection config lives in `includes/db_SunnyDays.php`.

Quick start (for running locally)
- Put the project in your XAMPP `htdocs` (example path above) and start Apache + MySQL.
- Open in browser: `http://localhost/sunnydays/`.
- DB name expected: `SunnyDays` (see `includes/db_SunnyDays.php`).

Architecture & patterns to know
- Entry points are simple PHP scripts that include a view. Example: `index.php` -> `views/index-html.php`.
- Admin area uses `admin/index.php` and the mirrored view folder `admin/aviews/`.
- Business/data models are simple classes under `classes/` (e.g. `classes/user.php`) that use `$GLOBALS['SQL']` and `mysqli` for DB access.
- Helper functions and many small data-access helpers live in `includes/functions.php` (e.g. `getServices()`, `getOffer()`). These functions often:
  - require `includes/db_SunnyDays.php` when `$GLOBALS['SQL']` is not set
  - return arrays from `mysqli_fetch_all` or die on query error
- Database connection: `includes/db_SunnyDays.php` sets `$GLOBALS['SQL']` after calling `mysqli_connect`.

Paths and environment specifics
- The codebase contains absolute Windows paths in some files (examples: `admin/index.php`, `mailOffer.php`, `PHPMailer` includes). When editing, prefer project-relative includes or use the `PROJECT_ROOT` constant from `config.php`.
- Sensitive configuration (SMTP credentials) is read from `C:/xampp/config-sunnydays.php` in `mailOffer.php`. Do NOT hardcode credentials; treat that file as out-of-repo secret material.

I/O, localization & encoding
- UI strings and comments are in Bulgarian; preserve UTF-8 (`mailOffer.php` and other files set `UTF-8`).

Conventions and gotchas for code edits
- Database access: keep using `mysqli` and `$GLOBALS['SQL']` unless explicitly migrating the whole project. Many helpers assume this global connection.
- Views are not strict MVC: controller scripts include view files and sometimes echo HTML directly. When adding logic, keep controller/view separation consistent with existing files (small controllers + `views/` templates).
- Session usage: many scripts rely on `session_start()` and check `$_SESSION['user']['admin']` for admin routes. Preserve these checks.
- Mail: there are two approaches present — lightweight `mail()` wrappers in `includes/functions.php` and PHPMailer usage in `mailOffer.php`. Prefer PHPMailer for SMTP reliability; keep credential references out of repository.
- Error handling: existing pattern is terse (`die('Query error')`). If you improve error handling, do so locally and keep changes small and consistent.

Files to inspect for context (examples)
- `includes/db_SunnyDays.php` — DB host/user/password and sets `$GLOBALS['SQL']`.
- `includes/functions.php` — many helpers for fetching `services`, `projects`, `offer`, `team`, CSRF token generator.
- `classes/user.php` — example of model class that reads/writes `users` table via `mysqli`.
- `views/*.php` and `admin/aviews/*` — page templates; controller scripts include these.
- `mailOffer.php` — shows PHPMailer integration and reads `C:/xampp/config-sunnydays.php` for SMTP secrets.

Security & maintenance notes for AI edits
- NEVER add or leak real credentials into the repo. If you must demonstrate code that uses secrets, read them from environment variables or require an external config file (note existing pattern uses `C:/xampp/config-sunnydays.php`).
- Many SQL queries are built by string concatenation. If you change queries, keep escaping with `mysqli_real_escape_string` and follow existing patterns unless you refactor for prepared statements project-wide.

When you change files
- Keep changes minimal and consistent with surrounding code style.
- Prefer relative paths and `PROJECT_ROOT` from `config.php` to avoid breaking Windows-specific absolute paths.
- Run the app locally under XAMPP to verify behavior: start Apache + MySQL, visit `http://localhost/sunnydays/`, exercise admin pages by logging in.

If you need more info
- I inspected `config.php`, `includes/`, `classes/`, `views/`, `admin/` and `mailOffer.php` when creating these instructions. Point me to any additional files you want included and I'll update this guide.

Thanks — ask for clarifications or additional examples to refine these instructions.
