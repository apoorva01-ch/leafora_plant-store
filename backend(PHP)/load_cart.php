<?php
session_start();
include("db.php");
global $conn;

$user_id = $_SESSION['user_id'];
$total = 0;

$result = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");
$count = mysqli_num_rows($result);

if($count == 0) {
  echo "
  <div style='text-align:center; padding:50px 20px;'>
    <div style='font-size:50px; margin-bottom:15px;'>🛒</div>
    <h5 style='color:#9dd4a7; margin-bottom:8px;'>Cart empty !</h5>
    <p style='color:rgba(255,255,255,0.4); font-size:13px;'>No products added</p>
    <a href='plant.php' style='
      display:inline-block;
      margin-top:15px;
      background:#307649;
      color:white;
      padding:10px 24px;
      border-radius:10px;
      text-decoration:none;
      font-size:13px;
      font-weight:600;
    '>Shop Karo 🌿</a>
  </div>
  ";
} else {

while($row = mysqli_fetch_assoc($result)) {
  $subtotal = $row['product_price'] * $row['quantity'];
  $total += $subtotal;

  echo "
  <div style='
    background:rgba(255,255,255,0.05);
    border-radius:14px;
    padding:14px;
    margin-bottom:12px;
    border:1px solid rgba(255,255,255,0.08);
  '>
    <h6 style='
      color:white;
      font-size:14px;
      font-weight:600;
      margin-bottom:6px;
      line-height:1.4;
    '>{$row['product_name']}</h6>

    <p style='color:#9dd4a7; font-size:13px; margin-bottom:10px;'>₹{$row['product_price']}</p>

    <div style='display:flex; align-items:center; justify-content:space-between;'>

      <div style='display:flex; align-items:center; gap:8px;'>
        <button onclick='decreaseQty({$row['id']})' style='
          width:28px;
          height:28px;
          border:1.5px solid rgba(157,212,167,0.4);
          background:transparent;
          color:#9dd4a7;
          border-radius:8px;
          font-size:16px;
          cursor:pointer;
          display:flex;
          align-items:center;
          justify-content:center;
          transition:0.2s;
          font-weight:bold;
        '>−</button>

        <span style='
          color:white;
          font-weight:700;
          font-size:14px;
          min-width:20px;
          text-align:center;
        '>{$row['quantity']}</span>

        <button onclick='increaseQty({$row['id']})' style='
          width:28px;
          height:28px;
          border:1.5px solid rgba(157,212,167,0.4);
          background:transparent;
          color:#9dd4a7;
          border-radius:8px;
          font-size:16px;
          cursor:pointer;
          display:flex;
          align-items:center;
          justify-content:center;
          transition:0.2s;
          font-weight:bold;
        '>+</button>
      </div>

      <span style='color:white; font-weight:700; font-size:14px;'>₹{$subtotal}</span>

      <button onclick='removeItem({$row['id']})' style='
        background:rgba(218,54,54,0.15);
        border:1px solid rgba(218,54,54,0.3);
        color:#ff7d7d;
        padding:5px 10px;
        border-radius:8px;
        font-size:12px;
        cursor:pointer;
        transition:0.2s;
      '>✕ Remove</button>

    </div>
  </div>
  ";
}

echo "
<div style='
  margin-top:15px;
  padding-top:15px;
  border-top:1px solid rgba(255,255,255,0.1);
'>
  <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;'>
    <span style='color:rgba(255,255,255,0.5); font-size:13px;'>Delivery</span>
    <span style='color:#9dd4a7; font-size:13px; font-weight:600;'>FREE</span>
  </div>

  <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;'>
    <span style='color:white; font-weight:700; font-size:16px;'>Total</span>
    <span style='color:#9dd4a7; font-weight:700; font-size:20px;'>₹$total</span>
  </div>

  <a href='checkout.php' style='
    display:block;
    background:linear-gradient(135deg,#307649,#1d3124);
    color:white;
    text-align:center;
    padding:13px;
    border-radius:12px;
    font-weight:700;
    text-decoration:none;
    font-size:14px;
    letter-spacing:0.3px;
    transition:0.3s;
  '>Proceed to Checkout →</a>

  <a href='plant.php' style='
    display:block;
    text-align:center;
    color:rgba(255,255,255,0.35);
    font-size:12px;
    margin-top:12px;
    text-decoration:none;
  '>Continue Shopping</a>
</div>
";

}
?>