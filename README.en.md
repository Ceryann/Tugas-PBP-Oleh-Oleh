# Login, Register, Change Password & Change Username System (PHP + MySQL)

[![Bahasa Indonesia](https://img.shields.io/badge/BAHASA%20INDONESIA-6e7681?style=for-the-badge)](README.md)
[![English](https://img.shields.io/badge/ENGLISH-0969da?style=for-the-badge)](README.en.md)

Assignment for the **Platform-Based Programming** course (*Pemrograman Berbasis Platform*).

| | |
|---|---|
| **Name** | Muhammad Ghazwan Caesaryan |
| **Student ID (NIM)** | 25051204097 |
| **Class** | TI 2025 A |

---

## Description

This repository is not meant to be a complete web-based application. It is material for **dissecting how** a user account system works, step by step: how **registration** is saved, how **login** checks the account and creates a *session*, how the user **enters the dashboard**, and how **changing the name (username)** and **changing the password** are processed.

The code is written in **PHP** and **MySQL** (using `mysqli`). Account data is stored in the `toko_madura` database, in the `users` table.

### The flow being dissected

| Stage | File | What happens |
|---|---|---|
| 1. Registration | `register.php` | The typed username is checked against the `users` table. If it does not exist yet, the username and password are saved with an `INSERT`; if it already exists, registration is rejected. |
| 2. Login | `login.php` | The username and password are matched against the `users` table. If they match, a *session* (`is_login` and `username`) is created and the user is sent to the dashboard. If already logged in, this page redirects straight to the dashboard. |
| 3. Dashboard | `dashboard.php` | The `is_login` *session* is checked every time the page opens; if it is missing, the user is sent back to `login.php`. The dashboard greets the user by username and provides **Logout** (clears the session), **Delete Account** (removes the account from the database), and links to the change password and change name pages. |
| 4. Change Password | `ganti.php` | The old password is verified, then the confirmed new password is saved with an `UPDATE`. |
| 5. Change Name | `gantinama.php` | The new username's availability is checked, then the username is updated in the database and in the *session*, so the dashboard shows the new name right away. |

> The application interface and its messages are in Indonesian. This document gives the English meaning next to each message.

---

## Assignment Requirements

> ### 1. REGISTER
> Check whether the same username already exists.

> ### 2. CHANGE PASSWORD
> There are **3 inputs**:
> 1. Old password
> 2. New password 1
> 3. New password 2
>
> ```
> [your old password]
> [enter password]
> [enter password]
> (change)
> ```

> ### 3. CHANGE USERNAME
> Same username? Then it gets replaced.
>
> ```
> rifqia
>
> [rifqib] (check) (change)
> Please check the username first
> ```

### How each requirement is implemented

| Requirement | File | How it works |
|---|---|---|
| **1. Register** | `register.php` | Before the `INSERT`, the program runs a `SELECT` to look for the same username. If it already exists, it shows **"Username sudah digunakan!"** (username is already in use) and no account is created. If not, the account is saved and **"Pendaftaran berhasil!"** (registration successful) is shown. |
| **2. Change Password** | `ganti.php` | The form has 3 inputs: old password, new password, and new password confirmation. The old password is matched against the database (if wrong: **"Password lama salah!"**, old password is incorrect). The two new password inputs must match (if not: **"Konfirmasi password tidak sesuai!"**, confirmation does not match). If everything is correct, the password is updated and the user returns to the dashboard. |
| **3. Change Username** | `gantinama.php` | The **Cek** (check) button tests whether the new username is already taken (**"Nama sudah digunakan!"**) or still available (**"Nama tersedia!..."**). The **Ganti** (change) button only succeeds if the username has been checked first; otherwise it shows **"Silahkan cek ketersediaan nama terlebih dahulu!"** (please check the username availability first). When changing, the username is checked once more before the `UPDATE`. |

---

## File Structure

```
C:\wamp64\www\test\
├── database.php     # MySQL database connection
├── register.php     # registration page (requirement 1)
├── login.php        # login page
├── dashboard.php    # main page after login (logout, delete account, change menus)
├── ganti.php        # change password page (requirement 2)
├── gantinama.php    # change username page (requirement 3)
└── toko_madura.sql  # database file (users and produk tables)
```

On XAMPP, the folder location is `C:\xampp\htdocs\test\`.

---

## Prerequisites

- **WampServer** or **XAMPP** (both include Apache, MySQL, and PHP)
- A web browser (Chrome, Firefox, Edge, etc.)

---

## Setup Guide

### Step 1 — Start the server

**WampServer**
1. Open **WampServer**.
2. Wait until the WAMP icon in the system tray (bottom-right corner) turns **green**. This means Apache and MySQL are running.

**XAMPP**
1. Open the **XAMPP Control Panel**.
2. Click **Start** on both the **Apache** and **MySQL** modules. They turn green when running.

### Step 2 — Set up the database

1. Open your browser and go to **http://localhost/phpmyadmin**.
   - Log in with username `root` and an empty password (the default for both WAMP and XAMPP).
2. Click **New** in the left panel to create a new database.
3. Enter the database name **`toko_madura`**, choose the collation **`utf8mb4_unicode_ci`**, then click **Create**.
4. Select the `toko_madura` database and open the **Import** tab.
5. Click **Choose File**, select **`toko_madura.sql`**, then click **Import** at the bottom.
6. If it succeeds, two tables will appear in `toko_madura`: **`users`** and **`produk`**.

> The database name must be exactly `toko_madura`, because it is hard-coded in `database.php`.

### Step 3 — Create the project folder

Create a new folder inside the web server directory. This guide uses `test` as the folder name (feel free to change it).

**WampServer**

```
C:\wamp64\www\test
```

**XAMPP**

```
C:\xampp\htdocs\test
```

> The only difference is the location: WAMP uses the **`www`** folder, while XAMPP uses the **`htdocs`** folder.

### Step 4 — Put the code in the folder

Copy these files into the `test` folder you just created:

- `database.php`
- `register.php`
- `login.php`
- `dashboard.php`
- `ganti.php`
- `gantinama.php`

(`toko_madura.sql` may also be kept in this folder. It is only used when importing the database.)

### Step 5 — Run it in the browser

Open your browser and go to:

| Page | Address |
|---|---|
| Register | `http://localhost/test/register.php` |
| Login | `http://localhost/test/login.php` |

> If your Apache runs on a port other than 80 (for example 8080), add the port to the address, e.g. `http://localhost:8080/test/login.php`.

---

## Test Accounts

The initial data in `toko_madura.sql` already contains two accounts:

| Username | Password |
|---|---|
| `Caesaryan` | `123` |
| `Caesario` | `333` |

You can also create a new account on the Register page.

---

## How to Test Each Requirement

### 1. Register
1. Open `register.php`.
2. Register with a username that **already exists** (e.g. `Caesaryan`) → **"Username sudah digunakan!"** appears.
3. Register with a **new** username → **"Pendaftaran berhasil!"** appears.

### 2. Change Password
1. Log in, then click **Ganti Password** on the dashboard.
2. Enter a **wrong** old password → **"Password lama salah!"** appears.
3. Enter the correct old password, but a new password and confirmation that **do not match** → **"Konfirmasi password tidak sesuai!"** appears.
4. Enter the correct old password and a new password and confirmation that **match**, then click **Ganti Password** → the password is changed and you return to the dashboard.

### 3. Change Username
1. Log in, then click **Ganti Nama** on the dashboard.
2. Type a new username and click **Ganti** right away (without checking) → **"Silahkan cek ketersediaan nama terlebih dahulu!"** appears.
3. Type a username that is **already taken** and click **Cek** → **"Nama sudah digunakan!"** appears.
4. Type a username that is **still available** and click **Cek** → **"Nama tersedia!"** appears. Then click **Ganti** → the username is changed and you return to the dashboard.

---

## Troubleshooting

| Problem | Cause and solution |
|---|---|
| The text **"Gagal tersambung"** (connection failed) appears | MySQL is not running, or the `toko_madura` database has not been created or imported. Make sure MySQL is started and repeat Step 2. |
| **404 / Not Found** page | Wrong folder or file name. Make sure the folder is in `www` (WAMP) or `htdocs` (XAMPP) and that the browser address matches the folder name. |
| The page does not open at all | Apache is not running or the port is in conflict. Make sure Apache is started, and try adding the port to the address (e.g. `:8080`). |
| `users` table not found | `toko_madura.sql` has not been imported into the `toko_madura` database. |
| Database connection refused | Check `database.php`. Defaults: host `localhost`, user `root`, empty password. Adjust it if your MySQL uses a password. |

---

## Technologies

- PHP 8 (`mysqli`, `session`)
- MySQL / MariaDB
- HTML
- WampServer / XAMPP, phpMyAdmin

---

## Notes

This project was made for learning purposes. Passwords are stored as plain text in the database and queries are written directly without prepared statements, so it is not recommended for use in a production environment.