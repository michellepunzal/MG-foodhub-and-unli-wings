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

// Retrieve product details from the database
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);

// Check if product exists
if ($result->num_rows === 0) {
    echo "Product not found";
    exit();
}

$product = $result->fetch_assoc();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Update product details in the database
    $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id=$product_id";
    if ($conn->query($sql) === TRUE) {
        // Product updated successfully
        $success_message = "Product updated successfully";

        // Check if file upload was successful
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // File upload was successful
            $photoData = file_get_contents($_FILES['photo']['tmp_name']);

            // Prepare and execute SQL query to update product photo in the database
            $stmt = $conn->prepare("UPDATE products SET photo=? WHERE id=$product_id");
            $stmt->bind_param("s", $photoData);
            $stmt->execute();
        }

        // Redirect back to the admin dashboard after updating
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error_message = "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 20px;
        text-align: center;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    textarea {
        height: 100px;
    }

    input[type="file"] {
        margin-bottom: 20px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .success-message,
    .error-message {
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
    }

    .success-message {
        background-color: #dff0d8;
        color: #3c763d;
        border: 1px solid #d6e9c6;
    }

    .error-message {
        background-color: #f2dede;
        color: #a94442;
        border: 1px solid #ebccd1;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Product</h2>
        <?php if (isset($success_message)) : ?>
        <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if (isset($error_message)) : ?>
        <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="post" action="edit_product.php?id=<?php echo $product_id; ?>" enctype="multipart/form-data">
            <label for="name">Product Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"><?php echo $product['description']; ?></textarea><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>"><br>
            <label for="photo">Product Photo:</label><br>
            <input type="file" id="photo" name="photo"><br>
            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>