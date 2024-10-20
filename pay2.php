<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cart</title>
<link rel="stylesheet" href="food.css">
<style>
    /* Your CSS styles here */
</style>
</head>
<body>
    <div id="cart">
        <!-- Display cart items here -->
    </div>
    
    <!-- Redirect to payment page -->
    <form id="paymentForm" action="payment.php" method="post">
        <input type="hidden" name="cartItems" id="cartItemsInput">
        <button type="submit">Proceed to Payment</button>
    </form>

    <script>
        // Retrieve cart items from localStorage
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        document.getElementById("cartItemsInput").value = JSON.stringify(cartItems);
    </script>
    <?php
    // Establish database connection
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $dbname = "food"; // Your MySQL database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Handle POST request to store cart items
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Decode the JSON data sent from the client
        $cartItems = json_decode($_POST["cartItems"], true);
    
        // Insert each item into the database
        foreach ($cartItems as $item) {
            $name = $conn->real_escape_string($item["name"]);
            $price = $item["price"];
            $quantity = $item["quantity"];
            // Insert the item into the cart_items table
            $sql = "INSERT INTO cart_items (name, price, quantity) VALUES ('$name', '$price', '$quantity')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    // Fetch cart items from the database
    $sql = "SELECT * FROM cart_items";
    $result = $conn->query($sql);
    
    // Calculate total amount
    $totalAmount = 0;
    ?>
</body>
</html>
