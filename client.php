<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Food Hub and Unli Wings</title>
    <link rel="stylesheet">

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

/* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color: white;
    color: #333;
    max-width: 100%;
}

.window {
    text-align: center;
    margin-top: 2%;
    margin-left: 27%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: rgba(15, 2, 2, 0.5);
    /* Red with transparency */
    border: 2px solid rgba(76, 3, 3, 0.497);
    /* Slightly darker red for border */
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    /* Shadow effect */
    z-index: 9999;
    /* Ensure it's on top of other elements */
    color: #fff;
    transition: background-color 0.3s, transform 0.3s, padding 0.3s;
    /* Add transitions for smooth hover effect */
}

.window:hover {
    background-color: rgba(15, 2, 2, 0.7);
    /* Darken the background color on hover */
    transform: scale(1.1);
    /* Increase the size on hover */
    ;
    /* Increase padding on hover */
}


.close-button {
    position: absolute;
    top: 5px;
    right: 5px;
    cursor: pointer;
    font-size: 20px;
    color: white;
}

.content {
    text-align: center;
    overflow: auto;
}

/* Style the link */
.content a {
    display: inline-block;
    background-color: rgba(210, 12, 12, 0.408);
    color: white;
    padding: 5px 20px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

/* Hover effect for the link */
.content a:hover {
    background-color: rgba(0, 0, 255, 0.8);
}

.next {
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url("back.png");
    background-repeat: no-repeat;
    background-size: cover;
    backface-visibility: 10%;
    color: white;
    margin-top: -20px;
}

.next p {
    text-align: left;
    text-align: center;
    margin-right: 10px;
    font-size: 40px;
    color: white;
    padding-top: 2%;
    padding: 10%;
}

.happy {
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url("blo.png");
    background-repeat: no-repeat;
    background-size: cover;
    backface-visibility: 10%;
    color: white;
    margin-top: -20px;
}

.happy p {
    text-align: left;
    text-align: center;
    margin-right: 10px;
    font-size: 40px;
    color: white;
    padding-top: 2%;
    padding: 10%;
}

.intro {
    width: auto;
    /* Full width */
    height: 100vh;
    /* Full height of the viewport */
    overflow: hidden;
    background-image: url("bgc.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    /* Adjust opacity here */
    color: white;
    /* Text color */
    display: flex;
    /* Use flexbox for alignment */
    justify-content: flex-start;
    /* Align items to the start (left) */
    align-items: center;
    /* Center vertically */
    padding-left: 20px;
    /* Add padding to push text away from the left edge */
}

.intro p {
    text-align: center;
    font-size: 40px;
}

/* Styling for the slideshow container */
.slideshow {
    width: 70%;
    /* Adjust width as needed */
    height: 300px;
    /* Adjust height as needed */
    position: relative;
    margin-left: auto;
    /* Push the slideshow to the right */
    padding-right: 20px;
    /* Add padding to push images away from the right edge */
}

/* Styling for the slideshow images */
.slideshow img {
    width: 80%;
    /* Adjust image size as needed */
    height: auto;
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    opacity: 0;
    transition: opacity 1s ease-in-out;
    /* Smooth transition */
    border: 10px solid #333;
    /* Set border around the "phone" */
    border-radius: 20px;
    /* Add border radius for rounded corners */
    overflow: hidden;
    margin-right: 25%;
}

/* Initially show only the first image */
.slideshow img:first-child {
    opacity: 1;
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

/* Hero Section Styles */
#hero {
    background-size: cover;
    background-position: center;
    height: 100vh;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: black;
}

#prevBtn,
#nextBtn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    padding: 10px 20px;
    font-size: 50px;
    cursor: pointer;
    background: transparent;
    border: none;
    color: white;
    outline: none;
    transition: opacity 0.3s;
    z-index: 1;
    /* Ensure buttons are above the background */
}

#prevBtn,
#nextBtnzx:hover {
    opacity: 0.7;
    color: aqua;
}

#prevBtn {
    left: 20px;
}

#nextBtn {
    right: 20px;
}

#hero h1 {
    font-size: 50px;
    margin-bottom: 20px;
}

#hero p {
    font-size: 25px;
    margin-bottom: 20px;
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

/* Section Styles */
section {
    padding: 50px 0;
}

section h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

section p {
    font-size: 16px;
    margin-bottom: 20px;
}

.cookie-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    /* Semi-transparent black background */
    z-index: 9999;
    /* Ensure it's on top of other content */
    display: flex;
    justify-content: center;
    align-items: end;
}

.cookie-message {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    text-align: center;
}

.cookie-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.cookie-button:hover {
    background-color: #0056b3;
}

/* Footer Section Styles */
footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

/* Hide the checkbox by default */
/* Hide the checkbox by default */
#menu-toggle {
    display: none;
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
            <li><a href="contacts.php">Contact</a></li>
        </ul>
    </header>


    <section id="hero" class="hero">

        <!-- Previous and Next buttons -->
        <button id="prevBtn" onclick="prevBackground()">&#10094;</button>
        <button id="nextBtn" onclick="nextBackground()">&#10095;</button>


        <div id="window" class="window">
            <a href="#intro" style="text-decoration: none; color: inherit;">
                <div class="content" style="text-align: center; overflow: auto;">
                    <h2><b>WELCOME TO</b></h2>
                    <h2><b>MG FOODHUB AND UNLI WINGS</b></h2>
                    <p style="font-size: 20px;">"Experience Infinite Wing Delight!"</p>
                </div>
            </a>
        </div>




    </section>

    <section class="intro" id="intro">

        <p><b>At MG Unli Wings, we're passionate about serving up endless flavors and unlimited satisfaction.</b></p>
        <div class="slideshow">
            <img src="cos1.jpg" alt="Image 1">
            <img src="cos2.png" alt="Image 2">
            <img src="cos3.png" alt="Image 3">
            <img src="cos4.png" alt="Image 4">
            <img src="cos5.jpg" alt="Image 5">
            <img src="cos6.png" alt="Image 6">
            <img src="cos6.png" alt="Image 7">
            <img src="cos7.png" alt="Image 8">
            <img src="cos8.png" alt="Image 9">
            <img src="cos9.png" alt="Image 10">
            <img src="cs1.png" alt="Image 11">
            <img src="cs2.png" alt="Image 12">
            <img src="cs3.jpg" alt="Image 13">

        </div>
    </section>


    <section class="next">

        <p><b><span style="background-color:rgba(0, 0, 0, 0.2); ">At MG Unli Wings, we're passionate about serving up
                    endless flavors and unlimited satisfaction.</span></b> </p>

    </section>


    <section class="happy">

        <p><b>Savor the irresistible flavors of our wings in an atmosphere where genuine hospitality and friendly
                service are always on the menu, creating a dining experience that feels like home. Plus, enjoy the
                convenience of delivery for our nearby patrons, bringing our delicious offerings straight to your
                doorstep.</b> </p>

    </section>




    <footer>
        <div>
            <p>&copy; 2024 MG Food Hub. All rights reserved.</p>
        </div>
    </footer>
    <script>
    function acceptCookies() {
        // Send AJAX request to record acceptance
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Hide the cookie overlay
                document.getElementById("cookie-overlay").style.display = "none";
            }
        };
        xhttp.open("GET", "accept_cookie.php", true);
        xhttp.send();
    }

    function rejectCookies() {
        // Send AJAX request to record rejection
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Hide the cookie overlay
                document.getElementById("cookie-overlay").style.display = "none";
            }
        };
        xhttp.open("GET", "reject_cookie.php", true);
        xhttp.send();
    }
    </script>


    <script src="script.js"> </script>


</body>

</html>

