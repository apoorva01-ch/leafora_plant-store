<?php
session_start();
include("../db.php");
include("admin_secure.php");
global $conn;

// ADD PRODUCT
if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $old_price = $_POST['old_price'];
  $rating = $_POST['rating'];
  $category = $_POST['category'];
  $top_selling = $_POST['top_selling'];

  $upload_dir = __DIR__ . "/../../images/products/";
  if (!is_dir($upload_dir)) {
      mkdir($upload_dir, 0777, true);
  }
$image = "";
  $filename = time() . "_" . basename($_FILES['image']['name']);
  $target = $upload_dir . $filename;

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $image = $filename; // ✅ sirf filename DB mein jayega
  } else {
      $error = "❌ Image upload failed!";
  }

  // ✅ sirf tab insert karo jab image successfully upload ho
  if (!isset($error)) {
      $stmt = $conn->prepare("INSERT INTO products (name, price, old_price, image, rating, category, top_selling) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("siisisi", $name, $price, $old_price, $image, $rating, $category, $top_selling);
      $stmt->execute();
      $success = "✅ Product added successfully!";
  }
}

// DELETE PRODUCT
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM products WHERE id=$id");
  $success = "Product deleted!";
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Products - Leafora Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #f3f6f4;
      font-family: 'Poppins', sans-serif;
    }

    /* MAIN */

    .main {
      margin-left: 240px;
      padding: 35px;
    }

    /* TOPBAR */

    .topbar {
      background: white;
      border-radius: 24px;
      padding: 22px 28px;
      margin-bottom: 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .page-title {
      color: #1d3124;
      font-size: 28px;
      font-weight: 700;
      margin: 0;
    }

    .welcome-text {
      color: #777;
      font-size: 14px;
    }

    .welcome-text b {
      color: #307649;
    }

    /* BOXES */

    .form-box,
    .table-box {
      background: white;
      border-radius: 26px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      margin-bottom: 30px;
    }

    /* SECTION TITLES */

    .section-title {
      color: #1d3124;
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 25px;
    }

    /* INPUTS */

    .form-control,
    .form-select {
      height: 52px;
      border-radius: 14px;
      border: 1px solid #e5e7eb;
      font-size: 14px;
      padding: 12px 16px;
      transition: 0.3s;
      box-shadow: none !important;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #307649;
      box-shadow: 0 0 0 4px rgba(48, 118, 73, 0.12) !important;
    }

    /* BUTTON */

    .btn-add {
      background: linear-gradient(135deg,
          #307649,
          #1d3124);
      color: white;
      border: none;
      padding: 13px 28px;
      border-radius: 14px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-add:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 24px rgba(48, 118, 73, 0.25);
      color: white;
    }

    /* ALERT */

    .alert {
      border: none;
      border-radius: 16px;
      padding: 16px 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.04);
    }

    /* TABLE */

    .table {
      margin-bottom: 0;
      vertical-align: middle;
    }

    .table thead {
      background: #1d3124;
    }

    .table thead th {
      color: white;
      border: none;
      padding: 18px 16px;
      font-size: 14px;
      font-weight: 500;
    }

    .table tbody td {
      padding: 18px 16px;
      border-color: #f1f1f1;
      font-size: 14px;
      color: #444;
    }

    .table tbody tr {
      transition: 0.2s;
    }

    .table tbody tr:hover {
      background: #f8fbf9;
    }

    /* PRODUCT IMAGE */

    .product-img {
      width: 58px;
      height: 58px;
      object-fit: cover;
      border-radius: 14px;
      border: 2px solid #f1f1f1;
    }

    /* DELETE BUTTON */

    .btn-danger {
      border: none;
      border-radius: 10px;
      padding: 8px 14px;
      font-size: 13px;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-danger:hover {
      transform: translateY(-2px);
    }

    /* RESPONSIVE */

    @media(max-width:768px) {

      .main {
        margin-left: 0;
        padding: 20px;
      }

      .topbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

    }
  </style>
</head>

<body>

  <?php include("sidebar.php"); ?>

  <div class="main">

    <div class="topbar">
      <h3 class="page-title">Products</h3>
      <span class="welcome-text">
        Welcome back,
        <b><?= $_SESSION['admin_name'] ?></b>
      </span>
    </div>

    <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

    <!-- ADD PRODUCT FORM -->
    <div class="form-box">
      <h5 class="section-title">Add New Product</h5>
     <form method="POST" enctype="multipart/form-data">
        <div class="row g-3">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Product Name" required>
          </div>
          <div class="col-md-3">
            <input type="number" name="price" class="form-control" placeholder="Price" required>
          </div>
          <div class="col-md-3">
            <input type="number" name="old_price" class="form-control" placeholder="Old Price" required>
          </div>
          <div class="col-md-3">
  <input type="text" id="discountPreview" class="form-control"
         placeholder="Discount Preview"
         readonly
         style="background:#f8f8f8; color:#307649; font-weight:700; cursor:default;">
</div>
          <div class="col-md-6">
            <input type="file" name="image" class="form-control" accept="image/*" required>
          </div>
          <div class="col-md-3">
            <input type="number" name="rating" class="form-control" placeholder="Rating (1-5)" min="1" max="5" required>
          </div>
          <div class="col-md-3">
            <select name="category" class="form-select">
              <option value="indoor">Indoor</option>
              <option value="outdoor">Outdoor</option>
              <option value="planter">Planter</option>
              <option value="flowerseed">Flower Seeds</option>
              <option value="vegetableseed">Vegetable Seeds</option>
              <option value="tools">Garden Tools</option>
              <option value="bird">Bird Houses</option>
            </select>

            <small style="color:#888; font-size:12px;">
              💡 Tip: "Planter" category is only for Top Selling products
            </small>
          </div>
          <div class="col-md-3">
            <select name="top_selling" class="form-select">
              <option value="0">Normal Product</option>
              <option value="1">Top Selling</option>
            </select>
          </div>
          <div class="col-12">
            <button type="submit" name="add" class="btn-add">Add Product</button>
          </div>
        </div>
      </form>
    </div>

    <!-- PRODUCTS TABLE -->
    <div class="table-box">
      <h5 class="section-title">All Products</h5>
      <table class="table table-hover">
        <thead style="background:#1d3124; color:white;">
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Old Price</th>
            <th>Rating</th>
            <th>Discount</th>
            <th>Category</th>
            <th>Top Selling</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td>
               <img src="../../images/products/<?= $row['image'] ?>" class="product-img">
              </td>
              <td><?= $row['name'] ?></td>
              <td>₹<?= $row['price'] ?></td>
              <td>₹<?= $row['old_price'] ?></td>
              <td>⭐ <?= $row['rating'] ?></td>
              <?php
  $discount = round(($row['old_price'] - $row['price']) / $row['old_price'] * 100);
?>
<td>
  <span style="background:#d4edda; color:#155724; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600; white-space: nowrap;">
    <?= $discount ?>% OFF
  </span>
</td>
              <td><?= $row['category'] ?></td>
              <td>
  <?php if($row['top_selling'] == 1): ?>
    <span style="background:#d4edda; color:#155724; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600;">✓ Yes</span>
  <?php else: ?>
    <span style="background:#f1f1f1; color:#888; padding:4px 10px; border-radius:20px; font-size:12px;">No</span>
  <?php endif; ?>
</td>
<td>
  <div style="display:flex; gap:6px;">
    <a href="edit_product.php?id=<?= $row['id'] ?>"
       class="btn btn-warning btn-sm">Edit</a>
    <a href="products.php?delete=<?= $row['id'] ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Delete this product?')">Delete</a>
  </div>
</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>

  <script>
document.querySelector('[name="price"]').addEventListener('input', calcDiscount);
document.querySelector('[name="old_price"]').addEventListener('input', calcDiscount);

function calcDiscount() {
  let price = parseFloat(document.querySelector('[name="price"]').value);
  let old = parseFloat(document.querySelector('[name="old_price"]').value);

  if (price && old && old > 0 && old > price) {
    let disc = Math.round((old - price) / old * 100);
    document.getElementById('discountPreview').value = disc + "% OFF";
  } else {
    document.getElementById('discountPreview').value = "";
  }
}
</script>
</body>

</html>