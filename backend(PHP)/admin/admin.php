<?php session_start(); ?>
<?php include("db.php"); ?>


<!DOCTYPE html>
<html>
<head>
  <title>Leafora Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#1d3124; padding:30px;">

<div class="container" style="background:white; padding:30px; border-radius:15px;">
  
  <h2 style="color:#307649;">🌿 Leafora Admin Panel</h2>
  <hr>

  <!-- ADD PRODUCT FORM -->
  <h5>Add New Product</h5>
  <form method="POST">
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
      <div class="col-md-6">
        <input type="text" name="image" class="form-control" placeholder="Image path e.g. ../images/plant1.webp" required>
      </div>
      <div class="col-md-3">
        <input type="number" name="rating" class="form-control" placeholder="Rating (1-5)" min="1" max="5" required>
      </div>
      <div class="col-md-3">
        <select name="category" class="form-control">
          <option value="indoor">Indoor</option>
          <option value="outdoor">Outdoor</option>
          <option value="planter">Planter</option>
          <option value="seeds">Seeds</option>
          <option value="tools">Tools</option>
        </select>
      </div>
      <div class="col-12">
        <button type="submit" name="add" class="btn btn-success">Add Product</button>
      </div>
    </div>
  </form>

  <?php
  // ADD PRODUCT
  global $conn;
  if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $old_price = $_POST['old_price'];
    $image = $_POST['image'];
    $rating = $_POST['rating'];
    $category = $_POST['category'];

    $stmt = $conn->prepare("INSERT INTO products (name, price, old_price, image, rating, category) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siisis", $name, $price, $old_price, $image, $rating, $category);
    $stmt->execute();
    echo "<div class='alert alert-success mt-3'>Product added successfully!</div>";
  }

  // DELETE PRODUCT
  if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    echo "<div class='alert alert-danger mt-3'>Product deleted!</div>";
  }
  ?>

  <hr>

  <!-- PRODUCTS TABLE -->
  <h5>All Products</h5>
  <table class="table table-bordered">
    <thead style="background:#307649; color:white;">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Old Price</th>
        <th>Rating</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM products");
      while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td>₹<?= $row['price'] ?></td>
        <td>₹<?= $row['old_price'] ?></td>
        <td><?= $row['rating'] ?></td>
        <td><?= $row['category'] ?></td>
        <td>
          <a href="admin.php?delete=<?= $row['id'] ?>" 
             class="btn btn-danger btn-sm"
             onclick="return confirm('Delete this product?')">
             Delete
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

</div>

</body>
</html>