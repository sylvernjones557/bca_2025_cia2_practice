# bca_cia2_practice — Project Overview

This is a small PHP practice workspace containing simple examples for cookies, sessions, file upload, and basic database CRUD operations (insert, update, delete, display). The files are intentionally minimal and use plain HTML and PHP (no Bootstrap or external CSS).

Below is a description of each file and how to use them.

---

## Files

- `README.md`
  - This file. Contains a short description of the project and each file.

- `db_conn_one.php`
  - Database connection helper. Connects to MySQL using the credentials defined inside the file. On success it echoes "Connected Successfully..." (you can remove that echo in production).
  - Exposes `$conn` (a mysqli connection) to other scripts that `require` this file.
  - IMPORTANT: Update credentials here if your MySQL username/password or database name differ.

- `insertDML.php`
  - A small page with a form to insert new user records into the `users` table.
  - After submission it inserts a row (NAME, email, Degree) and displays the full users table below the form.
  - Uses `db_conn_one.php` for the database connection.

- `update.php`
  - Connects to the database and runs a hard-coded UPDATE query:
    - `UPDATE users SET Degree = 'MCA' WHERE NAME = 'Sylvester'`
  - After running the update it displays the full `users` table.
  - Intended as a demonstration of how to run an UPDATE and show results.

- `delete.php`
  - Contains a small form to delete a user by NAME.
  - After submission it executes a DELETE and then displays the updated users table.

- `functions_calculator.php`
  - Simple calculator implemented using PHP server-side processing.
  - Accepts two numbers and an operation (addition, subtraction, product, quotient) and displays the result.
  - Includes basic protection for division by zero and sanitizes output when printing results.

- `inherit.php`
  - Small demonstration of PHP class inheritance.
  - Defines a base `Vehicle` class and a `Car` subclass (which adds `displayInfo()`).
  - The script instantiates `Car` and calls `displayInfo()` to show how subclass methods work.

- `files.php`
  - File upload demo. Accepts an image file, reads its contents and displays the uploaded image inline using a data URL (base64 encoded).
  - Note: This example does not permanently store the file on disk — it reads the uploaded file and displays it immediately.

- `cookies.php`
  - Demonstrates cookie usage. The form collects a username and creates/updates a cookie named `<username>_lastvisit` with the current date/time.
  - If the cookie already exists it prints the last visit time.

- `session.php`
  - Demonstrates session usage. It starts a session and stores a per-user session value keyed by `<username>lastvisit`.
  - Shows how session values are available while the browser session persists.

---

## Database (MySQL)

- Expected database name: `sylvester` (see `db_conn_one.php` and other scripts)
- Expected table: `users` with at least the following columns (as used across the scripts):

  CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(255),
    email VARCHAR(255),
    Degree VARCHAR(255)
  );

  Adjust types/lengths as needed.

## How to run locally

1. Place this folder inside your web server document root (XAMPP default is `C:\xampp\htdocs\`).
2. Ensure MySQL is running and the `sylvester` database exists with a `users` table as described above.
3. Open pages in your browser, for example:

   - http://localhost/bca_cia2_practice/insertDML.php
   - http://localhost/bca_cia2_practice/update.php

## Security & Notes

- These are practice/demo scripts. They are intentionally simple and do not include production-grade security.
- For production use, consider:
  - Using prepared statements (mysqli prepared or PDO) to avoid SQL injection.
  - Validating and sanitizing all user inputs on server-side.
  - Avoid echoing raw database values without escaping (use `htmlspecialchars()` when outputting user data into HTML).
  - Proper file upload handling (validate file type, store files safely, avoid storing raw base64 in the page, limit file size).
  - Remove or disable debug/connection success messages (for example, `echo "Connected Successfully..."` in `db_conn_one.php`).

## Small improvements you might want to make

- Add a small CSS file if you want nicer layout and spacing (I left the project intentionally plain).
- Convert database interactions to prepared statements.
- Add pagination or limit when displaying the users table to avoid huge HTML tables.

---

If you'd like, I can:
- Convert all pages to use prepared statements (safe SQL) and add a minimal CSS file, or
- Add a tiny setup script to create the `sylvester` database and `users` table automatically (if you prefer).

Tell me which follow-up you'd like and I'll implement it.
