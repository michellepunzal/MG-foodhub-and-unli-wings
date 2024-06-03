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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection and other setup

    // Check if file upload was successful
    // Check if file upload was successful
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    // File upload was successful
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $photoData = file_get_contents($_FILES['photo']['tmp_name']);

    // Prepare and execute SQL query to insert product details and photo into the database
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, photo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $photoData);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        // Product added successfully
        // Redirect back to admin dashboard
        header("Location: admin_dashboard.php");
        exit(); // Ensure that script execution stops after redirection
    } else {
        // Error adding product
        echo "Error adding product.";
    }

    // Close statement
    $stmt->close();
} else {
    // Handle the case where no file was uploaded or an error occurred
    echo "Error uploading file. Please try again.";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
    /* Your CSS styles */
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Product</h2>
        <!-- Display success message if set -->
        <?php if (isset($success_message)) : ?>
        <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            enctype="multipart/form-data">
            <label for="name">Product Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price"><br>
            <label for="photo">Product Photo:</label><br>
            <input type="file" id="photo" name="photo"><br><br>
            <input type="submit" value="Add Product">
        </form>

    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>