<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the entry ID is provided
if (isset($_GET['id'])) {
    $entryId = $_GET['id'];

    // Delete the entry from the successful orders table
    $query = "DELETE FROM successful_orders WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $entryId);
    $stmt->execute();

    // Redirect back to the admin dashboard
    header("Location: admin_dashboard.php");
    exit;
} else {
    echo "Error: Entry ID not provided!";
}
?>