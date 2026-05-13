<?php
session_start();
include("../db.php");
include("admin_secure.php");
global $conn;
$id = $_GET['id'];

// UPDATE
if(isset($_POST['update'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $old_price = $_POST['old_price'];
  $rating = $_POST['rating'];
  $category = $_POST['category'];
  $top_selling = $_POST['top_selling'];

  // Agar naya image upload kiya toh replace karo, warna purana rakho
  if(!empty($_FILES['image']['name'])) {
    $upload_dir = __DIR__ . "/../../images/products/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $filename = time() . "_" . basename($_FILES['image']['name']);
    $target = $upload_dir . $filename;

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $image = $filename; // naya filename
    } else {
      $error = "Image upload failed!";
      $image = $_POST['old_image']; // upload fail hogi toh purana rakho
    }
  } else {
    $image = $_POST['old_image']; // koi file select nahi ki toh purana rakho
  }

  $stmt = $conn->prepare("UPDATE products SET name=?, price=?, old_price=?, image=?, rating=?, category=?, top_selling=? WHERE id=?");
  $stmt->bind_param("siisisii", $name, $price, $old_price, $image, $rating, $category, $top_selling, $id);
  $stmt->execute();

  header("Location: products.php");
  exit();
}

// FETCH PRODUCT
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Product - Leafora Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    * { margin:0; padding:0; box-sizing:border-box; }
    body { background:#f3f6f4; font-family:'Poppins',sans-serif; }
    .main { margin-left:240px; padding:35px; }
    .topbar {
      background:white;
      border-radius:24px;
      padding:22px 28px;
      margin-bottom:30px;
      display:flex;
      justify-content:space-between;
      align-items:center;
      box-shadow:0 10px 30px rgba(0,0,0,0.05);
    }
    .page-title { color:#1d3124; font-size:28px; font-weight:700; margin:0; }
    .form-box {
      background:white;
      border-radius:26px;
      padding:30px;
      box-shadow:0 10px 30px rgba(0,0,0,0.05);
    }
    .section-title { color:#1d3124; font-size:22px; font-weight:600; margin-bottom:25px; }
    .form-control, .form-select {
      height:52px;
      border-radius:14px;
      border:1px solid #e5e7eb;
      font-size:14px;
      padding:12px 16px;
      transition:0.3s;
    }
    .form-control:focus, .form-select:focus {
      border-color:#307649;
      box-shadow:0 0 0 4px rgba(48,118,73,0.12) !important;
    }
    .btn-update {
      background:linear-gradient(135deg, #307649, #1d3124);
      color:white;
      border:none;
      padding:13px 28px;
      border-radius:14px;
      font-weight:600;
      transition:0.3s;
    }
    .btn-update:hover {
      transform:translateY(-2px);
      box-shadow:0 12px 24px rgba(48,118,73,0.25);
      color:white;
    }
    .btn-back {
      background:#f1f1f1;
      color:#444;
      border:none;
      padding:13px 28px;
      border-radius:14px;
      font-weight:600;
      transition:0.3s;
      text-decoration:none;
    }
    .btn-back:hover { background:#e0e0e0; color:#333; }
    .preview-img {
      width:120px;
      height:120px;
      object-fit:cover;
      border-radius:14px;
      border:2px solid #e5e7eb;
      margin-bottom:10px;
      display:block;
    }
    .current-label {
      font-size:12px;
      color:#888;
      margin-bottom:6px;
    }
  </style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div class="main">

  <div class="topbar">
    <h3 class="page-title">Edit Product</h3>
    <a href="products.php" class="btn-back">← Back to Products</a>
  </div>

  <?php if(isset($error)) echo "<div class='alert alert-danger mb-3'>$error</div>"; ?>

  <div class="form-box">
    <h5 class="section-title">Update Product Details</h5>

    <!-- Current Image Preview -->
    <div class="mb-3">
      <p class="current-label">Current Image:</p>
      <img src="../../images/products/<?= $row['image'] ?>" 
           class="preview-img" 
           id="imgPreview">
    </div>

    <form method="POST" enctype="multipart/form-data">

      <!-- purana image filename hidden field mein rakho -->
      <input type="hidden" name="old_image" value="<?= $row['image'] ?>">

      <div class="row g-3">
        <div class="col-md-6">
          <label style="font-size:13px; color:#777; margin-bottom:6px;">Product Name</label>
          <input type="text" name="name" class="form-control"
            value="<?= $row['name'] ?>" required>
        </div>
        <div class="col-md-3">
          <label style="font-size:13px; color:#777; margin-bottom:6px;">Price</label>
          <input type="number" name="price" class="form-control"
            value="<?= $row['price'] ?>" required>
        </div>
        <div class="col-md-3">
          <label style="font-size:13px; color:#777; margin-bottom:6px;">Old Price</label>
          <input type="number" name="old_price" class="form-control"
            value="<?= $row['old_price'] ?>" required>
        </div>

        <!-- File Upload — optional, chhod do toh purana image rahega -->
        <div class="col-md-6">
          <label style="font-size:13px; color:#777; margin-bottom:6px;">
            New Image <span style="color:#aaa;">(optional — chhod do toh purana rahega)</span>
          </label>
          <input type="file" name="image" class="form-control" accept="image/*" id="imgInput">
        </div>

        <div class="col-md-3">
          <label style="font-size:13px; color:#777; margin-bottom:6px;">Rating (1-5)</label>
          <input type="number" name="rating" class="form-control"
            value="<?= $row['rating'] ?>" min="1" max="5" required>
        </div>
        <div class="col-md-3">
          <label style="font-size:13px; color:#777; margin-bottom:6px;">Category</label>
          <select name="category" class="form-select">
            <option value="indoor"        <?= $row['category']=='indoor'?'selected':'' ?>>Indoor</option>
            <option value="outdoor"       <?= $row['category']=='outdoor'?'selected':'' ?>>Outdoor</option>
            <option value="planter"       <?= $row['category']=='planter'?'selected':'' ?>>Planter</option>
            <option value="flowerseed"    <?= $row['category']=='flowerseed'?'selected':'' ?>>Flower Seeds</option>
            <option value="vegetableseed" <?= $row['category']=='vegetableseed'?'selected':'' ?>>Vegetable Seeds</option>
            <option value="tools"         <?= $row['category']=='tools'?'selected':'' ?>>Garden Tools</option>
            <option value="bird"          <?= $row['category']=='bird'?'selected':'' ?>>Bird Houses</option>
          </select>
        </div>
        <div class="col-md-3">
          <label style="font-size:13px; color:#777; margin-bottom:6px;">Top Selling</label>
          <select name="top_selling" class="form-select">
            <option value="0" <?= $row['top_selling']==0?'selected':'' ?>>Normal Product</option>
            <option value="1" <?= $row['top_selling']==1?'selected':'' ?>>Top Selling</option>
          </select>
        </div>

        <div class="col-12 d-flex gap-3">
          <button type="submit" name="update" class="btn-update">Update Product</button>
          <a href="products.php" class="btn-back">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
// Naya image select karne pe preview update hoga
document.getElementById("imgInput").addEventListener("change", function() {
  if(this.files && this.files[0]) {
    document.getElementById("imgPreview").src = URL.createObjectURL(this.files[0]);
  }
});
</script>

</body>
</html>