<?php
function getFilteredProducts($conn, $category, $is_top_selling = false) {

  $where = $is_top_selling ? "top_selling = 1" : "category = '$category'";

  $order = "id DESC";

  if(!empty($_GET['price'])) {
    if($_GET['price'] === 'low_high') $order = "price ASC";
    if($_GET['price'] === 'high_low') $order = "price DESC";
  }

  $discount_filter = "";
  if(!empty($_GET['discount'])) {
    $d = intval($_GET['discount']);
    $discount_filter = "AND ROUND((old_price - price) / old_price * 100) >= $d";
  }

  $query = "SELECT * FROM products WHERE $where $discount_filter ORDER BY $order";
  return mysqli_query($conn, $query);
}
?>