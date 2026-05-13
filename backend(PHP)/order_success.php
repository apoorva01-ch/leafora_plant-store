<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Order Placed - Leafora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#1d3124; display:flex; align-items:center; justify-content:center; min-height:100vh; }
    .box { background:white; border-radius:20px; padding:50px; text-align:center; width:450px; }
    .btn-home { background:#307649; color:white; padding:12px 30px; border:none; border-radius:10px; text-decoration:none; }
    .btn-home:hover { background:#1d3124; color:white; }
  </style>
</head>
<body>
<div class="box">
  <div style="font-size:70px;">🌿</div>
  <h2 style="color:#307649; margin:20px 0 10px;">Order Placed!</h2>
  <p style="color:#888;">YOUR ORDER CONFIRMED SUCCESSFULLY!!</p>
  <br>
  <a href="plant.php" class="btn-home">Back to Home</a>
</div>
</body>
</html>