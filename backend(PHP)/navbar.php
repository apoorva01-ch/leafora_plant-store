<?php if(isset($_SESSION['user_id'])) { ?>

<a href="order_history.php" style="color:white; text-decoration:none; display:flex; flex-direction:column; align-items:center;">
  <i class="bi bi-bag-check fs-4"></i>
  <span style="font-size:10px; margin-top:2px;">Orders</span>
</a>
<a href="wishlist.php" style="color:white; text-decoration:none; display:flex; flex-direction:column; align-items:center;">
  <i class="bi bi-heart fs-4"></i>
  <span style="font-size:10px; margin-top:2px;">Wishlist</span>
</a>


  <a href="logout.php" class="auth-btn logout-btn">
    <i class="bi bi-box-arrow-right"></i>
    <span>Logout</span>
  </a>

<?php } else { ?>

  <a href="login.php" class="auth-btn login-btn">
    <i class="bi bi-person"></i>
    <span>Login</span>
  </a>

  
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .auth-btn{
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 6px 12px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: 0.3s;
  font-size: 14px;
}

/* LOGIN style */
.login-btn{
  color: white;
  background: transparent;
  border: 1px solid white;
}

.login-btn:hover{
  background: white;
  color: #1d3124;
}

/* LOGOUT style */
.logout-btn{
  color: white;
  background: #da3636;
  border: 1px solid #da3636;
}

.logout-btn:hover{
  background: #b02a2a;
  border-color: #b02a2a;
}
</style>
</head>
<body>
    
</body>
</html>