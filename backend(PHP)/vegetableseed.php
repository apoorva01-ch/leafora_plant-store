<?php session_start(); ?>
<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>vegetable Seeds</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>

/* Smooth scroll */
 html {
  scroll-behavior: smooth;
}
  body {
  background-color: #223a29;/* dark page background */
  color: #e0e0e0; /* default text color for readability */
}
/* Header */
.header {
  background: linear-gradient(90deg, #3a8048, #2a5d33); /* premium gradient */
  padding: 5px 20px;
  position: sticky;
  top: 0;
  z-index: 999;
  box-shadow: 0 4px 12px rgba(0,0,0,0.18);
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap; /* allows wrapping on smaller screens */
  height: 80px;
}

/* Logo */
.header .logo img {
  height: 80px;
  width: auto;
}

/* Main Menu */
.main-menu {
  display: flex;
  gap: 20px;
  align-items: center;
  flex-wrap: wrap; /* ensures dropdowns stack on small screens */
}

.main-menu a,
.btn-menu {
  text-decoration: none;
  color: #d1f4cf;
  font-weight: 600;
  transition: 0.3s;
}

.main-menu a:hover,
.btn-menu:hover {
  color: #d7f1d7;
}

/* Home link */
.home-link {
  color: #f0f0f0;
  font-weight: 600;
}

.home-link:hover {
  color: #c1f0c1;
  text-decoration: none;
}

/* Icons */
.header-icons {
  display: flex;
  gap: 15px;
  align-items: center;
}

.header-icons a i {
  font-size: 1.3rem;
  color: #f0f0f0;
  transition: 0.3s;
}

.header-icons a i:hover {
  color: #c1f0c1;
  transform: scale(1.2);
}

/* Responsive tweaks */
@media (max-width: 992px) {
  .header {
    justify-content: center;
    height: auto;
  }

  .main-menu {
    width: 100%;
    justify-content: center;
    margin-top: 8px;
  }

  .header-icons {
    width: 100%;
    justify-content: center;
    margin-top: 5px;
  }
}
/* Dropdown menu background */
.dropdown-menu {
  background-color: #1d3124; /* dark green */
  border: none;
}

/* Dropdown items */
.dropdown-item {
  color: #d1f4cf; /* light green text */
  font-weight: 500;
}

/* Hover effect */
.dropdown-item:hover {
  background-color: #3c8a4a;
  color: white;
}

/* Active/clicked item */
.dropdown-item:active {
  background-color: #276b29;
  color: white;
}
/* header  complete*/
/* banner */
.hero-btn {
  background: #3c8a4a;
  color: white;
  padding: 10px 25px;
  border: none;
  border-radius: 10px;
  transition: 0.3s;
}

.hero-btn:hover {
  background: #276b29;
  transform: scale(1.05);
}

.hero-img {
  max-height: 300px;
  transition: 0.4s;
}

.hero-img:hover {
  transform: scale(1.05);
}
/*  */
/* CATEGORY BOX */
.seed-category {
  background: #e1d4c2;
  padding: 25px 15px;
  border-radius: 18px;
  text-align: center;
  transition: all 0.3s ease;
  box-shadow: 0 8px 18px rgba(0,0,0,0.08);
  position: relative;
  overflow: hidden;
  height: 100%;
}

/* Hover effect */
.seed-category:hover {
  transform: translateY(-8px);
  box-shadow: 0 14px 28px rgba(0,0,0,0.15);
}

/* Circle icon */
.seed-icon {
  width: 60px;
  height: 60px;
  background: #3c8a4a;
  color: white;
  font-size: 1.8rem;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 12px;
  transition: 0.3s;
}

/* Icon hover */
.seed-category:hover .seed-icon {
  transform: scale(1.1);
  background: #276b29;
}

/* Heading */
.seed-category h6 {
  font-weight: 700;
  color: #2a5d33;
  margin-top: 10px;
}

/* Optional small text */
.seed-category p {
  font-size: 0.9rem;
  color: #4e7a5b;
  margin-top: 5px;
}

/* Subtle top border effect */
.seed-category::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: #3c8a4a;
}
/* PRODUCT CARD (same style) */
.product-card {
  background: #e1d4c2;
  border-radius: 18px;
  overflow: hidden;
  text-align: center;
  transition: all 0.3s ease;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  position: relative;
}

/* Hover effect */
.product-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.18);
}

/* Image container */
.product-img {
  background: #e1d4c2;
  padding: 20px;
}

.product-img img {
  height: 140px;
  object-fit: contain;
  transition: 0.3s;
}

/* Image zoom */
.product-card:hover img {
  transform: scale(1.08);
}

/* Content */
.product-info {
  padding: 15px;
}

/* Title */
.product-info h6 {
  font-weight: 700;
  color: #2a5d33;
  margin-bottom: 5px;
}

/* Price */
.product-price {
  color: #3c8a4a;
  font-weight: 700;
  margin-bottom: 10px;
}

/* Button */
.product-btn {
  background: #3c8a4a;
  color: white;
  border: none;
  padding: 8px 0;
  width: 100%;
  border-radius: 10px;
  font-size: 0.9rem;
  transition: 0.3s;
}

.product-btn:hover {
  background: #276b29;
  transform: scale(1.05);
}

/* Badge */
.product-badge {
  position: absolute;
  top: 10px;
  left: 10px;
  background: #da3636;
  color: white;
  font-size: 0.75rem;
  padding: 4px 8px;
  border-radius: 10px;
}

/* STEPS */
/* SECTION WRAPPER */
.steps-section {
  position: relative;
}

/* CENTER LINE */
.steps-section::before {
  content: "";
  position: absolute;
  top: 60px;
  left: 50%;
  transform: translateX(-50%);
  width: 4px;
  height: calc(100% - 60px);
  background: #3c8a4a;
  opacity: 0.3;
}

/* STEP BOX */
.step-box {
  background: #e1d4c2;
  padding: 25px 20px;
  border-radius: 18px;
  text-align: center;
  position: relative;
  transition: all 0.4s ease;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  border: 1px solid rgba(0,0,0,0.05);
  opacity: 0;
  transform: translateY(40px);
}

/* SHOW ANIMATION */
.step-box.show {
  opacity: 1;
  transform: translateY(0);
}

/* HOVER */
.step-box:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

/* STEP NUMBER DOT */
.step-number {
  position: absolute;
  top: -15px;
  left: 50%;
  transform: translateX(-50%);
  background: #3c8a4a;
  color: white;
  font-size: 0.8rem;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 20px;
}

/* ICON */
.step-icon {
  font-size: 2.2rem;
  margin-bottom: 10px;
}

/* TEXT */
.step-box p {
  margin: 0;
  font-weight: 600;
  color: #2a5d33;
}

/* RESPONSIVE (remove line on mobile) */
@media (max-width: 768px) {
  .steps-section::before {
    display: none;
  }
}

/* CTA */
.cta-btn {
  background: #3c8a4a;
  color: white;
  padding: 10px 25px;
  border-radius: 10px;
  border: none;
}
/* footer */
.footer-link {
  text-decoration: none;
  color: white;
}

.footer-link:hover {
  color: #81c784;
}

.subscribe-form {
  display: flex;
  width: 100%;
  gap: 8px;
}

.subscribe-form input {
  flex: 1;
  padding: 10px;
  border-radius: 6px;
  border: none;
  min-width: 0;
}

.subscribe-form button {
  padding: 10px 15px;
  background-color: #3c8a4a;
  color: white;
  border: none;
  border-radius: 6px;
  white-space: nowrap;
}
.modalName{
  color: #223a29;

}
.panel{
position:fixed;
top:0;
right:-400px;
width:350px;
height:100%;
background:linear-gradient(180deg,#1d3124,#345c3c);
color:white;
box-shadow:-5px 0 20px rgba(0,0,0,0.2);
padding:25px;
transition:0.4s;
z-index:9999;
overflow-y:auto;
}
.panel.open{
right:0;
}

.panel-img{
width:100%;
border-radius:10px;
margin-bottom:15px;
}
#panelTitle{
font-size:22px;
font-weight:bold;
margin-top:10px;
}

.close-btn{
font-size:22px;
cursor:pointer;
float:right;
background:white;
color:#345c3c;
padding:4px 10px;
border-radius:50%;
}

#panelPrice{
font-size:24px;
font-weight:bold;
color:#9dd4a7;
margin-bottom:10px;
}
.cart-wrapper {
  position: relative;
  display: inline-block;
  color: white;
}

#cart-count {
  position: absolute;
  top: -6px;
  right: -10px;
  background: #ff4d4d;
  color: white;
  font-size: 11px;
  font-weight: bold;
  padding: 3px 6px;
  border-radius: 50%;
  min-width: 18px;
  text-align: center;
  line-height: 1;
}
.add-to-cart {
  background: linear-gradient(135deg, #3c8a4a, #2a5d33);
  color: white;
  border: none;
  padding: 10px 0;
  width: 100%;
  border-radius: 10px;
  font-weight: 600;
  transition: 0.3s;
  cursor: pointer;
}

.add-to-cart:hover {
  background: linear-gradient(135deg, #2a5d33, #1d3124);
  transform: scale(1.05);
}
</style>
</head>
<?php
include("db.php");
global $conn;
$count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM cart");
$count_data = mysqli_fetch_assoc($count_query);
?>
<body>

<!-- HEADER SAME -->
<header class="header" style="height:auto; padding:10px 20px;">
  <div class="d-flex justify-content-between align-items-center w-100">
    
    <!-- Logo -->
    <a href="plant.php" class="logo">
      <img src="../images/logo2-removebg-preview.webp" alt="Leafora Logo" style="height:60px;">
    </a>

    <!-- Hamburger (only mobile) -->
    <button onclick="toggleHamburger()" class="d-md-none"
      style="background:none;border:1px solid white;color:white;padding:5px 12px;border-radius:6px;font-size:20px;cursor:pointer;">
      ☰
    </button>

    <!-- Desktop Menu -->
    <nav class="main-menu d-none d-md-flex">
      <a href="plant.php" class="home-link"><i class="bi bi-house"></i></a>

      <div class="dropdown">
        <button class="btn btn-menu dropdown-toggle" type="button" data-bs-toggle="dropdown">PLANTS</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="indoorplant.php">Indoor Plants</a></li>
          <li><a class="dropdown-item" href="outdoorplant.php">Outdoor Plants</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <button class="btn btn-menu dropdown-toggle" type="button" data-bs-toggle="dropdown">SEEDS</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="flowerseed.php">Flower Seeds</a></li>
          <li><a class="dropdown-item" href="vegetableseed.php">Vegetable Seeds</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <button class="btn btn-menu dropdown-toggle" type="button" data-bs-toggle="dropdown">GARDEN DECOR</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="bird.php">Bird Houses</a></li>
          <li><a class="dropdown-item" href="garden.php">Garden Tools</a></li>
        </ul>
      </div>
    </nav>

    <!-- Desktop Icons -->
    <div class="header-icons d-none d-md-flex">
      <a href="#" onclick="openSearch()"><i class="bi bi-search"></i></a>
      <a href="contact.php"><i class="bi bi-person"></i></a>
      <a href="javascript:void(0);" onclick="openCart()" class="cart-wrapper">
        <i class="bi bi-cart fs-4"></i>
        <span id="cart-count"><?= $count_data['total']; ?></span>
      </a>
      <?php include("navbar.php"); ?>
    </div>

  </div>

  <!-- Mobile Menu -->
  <div id="mainMenu" style="display:none; background:#1d3124; padding:15px; border-radius:10px; margin-top:10px; position:relative; z-index:100;">

    <!-- Plants -->
    <div style="border-bottom:1px solid #345c3c; margin-bottom:5px;">
      <button onclick="toggleMobileMenu('sub-plants', this)"
        style="background:none;border:none;color:white;font-weight:bold;width:100%;text-align:left;padding:10px 0;font-size:15px;cursor:pointer;">
        🌿 PLANTS <span style="float:right;">▼</span>
      </button>
      <div id="sub-plants" style="display:none; padding:5px 0 10px 15px;">
        <a href="indoorplant.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Indoor Plants</a>
        <a href="outdoorplant.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Outdoor Plants</a>
      </div>
    </div>

    <!-- Seeds -->
    <div style="border-bottom:1px solid #345c3c; margin-bottom:5px;">
      <button onclick="toggleMobileMenu('sub-seeds', this)"
        style="background:none;border:none;color:white;font-weight:bold;width:100%;text-align:left;padding:10px 0;font-size:15px;cursor:pointer;">
        🌱 SEEDS <span style="float:right;">▼</span>
      </button>
      <div id="sub-seeds" style="display:none; padding:5px 0 10px 15px;">
        <a href="flowerseed.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Flower Seeds</a>
        <a href="vegetableseed.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Vegetable Seeds</a>
      </div>
    </div>

    <!-- Decor -->
    <div style="border-bottom:1px solid #345c3c; margin-bottom:5px;">
      <button onclick="toggleMobileMenu('sub-decor', this)"
        style="background:none;border:none;color:white;font-weight:bold;width:100%;text-align:left;padding:10px 0;font-size:15px;cursor:pointer;">
        🏡 GARDEN DECOR <span style="float:right;">▼</span>
      </button>
      <div id="sub-decor" style="display:none; padding:5px 0 10px 15px;">
        <a href="bird.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Bird Houses</a>
        <a href="garden.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Garden Tools</a>
      </div>
    </div>

    <!-- Mobile Icons -->
    <div style="display:flex; flex-wrap:wrap; gap:12px; padding-top:14px; border-top:1px solid #345c3c;">

      <span onclick="openSearch()"
        style="color:white;cursor:pointer;font-size:13px;display:flex;align-items:center;gap:4px;">
        <i class="bi bi-search"></i> Search
      </span>

      <span onclick="openCart()"
        style="color:white;cursor:pointer;font-size:13px;display:flex;align-items:center;gap:4px;position:relative;">
        <i class="bi bi-cart"></i> Cart
        <span id="cart-count-mobile"
          style="background:#ff4d4d;color:white;font-size:10px;padding:2px 5px;
                 border-radius:50%;position:absolute;top:-8px;right:-8px;">
          <?= $count_data['total']; ?>
        </span>
      </span>

      <a href="wishlist.php"
        style="color:white;text-decoration:none;font-size:13px;display:flex;align-items:center;gap:4px;">
        <i class="bi bi-heart"></i> Wishlist
      </a>

      <a href="contact.php"
        style="color:white;text-decoration:none;font-size:13px;display:flex;align-items:center;gap:4px;">
        <i class="bi bi-person"></i> Profile
      </a>

      <a href="order_history.php"
        style="color:white;text-decoration:none;font-size:13px;display:flex;align-items:center;gap:4px;">
        <i class="bi bi-clock-history"></i> Orders
      </a>

      <a href="logout.php"
        style="color:#ff6b6b;text-decoration:none;font-size:13px;font-weight:bold;display:flex;align-items:center;gap:4px;">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>

    </div>
  </div>
</header>

<!-- 🌸 BANNER -->
<div class="container my-5">
  <div class="row align-items-center">
    
    <!-- LEFT CONTENT -->
    <div class="col-md-6">
      <h1 style="color:#87b890; font-weight:700;">
        Grow Your Own Vegetables 🌱
      </h1>
      <p style="color:#cfe9d1; font-size:1.1rem;">
        Start from seeds and enjoy fresh vegetables at home.
      </p>
      <a href="#seed-products">
        <button class="hero-btn mt-3">Explore Seeds</button>
      </a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="col-md-6 text-center">
      <img src="../images/vegetable.jpg" alt="Vegetable Seeds" class="img-fluid hero-img">
    </div>

  </div>
</div>
<!-- 🌼 CATEGORY -->
<div class="container my-5">
  <h4 class="text-center fw-bold" style="color:#87b890;">
    Explore Categories
  </h4>

  <div class="row mt-4 g-4">

    <!-- Leafy Greens -->
    <div class="col-md-3">
      <div class="seed-category">
        <div class="seed-icon">🥬</div>
        <h6>Leafy Greens</h6>
        <p>Spinach, Lettuce, Kale</p>
      </div>
    </div>

    <!-- Fruit Vegetables -->
    <div class="col-md-3">
      <div class="seed-category">
        <div class="seed-icon">🍅</div>
        <h6>Fruit Vegetables</h6>
        <p>Tomato, Capsicum, Cucumber</p>
      </div>
    </div>

    <!-- Root Vegetables -->
    <div class="col-md-3">
      <div class="seed-category">
        <div class="seed-icon">🥕</div>
        <h6>Root Vegetables</h6>
        <p>Carrot, Beetroot, Radish</p>
      </div>
    </div>

    <!-- Herbs -->
    <div class="col-md-3">
      <div class="seed-category">
        <div class="seed-icon">🌿</div>
        <h6>Herbs</h6>
        <p>Basil, Coriander, Mint</p>
      </div>
    </div>

  </div>
</div>
<!-- filter  -->
 <?php include("filter_bar.php"); 
include("filter_query.php");  
$result = getFilteredProducts($conn, 'vegetableseed'); 
?>
 
<!-- 🛒 PRODUCTS -->
<div id="seed-products" class="container my-5">
  <div class="row g-4">
   <?php
    if(mysqli_num_rows($result) == 0) {
      echo "<p style='color:#aaa; text-align:center;'>NO PRODUCT FOUND!</p>";
    }

    while($row = mysqli_fetch_assoc($result)) {
      $save = $row['old_price'] - $row['price'];
      $discount = round(($save / $row['old_price']) * 100);
    ?>
    <div class="col-md-3">
      <div class="product-card">
        <div class="product-badge"><?= $discount ?>% OFF</div>
        <div class="product-img">
         <img src="../images/products/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
        </div>
        <div class="product-info">
          <h6><?= $row['name'] ?></h6>
          <p class="product-price">
            ₹<?= $row['price'] ?>
            <del style="color:#999; font-size:12px;">₹<?= $row['old_price'] ?></del>
          </p>
          <span style="color:#da3636; font-size:12px; display:block; margin-bottom:8px;">
            Save ₹<?= $save ?>
          </span>
          <button class="product-btn add-to-cart"
            data-name="<?= $row['name'] ?>"
            data-price="<?= $row['price'] ?>">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<!-- 🌱 HOW TO GROW (TIMELINE STYLE) -->
<div class="container my-5 text-center steps-section">
  <h4 style="color:#87b890; font-weight:700;">How to Grow Vegetables 🌱</h4>

  <div class="row mt-5 g-4">

    <!-- Step 1: Prepare Soil -->
    <div class="col-md-6">
      <div class="step-box">
        <div class="step-number">Step 1</div>
        <div class="step-icon">🥬</div>
        <p>Prepare Rich Soil</p>
      </div>
    </div>

    <!-- Step 2: Sow Seeds -->
    <div class="col-md-6">
      <div class="step-box">
        <div class="step-number">Step 2</div>
        <div class="step-icon">🌱</div>
        <p>Sow Seeds Evenly</p>
      </div>
    </div>

    <!-- Step 3: Water Regularly -->
    <div class="col-md-6">
      <div class="step-box">
        <div class="step-number">Step 3</div>
        <div class="step-icon">💧</div>
        <p>Water Consistently</p>
      </div>
    </div>

    <!-- Step 4: Sunlight -->
    <div class="col-md-6">
      <div class="step-box">
        <div class="step-number">Step 4</div>
        <div class="step-icon">☀️</div>
        <p>Provide Adequate Sunlight</p>
      </div>
    </div>

    <!-- Step 5: Fertilize -->
    <div class="col-md-6">
      <div class="step-box">
        <div class="step-number">Step 5</div>
        <div class="step-icon">🪴</div>
        <p>Add Nutrients & Fertilizer</p>
      </div>
    </div>

    <!-- Step 6: Harvest -->
    <div class="col-md-6">
      <div class="step-box">
        <div class="step-number">Step 6</div>
        <div class="step-icon">🥕</div>
        <p>Harvest Fresh Vegetables</p>
      </div>
    </div>

  </div>
</div>

<!-- 🚀 CTA -->
<div class="text-center my-5">
  <h4>Start Growing Today 🌼</h4>
  <a href="#seed-products">
    <button class="cta-btn mt-2">Shop All Seeds</button>
  </a>
</div>

<!-- FOOTER SAME -->
<!-- footer -->
    <footer style="background-color: #345c3c; padding: 40px 0; margin-top: 76px;">
  <div class="container" style="background-color: #1d3124; padding: 40px 20px;">

    <div class="row text-white gy-4">

      <!-- Logo + About -->
      <div class="col-md-4">
        <img src="../images/logo2-removebg-preview.png" style="width: 200px;">
        <p style="margin-top: 10px; font-weight: bold; color: rgb(196,192,192);">
          We deliver healthy plants <br> with proper care guidance
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2">
        <p class="fw-bold" style="color: rgb(196,192,192);">QUICK LINKS</p>
        <p><a href="#" class="footer-link">HOME</a></p>
        <p><a href="#" class="footer-link">SHOP</a></p>
        <p><a href="#" class="footer-link">CATEGORIES</a></p>
        <p><a href="#" class="footer-link">BLOG</a></p>
        <p><a href="#" class="footer-link">CONTACT</a></p>
      </div>

      <!-- Customer Service -->
      <div class="col-md-2">
        <p class="fw-bold" style="color: rgb(196,192,192);">CUSTOMER SERVICE</p>
        <p><a href="#" class="footer-link">HELP CENTER</a></p>
        <p><a href="#" class="footer-link">FAQs</a></p>
        <p><a href="#" class="footer-link">TRACK ORDER</a></p>
        <p><a href="#" class="footer-link">RETURN & REFUND</a></p>
      </div>

      <!-- Policies -->
      <div class="col-md-2">
        <p class="fw-bold" style="color: rgb(196,192,192);">OUR POLICIES</p>
        <p><a href="#" class="footer-link">PRIVACY POLICY</a></p>
        <p><a href="#" class="footer-link">TERMS & CONDITIONS</a></p>
        <p><a href="#" class="footer-link">SHIPPING POLICY</a></p>
        <p><a href="#" class="footer-link">CANCELLATION POLICY</a></p>
      </div>

      <!-- Contact + Subscribe -->
      <div class="col-md-2">
        <p class="fw-bold" style="color: rgb(196,192,192);">CONTACT US</p>

        <p>📧 support@Leafora.com</p>
        <p>📞 +91 9876543210</p>
        <p>📍 Mumbai, India</p>

        <hr style="background:white;">

        <p>Get plant care tips & exclusive offers</p>

        <form class="subscribe-form mt-2">
          <input type="email" placeholder="Enter your email">
          <button type="submit">Subscribe</button>
        </form>

        <!-- Social Icons -->
        <div class="d-flex gap-3 mt-3">
          <i class="bi bi-instagram"></i>
          <i class="bi bi-youtube"></i>
          <i class="bi bi-pinterest"></i>
          <i class="bi bi-twitter"></i>
        </div>
      </div>

    </div>

    <!-- Bottom Section -->
    <hr style="background:white; margin-top:30px;">

    <div class="text-center text-white">
      <img src="../images/WhatsApp_Image_2026-01-13_at_12.05.17_PM-removebg-preview.png" height="120px">
      <p style="color: rgb(160,153,153); font-weight: bold;">
        Secure Payments | Pan India Delivery | Fresh & Healthy Plants Guaranteed
      </p>
      <p style="color: rgb(160,153,153);">
        © 2026 Leafora. All rights reserved
      </p>
    </div>

  </div>
</footer>

  </div>

  <!-- Quick View Modal -->
<div id="quickViewModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); justify-content:center; align-items:center; z-index:1000;">
  <div style="background:#dbe3dadf; padding:20px; border-radius:10px; max-width:400px; width:90%; text-align:center; position:relative;">
    <span id="closeModal" style="position:absolute; top:10px; right:15px; font-size:1.5rem; cursor:pointer; color: black;">&times;</span>
    <img id="modalImg" src="" alt="Product Image" style="max-width:100%; border-radius:10px; margin-bottom:15px;">
    <h3 id="modalName" style="color: #457a55;"></h3>
    <p id="modalPrice" style="color:rgb(35, 86, 35); font-weight:bold;"></p>
    <button style="background:#2a5d33; color:white; border:none; padding:10px 20px; border-radius:8px; cursor:pointer;">Add to Cart</button>
  </div>
</div>

<script>
  const productCards = document.querySelectorAll('.product-card');
  const modal = document.getElementById('quickViewModal');
  const closeModal = document.getElementById('closeModal');
  const modalImg = document.getElementById('modalImg');
  const modalName = document.getElementById('modalName');
  const modalPrice = document.getElementById('modalPrice');

  productCards.forEach(card => {
    card.addEventListener('click', () => {
      modal.style.display = 'flex';
      modalImg.src = card.querySelector('img').src;
      modalName.innerText = card.querySelector('h5').innerText;
      modalPrice.innerText = card.querySelector('p').innerText;
    });
  });

  closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  // Close modal if clicked outside
  window.addEventListener('click', (e) => {
    if(e.target == modal){
      modal.style.display = 'none';
    }
  });
</script>
<script>
  const steps = document.querySelectorAll('.step-box');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        entry.target.classList.add('show');
      }
    });
  }, { threshold: 0.2 });

  steps.forEach(step => {
    observer.observe(step);
  });
</script>
<script src="cart.js"></script>
<script>
  function openCart(){
    document.getElementById("cartPanel").classList.add("open");
    loadCart();
}

function closeCart(){
    document.getElementById("cartPanel").classList.remove("open");
}

function loadCart() {
    fetch("load_cart.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("cartItems").innerHTML = data;
        });
}

function removeItem(id) {
    fetch("remove_cart.php?id=" + id)
        .then(response => response.text())
        .then(data => {
            loadCart();
            updateCartCount();
        });
}

function updateCartCount() {
  fetch("cart_count.php")
    .then(res => res.text())
    .then(count => {
      count = count.trim();
      var d = document.getElementById("cart-count");
      var m = document.getElementById("cart-count-mobile");
      if (d) d.innerText = count;
      if (m) m.innerText = count;
    })
    .catch(err => console.log("Count error:", err));
}

window.addEventListener("load", function () {
    loadCart();
    updateCartCount();
});
document.querySelectorAll(".add-to-cart").forEach(button => {
    button.addEventListener("click", function (e) {
        e.stopPropagation();

        let name = this.dataset.name;
        let price = this.dataset.price;

        fetch("add_to_cart.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `product_name=${encodeURIComponent(name)}&product_price=${encodeURIComponent(price)}`
        })
        .then(response => response.text())
        .then(data => {
            loadCart();
            updateCartCount();
            openCart();
        });
    });
});
</script>
<script>
function increaseQty(id){
    fetch("update_qty.php?id=" + id + "&type=inc")
    .then(() => {
        loadCart();
        updateCartCount();
    });
}

function decreaseQty(id){
    fetch("update_qty.php?id=" + id + "&type=dec")
    .then(() => {
        loadCart();
        updateCartCount();
    });
}


function toggleHamburger() {
  var menu = document.getElementById("mainMenu");
  menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

function toggleMobileMenu(id, btn) {
  var el = document.getElementById(id);
  var arrow = btn.querySelector("span");
  if (el.style.display === "block") {
    el.style.display = "none";
    if (arrow) arrow.textContent = "▼";
  } else {
    el.style.display = "block";
    if (arrow) arrow.textContent = "▲";
  }
}
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <div id="cartPanel" class="panel">
  <span class="close-btn" onclick="closeCart()">✖</span>
  <h3>Your Cart</h3>
  <div id="cartItems"></div>
</div>
</body>

</html>