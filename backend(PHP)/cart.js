function openCart(){
  document.getElementById("cartPanel").classList.add("open");
  loadCart();
  updateCartCount();
}

function closeCart(){
  document.getElementById("cartPanel").classList.remove("open");
}

function loadCart() {
  fetch("load_cart.php")
    .then(res => res.text())
    .then(data => {
      document.getElementById("cartItems").innerHTML = data;
    });
}

function removeItem(id) {
  fetch("remove_cart.php?id=" + id)
    .then(res => res.text())
    .then(() => {
      loadCart();
      updateCartCount();
    });
}

function updateCartCount() {
  fetch("cart_count.php")
    .then(res => res.text())
    .then(count => {
      document.getElementById("cart-count").innerText = count;
    });
}

window.addEventListener("load", () => {
  loadCart();
  updateCartCount();
});