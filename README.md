# 🛍️ ShopEasy – E-commerce Website

ShopEasy is a responsive full-stack e-commerce web application developed using Laravel 12, PHP, PostgreSQL, and Tailwind CSS.

The application provides a user-friendly shopping experience with product browsing, product details, shopping cart management, and checkout functionality.

## 🚀 Technologies Used

- PHP 8.2
- Laravel 12
- PostgreSQL
- HTML5
- Tailwind CSS
- JavaScript
- Blade Templates
- Vite

## ✨ Features

- Responsive homepage
- Product listing
- Product details
- Shopping cart
- Add and remove cart items
- Update product quantities
- Session-based cart management
- Checkout page
- Order and order-item database structure
- PostgreSQL integration

## 📸 Project Structure

ShopEasy/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── database/
│   └── migrations/
├── public/
│   └── images/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   └── web.php
├── .env.example
├── .gitignore
├── artisan
├── composer.json
└── package.json


## ⚙️ Installation

### 1. Clone the repository


git clone YOUR_GITHUB_REPOSITORY_URL
cd ShopEasy


### 2. Install dependencies


composer install
npm install


### 3. Configure environment

cp .env.example .env


### 4. Generate application key


php artisan key:generate


### 5. Configure PostgreSQL

Add your PostgreSQL database credentials to the `.env` file.

### 6. Run migrations


php artisan migrate


### 7. Build frontend assets


npm run build


### 8. Start the application
php artisan serve


Visit: http://127.0.0.1:8000

## 🗄️ Database

PostgreSQL is used as the database.

Main tables:
- products
- users
- orders
- order_items

## 🔐 Security

- Environment variables are stored in `.env`.
- Sensitive credentials are excluded from Git.
- Never share database passwords or application keys publicly.

## 👩‍💻 Developer

**Pooja Tanwar**

Full Stack Web Developer

📌 Project Status

Currently under development. More features and improvements are coming.


Built with ❤️ using Laravel and Tailwind CSS.