<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Order Placed - Leafora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
  * { box-sizing: border-box; }

  body {
    background: #1d3124;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px;
    margin: 0;
  }

  .box {
    background: white;
    border-radius: 20px;
    padding: 50px 40px;
    text-align: center;
    width: 100%;
    max-width: 450px;
  }

  .emoji {
    font-size: clamp(50px, 15vw, 70px);
  }

  .box h2 {
    color: #307649;
    margin: 20px 0 10px;
    font-size: clamp(22px, 6vw, 30px);
  }

  .box p {
    color: #888;
    font-size: clamp(13px, 4vw, 16px);
  }

  .btn-home {
    background: #307649;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 10px;
    text-decoration: none;
    display: inline-block;
    font-size: clamp(14px, 4vw, 16px);
    margin-top: 15px;
  }

  .btn-home:hover {
    background: #1d3124;
    color: white;
  }
</style>
</head>
<body>
<div class="box">
 <div class="emoji">🌿</div>
  <h2 style="color:#307649; margin:20px 0 10px;">Order Placed!</h2>
  <p style="color:#888;">YOUR ORDER CONFIRMED SUCCESSFULLY!!</p>
  <br>
  <a href="plant.php" class="btn-home">Back to Home</a>
</div>
</body>
</html>