    let cartCount = 0;

function addToCart() {
  openQuantityModal();
}

function openQuantityModal() {
  const quantityModal = prompt("Вкажіть кількість товару:");
  if (quantityModal !== null) {
    cartCount += parseInt(quantityModal, 10);
    updateCartCount();
    alert("Товар додано!");
  }
}

function openCartModal() {
  const cartModal = document.getElementById("cart-modal");
  const cartEmptyMsg = document.getElementById("cart-empty-msg");
  const cartItems = document.getElementById("cart-items");

  if (cartCount === 0) {
    cartEmptyMsg.style.display = "block";
    cartItems.innerHTML = "";
  } else {
    cartEmptyMsg.style.display = "none";
    cartItems.innerHTML = `<p>Кількість товарів: ${cartCount}</p>`;
  }

  cartModal.style.display = "block";
}

function closeCartModal() {
  const cartModal = document.getElementById("cart-modal");
  cartModal.style.display = "none";
}

function goToCart() {
  alert("Замовлення оформлено");
}

function updateCartCount() {
  const cartCountElement = document.getElementById("cart-count");
  cartCountElement.innerText = cartCount;
}