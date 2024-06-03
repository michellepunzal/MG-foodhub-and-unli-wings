<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any orders were selected
    if (isset($_POST['orders']) && !empty($_POST['orders'])) {
        // Loop through selected orders and display them
        echo "Selected Orders:<br>";
        foreach ($_POST['orders'] as $order) {
            echo "- $order<br>";
        }
    } else {
        echo "No orders selected";
    }
} else {
    // If form is not submitted, redirect back to the form page
    header("Location: regis.php");
    exit;
}
?>