<?php
session_start();
include("../db.php");
include("admin_secure.php");
global $conn;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Leafora Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  background:#f3f6f4;
  font-family:'Poppins',sans-serif;
}

/* MAIN AREA */

.main{
  margin-left:240px;
  padding:35px;
}

/* TOP HEADER */

.topbar{
  background:white;
  border-radius:22px;
  padding:22px 28px;
  margin-bottom:30px;
  box-shadow:0 10px 30px rgba(0,0,0,0.05);
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.page-title{
  font-size:28px;
  font-weight:700;
  color:#1d3124;
  margin:0;
}

.welcome-text{
  color:#777;
  font-size:14px;
}

.welcome-text b{
  color:#307649;
}

/* STAT CARDS */

.stat-card{
  background:white;
  border-radius:24px;
  padding:30px;
  position:relative;
  overflow:hidden;
  transition:0.3s;
  box-shadow:0 10px 30px rgba(0,0,0,0.05);
  border:1px solid rgba(0,0,0,0.03);
}

.stat-card:hover{
  transform:translateY(-6px);
}

.stat-card::before{
  content:'';
  position:absolute;
  width:120px;
  height:120px;
  border-radius:50%;
  background:rgba(48,118,73,0.08);
  top:-40px;
  right:-40px;
}

.stat-card h2{
  font-size:46px;
  font-weight:700;
  margin-bottom:8px;
  position:relative;
  z-index:1;
}

.stat-card p{
  color:#777;
  font-size:15px;
  margin:0;
  position:relative;
  z-index:1;
}

/* TABLE SECTION */

.table-card{
  background:white;
  border-radius:24px;
  padding:30px;
  box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.section-title{
  font-size:22px;
  font-weight:600;
  color:#1d3124;
  margin-bottom:25px;
}

/* TABLE */

.table{
  margin-bottom:0;
  overflow:hidden;
  border-radius:18px;
}

.table thead{
  background:#1d3124;
}

.table thead th{
  color:white;
  font-weight:500;
  padding:16px;
  border:none;
  font-size:14px;
}

.table tbody td{
  padding:18px 16px;
  vertical-align:middle;
  border-color:#f1f1f1;
  font-size:14px;
  color:#444;
}

.table tbody tr{
  transition:0.2s;
}

.table tbody tr:hover{
  background:#f7fbf8;
}

/* VIEW ALL LINK */

.view-link{
  display:inline-block;
  margin-top:20px;
  text-decoration:none;
  color:#307649;
  font-weight:600;
  transition:0.3s;
}

.view-link:hover{
  transform:translateX(4px);
  color:#1d3124;
}

/* RESPONSIVE */

@media(max-width:768px){

  .main{
    margin-left:0;
    padding:20px;
  }

  .topbar{
    flex-direction:column;
    align-items:flex-start;
    gap:10px;
  }

}
</style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div class="main">

 <div class="topbar">
    <h3 class="page-title"> Dashboard</h3>
    <span class="welcome-text">
  Welcome back,
  <b><?= $_SESSION['admin_name'] ?></b>
</span>
  </div>

  <?php
  // counts
  $total_products = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM products"))['total'];
  $total_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];
  $total_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM cart"))['total'];
  ?>

  <!-- Stats Cards -->
  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="stat-card">
        <h2 style="color:#307649;"><?= $total_products ?></h2>
        <p>Total Products</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card">
        <h2 style="color:#e67e22;"><?= $total_users ?></h2>
        <p>Total Users</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card">
        <h2 style="color:#e74c3c;"><?= $total_orders ?></h2>
        <p>Cart Items</p>
      </div>
    </div>
  </div>

  <!-- Recent Products -->
  <div class="table-card">
    <h5 class="section-title">🌿 Recent Products</h5>
    <table class="table table-hover">
      <thead style="background:#1d3124; color:white;">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Category</th>
          <th>Rating</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $recent = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 5");
        while($row = mysqli_fetch_assoc($recent)) {
        ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td>₹<?= $row['price'] ?></td>
          <td><?= $row['category'] ?></td>
          <td>⭐ <?= $row['rating'] ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="products.php" class="view-link">
  View All Products →
</a>
  </div>

</div>

</body>
</html>