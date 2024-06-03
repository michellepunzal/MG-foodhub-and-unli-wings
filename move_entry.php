<?php
// Database connection details
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
if (isset($_POST['id'])) {
    $entryId = $_POST['id'];

    // Move the entry to the successful orders table
    $query = "INSERT INTO successful_orders SELECT * FROM tableregis WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $entryId);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        // Delete the entry from the original table
        $deleteQuery = "DELETE FROM tableregis WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $entryId);
        $deleteStmt->execute();

        // Check if the deletion was successful
        if ($deleteStmt->affected_rows > 0) {
            echo "Entry moved successfully!";
        } else {
            echo "Error: Failed to delete entry from original table";
        }
    } else {
        echo "Error: Failed to move entry to successful orders table";
    }

    // Close statements
    $stmt->close();
    $deleteStmt->close();
} else {
    echo "Error: Entry ID not provided!";
}

// Close connection
$conn->close();
?>