<?php
session_start();

// Include database connection
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

// Check if the rejection table exists, if not, create it
$sql_create_table = "CREATE TABLE IF NOT EXISTS acceptance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rejected_count INT DEFAULT 0
)";
$conn->query($sql_create_table);

// Check if the user has rejected cookies
if (isset($_COOKIE['rejected'])) {
    // If rejection cookie is already set, increment the rejection count
    $incrementCountSql = "UPDATE acceptance SET rejected_count = rejected_count + 1 WHERE id = 1";
    if ($conn->query($incrementCountSql) === FALSE) {
        // Log error message
        error_log("Error updating cookie rejection count: " . $conn->error);
        // Output error message
        echo "Error counting rejected cookies. Please try again later.";
    } else {
        // Redirect back to the client.php page
        header("Location: client.php");
        exit();
    }
} else {
    // Set cookie indicating rejection
    setcookie('rejected', true, time() + (100 * 60), "/"); // 2 minutes
    
    // Increment the rejection count in the database
    $insertCountSql = "INSERT INTO acceptance (rejected_count) VALUES (1) ON DUPLICATE KEY UPDATE rejected_count = rejected_count + 1";
    if ($conn->query($insertCountSql) === FALSE) {
        // Log error message
        error_log("Error inserting cookie rejection count: " . $conn->error);
        // Output error message
        echo "Error counting rejected cookies. Please try again later.";
    } else {
        // Redirect back to the client.php page
        header("Location: client.php");
        exit();
    }
}

// Close the database connection
$conn->close();
?>