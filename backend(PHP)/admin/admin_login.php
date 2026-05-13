<?php
session_start();
include("../db.php");
global $conn;

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE username='$username' AND password='$password'");
    $admin = mysqli_fetch_assoc($result);
    if($admin) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login - Leafora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      min-height: 100vh;
      display: flex;
      background: #0f1e14;
       font-family:'Poppins',sans-serif;
    }

    /* LEFT PANEL */
    .left-panel {
  width: 55%;
  background:
    linear-gradient(rgba(10,20,14,0.78), rgba(10,20,14,0.88)),
    url('../../images/plants-bg.jpg');
  background-size: cover;
  background-position: center;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 60px;
  overflow: hidden;
}

.left-overlay {
  width: 100%;
  max-width: 500px;
  backdrop-filter: blur(10px);
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 28px;
  padding: 45px;
  box-shadow: 0 20px 50px rgba(0,0,0,0.35);
}

.brand-logo {
  width: 90px;
  margin-bottom: 30px;
}

.left-panel h1 {
  color: #fff;
  font-size: 42px;
  line-height: 1.2;
  font-weight: 700;
  margin-bottom: 18px;
}

.left-panel h1 span {
  color: #9dd4a7;
}

.left-panel .desc {
  color: rgba(255,255,255,0.65);
  font-size: 15px;
  line-height: 1.8;
  margin-bottom: 40px;
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: 15px;
}

.stat-card {
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 18px;
  padding: 20px;
  text-align: center;
  transition: 0.3s;
}

.stat-card:hover {
  transform: translateY(-5px);
  background: rgba(255,255,255,0.09);
}

.stat-card h3 {
  color: #9dd4a7;
  font-size: 28px;
  margin-bottom: 5px;
  font-weight: 700;
}

.stat-card p {
  color: rgba(255,255,255,0.55);
  font-size: 13px;
  margin: 0;
}
.left-panel::before,
.left-panel::after{
   display:none;
}

    /* RIGHT PANEL */
    .right-panel {
      width: 45%;
      background: #0f1e14;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 60px 50px;
    }

    .login-box {
      width: 100%;
      max-width: 380px;
    }

    .login-box h3 {
      color: white;
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .login-box .subtitle {
      color: rgba(255,255,255,0.35);
      font-size: 13px;
      margin-bottom: 35px;
    }

    .form-label {
      color: rgba(255,255,255,0.6);
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.8px;
      text-transform: uppercase;
      margin-bottom: 8px;
    }

    .input-group-custom {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group-custom i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: rgba(255,255,255,0.25);
      font-size: 16px;
      z-index: 2;
    }

    .form-control-custom {
      width: 100%;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 10px;
      padding: 13px 14px 13px 42px;
      color: white;
      font-size: 14px;
      transition: 0.3s;
      outline: none;
    }

    .form-control-custom::placeholder {
      color: rgba(255,255,255,0.2);
    }

    .form-control-custom:focus {
      border-color: #307649;
      background: rgba(48, 118, 73, 0.08);
      box-shadow: 0 0 0 3px rgba(48, 118, 73, 0.15);
    }

    .btn-login {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #307649, #1d3124);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 600;
      letter-spacing: 0.5px;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #3c8a4a, #2a5d33);
      transform: translateY(-1px);
      box-shadow: 0 8px 20px rgba(48, 118, 73, 0.3);
    }

    .error-box {
      background: rgba(218, 54, 54, 0.1);
      border: 1px solid rgba(218, 54, 54, 0.3);
      border-radius: 8px;
      padding: 10px 14px;
      color: #ff6b6b;
      font-size: 13px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 25px;
      color: rgba(255,255,255,0.25);
      font-size: 12px;
      text-decoration: none;
      transition: 0.3s;
    }

    .back-link:hover {
      color: #9dd4a7;
    }

    .divider-line {
      border: none;
      border-top: 1px solid rgba(255,255,255,0.06);
      margin: 30px 0;
    }

    .admin-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(48, 118, 73, 0.15);
      border: 1px solid rgba(48, 118, 73, 0.3);
      color: #9dd4a7;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 20px;
    }

    @media (max-width: 768px) {
      .left-panel { display: none; }
      .right-panel { width: 100%; padding: 40px 30px; }
    }
  </style>
</head>
<body>

<!-- LEFT PANEL -->
<div class="left-panel">

  <?php
    $p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM products"));
    $o = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM orders"));
    $u = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM users"));
  ?>

  <div class="left-overlay">

    <img src="../../images/logo2-removebg-preview.png"
         class="brand-logo">

    <h1>
      Manage Your <span>Leafora</span> Store Effortlessly 🌿
    </h1>

    <p class="desc">
      Control products, monitor orders, manage users and grow your
      plant business with a clean modern admin dashboard.
    </p>

    <div class="stats-grid">

      <div class="stat-card">
        <h3><?= $p['t'] ?></h3>
        <p>Products</p>
      </div>

      <div class="stat-card">
        <h3><?= $o['t'] ?></h3>
        <p>Orders</p>
      </div>

      <div class="stat-card">
        <h3><?= $u['t'] ?></h3>
        <p>Users</p>
      </div>

    </div>

  </div>

</div>

<!-- RIGHT PANEL -->
<div class="right-panel">
  <div class="login-box">

    <div class="admin-badge">
      <i class="bi bi-shield-lock-fill"></i> Admin Portal
    </div>

    <h3>Log In</h3>
    <p class="subtitle">Enter your credentials to access the dashboard</p>

    <?php if(isset($error)): ?>
    <div class="error-box">
      <i class="bi bi-exclamation-circle"></i> <?= $error ?>
    </div>
    <?php endif; ?>

    <form method="POST">

      <div>
        <label class="form-label">Username</label>
        <div class="input-group-custom">
          <i class="bi bi-person"></i>
          <input type="text" name="username" class="form-control-custom" placeholder="Enter username" required>
        </div>
      </div>

      <div>
        <label class="form-label">Password</label>
        <div class="input-group-custom">
          <i class="bi bi-lock"></i>
          <input type="password" name="password" class="form-control-custom" placeholder="Enter password" required>
        </div>
      </div>

      <button type="submit" name="login" class="btn-login">
        Login In &nbsp; <i class="bi bi-arrow-right"></i>
      </button>

    </form>

    <hr class="divider-line">

    <a href="../plant.php" class="back-link">
      <i class="bi bi-arrow-left"></i> &nbsp; Back to Leafora Store
    </a>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>