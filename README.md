# Leafora — Online Plant Store

Leafora is a full-stack e-commerce web application designed for browsing and purchasing 
plants online. It includes a complete customer-facing shopping experience along with a 
fully functional admin panel for managing the entire store — products, orders, users, 
and customer messages.

**Live Site:** [(https://leafora.infinityfreeapp.com/)]


## Table of Contents

- [Project Overview](#project-overview)
- [Live Demo](#live-demo)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [How to Run Locally](#how-to-run-locally)
- [Admin Panel](#admin-panel)
- [Future Improvements](#future-improvements)
- [Author](#author)
- 

## Project Overview

Leafora was built to simulate a real-world online plant store with end-to-end 
functionality. The project covers everything from product browsing and cart management 
to order tracking and admin-level store control. It demonstrates practical skills in 
full-stack web development using PHP and MySQL, with a clean and responsive frontend 
built using Bootstrap.


## Live Demo

The project is deployed and accessible online.

Live URL: [(https://leafora.infinityfreeapp.com/)]


## Features

### Customer Side

- Browse plant products with images, names, and prices
- View detailed product pages
- Add products to cart and manage cart items
- Wishlist — save favourite products for later
- Place orders and view complete order history
- Responsive design — works on desktop, tablet, and mobile

### Admin Panel

- Secure admin login
- Add, edit, and delete products
- Manage and update order statuses
- View and manage all registered users
- Read and respond to customer messages and enquiries


## Tech Stack

| Layer      | Technology                        |
|------------|-----------------------------------|
| Frontend   | HTML, CSS, JavaScript, Bootstrap  |
| Backend    | PHP                               |
| Database   | MySQL                             |
| Server     | XAMPP (local), Live server (hosted)|

---

## Project Structure

leafora-plant-store/
│
├── frontend/              # All UI pages and styling
│   ├── index.php          # Homepage
│   ├── shop.php           # Product listing page
│   ├── product.php        # Single product detail page
│   ├── cart.php           # Shopping cart
│   ├── wishlist.php       # Wishlist page
│   ├── orders.php         # Order history
│   └── contact.php        # Contact/enquiry page
│
├── backend/               # PHP logic and database operations
│   ├── config.php         # Database connection
│   ├── cart.php           # Cart logic
│   ├── orders.php         # Order processing
│   ├── wishlist.php       # Wishlist logic
│   └── admin/             # Admin panel files
│       ├── dashboard.php
│       ├── products.php
│       ├── orders.php
│       ├── users.php
│       └── messages.php
│
├── images/                # Product and site images
└── README.md


## Admin Panel

The admin panel is accessible via a separate secure login and provides full control 
over the store.

| Section   | Functionality                                      |
|-----------|----------------------------------------------------|
| Products  | Add new plants, edit details, delete listings      |
| Orders    | View all placed orders, update order status        |
| Users     | View all registered customers                      |
| Messages  | Read and manage customer enquiries and messages    |


## Future Improvements

- Payment gateway integration (Razorpay / PayPal)
- Email notifications for order confirmation
- Product search and filter functionality
- Customer reviews and ratings
- Coupon and discount code system
- Improved mobile UI


## Author

Apoorva
BCA Student | Full Stack Developer

GitHub: [apoorva01-ch](https://github.com/apoorva01-ch)
