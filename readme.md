<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
 
# Setting up the project Locally

## Database configuration
### Setting MySQL Workbench
- Add MySql Connection
- Put the connection name as LikhainWorks
- Fill the Hostname : 127.0.0.1
- Fill the Port: 8000
- Fill the username: root
- Fill the password: [password]
- Click Ok

### Command for .env-dist
- cp .env-dist .env

### Run:
- composer install
- composer require laravel/ui --dev
- Generate Front-end Scaffolding:
    - php artisan ui bootstrap
- npm install && npm run dev

### Setting video call functionality
- npm install -g laravel-echo-server
- laravel-echo-server start (socket.io will use port 6001)

### Setting database in project
- Edit the .env file and fill the database information ( DB_DATABSE, DB_USERNAME, DB_PASSWORD )
- Save
- php artisan migrate:fresh --seed
- Run php artisan serve

### Sample Accounts
- Applicant: 
    - email: applicant001@example.com
    - password: password
- Employer Admin:
    - email: employeradmin001@example.com
    - password: password
- Admin:
    - email: admin001@example.com
    - password: password
- Employee:
    - email: employee001@example.com    
    - password: password

### Login Page for Employer
- http://localhost:8000/login_employer

### Login Page for Admin
- http://localhost:8000/login_admin

### Login Page for Employee
- http://localhost:8000/login_employee

