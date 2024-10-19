// Sample menu items
const menuItems = [
    { id: 1, name: "Pizza", price: 300, image: "images/bg.jpg" },
    { id: 2, name: "Noodles", price: 80, image: "images/bg1.jpg" },
    { id: 3, name: "Fruit Salad", price: 40, image: "images/food.jpg" },
    { id: 4, name: "Paneer Butter Masala", price: 100, image: "images/paneer.jpeg" },
    { id: 5, name: "Naan Bread", price: 100, image: "images/naan.jpg" },
    { id: 6, name: "Chicken Biryani", price: 80, image: "images/cb.jpg" },
    { id: 7, name: "Italian Pasta", price: 40, image: "images/pasta.jpg" },
    { id: 8, name: "Egg Curry", price: 100, image: "images/egg.jpg" },
    { id: 9, name: "Burger,", price: 80, image: "images/burger.jpg" },
];

// Display menu items
const menuContainer = document.getElementById("menu");
menuItems.forEach(item => {
    const menuItem = document.createElement("div");
    menuItem.className = "menu-item";
    menuItem.innerHTML = `
        <img src="${item.image}" alt="${item.name}" width="100%">
        <p class="menu-item-name">${item.name}</p>
        <p>Rs.${item.price}</p>`;

    // Apply styles to menu item names
    const menuItemName = menuItem.querySelector('.menu-item-name');
    menuItemName.style.fontFamily = 'cursive';
    menuItemName.style.fontWeight = 'bold';

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
        alert(`Order placed! Total amount: Rs.${total}`);
        // Here you would typically send the order to the server for processing
    }
}
