let cart = [];

// Function to add items to the cart
function addToCart(itemId, itemName, price) {
    // Create an item object
    const item = {
        id: itemId,
        name: itemName,
        price: price
    };

    // Add item to cart array
    cart.push(item);

    // Update the footer to show selected items
    updateCartDisplay();

    // Optionally save the cart to session
    saveCartToSession();
}

// Function to update the cart display in the footer
function updateCartDisplay() {
    const itemList = document.getElementById('item-list');
    itemList.innerHTML = ''; // Clear existing items

    cart.forEach(item => {
        const listItem = document.createElement('div');
        listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
        itemList.appendChild(listItem);
    });
}
function addToCart(itemId, itemName, price) {
    const item = {
        id: itemId,
        name: itemName,
        price: price,
        quantity: 1 // Default quantity
    };

    // Check if the item already exists in the cart
    const existingItemIndex = cart.findIndex(i => i.id === itemId);
    if (existingItemIndex > -1) {
        // If the item exists, increment the quantity
        cart[existingItemIndex].quantity += 1;
    } else {
        // Otherwise, add a new item to the cart
        cart.push(item);
    }

    // Update the display
    updateCartDisplay();
    saveCartToSession(); // Ensure to save the cart to the session or database
}


// Function to save the cart to the session
function saveCartToSession() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.send(JSON.stringify(cart));
}

// Reset the cart
function resetCart() {
    cart = [];
    updateCartDisplay();
}

// When proceeding to checkout, save cart data to the hidden input
document.getElementById('checkoutForm').onsubmit = function () {
    document.getElementById('cartDataInput').value = JSON.stringify(cart);
};
