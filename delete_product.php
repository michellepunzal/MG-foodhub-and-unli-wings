<?php
// Include database connection and start session
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

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Check if product ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: admin_dashboard.php");
    exit();
}

$product_id = $_GET['id'];

// Prepare and execute SQL query to delete the product from the database
$sql = "DELETE FROM products WHERE id = $product_id";

if ($conn->query($sql) === TRUE) {
    // Product deleted successfully
    $_SESSION['success_message'] = "Product deleted successfully.";
} else {
    // Error deleting product
    $_SESSION['error_message'] = "Error deleting product: " . $conn->error;
}

// Redirect back to the admin dashboard
header("Location: admin_dashboard.php");
exit();
?>