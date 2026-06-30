# Ship Search — Admin Panel (PHP Core)

The administration backend for the **Ship Search** maritime platform. This panel provides full CRUD management of geographic data, membership plans, and users, backed by a clean object-oriented PHP core and a Bootstrap (Velzon) admin dashboard theme.

## Tech Stack

- **Backend:** PHP (object-oriented), MySQLi
- **Database:** MySQL (`eqannet_shipsearch`)
- **Frontend:** Bootstrap 5 admin dashboard (Velzon template), SweetAlert2, jQuery
- **Architecture:** Reusable PHP classes (`DBConnection`, `Login`, `Master`, `Users`, `Zone`, `SystemSettings`)

## Features

- Secure admin sign-in / sign-out (`index.php`, `login_api/loginn.php`, `logout.php`)
- **Geography management** with full CRUD and active/inactive status toggling:
  - Countries (`country.php`, `country_api/`)
  - States (`states.php`, `state_api/`)
  - Cities (`city.php`, `city_api/`)
  - Ports (`ports.php`, `ports_api/`)
  - Regions / Zones (`region.php`, `region_api/`)
  - Country–port assignment (`assign_country_port.php`, `assign_country_port_api/`)
- Membership plan management (`membership_plan.php`, `membership_api/`)
- User management with CRUD and status control (`users.php`, `user_api/`)
- System setups and settings (`setups.php`, `classes/SystemSettings.php`)
- AJAX-driven create/update/delete/fetch endpoints for each module

## Requirements

- PHP 7.x or later
- MySQL / MariaDB
- Apache (XAMPP, WAMP, or LAMP recommended)

## Installation & Setup

1. Clone the repository into your web root:
   ```bash
   git clone https://github.com/asifaslamibu/shipsearch-backend-admin-panel-php-core.git
   ```
2. Create the MySQL database and import the schema:
   ```bash
   mysql -u root -p eqannet_shipsearch < eqannet_shipsearch.sql
   ```
3. Configure database credentials in `config.php`:
   ```php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'eqannet_shipsearch');
   ```
4. Start Apache and MySQL (e.g. via XAMPP).
5. Open `http://localhost/shipsearch-backend-admin-panel-php-core/index.php` and log in.

## Usage

Log in with an admin account, then use the sidebar to manage countries, states, cities, ports, regions, membership plans, and users. Each module supports create, update, delete, and activate/deactivate operations through AJAX.

## Project Structure

```
index.php                 Admin login
config.php                Database configuration
classes/                  Core OOP classes (DBConnection, Login, Master, Users, Zone, SystemSettings)
country.php / states.php / city.php / ports.php / region.php   Management pages
*_api/                     AJAX CRUD endpoints per module
membership_plan.php       Membership plan management
users.php                 User management
assets/                   CSS, JS, fonts, images (Velzon theme)
```

## License

This project is for educational/portfolio purposes.
