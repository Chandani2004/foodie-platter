<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve cart items data from POST request
$cartItemsData = $_POST['cartItems'];

// Decode JSON string to array
$cartItems = json_decode($cartItemsData, true);

// Loop through each cart item and insert into the database
foreach ($cartItems as $item) {
    $name = $item['name'];
    $price = $item['price'];
    $quantity = $item['quantity'];

    // SQL query to insert data into database
    $sql = "INSERT INTO cart_items (name, price, quantity) VALUES ('$name', '$price', '$quantity')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

