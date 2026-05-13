<?php
session_start();
include("secure.php");
include("db.php");
global $conn;

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "
  SELECT p.*, w.id as wishlist_id, w.product_id as product_id
  FROM wishlist w 
  JOIN products p ON w.product_id = p.id 
  WHERE w.user_id = '$user_id'
");
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Wishlist - Leafora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; }
    body { background:#f4f6f4; font-family:'Segoe UI',sans-serif; }

    /* NAVBAR */
   .top-nav {
  background:#1d3124;
  padding:10px 30px;  /* 14px se 10px */
  display:flex;
  align-items:center;
  justify-content:space-between;
  position:sticky;
  top:0;
  z-index:99;
}

.top-nav img { width:100px; } /* 130px se 100px */
    .back-btn {
      color:#9dd4a7;
      text-decoration:none;
      font-size:14px;
      font-weight:500;
      display:flex;
      align-items:center;
      gap:6px;
      transition:0.3s;
    }

    .back-btn:hover { color:white; }

    /* PAGE HEADER */
    .page-header {
      background:linear-gradient(135deg,#1d3124,#345c3c);
      padding:30px;
      text-align:center;
    }

    .page-header h2 {
      color:white;
      font-size:26px;
      font-weight:700;
      margin:0;
    }

    .page-header p {
      color:rgba(255,255,255,0.5);
      font-size:13px;
      margin-top:5px;
    }

    /* CONTENT */
    .wishlist-container {
      max-width:1200px;
      margin:30px auto;
      padding:0 25px;
    }

    /* GRID */
    .wishlist-grid {
      display:grid;
      grid-template-columns:repeat(4,1fr);
      gap:20px;
    }

    @media(max-width:992px) { .wishlist-grid { grid-template-columns:repeat(2,1fr); } }
    @media(max-width:576px) { .wishlist-grid { grid-template-columns:repeat(1,1fr); } }

    /* CARD */
    .w-card {
      background:white;
      border-radius:16px;
      overflow:hidden;
      box-shadow:0 4px 15px rgba(0,0,0,0.07);
      transition:0.3s;
      position:relative;
    }

    .w-card:hover {
      transform:translateY(-5px);
      box-shadow:0 10px 25px rgba(0,0,0,0.12);
    }

    .w-card .img-wrap {
      width:100%;
      height:160px;
      overflow:hidden;
    }

    .w-card .img-wrap img {
      width:100%;
      height:100%;
      object-fit:cover;
      transition:0.3s;
    }

    .w-card:hover .img-wrap img { transform:scale(1.05); }

    .discount-badge {
      position:absolute;
      top:10px;
      left:10px;
      background:#307649;
      color:white;
      padding:4px 10px;
      border-radius:20px;
      font-size:11px;
      font-weight:600;
    }

    .w-card .info {
      padding:14px;
    }

    .w-card .info h5 {
      color:#1d3124;
      font-size:14px;
      font-weight:700;
      margin-bottom:6px;
      white-space:nowrap;
      overflow:hidden;
      text-overflow:ellipsis;
    }

    .w-card .info .price {
      font-size:15px;
      font-weight:700;
      color:#307649;
    }

    .w-card .info del {
      color:#aaa;
      font-size:12px;
      margin-left:5px;
    }

    .w-card .info .save {
      color:#da3636;
      font-size:11px;
      display:block;
      margin:4px 0 10px;
    }

    .btn-cart {
      width:100%;
      padding:9px;
      background:linear-gradient(135deg,#3c8a4a,#2a5d33);
      color:white;
      border:none;
      border-radius:10px;
      font-weight:600;
      font-size:13px;
      cursor:pointer;
      transition:0.3s;
      margin-bottom:6px;
    }

    .btn-cart:hover { background:#1d3124; }

    .btn-remove {
      width:100%;
      padding:8px;
      border:1.5px solid #e74c3c;
      background:transparent;
      color:#e74c3c;
      border-radius:10px;
      font-size:13px;
      font-weight:600;
      cursor:pointer;
      transition:0.3s;
    }

    .btn-remove:hover { background:#e74c3c; color:white; }

    /* EMPTY STATE */
    .empty-box {
      text-align:center;
      padding:70px 20px;
      background:white;
      border-radius:16px;
      box-shadow:0 4px 15px rgba(0,0,0,0.06);
    }

    .empty-box .emoji { font-size:55px; }
    .empty-box h3 { color:#555; margin:15px 0 8px; font-size:20px; }
    .empty-box p { color:#aaa; font-size:14px; }

    .btn-shop {
      display:inline-block;
      margin-top:18px;
      background:#307649;
      color:white;
      padding:12px 30px;
      border-radius:10px;
      text-decoration:none;
      font-weight:600;
      transition:0.3s;
    }

    .btn-shop:hover { background:#1d3124; color:white; }

    /* COUNT BADGE */
    .count-badge {
      background:#307649;
      color:white;
      padding:4px 12px;
      border-radius:20px;
      font-size:13px;
      font-weight:600;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<div class="top-nav">
  <img src="../images/logo2-removebg-preview.png">
  
  <div style="display:flex; align-items:center; gap:20px;">

    <?php
    include("db.php");
    $count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM cart");
    $count_data = mysqli_fetch_assoc($count_query);
    ?>

    <a href="plant.php" style="color:#9dd4a7; text-decoration:none; display:flex; flex-direction:column; align-items:center;">
      <i class="bi bi-house fs-5"></i>
      <span style="font-size:10px;">Home</span>
    </a>

    <?php include("navbar.php"); ?>

  </div>
</div>

<!-- Header -->
<div class="page-header">
  <h2>❤️ My Wishlist</h2>
  <p>Tumhare favourite products yahan saved hain</p>
</div>

<!-- Content -->
<div class="wishlist-container">

  <?php
  $count = mysqli_num_rows($result);
  if($count == 0):
  ?>

  <div class="empty-box">
    <div class="emoji">💔</div>
    <h3>Wishlist empty!</h3>
    <a href="plant.php" class="btn-shop">🌿 Shop </a>
  </div>

  <?php else: ?>

  <!-- Items count -->
  <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h5 style="color:#1d3124; font-weight:700; margin:0;">Saved Items</h5>
    <span class="count-badge"><?= $count ?> items</span>
  </div>

  <div class="wishlist-grid">
    <?php while($row = mysqli_fetch_assoc($result)):
      $save = $row['old_price'] - $row['price'];
      $discount = round(($save / $row['old_price']) * 100);
    ?>
    <div class="w-card">
      <div class="img-wrap">
        <img src="<?= $row['image'] ?>">
      </div>
      <div class="discount-badge"><?= $discount ?>% OFF</div>
      <div class="info">
        <h5><?= $row['name'] ?></h5>
        <span class="price">₹<?= $row['price'] ?><del>₹<?= $row['old_price'] ?></del></span>
        <span class="save">Save ₹<?= $save ?></span>
        <button class="btn-cart add-to-cart"
          data-name="<?= $row['name'] ?>"
          data-price="<?= $row['price'] ?>">
          <i class="bi bi-cart-plus"></i> Add to Cart
        </button>
        <button class="btn-remove"
          onclick="removeWishlist(<?= $row['product_id'] ?>, this)">
          <i class="bi bi-trash3"></i> Remove
        </button>
      </div>
    </div>
    <?php endwhile; ?>
  </div>

  <?php endif; ?>

</div>

<script>
function removeWishlist(productId, btn) {
  fetch("toggle_wishlist.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `product_id=${productId}`
  })
  .then(res => res.text())
  .then(() => {
    btn.closest(".w-card").remove();
  });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>