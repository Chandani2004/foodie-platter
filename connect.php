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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restaurant_name = $_POST['restaurant_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $fssai_license_no = $_POST['fssai_license_no'];
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postal_code = $_POST['postal_code'];

    // SQL to insert data into registration table
    $sql = "INSERT INTO registration (restaurant_name, email, contact_number, fssai_license_no, address_line1, address_line2, country, city, region, postal_code)
    VALUES ('$restaurant_name', '$email', '$contact_number', '$fssai_license_no', '$address_line1', '$address_line2', '$country', '$city', '$region', '$postal_code')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
