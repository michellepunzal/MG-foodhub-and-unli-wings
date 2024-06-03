<?php
// Include database connection
session_start();
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "register"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$facebookUrl = $_POST['facebook_url'];

// Prepare and execute the SQL statement to update contact info
$sql = "UPDATE contacts SET email=?, mobile=?, facebook_url=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $mobile, $facebookUrl);
$stmt->execute();
$stmt->close();

// Close the database connection
$conn->close();

// Redirect back to the admin page
header("Location: admin_dashboard.php");
exit;
?>