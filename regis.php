<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <title>ORDERING FORM</title>
    <link rel="stylesheet" type="text/css" href="regist.css">
</head>
<style>
body {
    font-family: 'Times New Roman', Times, serif;
    background-color: #f0e6d2;
    /* Faded yellowish paper */
    margin: 0;
    padding: 0;
}

.form-container {
    background-color: #f5f5f5;
    /* Light gray background */
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
    margin-bottom: 20px;
    text-align: center;
    color: #333;
    font-size: 28px;
}

.form-group {
    margin-bottom: 20px;
}

.message-box {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: transparent;
    /* Remove background color */
    padding: 20px;
    border: none;
    /* Remove border */
    box-shadow: none;
    /* Remove box shadow */
    font-size: 150px;
}

/* Style success message */
.success-message {
    color: green;
}

/* Style error message */
.error-message {
    color: red;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    /* Dark gray text */
    font-size: 18px;
}

.form-group input,
.form-group textarea,
.form-group button {
    width: calc(50% - 5px);
    /* Adjusted width to make both buttons take up half of the container */
    padding: 10px;
    border: none;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 18px;
    cursor: pointer;
}

.form-group textarea {
    resize: vertical;
}

.form-group input[type="submit"],
.form-group button {
    background-color: #333;
    /* Dark gray button */
    color: white;
}

.form-group input[type="submit"]:hover,
.form-group button:hover {
    background-color: #555;
    /* Dark gray hover */
}

.form-group::after {
    content: '';
    display: block;
    border-bottom: 2px solid #333;
    /* Dark gray divider */
    margin-top: 20px;
}

/* Center buttons */
.button-group {
    display: flex;
    flex-direction: column;
    /* Set flex direction to column */
    width: 100%;
    /* Full width */
}



input[type="submit"] {
    background-color: green;
    /* Green background color */
    color: white;
    /* White text color */
    padding: 10px 20px;
    /* Adjust padding as needed */
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="cancel"] {
    background-color: red;
    /* Red background color */
    color: white;
    /* White text color */
    padding: 10px 1px;
    /* Adjust padding as needed */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;

}

input[type="cancel"]:hover {
    background-color: #C40C0C;
}


input[type="submit"],
input[type="cancel"] {
    width: 100%;
    /* Make buttons full width */
    margin-top: 10px;
    /* Add margin between buttons */
}

.success-message,
.error-message {
    /* Remove box styling */
    border: none;
    background-color: transparent;
    /* Add additional styling as needed */
    /* For example, you can set text color and font size */
    color: green;
    /* for success message */
    /* color: red; */
    /* for error message */
    font-size: 16px;
    /* Ensure the messages are displayed inline */
    display: inline;
}
</style>

<body>

    <?php
    // Database connection parameters
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
    ?>

    <div class="message-box">
        <?php
// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $datetime = date('Y-m-d H:i:s', strtotime($_POST['datetime']));
    $phone = $_POST['phone'];
    $message = implode(", ", $_POST['orders']); // Correct variable name
    $totalAmount = 0;

    // Calculate total amount
    foreach ($_POST['orders'] as $order) {
        // Fetch the price of each selected product from the database
        $query = "SELECT price FROM products WHERE name = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $order);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $totalAmount += $row['price'];
    }
    
    // Prepare and execute SQL query to insert order into database
    $stmt = $conn->prepare("INSERT INTO tableregis (fullname, address, datetime, phone, message, total_amount) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssd", $fullname, $address, $datetime, $phone, $message, $totalAmount);
    $stmt->execute();

    // Close the statement
    $stmt->close();
    
    // Display success message
    echo '<div id="success-message" class="success-message">New record created successfully</div>';
    
    // Redirect to the homepage after 3 seconds
    echo '<script>

            setTimeout(function() {
                window.location.href = "client.php";
            }, 3000);
          </script>';
}

// Close connection
$conn->close();
?>

    </div>

    <div class="form-container">
        <h2>ORDERING FORM</h2>
        <form action="#" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label for="datetime">Date and Time:</label>
            <input type="datetime-local" id="datetime" name="datetime" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" title="Please enter numbers only" minlength="11" maxlength="11"
                required>
            <br>
            <label for="showOrders">SELECT YOUR ORDER HERE:</label>
            <button type="button" id="showOrders">Show Orders</button>
            <br>
            <br>
            <div id="orderList" style="display: none;">
                <label>Check your orders using checkbox:</label><br>
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

        // Query to fetch products from the database
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        // Check if there are any products
        if (mysqli_num_rows($result) > 0) {
            // Loop through each product and generate a checkbox
            $totalAmount = 0;

            // Display total amount (initially set to 0)
            echo "<span id='totalAmount' class='total'>Total: $totalAmount</span><br><br>";
        
            // Loop through each product and generate a checkbox with product name, photo, and price
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<input type='checkbox' id='product{$row['id']}' name='orders[]' value='{$row['name']}' data-price='{$row['price']}' onchange='calculateTotal()'>";
                echo "<label for='product{$row['id']}'>{$row['name']}</label>";
                
                // Display photo if available
                if ($row['photo'] !== null) {
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt='Product Photo' style='max-width: 100px; max-height: 100px;'><br>";
                } else {
                    echo "No photo available";
                }
                
                // Display price
                echo "<span class='price'>Price: {$row['price']}</span><br><br>";
            }
        }
        // Close the database connection
        $conn->close();
        ?>
            </div>
            <br>
            <br>
            <br>
            <br>

            <!-- Button group for Submit and Cancel -->
            <div class="button-group">
                <input type="submit" value="Submit">
                <input type="cancel" onclick="goBack()" value="Cancel">
            </div>
            <!-- JavaScript function to cancel -->
            <script>
            document.getElementById("showOrders").addEventListener("click", function() {
                // Show the list of orders
                document.getElementById("orderList").style.display = "block";
            });

            // Add event listener for the "back" button
            document.getElementById("backButton").addEventListener("click", function() {
                // Hide the list of orders
                document.getElementById("orderList").style.display = "none";
            });

            function goBack() {
                // Redirect to client.php
                window.location.href = "client.php";
            }

            function calculateTotal() {
                var checkboxes = document.querySelectorAll('input[name="orders[]"]:checked');
                var totalAmount = 0;
                checkboxes.forEach(function(checkbox) {
                    totalAmount += parseFloat(checkbox.getAttribute('data-price'));
                });
                document.getElementById('totalAmount').textContent = 'Total: ' + totalAmount.toFixed(2);
            }
            </script>
        </form>
    </div>

 </body>

