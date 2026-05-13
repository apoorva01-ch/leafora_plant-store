<div style="background:#1d3124; padding:15px 25px; display:flex; flex-wrap:wrap; gap:12px; align-items:center; justify-content:space-between;">

  <p style="color:#9dd4a7; margin:0; font-weight:600; font-size:14px;">🔍 Filter Products</p>

  <div style="display:flex; flex-wrap:wrap; gap:10px; align-items:center;">

    <select id="priceFilter" style="background:#345c3c; color:white; border:1px solid rgba(157,212,167,0.3); padding:8px 14px; border-radius:10px; font-size:13px; cursor:pointer; outline:none;">
      <option value="">💰 Sort by Price</option>
      <option value="low_high" <?= ($_GET['price']??'')==='low_high'?'selected':'' ?>>Low to High</option>
      <option value="high_low" <?= ($_GET['price']??'')==='high_low'?'selected':'' ?>>High to Low</option>
    </select>

    <select id="discountFilter" style="background:#345c3c; color:white; border:1px solid rgba(157,212,167,0.3); padding:8px 14px; border-radius:10px; font-size:13px; cursor:pointer; outline:none;">
      <option value="">🏷️ Discount</option>
      <option value="10" <?= ($_GET['discount']??'')==='10'?'selected':'' ?>>Upto 10% Off</option>
      <option value="20" <?= ($_GET['discount']??'')==='20'?'selected':'' ?>>20% & Above</option>
      <option value="30" <?= ($_GET['discount']??'')==='30'?'selected':'' ?>>30% & Above</option>
      <option value="40" <?= ($_GET['discount']??'')==='40'?'selected':'' ?>>40% & Above</option>
    </select>

    <?php if(!empty($_GET['price']) || !empty($_GET['discount'])): ?>
    <a href="<?= basename($_SERVER['PHP_SELF']) ?>" style="background:rgba(218,54,54,0.2); color:#ff7d7d; border:1px solid rgba(218,54,54,0.3); padding:8px 14px; border-radius:10px; font-size:13px; text-decoration:none;">✕ Clear</a>
    <?php endif; ?>

  </div>
</div>

<script>
document.getElementById("priceFilter").addEventListener("change", applyFilter);
document.getElementById("discountFilter").addEventListener("change", applyFilter);

function applyFilter() {
  let price = document.getElementById("priceFilter").value;
  let discount = document.getElementById("discountFilter").value;
  
  let params = new URLSearchParams();
  if(price) params.set("price", price);
  if(discount) params.set("discount", discount);
  
  window.location.href = window.location.pathname + "?" + params.toString();
}
</script>