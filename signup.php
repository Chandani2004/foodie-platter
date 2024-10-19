<?php
// Establish connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve signup form data
$username = $_POST['username'];
$password = $_POST['password'];

// Insert user data into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    // Redirect to user profile page
    header("Location: profile.php?username=$username");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
