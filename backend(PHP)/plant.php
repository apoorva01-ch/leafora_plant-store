<?php session_start(); ?>
<?php include("secure.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LEAFORA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="logo2-removebg-preview.png">

  <style>

  #toast {
  transform: translateY(20px);
}

#toast.show {
  opacity: 1;
  transform: translateY(0);
}
  .why .small img {
    margin: 0 auto 10px auto;
    display: block;
  }

  .why .head4 {
    margin-top: 10px;
    font-size: 18px;
  }

  .why .p {
    font-size: 14px;
    margin-top: 5px;
  }

  .why .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
  }

  .why .small {
    width: 260px;
    background: #e1d4c2;
    padding: 25px;
    border-radius: 10px;
    text-align: center;
  }

  @media (max-width:992px) {
    .why .small {
      width: 45%;
    }
  }


  @media (max-width:600px) {
    .why .small {
      width: 90%;
    }
  }

  .header {
    background-image: url(../images/bg2.jpg);
    min-height: 100vh;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;


  }

  html {
    scroll-behavior: smooth;
  }

  .overlay {
    position: absolute;
    inset: 0;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(9, 9, 9, 0.779);
    /* change 0.5 for more/less darkness */
    z-index: 1;
  }

  .imglogo {
    margin-top: -50px;
  }

  .hcontent {
    display: flex;
    flex-direction: column;
    /* min-height: 100vh; */
    position: relative;
    z-index: 2;
    

  }

  .wrapper {
     flex: 1;
   display: flex; 
   align-items: center;
    justify-content: center;
     text-align: center; 
     padding: 20px;
      position: relative; 
      z-index: 2; 
      padding-top: 120px; 
    }
  .text {
  font-size: clamp(28px, 5vw, 60px);
  font-family: Fang-song;
  color: #aaa6a6;
  opacity: 0;
  transform: translateY(40px);
  animation: hernandezSlide 1.1s ease-out forwards;
  margin: 0;
}

 @keyframes hernandezSlide {
  0% {
    opacity: 0;
    transform: translateY(40px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

  .highlight {
    color: #90ee90;
  }

  .category-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    transition: 0.3s ease;
  }

  .category-img:hover {
    transform: scale(1.05);
  }

  .category-link {
    text-decoration: none;
    color: whitesmoke;
    font-weight: 500;
  }

  .category-link:hover {
    color: #9dd4a7;
  }

  .selling {
    text-align: center;
    background-color: #345c3c;
    color: white;
    font-size: clamp(28px, 5vw, 60px);
    font-family: Fang-song;
    padding: 20px;
    border-radius: 20px;
    margin: auto;
    width: fit-content;
  font-weight: bold;
  color: whitesmoke;
  letter-spacing: 2px;
  }

  .bt1 {
  width: 100%;
  padding: 10px;
  border: none;
  background: linear-gradient(135deg, #345c3c, #307649);
  color: white;
  border-radius: 8px;
  cursor: pointer;
  margin-top: 10px;
  transition: 0.3s;
  font-weight: 600;
}

.bt1:hover {
  background: linear-gradient(135deg, #da3636, #ff4d4d);
}

  .badge-offer {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #da3636;
    ;
    color: #fff;
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    border-radius: 4px;
  }

  .top {
    background-color: #e1d4c2;
  padding: 4% 2%;
  }

  .bt2 {
    border-radius: 15px;
    background-color: #307649;
    color: white;
    font-weight: bold;
    height: 42px;
    margin-top: 40px;
    border: 2px solid #307649;
  }

  .bt1:hover {
    background-color: #da3636;
    font-size: 20px;
    border: #da3636;
  }

  .bt2:hover {
    background-color: #da3636;
    font-size: 20px;
    border: #da3636;
  }

  .why h1 {
    text-align: center;
    color: white;
    font-size: 60px;
    font-family: Fang-song;
    padding-top: 89px;
    text-shadow: 4px 4px rgb(39, 38, 38);
    margin-top: -66px;

  }

  .small {

    border-radius: 20px;
    text-align: center;
    width: 329px;
    height: 184px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, .5);
    background-color: #e1d4c2;
  }

  .p {
    margin-top: 10px;
  }

  .head4 {
    color: #a04f2c;
    margin-top: 14px;
  }

  .firstcard {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 25px;
  margin-top: 40px;
  padding: 0 20px;
  align-items: start; /* CARDS DON'T STRETCH TO EQUAL HEIGHT */
}

@media (max-width: 992px) {
  .firstcard { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 576px) {
  .firstcard {
    grid-template-columns: repeat(2, 1fr) !important;
    gap: 10px !important;
    padding: 0 8px !important;
  }
  .img-wrapper { height: 130px !important; }
  .content { padding: 8px !important; gap: 3px !important; }
  .content h5 { font-size: 12px !important; }
  .content p { font-size: 11px !important; }
  .add-to-cart, .view-btn {
    font-size: 11px !important;
    padding: 6px 4px !important;
  }
  .save { font-size: 10px !important; }
  .ratings svg { width: 12px !important; height: 12px !important; }
}


 .card {
  width: 100%;
  max-width: 300px;
  background: #fff;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(0,0,0,0.1);
  transition: box-shadow 0.3s ease, transform 0.3s ease;
  display: flex;
  flex-direction: column;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}
  

  .pimage {
   
  width:100%;
  height:200px;
  object-fit:contain;
  display:block;
}
  


  .badge-offer {
    position: absolute;
    top: 10px;
    left: 10px;
    color: white;
    font-size: 12px;
  background: #307649;
  color: #fff;
  padding: 5px 10px;
  font-size: 12px;
  border-radius: 6px;
  }

  .content {
   padding:14px;
  display:flex;
  flex-direction:column;
  gap:4px;
}
.content h5 {
  font-size: 15px;
  color: #307649;
  margin-bottom: 5px;
   display: -webkit-box;
  
  -webkit-box-orient: vertical;
  overflow: hidden;
}


.content p {
  font-weight: bold;
  color: #173923;
   margin-bottom: 5px;
   font-size: 14px;
}

.content del {
  color: #999;
  margin-left: 8px;
}


  .bt1,
  .bt2 {
    width: 100%;
    padding: 10px;
    border: none;
    background: #345c3c;
    color: white;
    border-radius: 8px;
    cursor: pointer;
    margin-left: 0;
    margin-top: 10px;
    transition: 0.3s;
  }


  @media (max-width:992px) {
    .card {
      width: 45%;
    }
  }


  @media (max-width:576px) {
    .card {
      width: 90%;
    }

    .firstcard {
      gap: 20px !important;
    }

  }

  footer .row {
    flex-wrap: wrap;
  }

  footer .col-md-4,
  footer .col-md-2 {
    margin-left: 0 !important;
    margin-top: 30px !important;
    text-align: left;
  }
  .save {
  display: block;
  font-size: 12px;
  color: #da3636;
}


  footer img {
    max-width: 100%;
    height: auto;
  }


  footer hr {
    width: 100% !important;
    margin-left: 0 !important;
  }


  footer img[height="200px"] {
    margin-left: 0 !important;
    margin-top: 20px !important;
    display: block;
  }


  footer p {
    margin-left: 0 !important;
  }


  footer svg[style*="-271%"] {
    margin-left: 0 !important;
  }


  @media (max-width:768px) {

    footer .row {
      text-align: center;
    }

    footer .col-md-4,
    footer .col-md-2 {
      width: 100%;
    }

    footer form {
      justify-content: center;
    }

  }
  .ratings {
 display: flex;
gap: 4px;
color: gold;
}
.img-wrapper{
  width:100%;
  height:170px;
  overflow:hidden;
  border-bottom:1px solid #eee;
}


.img-wrapper img{
  width:100%;
  height:100%;
  object-fit:cover;
  object-position:center;
  transition:0.3s;
}

.card:hover img {
  transform: scale(1.1);
}
.actions {
  position: absolute;
  top: 10px;
  right: 10px;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.actions i {
  background: white;
  padding: 6px;
  border-radius: 50%;
  cursor: pointer;
  transition: 0.3s;
}

.actions i:hover {
  background: #307649;
  color: white;
}
.view-btn{
  width:100%;
  padding:8px;
  border:2px solid #345c3c;
  background:transparent;
  color:#345c3c;
  border-radius:8px;
  margin-top:6px;
  transition:0.3s;
  font-weight:600;
}

.view-btn:hover{
  background:#345c3c;
  color:white;
}
.panel{
position:fixed;
top:0;
right:-110vw;
width:min(350px, 100vw);
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
#offerPopup{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.6);
display:none;
align-items:center;
justify-content:center;
z-index:9999;
font-family:Arial, sans-serif;
}

.popup-box{
width:min(450px, 92vw);
background:white;
padding:35px;
border-radius:15px;
text-align:center;
box-shadow:0 20px 40px rgba(0,0,0,0.3);
position:relative;
animation:popupFade 0.5s ease;
}

.popup-box h2{
color:#2f5d44;
margin-bottom:10px;
font-size:26px;
}

.popup-box p{
font-size:16px;
color:#555;
margin-bottom:20px;
}

.popup-btn{
background:#2f5d44;
color:white;
border:none;
padding:12px 30px;
font-size:16px;
border-radius:8px;
cursor:pointer;
transition:0.3s;
}

.popup-btn:hover{
background:#244734;
}

.close{
position:absolute;
top:12px;
right:15px;
font-size:20px;
cursor:pointer;
color:#888;
}

.close:hover{
color:black;
}

@keyframes popupFade{
from{
transform:scale(0.8);
opacity:0;
}
to{
transform:scale(1);
opacity:1;
}
}
.category-card{
background:#3f634b;
border-radius:16px;
padding:22px;
text-align:center;
transition:0.3s;
cursor:pointer;
border:1px solid rgba(0,0,0,0.05);
color: white;
box-shadow:0 8px 25px rgb(0, 0, 0);
}

.category-card:hover{
transform:translateY(-8px);
box-shadow:0 18px 40px rgba(0,0,0,0.2);
background:#2f4f3a;
}

.category-card img{
width:110px;
height:110px;
border-radius:50%;
object-fit:cover;
padding:6px;
background:#9dd4a7;
margin-bottom:10px;
transition:0.3s;
}

.category-card:hover img{
transform:scale(1.08);
}

.category-card p{
font-weight:600;
color:#9dd4a7;
font-size:16px;
margin-top:6px;
letter-spacing:0.5px;
}

.category-arrow{
display:inline-block;
margin-top:8px;
color:#9dd4a7;
font-size:18px;
transition:0.3s;
}

.category-card:hover .category-arrow{
transform:translateX(5px);
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
/* ===== MOBILE RESPONSIVE FIXES ===== */

/* Navbar logo smaller on mobile */
@media (max-width: 576px) {
  header img[style*="180px"] {
    width: 130px !important;
  }
}

/* Hero text padding fix on mobile */
@media (max-width: 576px) {
  .wrapper {
    padding-top: 80px !important;
    padding-bottom: 40px !important;
  }
  .text {
    font-size: clamp(22px, 7vw, 40px) !important;
  }
}

/* Category section text */
@media (max-width: 576px) {
  .shopbycategory h1 {
    font-size: 26px;
  }
  .category-card img {
    width: 80px;
    height: 80px;
  }
  .category-card {
    padding: 14px;
  }
  .category-card p {
    font-size: 13px;
  }
}

/* Selling heading responsive */
@media (max-width: 576px) {
  .selling {
    font-size: 22px !important;
    letter-spacing: 1px;
    padding: 14px 18px;
  }
}

/* Card grid mobile */
@media (max-width: 576px) {
  .firstcard {
    grid-template-columns: repeat(2, 1fr) !important;
    gap: 12px !important;
    padding: 0 10px !important;
  }
  .card {
    max-width: 100% !important;
  }
  .content h5 {
    font-size: 13px;
  }
  .content p {
    font-size: 12px;
  }
  .add-to-cart, .view-btn {
    font-size: 12px;
    padding: 7px;
  }
}

/* Cart / Product Panel full screen on very small phones */
@media (max-width: 400px) {
  .panel {
    width: 100vw !important;
  }
}

/* Toast position fix on mobile */
@media (max-width: 576px) {
  #toast {
    bottom: 70px;
    right: 10px;
    left: 10px;
    text-align: center;
  }
}

/* Footer responsive */
@media (max-width: 576px) {
  footer .col-lg-4,
  footer .col-lg-2 {
    text-align: center;
  }
  footer form {
    flex-direction: column;
    gap: 8px;
  }
  footer form .btn {
    width: 100%;
  }
  footer input {
    width: 100%;
  }
}

/* Why section cards full width on mobile */
@media (max-width: 576px) {
  .why h1 {
    font-size: 30px !important;
  }
}
</style>
</head>


<body>
  <header class="header">
    <div class="overlay"></div>
    <div class="hcontent">
      <div class="container-fluid position-relative z-2">

        <div class="d-flex justify-content-between align-items-center pt-3">

          <!-- Logo -->
          <img src="../images/logo2-removebg-preview.png" class="img-fluid" style="width:180px;">

          <!-- Toggle button (only mobile) -->
        <button id="hamburgerBtn" class="d-md-none"
  onclick="toggleHamburger()"
  style="background:none;border:1px solid white;color:white;padding:5px 12px;border-radius:6px;font-size:20px;cursor:pointer;">
  ☰
</button>
          <!-- Desktop Menu -->
          <div class="d-none d-md-flex gap-4 align-items-center">

            <!-- PLANTS -->
            <div class="dropdown">
              <button class="btn text-white dropdown-toggle" data-bs-toggle="dropdown">PLANTS</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="indoorplant.php">Indoor Plants</a></li>
                <li><a class="dropdown-item" href="outdoorplant.php">Outdoor Plants</a></li>
              </ul>
            </div>

            <!-- SEEDS -->
            <div class="dropdown">
              <button class="btn text-white dropdown-toggle" data-bs-toggle="dropdown">SEEDS</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="flowerseed.php">Flower Seeds</a></li>
                <li><a class="dropdown-item" href="vegetableseed.php">Vegetable Seeds</a></li>
              </ul>
            </div>

            <!-- DECOR -->
            <div class="dropdown">
              <button class="btn text-white dropdown-toggle" data-bs-toggle="dropdown">GARDEN DECOR</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="bird.php">Bird Houses</a></li>
                <li><a class="dropdown-item" href="garden.php">Garden Tools</a></li>
              </ul>
            </div>

            <!-- Icons -->
            <a onclick="openSearch()" style="color:white; cursor:pointer; text-decoration:none; display:flex; flex-direction:column; align-items:center;">
    <i class="bi bi-search fs-4"></i>
    <span style="font-size:10px; margin-top:2px;">Search</span>
  </a>

             <a href="contact.php" style="color:white; text-decoration:none; display:flex; flex-direction:column; align-items:center;">
    <i class="bi bi-person fs-4"></i>
    <span style="font-size:10px; margin-top:2px;">Profile</span>
  </a>

 <?php
include("db.php");
global $conn;
$count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM cart");
$count_data = mysqli_fetch_assoc($count_query);
?>

<a href="javascript:void(0);" onclick="openCart()" class="cart-wrapper" style="text-decoration:none; display:flex; flex-direction:column; align-items:center;">
  <i class="bi bi-cart fs-4" style="color:white;"></i>
  <span style="font-size:10px; color:white; margin-top:2px;">Cart</span>
  <span id="cart-count"><?= $count_data['total']; ?></span>
</a>
<!-- LOGIN -->
<?php include("navbar.php"); ?>
    </div>

</nav>
            </div>

          </div>
        </div>

        <!-- Mobile Menu -->
        <!-- Mobile Menu -->
<!-- Mobile Menu -->
<div id="mainMenu" style="display:none; background:#1d3124; padding:15px; border-radius:10px; margin-top:10px; position:relative; z-index:100;">
  <!-- Plants -->
  <div style="border-bottom:1px solid #345c3c; margin-bottom:5px;">
    <button id="btn-plants"
     onclick="toggleMobileMenu('sub-plants', this)"
      style="background:none;border:none;color:white;font-weight:bold;width:100%;text-align:left;padding:10px 0;font-size:15px;cursor:pointer;">
      🌿 PLANTS <span id="arr-plants" style="float:right;">▼</span>
    </button>
    <div id="sub-plants" style="display:none; padding:5px 0 10px 15px;">
      <a href="indoorplant.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Indoor Plants</a>
      <a href="outdoorplant.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Outdoor Plants</a>
    </div>
  </div>

  <!-- Seeds -->
  <div style="border-bottom:1px solid #345c3c; margin-bottom:5px;">
    <button id="btn-seeds"
     onclick="toggleMobileMenu('sub-seeds', this)"
      style="background:none;border:none;color:white;font-weight:bold;width:100%;text-align:left;padding:10px 0;font-size:15px;cursor:pointer;">
      🌱 SEEDS <span id="arr-seeds" style="float:right;">▼</span>
    </button>
    <div id="sub-seeds" style="display:none; padding:5px 0 10px 15px;">
      <a href="flowerseed.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Flower Seeds</a>
      <a href="vegetableseed.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Vegetable Seeds</a>
    </div>
  </div>

  <!-- Decor -->
  <div style="border-bottom:1px solid #345c3c; margin-bottom:5px;">
    <button id="btn-decor"
     onclick="toggleMobileMenu('sub-decor', this)"
      style="background:none;border:none;color:white;font-weight:bold;width:100%;text-align:left;padding:10px 0;font-size:15px;cursor:pointer;">
      🏡 GARDEN DECOR <span id="arr-decor" style="float:right;">▼</span>
    </button>
    <div id="sub-decor" style="display:none; padding:5px 0 10px 15px;">
      <a href="bird.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Bird Houses</a>
      <a href="garden.php" style="display:block;color:#9dd4a7;padding:5px 0;text-decoration:none;">Garden Tools</a>
    </div>
  </div>

  <!-- Icons -->
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

  <a href="orders.php"
    style="color:white;text-decoration:none;font-size:13px;display:flex;align-items:center;gap:4px;">
    <i class="bi bi-clock-history"></i> Orders
  </a>

  <a href="logout.php"
    style="color:#ff6b6b;text-decoration:none;font-size:13px;font-weight:bold;display:flex;align-items:center;gap:4px;">
    <i class="bi bi-box-arrow-right"></i> Logout
  </a>

</div>
</div>
        <div class="wrapper">
          <h1 class="text display-4 fw-bold">
            GROW YOUR WORLD <br>
            <span class="highlight">WITH OUR </span> <br> PLANTS!!!
          </h1>

        </div>
      </div>
  </header>
  <!-- cards -->
  <img src="../images/Group_1000011142_1.webp" style="width: 100%;background-color:#1d3124 ;padding: 2%;">
  </div>
  <!--  -->
  <div class="shopbycategory py-5" style="background: linear-gradient(180deg, #1d3124, #345c3c);">

    <div class="container text-center">

      <h1 class="text-white fw-bold mb-3">
Shop By Category
</h1>

<p style="color:#9dd4a7;">
Find the perfect plants, seeds & garden decor
</p>          
      <hr class="mx-auto mb-5" style="width:50%; height:4px; background:#9dd4a7; border:none;">

      <div class="row g-4 justify-content-center">

        <!-- Category Item -->
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
  <a href="indoorplant.php" class="text-decoration-none text-dark">
    <div class="category-card">
      <img src="../images/indoorplants.jpg" class="category-img">
      <p>Indoor Plants</p>
      <span class="category-arrow">
        <i class="bi bi-arrow-right"></i>
      </span>
    </div>
  </a>
</div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
    <a href="outdoorplant.php" class="text-decoration-none text-dark">
      <div class="category-card">
        <img src="../images/outdoorplants.jpg" class="category-img">
        <p>Outdoor Plants</p>
        <span class="category-arrow">
          <i class="bi bi-arrow-right"></i>
        </span>
      </div>
    </a>
  </div>

       <div class="col-6 col-sm-4 col-md-3 col-lg-2">
    <a href="vegetableseed.php" class="text-decoration-none text-dark">
      <div class="category-card">
        <img src="../images/vegetable seed.jpg" class="category-img">
        <p>Vegetable Seeds</p>
        <span class="category-arrow">
          <i class="bi bi-arrow-right"></i>
        </span>
      </div>
    </a>
  </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
    <a href="flowerseed.php" class="text-decoration-none text-dark">
      <div class="category-card">
        <img src="../images/flower seed.jpg" class="category-img">
        <p>Flower Seeds</p>
        <span class="category-arrow">
          <i class="bi bi-arrow-right"></i>
        </span>
      </div>
    </a>
  </div>

       <div class="col-6 col-sm-4 col-md-3 col-lg-2">
    <a href="bird.php" class="text-decoration-none text-dark">
      <div class="category-card">
        <img src="../images/bird houses.jpg" class="category-img">
        <p>Bird Houses</p>
        <span class="category-arrow">
          <i class="bi bi-arrow-right"></i>
        </span>
      </div>
    </a>
  </div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2">
    <a href="garden.php" class="text-decoration-none text-dark">
      <div class="category-card">
        <img src="../images/garden tools.jpg" class="category-img">
        <p>Garden Tools</p>
        <span class="category-arrow">
          <i class="bi bi-arrow-right"></i>
        </span>
      </div>
    </a>
  </div>


      </div>
    </div>
  </div>
  <?php
// wishlist
$user_id = $_SESSION['user_id'];
$wishlist_result = mysqli_query($conn, "SELECT product_id FROM wishlist WHERE user_id='$user_id'");
$wishlist_ids = [];
while($w = mysqli_fetch_assoc($wishlist_result)) {
  $wishlist_ids[] = $w['product_id'];
}
?>
<?php include("filter_bar.php"); 
include("filter_query.php");
$result = getFilteredProducts($conn, '', true);
?>

<!-- top selling products -->
<div style="background-color: #345c3c;padding: 2%;">
  <div class="top" ...>
    <h2 class="selling">TOP SELLING PRODUCTS</h2>
    <div class="firstcard">
      <?php
      // SIRF YAHAN SE SHURU KARO - koi naya query mat likho
      while($row = mysqli_fetch_assoc($result)) {
        $save = $row['old_price'] - $row['price'];
        
        $discount = round(($save / $row['old_price']) * 100);
        $stars = "";
        for($i = 1; $i <= 5; $i++) {
          $stars .= $i <= $row['rating']
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ccc" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';
        }
      ?>
      <div class="card">
  <div class="img-wrapper">
    <img src="../images/products/<?= $row['image'] ?>" class="pimage">
  </div>
  <div class="badge-offer"><?= $discount ?>% OFF</div>
  <div class="actions">
    <?php $is_wishlisted = in_array($row['id'], $wishlist_ids); ?>
    <i class="bi <?= $is_wishlisted ? 'bi-heart-fill' : 'bi-heart' ?> heart-icon"
       data-id="<?= $row['id'] ?>"
       style="color: <?= $is_wishlisted ? 'red' : 'black' ?>;">
    </i>
    <i class="bi bi-eye view-icon"></i>
  </div>
  <div class="content">
    <h5><?= $row['name'] ?></h5>
    <p>₹<?= $row['price'] ?> <del>₹<?= $row['old_price'] ?></del></p>
    <span class="save">Save ₹<?= $save ?></span>
    <div class="ratings"><?= $stars ?></div>
    <button class="add-to-cart"
      data-name="<?= $row['name'] ?>"
      data-price="<?= $row['price'] ?>">Add to Cart</button>
    <button class="view-btn"
      data-name="<?= $row['name'] ?>"
      data-price="<?= $row['price'] ?>"
      data-img="../images/products/<?= $row['image'] ?>">View More</button>
  </div>
</div>
      <?php } ?>
    </div>
  </div>
</div>
  <!-- why choose -->
  <div class="why" style="background-color:#345c3c; padding:2%;">
    <h1 style="text-align:center; color:white;">WHY CHOOSE LEAFORA?</h1>

    <div class="container mt-5">
      <div class="row g-4 justify-content-center">

        <!-- 1 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="small text-center">
            <img src="../images/self watering plants.svg">
            <h4 class="head4">Self Watering Planters</h4>
            <p class="p">Designed for ease and elegance.</p>
          </div>
        </div>

        <!-- 2 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="small text-center">
            <img src="../images/aesthic desgin.svg">
            <h4 class="head4">Aesthetic Designs</h4>
            <p class="p">Stylish planters to match modern interiors.</p>
          </div>
        </div>

        <!-- 3 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="small text-center">
            <img src="../images/innovative plant care.svg">
            <h4 class="head4">Innovative Plant Care</h4>
            <p class="p">Let your customers know about local pickup</p>
          </div>
        </div>

        <!-- 4 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="small text-center">
            <img src="../images/healthy plants.svg">
            <h4 class="head4">Healthy Plants</h4>
            <p class="p">Handpicked and nurtured for 3 months.</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <footer style="background-color:#345c3c; padding:2%;">
    <div style="background-color:#1d3124; padding:40px 20px;">

      <div class="container">
        <div class="row text-white">

          <!-- logo -->
          <div class="col-lg-4 col-md-6 mb-4">
            <img src="../images/logo2-removebg-preview.png" style="width:220px;">
            <p style="color:rgb(196,192,192); font-weight:bold; margin-top:10px;">
              We deliver healthy plants <br> with proper care guidance
            </p>
          </div>

          <!-- quick links -->
          <div class="col-lg-2 col-md-6 mb-4">
            <p style="font-size:22px; font-weight:bold; color:rgb(196,192,192);">QUICK LINKS</p>
            <p><a href="#" style="text-decoration:none; color:white;">HOME</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">SHOP</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">CATEGORIES</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">BLOG</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">CONTACT</a></p>
          </div>

          <!-- customer service -->
          <div class="col-lg-2 col-md-6 mb-4">
            <p style="font-size:22px; font-weight:bold; color:rgb(196,192,192);">CUSTOMER SERVICE</p>
            <p><a href="#" style="text-decoration:none; color:white;">HELP CENTER</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">FAQs</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">TRACK ORDER</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">RETURN & REFUND</a></p>
          </div>

          <!-- policies -->
          <div class="col-lg-2 col-md-6 mb-4">
            <p style="font-size:22px; font-weight:bold; color:rgb(196,192,192);">OUR POLICIES</p>
            <p><a href="#" style="text-decoration:none; color:white;">PRIVACY POLICY</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">TERMS & CONDITIONS</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">SHIPPING POLICY</a></p>
            <p><a href="#" style="text-decoration:none; color:white;">CANCELLATION POLICY</a></p>
          </div>

          <!-- contact -->
          <div class="col-lg-2 col-md-6 mb-4">
            <p style="font-size:22px; font-weight:bold; color:rgb(196,192,192);">CONTACT US</p>

            <p style="color:white;">support@Leafora.com</p>
            <p style="color:white;">+91 9876543210</p>
            <p style="color:white;">Mumbai, India</p>

            <hr style="background:white; height:2px;">

            <p>Get plant care tips & exclusive offers</p>

            <form class="d-flex">
              <input class="form-control me-2" type="email" placeholder="Enter your email">
              <button class="btn btn-outline-success">Subscribe</button>
            </form>

            <div style="margin-top:15px;">
              <svg width="20" height="20" fill="white" class="bi bi-instagram"></svg>
              <svg width="20" height="20" fill="white" class="bi bi-youtube"></svg>
              <svg width="20" height="20" fill="white" class="bi bi-pinterest"></svg>
              <svg width="20" height="20" fill="white" class="bi bi-twitter"></svg>
            </div>

          </div>

        </div>

        <hr style="background:white; height:2px; margin-top:30px;">

        <div class="text-center">
          <img src="../images/WhatsApp_Image_2026-01-13_at_12.05.17_PM-removebg-preview.png" height="120">

          <p style="color:rgb(160,153,153); font-weight:bold;">
            Secure Payments | Pan India Delivery | Fresh & Healthy Plants Guaranteed
          </p>

          <p style="color:rgb(160,153,153);">
            © 2026 Leafora. All rights reserved
          </p>

        </div>

      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"></script>

<script>

function openCart(){
  document.getElementById("cartPanel").classList.add("open");
  loadCart(); // important
}

function closeCart(){
  document.getElementById("cartPanel").classList.remove("open");
}

</script> 

</script>
<div id="toast" style="
  position: fixed;
  bottom: 20px;
  right: 20px;
  background: #307649;
  color: white;
  padding: 12px 20px;
  border-radius: 8px;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.4s ease;
  z-index: 9999;
">

  Added to cart
</div>
<!-- Slide Product Panel -->
<div id="productPanel" class="panel">

  <span class="close-btn" onclick="closePanel()">✖</span>

  <img id="panelImg" src="" class="panel-img">

  <h3 id="panelTitle"></h3>

  <p id="panelPrice"></p>

  <p>
  Beautiful decorative plant perfect for indoor & outdoor spaces.
  Easy to maintain and improves home aesthetics.
  </p>

  <button class="bt1" id="panelAddToCart">Add to Cart</button>

</div>
<script>
document.querySelectorAll(".view-btn").forEach(btn => {

  btn.addEventListener("click", function(){

    let name = this.getAttribute("data-name");
    let price = this.getAttribute("data-price");
    let img = this.getAttribute("data-img");

    document.getElementById("panelTitle").innerText = name;
    document.getElementById("panelPrice").innerText = price;
    document.getElementById("panelImg").src = img;

    let panelBtn = document.getElementById("panelAddToCart");
    panelBtn.setAttribute("data-name", name);
    panelBtn.setAttribute("data-price", price.replace("₹",""));

    document.getElementById("productPanel").classList.add("open");

  });

});

function closePanel(){
document.getElementById("productPanel").classList.remove("open");
}

document.getElementById("panelAddToCart").addEventListener("click", function(){

  let name = this.getAttribute("data-name");
  let price = this.getAttribute("data-price");

  fetch("add_to_cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: `product_name=${encodeURIComponent(name)}&product_price=${encodeURIComponent(price)}`
  })
  .then(res => res.text())
  .then(data => {
    loadCart();
    updateCartCount();
    closePanel();  
    showToast();
  });

});
</script>


<div id="offerPopup" class="popup">

  <div class="popup-box">
    
    <span class="close" onclick="closePopup()">✖</span>

    <h2>🌿 Welcome to Leafora</h2>

    <p>Get <b>10% OFF</b> on your first plant purchase</p>

    <button onclick="closePopup()" class="popup-btn">Shop Now</button>
  </div>

</div>
<script>

setTimeout(function(){

document.getElementById("offerPopup").style.display="flex";

},3000);

function closePopup(){
document.getElementById("offerPopup").style.display="none";
}
function closePopup(){
document.getElementById("offerPopup").style.display="none";
}

// search
function searchProduct() {
  let input = document.getElementById("searchInput").value.toLowerCase().trim();
  let cards = document.querySelectorAll(".firstcard .card");

  if (input === "") {
    cards.forEach(card => card.style.display = "");
    document.querySelector(".firstcard").scrollIntoView({ behavior: "smooth" });
    closeSearch();
    return;
  }

  cards.forEach(card => {
    let text = card.innerText.toLowerCase();
    let words = input.split(" ");
    let match = words.every(word => text.includes(word));
    card.style.display = match ? "" : "none";
  });

  document.querySelector(".firstcard").scrollIntoView({ behavior: "smooth" });
  closeSearch();
}
function openSearch(){
  document.getElementById("searchBox").style.display = "flex";
}

function closeSearch() {
  document.getElementById("searchBox").style.display = "none";
  document.getElementById("searchInput").value = "";
  document.querySelectorAll(".firstcard .card").forEach(card => card.style.display = "");
}
// profile

</script>
<!-- search -->
 <div id="searchBox" style="
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.7);
display:none;
justify-content:center;
align-items:center;
z-index:9999;
">

<div style="background:white; padding:25px; border-radius:10px; width:min(320px, 90vw);">
 <input 
  type="text" 
  id="searchInput" 
  placeholder="Search plants..." 
  class="form-control mb-3"
>
<button onclick="searchProduct(); closeSearch()" class="btn btn-success w-100">
  Search
</button>
</div>

</div>
<!-- view icon -->
 <script>
 document.querySelectorAll(".view-icon").forEach((icon, index) => {
  icon.addEventListener("click", function () {

    let card = this.closest(".card");

    let name = card.querySelector(".view-btn").getAttribute("data-name");
    let price = card.querySelector(".view-btn").getAttribute("data-price");
    let img = card.querySelector(".view-btn").getAttribute("data-img");

    document.getElementById("panelTitle").innerText = name;
    document.getElementById("panelPrice").innerText = price;
    document.getElementById("panelImg").src = img;

    // panel add to cart button ke liye bhi set karo
    let panelBtn = document.getElementById("panelAddToCart");
    panelBtn.setAttribute("data-name", name);
    panelBtn.setAttribute("data-price", price.replace("₹",""));

    document.getElementById("productPanel").classList.add("open");
  });
});
</script>
<!-- heart icon -->
 <script>
// pehle wala heart script hatao aur yeh lagao
document.querySelectorAll(".heart-icon").forEach(icon => {
  icon.addEventListener("click", function() {
    let productId = this.getAttribute("data-id");
    let heartIcon = this;

    fetch("toggle_wishlist.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `product_id=${productId}`
    })
    .then(res => res.text())
    .then(data => {
      if(data.trim() == "added") {
        heartIcon.classList.remove("bi-heart");
        heartIcon.classList.add("bi-heart-fill");
        heartIcon.style.color = "red";
        showToast("❤️ Added to Wishlist!");
      } else {
        heartIcon.classList.remove("bi-heart-fill");
        heartIcon.classList.add("bi-heart");
        heartIcon.style.color = "black";
        showToast("💔 Removed from Wishlist!");
      }
    });
  });
});

 </script>

<!-- Cart Panel -->
<div id="cartPanel" class="panel">

  <span class="close-btn" onclick="closeCart()">✖</span>

  <h3>Your Cart</h3>

  <div id="cartItems"></div>

</div>
<script>
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("add-to-cart")) {

    let name = e.target.dataset.name;
    let price = e.target.dataset.price.replace("₹", "").trim();

    fetch("add_to_cart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: `product_name=${encodeURIComponent(name)}&product_price=${encodeURIComponent(price)}`
    })
    .then(res => res.text())
    .then(data => {
      console.log(data); // IMPORTANT for debugging
      loadCart();
      updateCartCount();
     showToast();
    })
    .catch(err => console.log("ERROR:", err));
  }
});
</script>
<script>
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
        })
        .catch(error => console.log("Remove Error:", error));
}
window.addEventListener("load", function () {
    loadCart();
     updateCartCount();
});

function updateCartCount() {
    fetch("cart_count.php")
        .then(res => res.text())
        .then(count => {
            let d = document.getElementById("cart-count");
            let m = document.getElementById("cart-count-mobile");
            if(d) d.innerText = count;
            if(m) m.innerText = count;
        });
}

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

function showToast(message = "✅ Item added to cart!") {
  let toast = document.getElementById("toast");
  toast.innerText = message;
  toast.style.opacity = "1";
  toast.style.transform = "translateY(0)";

  setTimeout(() => {
    toast.style.opacity = "0";
    toast.style.transform = "translateY(20px)";
  }, 2500);
}
</script>
<script>
// Hamburger toggle

function toggleHamburger() {
  var menu = document.getElementById("mainMenu");
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
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
</body>
</html>


</html>