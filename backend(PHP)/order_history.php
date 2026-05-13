<?php
session_start();
include("secure.php");
include("db.php");
global $conn;

$user_id = $_SESSION['user_id'];
$orders = mysqli_query($conn, "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Orders - Leafora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background: #f4f4f4; }

    .navbar-custom {
      background: #1d3124;
      padding: 15px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .main {
      max-width: 900px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .page-heading {
      color: #1d3124;
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .order-card {
      background: white;
      border-radius: 16px;
      padding: 25px;
      margin-bottom: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.06);
      border-left: 5px solid #307649;
      transition: 0.3s;
    }

    .order-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .order-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 15px;
    }

    .order-id {
      font-size: 16px;
      font-weight: 700;
      color: #1d3124;
    }

    .order-date {
      font-size: 13px;
      color: #888;
    }

    .order-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 15px;
      margin-bottom: 15px;
    }

    .detail-item label {
      font-size: 11px;
      color: #aaa;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      display: block;
      margin-bottom: 4px;
    }

    .detail-item p {
      font-size: 14px;
      color: #333;
      font-weight: 500;
      margin: 0;
    }

    .badge-pending {
      background: #fff3cd;
      color: #856404;
      padding: 5px 14px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .badge-delivered {
      background: #d4edda;
      color: #155724;
      padding: 5px 14px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .badge-cancelled {
      background: #f8d7da;
      color: #721c24;
      padding: 5px 14px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .order-total {
      font-size: 18px;
      font-weight: 700;
      color: #307649;
      text-align: right;
    }

    .empty-box {
      text-align: center;
      padding: 80px 20px;
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    }

    .empty-box h3 { color: #888; margin-top: 15px; }
    .empty-box p { color: #aaa; font-size: 14px; }

    .btn-shop {
      background: #307649;
      color: white;
      padding: 12px 30px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      display: inline-block;
      margin-top: 15px;
      transition: 0.3s;
    }

    .btn-shop:hover { background: #1d3124; color: white; }

    .divider {
      border: none;
      border-top: 1px solid #f0f0f0;
      margin: 15px 0;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar-custom">
  <img src="../images/logo2-removebg-preview.png" style="width:140px;">
  <a href="plant.php" style="color:#9dd4a7; text-decoration:none;">
    <i class="bi bi-arrow-left"></i> Back to Shop
  </a>
</div>

<div class="main">

  <h2 class="page-heading">📦 My Orders</h2>

  <?php
  $count = mysqli_num_rows($orders);
  if($count == 0):
  ?>
    <div class="empty-box">
      <div style="font-size:60px;">📦</div>
      <h3>No orders yet!</h3>
      <p>Abhi tak koi order nahi diya. Shop karo aur apne favourite plants ghar lao!</p>
      <a href="index.php" class="btn-shop">Shop Now 🌿</a>
    </div>

  <?php else: ?>

    <?php while($order = mysqli_fetch_assoc($orders)): ?>

    <div class="order-card">

      <div class="order-top">
        <div>
          <span class="order-id">Order #<?= $order['id'] ?></span>
          <span class="order-date ms-3">
            <i class="bi bi-calendar3"></i>
            <?= date('d M Y, h:i A', strtotime($order['created_at'])) ?>
          </span>
        </div>

        <?php
        $badge = 'badge-pending';
        $icon = '🕐';
        if($order['status'] == 'delivered') { $badge = 'badge-delivered'; $icon = '✅'; }
        if($order['status'] == 'cancelled') { $badge = 'badge-cancelled'; $icon = '❌'; }
        ?>
        <span class="<?= $badge ?>"><?= $icon ?> <?= ucfirst($order['status']) ?></span>
      </div>

      <hr class="divider">

      <div class="order-details">
        <div class="detail-item">
          <label><i class="bi bi-person"></i> Name</label>
          <p><?= $order['name'] ?></p>
        </div>
        <div class="detail-item">
          <label><i class="bi bi-telephone"></i> Phone</label>
          <p><?= $order['phone'] ?></p>
        </div>
        <div class="detail-item">
          <label><i class="bi bi-geo-alt"></i> Address</label>
          <p><?= $order['address'] ?></p>
        </div>
        <div class="detail-item">
          <label><i class="bi bi-truck"></i> Payment</label>
          <p>Cash on Delivery</p>
        </div>
      </div>

      <hr class="divider">

      <div class="order-total">
        Total: ₹<?= $order['total_amount'] ?>
      </div>

    </div>

    <?php endwhile; ?>

  <?php endif; ?>

</div>

</body>
</html>