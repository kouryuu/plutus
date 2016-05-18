# Plutus Personal Finance App

Plutus a dead-simple personal finance web application.

## Requirements

- PHP 5.5 or greater
- Composer installed.
- SQLite3

## How to install

1. Using composer install the dependecies.
`composer install`
2. Run `php -S http://127.0.0.1:[optional-port]` in the `web`directory or place it at the PHP root.
3. Run `sqlite3 app.db < initialize_db.sql` to initialize the database structure.
