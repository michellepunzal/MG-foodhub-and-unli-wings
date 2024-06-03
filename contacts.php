<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Food Hub and Unli Wings</title>
    <link rel="stylesheet" href="contact.css">

</head>
<style>
body,
h1,
h2,
h3,
p,
ul,
li {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: white;
    color: #333;
    overflow-x: hidden;
    /* Prevent horizontal scrolling */
}

.container {
    margin: 0 auto;
    /* Center the container */
    width: 90%;
    font-family: Copperplate, Papyrus, fantasy;
    color: white;
    background-color: rgba(0, 0, 0, 0.8);
}

header {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 2px;
    position: fixed;
    /* Fix the navigation bar at the top */
    width: 100%;
    /* Make it full-width */
    top: 0;
    /* Align it at the top */
    z-index: 1000;
    /* Ensure it's above other content */
    height: min-content;
    transition: background-color 0.3s ease;
    /* Add smooth transition */
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    font-size: 50px;
}

.logo {
    display: inline-block;
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 50%;
    /* Make it a circle */
    padding: 7px;
    /* Adjust padding as needed */
}

.logo img {
    height: 100px;
    /* Adjust logo height as needed */
    cursor: pointer;
}

.menu-icon {
    display: none;
    cursor: pointer;
    float: right;
    /* Align the toggle button to the right */
    position: relative;
}

.menu {
    display: flex;
    float: right;
    font-size: 25px;
    margin: 0 0 0;
}

.menu li {
    display: inline-block;
    margin-right: 20px;
    content: initial;
}

.menu li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    transition: color 0.3s ease;
    margin-right: 50px;
}

.menu a:hover {
    color: rgba(255, 136, 0, 0.575);
    /* Color on hover */
}

.menu a.active {
    color: rgba(255, 136, 0, 0.575);
    /* Color for active link */
}

#menu-toggle {
    display: none;
}

.hero {
    overflow: hidden;
    background-image: url("chix.png");
    background-repeat: no-repeat;
    background-size: cover;
    height: 400px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6600;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #cc5500;
}

.intro {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: black;
    color: white;
    margin-top: -440px;
    /* Adjust as needed */
}

.intro img {
    float: right;
    max-width: 22%;
    padding-top: 2%;
}

.intro p {
    text-align: left;
    text-align: center;
    margin-right: 10px;
    font-size: 30px;
    color: white;
    padding-top: 2%;
}

.phh {
    background-color: black;
    text-align: center;
    padding: 20px;
    color: #fff;
}

.history {
    overflow: hidden;
    background-image: url("call.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    padding-top: 10%;
    padding-bottom: 10%;
}

.history p {
    font-size: 30px;
    text-align: center;
}

.contact-info {
    color: #fff;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

@media screen and (max-width: 768px) {

    /* Adjustments for smaller screens */
    body,
    h1,
    h2,
    h3,
    p,
    ul,
    li {
        font-size: 16px;
        /* Adjust font sizes */
    }

    .content {
        font-size: 16px;
        /* Adjust font size */
        padding-top: 20px;
        /* Adjust padding top */
    }

    .content h2 {
        font-size: 24px;
        /* Adjust font size */
    }

    .content p {
        font-size: 16px;
        /* Adjust font size */
    }

    .next p,
    .happy p,
    .intro p {
        font-size: 16px;
        /* Adjust font size */
    }

    .intro {
        height: 100vh;
        /* Keep height fixed */
    }

    .slideshow {
        width: 100%;
        /* Full width */
    }

    .slideshow img {
        width: 80%;
        /* Adjust image width as needed */
        max-width: 100%;
        /* Ensure the image doesn't exceed its container */
        height: auto;
        /* Maintain aspect ratio */
        position: absolute;
        /* Position the image absolutely */
        top: 50%;
        /* Position the image vertically in the middle */
        left: 50%;
        /* Position the image horizontally in the middle */
        transform: translate(-50%, -50%);
        /* Center the image */
        border: 10px solid #333;
        /* Set border around the "phone" */
        border-radius: 20px;
        /* Add border radius for rounded corners */
        overflow: hidden;
        margin: 0;
        /* Remove margin */
    }

    .window {
        width: 90%;
        /* Adjust width for smaller screens */
        max-width: 300px;
        /* Set maximum width */
        height: auto;
        /* Auto height */
    }

    header h1 {
        font-size: 30px;
        /* Adjust font size */
    }

    #menu-toggle {
        display: none;
        /* Hide the checkbox by default */
    }

    #menu-toggle:checked+.menu {
        display: flex;
        /* Show menu when checkbox is checked */
        justify-content: center;
        /* Center horizontally */
        align-items: center;
        /* Center vertically */
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.8);
        /* Semi-transparent background */
        z-index: 1000;
        /* Ensure it's above other content */
    }

    .menu {
        display: none;
        /* Hide menu by default */
        text-align: center;
        width: 100%;
        height: 100%;
        /* Ensure menu fills the entire screen */
        padding-top: 60px;
        /* Add padding to center menu content vertically */
        padding-left: 90px;
    }

    .menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu li {
        display: block;
        margin: 10px 0;
    }

    .logo {
        display: block;
        /* Ensure logo is always visible */
        position: fixed;
        /* Keep the logo fixed */
        top: 20px;
        /* Adjust top positioning as needed */

        z-index: 1001;
        /* Ensure logo is above other content */
    }

    /* Style the toggle button for mobile */
    .menu-icon {
        display: block;
        cursor: pointer;
        font-size: 30px;
        line-height: 1;
        position: absolute;
        top: 25px;
        right: 10px;
        z-index: 1002;
        /* Ensure it's above logo */
        margin-right: 15px;
    }
}
</style>

<body>
    <header id="header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        <ul class="menu">
            <li><a href="client.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="location.php">Locations</a></li>
            <li><a href="contacts.php" class="active">Contact</a></li>
        </ul>
    </header>




    <section class="hero">
    </section>
    <div class="phh">

        <h1> CONTACT US </h1>




    </div>

    <section class="history">
        <?php
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

// Fetch contact information from the database
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

// Check if there is at least one row of contact information
if ($result->num_rows > 0) {
    // Fetch and store the contact information in an array
    $contacts = $result->fetch_assoc();

    // Display the contact information
    echo "<div class='contact-info'>";
    echo "<p>Email: {$contacts['email']}</p><br>";
    echo "<p>Mobile: {$contacts['mobile']}</p><br>";
    echo "<p>Facebook URL: <a href='{$contacts['facebook_url']}'>{$contacts['facebook_url']}</a></p>";
    echo "</div>";
} else {
    // No contact information available
    echo "<p>Contact information not available.</p>";
}

// Close the database connection
$conn->close();
?>



    </section>


    <footer>
        <div>
            <p>&copy; 2024 MG Food Hub. All rights reserved.</p>
        </div>
    </footer>
    <script src="sc.js"></script>
</body>

</html>