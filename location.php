<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Food Hub and Unli Wings</title>
    <link rel="stylesheet" href="location.css">

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
    background-image: url("ss.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-color: rgba(255, 255, 255, 0.5);
    padding-bottom: 10%;
    display: flex;
    justify-content: center;
    align-items: center;
    /* Vertically center the content */
    height: 100vh;
}

.click-me {
    text-decoration: none;
    padding: 50px 100px;
    /* Increase padding to make the button bigger */
    font-size: 20px;
    /* Increase font size to make the text bigger */
    color: #fff;
    background-color: red;
    border: 2px solid #007bff;
    border-radius: 70%;
    /* Make it circular */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    /* Add shadow effect */
    transition: background-color 0.3s, border-color 0.3s, box-shadow 0.3s;
}

.click-me:hover {
    background-color: #0056b3;
    border-color: #0056b3;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
    /* Increase shadow on hover */
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
            <li><a href="location.php" class="active">Locations</a></li>
            <li><a href="contacts.php">Contact</a></li>
        </ul>
    </header>




    <section class="hero">
    </section>
    <div class="phh">

        <h1> LOCATE US </h1>


    </div>

    <section class="history">

        <iframe width="1000" height="450" style="border: 0" loading="lazy" allowfullscreen
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.013422450224!2d121.27332119999999!3d14.179830499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5f002ec0cc99%3A0x63a840e54f94ba6a!2sMG%20FOOD%20HUB%20AND%20UNLI%20WINGS!5e0!3m2!1sen!2sph!4v1649764536711!5m2!1sen!2sph">
        </iframe>
    </section>






    <footer>
        <div>
            <p>&copy; 2024 MG Food Hub. All rights reserved.</p>
        </div>
    </footer>
    <script src="sc.js"></script>
</body>

</html>