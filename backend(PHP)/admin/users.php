<?php
session_start();
include("../db.php");
include("admin_secure.php");
global $conn;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Users - Leafora Admin</title>
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

/* TITLE */

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

/* USER NAME */

.user-name{
  font-weight:600;
  color:#1d3124;
}

/* EMAIL */

.user-email{
  color:#777;
  font-size:13px;
}

/* BUTTON */

.btn-danger{
  border:none;
  border-radius:10px;
  padding:8px 15px;
  font-size:13px;
  font-weight:500;
  transition:0.3s;
}

.btn-danger:hover{
  transform:translateY(-2px);
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
    <h3 class="page-title">Users</h3>
    <span class="welcome-text">
  Welcome back,
  <b><?= $_SESSION['admin_name'] ?></b>
</span>
  </div>

  <!-- DELETE USER -->
  <?php
  if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    echo "<div class='alert alert-danger'>User deleted!</div>";
  }
  ?>

  <div class="table-box">
    <h5 class="section-title">All Users</h5>
    <table class="table table-hover">
      <thead style="background:#1d3124; color:white;">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?= $row['id'] ?></td>
         <td class="user-name"><?= $row['name'] ?></td>
         <td class="user-email"><?= $row['email'] ?></td>
          <td>
            <a href="users.php?delete=<?= $row['id'] ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Delete this user?')">
               Delete
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</div>

</body>
</html>