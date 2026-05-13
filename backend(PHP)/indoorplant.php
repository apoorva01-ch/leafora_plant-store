<?php session_start(); ?>
<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<style>
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
/* header complete */
/* Product Cards */
.product-card {
  background: #e1d4c2;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
  transition: transform 0.3s, box-shadow 0.3s;
  display: flex;
  flex-direction: column;
  text-align: center;
  position: relative;
  
}

.product-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 28px rgba(0,0,0,0.18);
}

/* Badge */
.badge-offer {
  position: absolute;
  top: 12px;
  left: 12px;
  background-color: #da3636;
  color: #fff;
  font-weight: 700;
  font-size: 0.8rem;
  padding: 5px 10px;
  border-radius: 12px;
  z-index: 2;
}

/* Product Image */
.product-img {
  height: 220px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #e1d4c2;
  object-fit: cover;
}

.product-img img {
  max-height: 180px;
  object-fit: contain;
  transition: transform 0.3s;
}

.product-card:hover .product-img img {
  transform: scale(1.05);
}

/* Info */
.product-info {
  padding: 15px;
}

.product-info h5 {
  font-weight: 600;
  font-size: 1.1rem;
  margin-bottom: 8px;
  color: #2a5d33;
}

.product-info .price {
  font-weight: 700;
  color: #3c8a4a;
  margin-bottom: 12px;
}

.btn-add {
  background-color: #3c8a4a;
  color: #fff;
  border: none;
  padding: 8px 0;
  width: 100%;
  border-radius: 12px;
  font-weight: 600;
  transition: background 0.3s, transform 0.2s;
  cursor: pointer;
}

.btn-add:hover {
  background-color: #276b29;
  transform: scale(1.05);
}

/* Responsive */
@media (max-width: 992px) {
  .product-card {
    margin-bottom: 20px;
  }
}

@media (max-width: 576px) {
  .product-img {
    height: 180px;
  }
}
/* Featured Offer Banner */
.offer-banner {
  background: linear-gradient(90deg, #2a5d33, #3c8a4a); /* premium green gradient */
  color: white;
  font-weight: 600;
  font-size: 1.1rem;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: transform 0.3s;
}

.offer-banner:hover {
  transform: scale(1.02);
}

/* Customer Reviews */
.customer-reviews h5 {
  font-weight: 700;
  color: #87b890; /* matches header theme */
  margin-bottom: 15px;
}

.review-cards .review-card {
  width: 250px;
  background: #e1d4c2;
  border-radius: 15px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.08);
  transition: transform 0.3s, box-shadow 0.3s;
}

.review-cards .review-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

.review-card p:first-child {
  font-size: 1.1rem;
  margin-bottom: 5px;
  
}
.review-card p{
  color: #398346;
}
/* Footer */
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
<body>
<header class="header">
  <a href="index.html" class="logo">
    <img src="../images/logo2-removebg-preview.png" alt="Leafora Logo">
  </a>

  <nav class="main-menu">
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

  <div class="header-icons">
   <a href="#" onclick="openSearch()"><i class="bi bi-search"></i></a>
    <a href="contact.php"><i class="bi bi-person"></i></a>
     <a href="javascript:void(0);" onclick="openCart()" class="cart-wrapper">
  <i class="bi bi-cart fs-4"></i>

<?php
include("db.php");
global $conn;
$count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM cart");
$count_data = mysqli_fetch_assoc($count_query);
?>

<span id="cart-count">
    <?= $count_data['total']; ?>
</span>
</a></i>
<?php include("navbar.php"); ?>
  </div>
</header>
<!-- header complete -->

<!-- Indoor Plants Dropdown Page -->
<div class="container my-5">

  <!-- Page Banner -->
 <div class="page-banner text-center py-5 rounded" 
     style="background: url(../images/slide.jpg) no-repeat center center; 
            background-size: cover;
            color: white;
            position: relative;">
  <!-- Optional overlay for better text readability -->
  <div style="position:absolute; top:0; left:0; width:100%; height:100%; background-color: rgba(0,0,0,0.4); border-radius: 8px;"></div>

  <!-- Text content -->
  <div style="position: relative; z-index: 1;">
    <h1 class="fw-bold">Indoor Plants</h1>
    <p>Fresh plants to brighten your home</p>
  </div>
</div>
<!-- filter -->

<?php include("filter_bar.php"); ?>
<?php
include("filter_query.php");
$result = getFilteredProducts($conn, 'indoor');
?>
<!--  -->
<div class="product-section container my-5">
  <div class="row g-4">
    <?php
    if(mysqli_num_rows($result) == 0) {
      echo "<p style='color:#aaa; text-align:center;'>NO PRODUCT FOUND!</p>";
    }

    while($row = mysqli_fetch_assoc($result)) {
      $save = $row['old_price'] - $row['price'];
      $discount = round(($save / $row['old_price']) * 100);
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="product-card">
        <div class="badge-offer"><?= $discount ?>% OFF</div>
        <div class="product-img">
          <img src="../images/products/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
        </div>
        <div class="product-info">
          <h5><?= $row['name'] ?></h5>
          <p class="price">
            ₹<?= $row['price'] ?>
            <del style="color:#999; font-size:12px;">₹<?= $row['old_price'] ?></del>
          </p>
          <span style="color:#da3636; font-size:12px; display:block; margin-bottom:8px;">
            Save ₹<?= $save ?>
          </span>
          <button class="btn-add add-to-cart"
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
<!-- Featured Offer Banner -->
<div class="offer-banner text-center my-4 p-3 rounded">
  🌱 Buy 2 Get 1 Free on All Small Indoor Plants! Limited Time Offer 🌱
</div>

<!-- Customer Reviews Section -->
<div class="customer-reviews my-5 text-center">
  <h5>What Our Customers Say</h5>
  <div class="review-cards d-flex flex-wrap justify-content-center gap-3 mt-3">
    <div class="review-card p-3 rounded shadow-sm">
      <p>⭐⭐⭐⭐⭐</p>
      <p>“Love the plants! They arrived fresh and healthy.” – Ria S.</p>
    </div>
    <div class="review-card p-3 rounded shadow-sm">
      <p>⭐⭐⭐⭐⭐</p>
      <p>“Excellent quality and fast delivery. Highly recommend!” – Arjun P.</p>
    </div>
    <div class="review-card p-3 rounded shadow-sm">
      <p>⭐⭐⭐⭐⭐</p>
      <p>“Beautiful indoor plants. My room feels so fresh now.” – Meera K.</p>
    </div>
  </div>
</div>

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
  function openSearch() {
  document.getElementById("searchBox").style.display = "flex";
}

function closeSearch() {
  document.getElementById("searchBox").style.display = "none";
  document.getElementById("searchInput").value = "";
  document.querySelectorAll(".product-card").forEach(card => {
    card.closest("[class*='col-']").style.display = "";
  });
}

function searchProduct() {
  let input = document.getElementById("searchInput").value.toLowerCase().trim();

  if (input === "") {
    closeSearch();
    return;
  }

  document.querySelectorAll(".product-card").forEach(card => {
    let name = card.querySelector("h5").innerText.toLowerCase();
    let col = card.closest("[class*='col-']");
    col.style.display = name.includes(input) ? "" : "none";
  });

  closeSearch();
  document.querySelector(".product-section").scrollIntoView({ behavior: "smooth" });
}
</script>
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
            document.getElementById("cart-count").innerText = count;
        });
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
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<!-- search -->
    <div id="searchBox" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); display:none; justify-content:center; align-items:center; z-index:9999;">
  <div style="background:white; padding:30px; border-radius:10px; width:300px;">
    <input type="text" id="searchInput" placeholder="Search plants..." class="form-control mb-3">
    <button onclick="searchProduct()" class="btn btn-success w-100">Search</button>
  </div>
</div>
<div id="cartPanel" class="panel">
  <span class="close-btn" onclick="closeCart()">✖</span>
  <h3>Your Cart</h3>
  <div id="cartItems"></div>
</div>
</body>

</html>