// Sample menu items
const menuItems = [
    { id: 1, name: "Pizza", price: 10 },
    { id: 2, name: "Burger", price: 5 },
    { id: 3, name: "Salad", price: 8 },
];

// Display menu items
const menuContainer = document.getElementById("menu");
menuItems.forEach(item => {
    const menuItem = document.createElement("div");
    menuItem.className = "menu-item";
    menuItem.innerHTML = `<p>${item.name}</p><p>$${item.price}</p>`;
    menuItem.addEventListener("click", () => addToCart(item));
    menuContainer.appendChild(menuItem);
});

// Cart
const cart = [];

// Add item to cart
function addToCart(item) {
    cart.push(item);
    alert(`${item.name} added to cart!`);
}

// Place order
function placeOrder() {
    if (cart.length === 0) {
        alert("Your cart is empty. Please add items before placing an order.");
    } else {
        const total = cart.reduce((sum, item) => sum + item.price, 0);
        alert(`Order placed! Total amount: $${total}`);
        // Here you would typically send the order to the server for processing
    }
}
