<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload
$imageTmpName = $_FILES["image"]["tmp_name"];

// Read file contents
$imageData = file_get_contents($imageTmpName);

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO images (image) VALUES (?)");
$stmt->bind_param("b", $imageData);

// Execute SQL statement
if ($stmt->execute()) {
    $successMessage = "Image uploaded successfully.";
} else {
    $errorMessage = "Sorry, there was an error uploading your image.";
}

$stmt->close();
$conn->close();
?>

<!-- Display success or error message in the middle of the page -->
<div style="text-align: center; margin-top: 50px;">
    <?php if (isset($successMessage)) : ?>
    <p style="color: green;"><?php echo $successMessage; ?></p>
    <?php elseif (isset($errorMessage)) : ?>
    <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
</div>