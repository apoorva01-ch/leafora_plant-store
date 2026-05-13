<?php
session_start();
include("../db.php");
include("admin_secure.php");
global $conn;

// STATUS UPDATE
if(isset($_GET['status']) && isset($_GET['id'])) {
  $id = $_GET['id'];
  $status = $_GET['status'];
  mysqli_query($conn, "UPDATE orders SET status='$status' WHERE id=$id");
  $success = "Order status updated!";
}

// DELETE ORDER
if(isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM orders WHERE id=$id");
  $success = "Order deleted!";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Orders - Leafora Admin</title>
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

/* MAIN */

.main{
  margin-left:240px;
  padding:35px;
}

/* TOPBAR */

.topbar{
  background:white;
  border-radius:24px;
  padding:22px 28px;
  margin-bottom:30px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.page-title{
  color:#1d3124;
  font-size:28px;
  font-weight:700;
  margin:0;
}

.welcome-text{
  color:#777;
  font-size:14px;
}

.welcome-text b{
  color:#307649;
}

/* TABLE BOX */

.table-box{
  background:white;
  border-radius:26px;
  padding:30px;
  box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

/* SECTION TITLE */

.section-title{
  color:#1d3124;
  font-size:22px;
  font-weight:600;
  margin-bottom:25px;
}

/* ALERT */

.alert{
  border:none;
  border-radius:16px;
  padding:16px 20px;
  box-shadow:0 5px 15px rgba(0,0,0,0.04);
}

/* TABLE */

.table{
  margin-bottom:0;
  vertical-align:middle;
}

.table thead{
  background:#1d3124;
}

.table thead th{
  color:white;
  border:none;
  padding:18px 16px;
  font-size:14px;
  font-weight:500;
}

.table tbody td{
  padding:18px 16px;
  border-color:#f1f1f1;
  font-size:14px;
  color:#444;
}

.table tbody tr{
  transition:0.2s;
}

.table tbody tr:hover{
  background:#f8fbf9;
}

/* STATUS BADGES */

.badge-pending,
.badge-delivered,
.badge-cancelled{
  padding:7px 14px;
  border-radius:30px;
  font-size:12px;
  font-weight:600;
  display:inline-block;
}

.badge-pending{
  background:rgba(230,126,34,0.15);
  color:#e67e22;
}

.badge-delivered{
  background:rgba(48,118,73,0.14);
  color:#307649;
}

.badge-cancelled{
  background:rgba(231,76,60,0.14);
  color:#e74c3c;
}

/* BUTTONS */

.btn{
  border:none;
  border-radius:10px;
  padding:8px 14px;
  font-size:12px;
  font-weight:500;
  transition:0.3s;
}

.btn:hover{
  transform:translateY(-2px);
}

/* EMPTY TEXT */

.empty-text{
  color:#888;
  text-align:center;
  padding:40px 0;
  font-size:15px;
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
td .d-flex{
  flex-wrap:nowrap;
}

td .btn{
  white-space:nowrap;
}
  </style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div class="main">

 <div class="topbar">
    <h3 class="page-title">Orders</h3>
    <span class="welcome-text">
  Welcome back,
  <b><?= $_SESSION['admin_name'] ?></b>
</span>
  </div>

  <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

  <div class="table-box">
    <h5 class="section-title">All Orders</h5>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");
    $count = mysqli_num_rows($result);
    
    if($count == 0) {
     echo "<p class='empty-text'>No orders yet!</p>";
    } else {
    ?>

    <table class="table table-hover">
      <thead style="background:#1d3124; color:white;">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['phone'] ?></td>
          <td><?= $row['address'] ?></td>
          <td>₹<?= $row['total_amount'] ?></td>
          <td>
            <?php
            $badge = 'badge-pending';
            if($row['status'] == 'delivered') $badge = 'badge-delivered';
            if($row['status'] == 'cancelled') $badge = 'badge-cancelled';
            ?>
            <span class="<?= $badge ?>"><?= ucfirst($row['status']) ?></span>
          </td>
          <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
          <td>
            <div class="d-flex gap-1">
              <a href="orders.php?id=<?= $row['id'] ?>&status=delivered"
                 class="btn btn-success btn-sm">✓ Delivered</a>
              <a href="orders.php?id=<?= $row['id'] ?>&status=cancelled"
                 class="btn btn-warning btn-sm">✗ Cancel</a>
              <a href="orders.php?delete=<?= $row['id'] ?>"
                 class="btn btn-danger btn-sm"
                 onclick="return confirm('Delete this order?')">Delete</a>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <?php } ?>
  </div>

</div>

</body>
</html>