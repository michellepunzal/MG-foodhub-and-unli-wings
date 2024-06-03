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

// Create the acceptance table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS acceptance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    accepted_count INT DEFAULT 0
)";
if ($conn->query($sql_create_table) === FALSE) {
    // Log error message
    error_log("Error creating acceptance table: " . $conn->error);
    // Output error message
    echo "Error creating acceptance table. Please try again later.";
    exit();
}

// Check if the user has already accepted cookies
if (!isset($_COOKIE['accepted'])) {
    // Set cookie indicating acceptance
    setcookie('accepted', true, time() + (100 * 60), "/"); // 100 minutes expiration

    // Increment the acceptance count in the database
    $incrementCountSql = "INSERT INTO acceptance (accepted_count) VALUES (1) ON DUPLICATE KEY UPDATE accepted_count = accepted_count + 1";
    if ($conn->query($incrementCountSql) === FALSE) {
        // Log error message
        error_log("Error updating cookie acceptance count: " . $conn->error);
        // Output error message
        echo "Error accepting cookies. Please try again later.";
        exit();
    } 
}

// Close the database connection
$conn->close();
?>