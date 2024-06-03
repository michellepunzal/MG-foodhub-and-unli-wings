<?php
// Start session
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Include database connection
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



// Retrieve data from the tableregis table
$orderSql = "SELECT * FROM tableregis";
$orderResult = $conn->query($orderSql);

// Retrieve data from the products table
$productSql = "SELECT * FROM products";
$productResult = $conn->query($productSql);

$successfulOrdersSql = "SELECT * FROM successful_orders";
$successfulOrdersResult = $conn->query($successfulOrdersSql);

// Retrieve counts from the acceptance table
$sql = "SELECT accepted_count, rejected_count FROM acceptance WHERE id = 1";
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch data from the result set
    $row = $result->fetch_assoc();
    // Check if $row is not null before accessing its elements
    if (isset($row['accepted_count'])) {
        $accepted_count = $row['accepted_count'];
    } else {
        // Handle the case when accepted_count is not set
        $accepted_count = 0; // or any default value you want
    }
    if (isset($row['rejected_count'])) {
        $rejected_count = $row['rejected_count'];
    } else {
        // Handle the case when rejected_count is not set
        $rejected_count = 0; // or any default value you want
    }
} else {
    // Handle the case when no rows are returned from the query
    $accepted_count = 0; // or any default value you want
    $rejected_count = 0; // or any default value you want
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $entryId = $_POST['id'];

    // Move the entry to the successful orders table
    $query = "INSERT INTO successful_orders SELECT * FROM tableregis WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $entryId);
    $stmt->execute();

    // Delete the entry from the original table
    $query = "DELETE FROM tableregis WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $entryId);
    $stmt->execute();

    echo "Entry moved successfully!";
}

$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

// Check if there is at least one row of contact information
if ($result->num_rows > 0) {
    // Fetch and store the contact information in an array
    $contacts = $result->fetch_assoc();
} else {
    // No contact information available
    $contacts = array();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f2f5;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #0056b3;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr {
        border-bottom: 1px solid #ccc;
    }

    tr:last-child {
        border-bottom: none;
    }

    .logout {
        text-align: right;
        margin-top: 20px;
    }

    .logout a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #0e59a0;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .logout a:hover {
        background-color: #0e59a0;
    }

    .button {
        display: inline-block;
        padding: 8px 16px;
        background-color: #1877f2;
        /* Adjust the background color as needed */
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #0e59a0;
        /* Adjust the hover background color as needed */
    }

    .butt {
        display: inline-block;
        padding: 8px 16px;
        background-color: #DD5746;
        /* Adjust the background color as needed */
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .butt:hover {
        background-color: #9B3922;
        /* Adjust the hover background color as needed */
    }

    .but {
        display: inline-block;
        padding: 8px 16px;
        background-color: #890596;
        /* Adjust the background color as needed */
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .but:hover {
        background-color: #5E1675;
        /* Adjust the hover background color as needed */
    }

    .fofo {
        max-width: 400px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="email"],
    input[type="text"],
    input[type="url"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Additional styles can be added as needed */


    /* Media query for mobile devices */
    @media screen and (max-width: 600px) {
        .container {
            padding: 10px;
        }

        h2 {
            font-size: 24px;
        }

        table {
            font-size: 14px;
        }

        th,
        td {
            padding: 8px;
        }

        .logout a {
            padding: 8px 16px;
        }
    }
    </style>

    <!-- Logout link -->

    <h1>Admin Dashboard</h1>
    <div class="logout">
        <a href="admin_logout.php">Logout</a>
    </div>
    <!-- Orders table -->
    <div class="container">
        <h2>ORDERS</h2>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Date and Time</th>
                    <th>Phone Number</th>
                    <th>List of Orders</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($orderResult->num_rows > 0) {
                    while ($row = $orderResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['fullname']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['datetime']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['message']}</td>";
                        echo"<td>{$row['total_amount']}</td>";
                        echo "<td>";
                        echo "<a href='#' onclick='markAsDone({$row['id']})' class='button'>Done</a> <br>";
                        echo "<br><a href='delete_entry.php?id={$row['id']}' class='butt'>Cancel</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>

                   <form method="GET" action="search.php">
                     <input type="text" name="query" placeholder="Search for products...">
                     <button type="submit">Search</button>
                   </form>

            </tbody>
        </table>

    </div>


    <!-- Successful Orders table -->
    <div class="container">
        <h1>Successful Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Date and Time</th>
                    <th>Phone Number</th>
                    <th>List of Orders</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            if ($successfulOrdersResult->num_rows > 0) {
                while ($row = $successfulOrdersResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['fullname']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['datetime']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>{$row['message']}</td>";
                    echo "<td>{$row['total_amount']}</td>";
                    echo "<td><a href='delete_successful_order.php?id={$row['id']}'  class='butt'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No data available</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- Products table -->
    <div class="container">
        <h2>Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
    if ($productResult->num_rows > 0) {
        while ($row = $productResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['price']}</td>";
            // Display photo if available
            if ($row['photo'] !== null) {
                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt='Product Photo' style='max-width: 100px; max-height: 100px;'></td>";
            } else {
                echo "<td>No photo available</td>";
            }
            echo "<td>";
            echo "<a href='edit_product.php?id={$row['id']}' class='button'>Edit</a>  ";
            echo "<a href='add_product.php' class='but'>Add</a>  ";
            echo "<a href='delete_product.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this product?\" )' class='butt'>Delete</a>"; // Add delete link
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No products available</td></tr>";
    }
    ?>
            </tbody>

        </table>
    </div>
    <div class="container">
        <h1>Edit Contact Information</h1>
        <form action="update_contact_info.php" method="post" class="fofo">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="<?php echo isset($contacts['email']) ? $contacts['email'] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" id="mobile" name="mobile" class="form-control"
                    value="<?php echo isset($contacts['mobile']) ? $contacts['mobile'] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="facebook_url">Facebook URL:</label>
                <input type="url" id="facebook_url" name="facebook_url" class="form-control"
                    value="<?php echo isset($contacts['facebook_url']) ? $contacts['facebook_url'] : ''; ?>">
            </div>

            <input type="submit" value="Save" class="btn btn-primary">
        </form>


    </div>

    <script>
    function markAsDone(entryId) {
        // Make an AJAX request to move the entry to the successful orders table
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "move_entry.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server (if needed)
                alert(xhr.responseText); // Display a success message
                // Optionally, reload the page or update the UI
            }
        };
        xhr.send("id=" + entryId);
    }
    </script>
</>

</html>