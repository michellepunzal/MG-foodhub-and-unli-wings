
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

// Retrieve search query if it exists
$searchQuery = isset($_GET['query']) ? htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8') : '';

// Fetch menu items from the database based on search query
if ($searchQuery) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
    $searchTerm = '%' . $searchQuery . '%';
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
}

$menuItems = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Food Hub and Unli Wings</title>
    <link rel="stylesheet" href="MENU.CSS">
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
    }

    .container {
        margin: 0 auto;
        width: 90%;
        font-family: Copperplate, Papyrus, fantasy;
        color: white;
        background-color: rgba(0, 0, 0, 0.8);
    }

    header {
        background-color: rgba(0, 0, 0, 0.2);
        padding: 2px;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        height: min-content;
        transition: background-color 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 50px;
    }

    .search-container {

        text-align: center;
    }

    .search-container input[type="text"] {
        padding: 10px;
        width: 300px;
        border-radius: 5px;
        font-size: 16px;
    }

    .search-container input[type="submit"] {
        padding: 10px 20px;
        background-color: #ff6600;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;

    }

    .search-container input[type="submit"]:hover {
        background-color: #cc5500;
    }

    .logo {
        display: inline-block;
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 50%;
        padding: 7px;
    }

    .logo img {
        height: 100px;
        cursor: pointer;
    }

    .menu-icon {
        display: none;
        cursor: pointer;
        float: right;
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
    }

    .menu a.active {
        color: rgba(255, 136, 0, 0.575);
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
        background-image: url("brik.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-color: rgba(255, 255, 255, 0.5);
    }

    .menunas img {
        text-align: center;
        margin-left: 25%;
        width: 50%;
        height: 1000%;
        padding-top: 20%;
        padding-bottom: 20%;
    }

    .frame {
        border: 4px solid #ccc;
        padding: 5px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    .frame img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .prr {
        text-align: center;
        font-size: 50px;
    }

    .menu-container {
        background-image: url('brik.png');
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .menu-container::before {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: url('brick-wall-texture.jpg');
        background-size: cover;
        border-radius: 10px;
        z-index: -1;
    }

    .menu-item {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: calc(33.33% - 30px);
        /* Adjusted width */
        text-align: center;
        position: relative;
        transition: transform 0.3s, box-shadow 0.3s;
        float: left;
        /* Added float property */
        margin-right: 20px;
        /* Added margin for spacing between columns */
    }

    .menu-item:last-child {
        margin-right: 0;
        /* Remove right margin from the last item */
    }


    .menu-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: aqua;
    }

    .menu-item::before {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
        z-index: -1;
    }

    .menu-item h2 {
        font-size: 30px;
        margin-bottom: 10px;
        color: #333;
    }

    .menu-item p {
        font-size: 20px;
        color: #666;
        margin-bottom: 5px;
    }

    .menu-item p.price {
        font-weight: bold;
        color: #ff6600;
    }

    .menu-item img {
        max-width: 100%;
        max-height: 100px;
        /* Adjust height as needed */
        border-radius: 10px;
        margin-bottom: 10px;
    }

    footer {
        background-color: #333;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }

    @media screen and (max-width: 768px) {

        body,
        h1,
        h2,
        h3,
        p,
        ul,
        li {
            font-size: 16px;
        }

        .content {
            font-size: 16px;
            padding-top: 20px;
        }

        .content h2 {
            font-size: 24px;
        }

        .content p {
            font-size: 16px;
        }

        .next p,
        .happy p,
        .intro p {
            font-size: 16px;
        }

        .intro {
            height: 100vh;
        }

        .slideshow {
            width: 100%;
        }

        .slideshow img {
            width: 80%;
            max-width: 100%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 10px solid #333;
            border-radius: 20px;
            overflow: hidden;
            margin: 0;
        }

        .window {
            width: 90%;
            max-width: 300px;
            height: auto;
        }

        header h1 {
            font-size: 30px;
        }

        #menu-toggle {
            display: none;
        }

        #menu-toggle:checked+.menu {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
        }

        .menu {
            display: none;
            text-align: center;
            width: 100%;
            height: 100%;
            padding-top: 60px;
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
            position: fixed;
            top: 20px;
            z-index: 1001;
        }

        .menu-icon {
            display: block;
            cursor: pointer;
            font-size: 30px;
            line-height: 1;
            position: absolute;
            top: 25px;
            right: 10px;
            z-index: 1002;
            margin-right: 15px;
        }
    </style>
</head>

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
            <li><a href="menu.php" class="active">Menu</a></li>
            <li><a href="location.php">Locations</a></li>
            <li><a href="contacts.php">Contact</a></li>
        </ul>
    </header>

    <section class="hero">
        <!-- Include your hero section content here -->

    </section>

    <div class="phh">
        <h1>LOOK WHAT WE GOT HERE 👀</h1>

    </div>
    <div class="history">
        <div class="search-container">
            <form action="menu.php" method="GET">
                <input type="text" name="query" placeholder="Search for products..."
                    value="<?php echo $searchQuery; ?>">
                <input type="submit" value="Search">
            </form>

        </div>
        <div class="menu-container">


            <?php
// Display menu items
if (!empty($menuItems)) {
    foreach ($menuItems as $item) {
        echo "<div class='menu-item' data-name='" . htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') . "'>";
        echo "<h2>" . htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') . "</h2>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($item['photo']) . "' alt='Product Photo' style='max-width: 100px; max-height: 100px;'>";
        echo "<p>" . htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>Price: " . htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<button class='order-btn'>Order</button>"; // Add order button
        echo "</div>";
    }
} else {
    echo "<p>No menu items available.</p>";
}
?>
        </div>
    </div>

    <footer>
        <div>
            <p>&copy; 2024 MG Food Hub. All rights reserved.</p>
        </div>
    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const orderButtons = document.querySelectorAll(".order-btn");

        orderButtons.forEach(button => {
            button.addEventListener("click", function() {
                const itemName = this.parentElement.dataset.name;
                const userResponse = confirm("Do you want to order " + itemName + "?");

                if (userResponse) {
                    // Redirect to regis.php
                    window.location.href = "regis.php?item_name=" + encodeURIComponent(
                        itemName);
                }
            });
        });
    });

    // Initial calculation if an item is pre-checked
    </script>

</body>

</html>

<?php
// Close the database connection
$conn->close();
?>