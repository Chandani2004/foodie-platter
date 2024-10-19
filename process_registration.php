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

// Process registration form submission
// Process registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postal_code = $_POST['postal_code'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO users_data (full_name, email, phone_number, birth_date, gender, address_line1, address_line2, country, city, region, postal_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssi", $full_name, $email, $phone_number, $birth_date, $gender, $address_line1, $address_line2, $country, $city, $region, $postal_code);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}


?>
