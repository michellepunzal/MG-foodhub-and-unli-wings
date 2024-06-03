<?php
// Include your database connection file
include 'db_connect.php';

// Check if the user is logged in and has admin privileges
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Redirect to the login page or display an error message
    header("Location: admin_dashboard.php");
    exit();
}

// Retrieve menu items from the database
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);

$menuItems = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission to update menu items
    foreach ($_POST['menu'] as $id => $menuItem) {
        $id = intval($id);
        $title = $conn->real_escape_string($menuItem['title']);
        $url = $conn->real_escape_string($menuItem['url']);
        
        // Update the menu item in the database
        $sql = "UPDATE menu_items SET title='$title', url='$url' WHERE id=$id";
        $conn->query($sql);
    }
    
    // Redirect back to the admin page after updating
    header("Location: admin_menu.php");
    exit();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Food Hub and Unli Wings</title>
    <link rel="stylesheet" href="MENU.CSS">
    <!-- Include your CSS styles here or link to an external CSS file -->
</head>

<body>
    <header id="header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        <ul class="menu">
            <li><a href="client.html">Home</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="menu.html" class="active">Menu</a></li>
            <li><a href="location.html">Locations</a></li>
            <li><a href="contacts.html">Contact</a></li>
            <li><a href="admin_menu.php">Admin Menu</a></li> <!-- Link to admin page -->
        </ul>
    </header>
    <section class="hero">
        <!-- Include your hero section content here -->
    </section>

    <div class="phh">
        <h1>LOOK WHAT WE GOT HERE 👀</h1>
    </div>
    <div class="prr">
        <p>UNDER MAINTENANCE</p>
    </div>

    <footer>
        <div>
            <p>&copy; 2024 MG Food Hub. All rights reserved.</p>
        </div>
    </footer>
    <script src="sc.js"></script>
</body>

</html>