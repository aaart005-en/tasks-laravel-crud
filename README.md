# Tasks for Today Management System (Laravel)

IT0049 TSA4: full CRUD, authentication (Laravel Breeze) and email notifications.

## Features

- Public pages: Welcome (today's tasks only), Task List, Profile, About
- Login required to create, edit and archive tasks
- Create and edit forms with validation
- Soft delete using the `is_archived` column (archived tasks are hidden, not removed)
- "Task completed" email sent only when a task's status changes to done (never resent for a task that is already done)

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite (default for local setup)

## Setup

1. Install PHP packages:
   ```
   composer install
   ```
2. Copy the environment file and generate the app key:
   ```
   copy .env.example .env
   php artisan key:generate
   ```
3. Create the SQLite database file `database/database.sqlite` (an empty file).
4. In `.env`, make sure these are set:
   ```
   DB_CONNECTION=sqlite
   APP_TIMEZONE=Asia/Manila
   ```
5. Create the tables and sample data:
   ```
   php artisan migrate:fresh --seed
   ```
6. Install and build the front-end assets:
   ```
   npm install
   npm run build
   ```
7. Start the server:
   ```
   php artisan serve
   ```
8. Open http://127.0.0.1:8000

## Login

- Email: `art@gmail.com`
- Password: `password`

There is only one user. Registration is disabled.

## Mail configuration

The app uses the `log` mail driver, so no real emails are sent. In `.env`:

```
MAIL_MAILER=log
```

To test the notification:

1. Log in and open the Task List.
2. Edit a task with status Pending and change its status to Done.
3. Open `storage/logs/laravel.log`. The email (subject "Task completed: ...") is written at the bottom.
4. Edit the same task again while it is already Done. No new email is written.

To use a real test SMTP service (for example Mailtrap), set `MAIL_MAILER=smtp` and fill in `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME` and `MAIL_PASSWORD` in `.env`.

## Routes

| URL | Access | Description |
| --- | --- | --- |
| `/` | Public | Welcome, today's tasks only |
| `/tasks` | Public | All active tasks ordered by date |
| `/profile` | Public | Profile of the single user |
| `/about` | Public | About the developer |
| `/login` | Guests | Login form |
| `/tasks/create` | Login | New task form |
| `/tasks/{id}/edit` | Login | Edit task form |

## Database

- `tasks`: id, title, status (default `pending`), task_date, is_archived (default false), timestamps
- `users`: id, username (unique), full_name, email (unique), password, timestamps

Migrations are in `database/migrations` and the seeder is `database/seeders/DatabaseSeeder.php`.

## Links

- GitHub: https://github.com/aaart005-en/tasks-laravel-crud
- Hosted app: https://tasks-crud-art.totalh.net