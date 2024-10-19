<?php
// Assuming your database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process sign-in form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    
    // Perform validation or further processing as needed
    
    // Assuming you have a table named 'users' with columns 'username', 'email', and 'phone_number'
    $sql = "SELECT * FROM users_data WHERE full_name='$username' AND email='$email' AND phone_number='$phone_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists
        echo "Sign in successful!";
        // Redirect or perform further actions as needed
    } else {
        // User does not exist
        echo "Invalid credentials!";
        // Redirect or perform further actions as needed
    }
}

// Close connection
$conn->close();
?>
