<?php
session_start();
include("../db.php");
include("admin_secure.php");

global $conn;

// Delete message
if(isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM contact_messages WHERE id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Messages - Leafora Admin</title>
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
    .welcome-text { color:#777; font-size:14px; }
    .welcome-text b { color:#307649; }
    .table-box {
      background:white;
      border-radius:26px;
      padding:30px;
      box-shadow:0 10px 30px rgba(0,0,0,0.05);
    }
    .section-title { color:#1d3124; font-size:22px; font-weight:600; margin-bottom:25px; }
    .table { margin-bottom:0; vertical-align:middle; }
    .table thead { background:#1d3124; }
    .table thead th { color:white; border:none; padding:18px 16px; font-size:14px; font-weight:500; }
    .table tbody td { padding:16px; border-color:#f1f1f1; font-size:14px; color:#444; }
    .table tbody tr:hover { background:#f8fbf9; }
    .msg-text { max-width:300px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
    .btn-danger { border:none; border-radius:10px; padding:8px 14px; font-size:13px; font-weight:500; }
    .empty-box { text-align:center; padding:60px 20px; color:#aaa; }
    .empty-box div { font-size:50px; margin-bottom:15px; }
    @media(max-width:768px) { .main { margin-left:0; padding:20px; } }
  </style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div class="main">

  <div class="topbar">
    <h3 class="page-title"> Messages</h3>
    <span class="welcome-text">Welcome back, <b><?= $_SESSION['admin_name'] ?></b></span>
  </div>

  <div class="table-box">
    <h5 class="section-title">Contact Form Messages</h5>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");
    $count = mysqli_num_rows($result);

    if($count == 0): ?>
      <div class="empty-box">
        <div>📭</div>
        <p>Koi message nahi aaya abhi tak!</p>
      </div>
    <?php else: ?>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['subject'] ?></td>
          <td class="msg-text" title="<?= $row['message'] ?>">
            <?= $row['message'] ?>
          </td>
          <td>
            <a href="messages.php?delete=<?= $row['id'] ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Delete this message?')">
               Delete
            </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <?php endif; ?>
  </div>

</div>

</body>
</html>