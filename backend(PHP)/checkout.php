<?php
session_start();
include("secure.php");
include("db.php");

// ORDER PLACE
if(isset($_POST['place_order'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $total = $_POST['total'];
  $user_id = $_SESSION['user_id'];

  // orders table mein insert
  $stmt = $conn->prepare("INSERT INTO orders (user_id, name, phone, address, total_amount) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("isssi", $user_id, $name, $phone, $address, $total);
  $stmt->execute();

  // cart clear karo
  mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");

  header("Location: order_success.php");
  exit();
}

// cart items fetch
$user_id = $_SESSION['user_id'];
$cart_items = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
$total = 0;
$items = [];
while($row = mysqli_fetch_assoc($cart_items)) {
  $total += $row['product_price'] * $row['quantity'];
  $items[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout - Leafora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background: #f4f4f4; }
    .checkout-box {
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
    .order-summary {
      background: #1d3124;
      border-radius: 15px;
      padding: 25px;
      color: white;
    }
    .item-row {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      font-size: 14px;
    }
    .btn-order {
      background: #307649;
      color: white;
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      transition: 0.3s;
    }
    .btn-order:hover { background: #1d3124; color: white; }
    .total-row {
      display: flex;
      justify-content: space-between;
      font-size: 18px;
      font-weight: bold;
      margin-top: 15px;
      color: #9dd4a7;
    }
    h2 { color: #1d3124; }
    label { color: #555; font-weight: 500; }
  </style>
</head>
<body>

<!-- Navbar -->
<div style="background:#1d3124; padding:15px 30px; display:flex; align-items:center; justify-content:space-between;">
  <img src="../images/logo2-removebg-preview.png" style="width:140px;">
  <a href="plant.php" style="color:#9dd4a7; text-decoration:none;">
    <i class="bi bi-arrow-left"></i> Back to Shop
  </a>
</div>

<div class="container py-5">
  <h2 class="mb-4">🛒 Checkout</h2>

  <?php if(empty($items)): ?>
    <div class="alert alert-warning text-center">
      Cart empty hai! <a href="plant.php">Shop karo</a>
    </div>
  <?php else: ?>

  <form method="POST">
  <div class="row g-4">

    <!-- LEFT - Form -->
    <div class="col-md-7">
      <div class="checkout-box">
        <h5 style="color:#1d3124; margin-bottom:20px;">📦 Delivery Details</h5>

        <div class="mb-3">
          <label>Full Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter your name " required>
        </div>

        <div class="mb-3">
          <label>Phone Number</label>
          <input type="text" name="phone" class="form-control" placeholder="Phone no." required>
        </div>

        <div class="mb-3">
          <label>Full Address</label>
          <textarea name="address" class="form-control" rows="3" 
            placeholder="House No, Street, City, State, Pincode" required></textarea>
        </div>

        <div class="mb-3">
          <label>Payment Method</label>
          <div class="form-check mt-2">
            <input class="form-check-input" type="radio" name="payment" value="cod" checked>
            <label class="form-check-label">💵 Cash on Delivery</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" value="online" disabled>
            <label class="form-check-label" style="color:#aaa;">💳 Online Payment (Coming Soon)</label>
          </div>
        </div>

        <input type="hidden" name="total" value="<?= $total ?>">
        <button type="submit" name="place_order" class="btn-order">
          🌿 Place Order — ₹<?= $total ?>
        </button>

      </div>
    </div>

    <!-- RIGHT - Order Summary -->
    <div class="col-md-5">
      <div class="order-summary">
        <h5 style="color:#9dd4a7; margin-bottom:20px;">🧾 Order Summary</h5>

        <?php foreach($items as $item): ?>
        <div class="item-row">
          <span><?= $item['product_name'] ?> × <?= $item['quantity'] ?></span>
          <span>₹<?= $item['product_price'] * $item['quantity'] ?></span>
        </div>
        <?php endforeach; ?>

        <div class="item-row" style="margin-top:10px;">
          <span>🚚 Delivery</span>
          <span style="color:#9dd4a7;">FREE</span>
        </div>

        <div class="total-row">
          <span>Total</span>
          <span>₹<?= $total ?></span>
        </div>
      </div>
    </div>

  </div>
  </form>

  <?php endif; ?>
</div>

</body>
</html>