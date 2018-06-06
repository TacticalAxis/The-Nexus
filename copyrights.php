<?php
require_once 'vendor/autoload.php';
require_once 'vendor/mashape/unirest-php/src/Unirest.php';
include('client.php');
$client_ip = client::get_ip();
$client_os = client::get_os();
$client_browser = client::get_browser();
$client_device = client::get_device();

header("content-type: text/html; charset=UTF-8");
?>
<html lang="en" style="margin: 0; height: 100%; overflow: hidden">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Nexus &bull; Copyrights</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<style>
    html {
        overflow: scroll;
        overflow-x: hidden;
    }
    
    ::-webkit-scrollbar {
        width: 0px;
        background: transparent;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #FF0000;
    }
    /* div {
                    border: .25px solid #73AD21;
                } */
    
    #overlay {
        position: fixed;
        /* Sit on top of the page content */
        display: none;
        /* Hidden by default */
        width: 10%;
        /* Full width (cover the whole page) */
        height: 100%;
        /* Full height (cover the whole page) */
        top: 50;
        left: 50;
        right: 50;
        bottom: 50;
        background-color: rgba(0, 0, 0, 0.5);
        /* Black background with opacity */
        z-index: 2;
        /* Specify a stack order in case you're using a different order for other elements */
        cursor: pointer;
        /* Add a pointer on hover */
        margin-left: 500px;
    }
</style>

<body style="margin: 0; height: 100%; overflow: hidden">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('./img/nexusbackground.png'); background-attachment: fixed; background-size: cover; width:100vw; height:1000vh;">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="/">
                        <img class="logo" src="img/logo.png" alt="logo">
                        <img class="logo-alt" src="img/logo-alt.png" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Collapse nav button -->
                <div class="nav-collapse">
                    <span></span>
                </div>
                <!-- /Collapse nav button -->
            </div>

            <!--  Main navigation  -->
            <ul class="main-nav nav navbar-nav navbar-right">
                <!-- HOME -->
                <li><a href="/">Home</a></li>
                <!-- NEED AND OPPORTUNITY, CONCEPTUAL STATEMENT(WHAT IS THE NEED FOR MY WEBSITE) -->
                <li><a href="about.php">About</a></li>
                <!-- USER DOCUMENTATION, PICTURE AND VIDEO -->
                <li><a href="user-documentation.php">User Documentation</a></li>
                <!-- APPLICATIONS AND SOFTWARE USED, COPYRIGHTS -->
                <li><a href="copyrights.php">Copyrights</a></li>
                <!-- LIVE CONTACT FORM -->
                <li><a href="contact.php">Contact</a></li>
                <!-- SUPPORT -->
                <li><a href="support.php">Support</a></li>
            </ul>
            <!-- /Main navigation -->
        </div>
    </nav>
    <!-- /Nav -->

    <!-- Search Results -->

    <div style="position: absolute; margin-top:0%; margin-left:3%">
        <h3 style="color: white;">COPYRIGHTS INFORMATION AND RESOURCES THAT WERE USED</h3>
    </div>

    <div style="margin-top:0%; padding: 2.5%">
        <div style="float:center; width:50%; height: 80%; overflow:scroll;">
            <div style="padding: 0.5%">
                <h2 style="color: white;">Copyrights Information: </h2>
                
                <h4 style="color: white;">ColorLib Website Template</h4>
                Honestly, the entire website template is completely different from the original ColorLib one. The only reason that I'm putting this here, is because I used their template of 'Creative Agency' to inspire the design of my website. For more awesome website templates make sure to visit <a href="https://colorlib.com">https://colorlib.com</a>. The licence that was used, is a reative Commons Attribution 3.0 license. You can find the details of it <a href="https://creativecommons.org/licenses/by/3.0/">here</a>.
                <br><br>
                <h4 style="color: white;">PHPMailer</h4>
                This is the library that I have used to send emails on the website. They have aen.html GNU Lesser General Public License, version 2.1, which allows commercial and private use, modification and distribution. The licence can be found <a href="https://www.gnu.org/licenses/old-licenses/lgpl-2.1.">here</a>. The link to the GitHub Source Code Repository of this library is <a href="https://github.com/PHPMailer/PHPMailer">here</a>.<br>
                <br><br>
                <h4 style="color: white;">UserInfo</h4>
                This is the library that I have used to get (not collect. Collect means storing the data, which we don't do.) user data from the website. This is only used to troubleshoot errors from the support page. There is no specified licence attached to this open source project. The link to the GitHub Source Code Repository of this library is <a href="https://github.com/marufhasan1/user_info">here</a>.<br>
                <br><br>

                <h2 style="color: white;">Websites Used: </h2>
                <h4 style="color: white;">CSS-Tricks</h4>
                This website has many cool tutorials and resources about CSS styling on HTML pages. I used this website to find out how to use CSS (Cascading Style Sheets). The link to this website is <a href="https://css-tricks.com/">https://css-tricks.com/</a>.<br>
                <br><br>
                <h4 style="color: white;">GitHub</h4>
                This is the online Git Repository that I have used to open source my project. This is also a great place to check  out other open source projects that people have created. This is where I got the libraries 'PHPMailer' and 'UserInfo'. The link to this website is <a href="https://github.com/">https://github.com/</a>. Mr. Goundar, if you want to check out my GitHub repository, where I upload my personal projects (where I also uploaded my website source code) feel free to check it out at <a href="https://github.com/TacticalAxis">https://github.com/TacticalAxis</a><br>
                <br><br>
                <h4 style="color: white;">W3-Schools</h4>
                This is the website where I found out how to manipulate PHP, HTML, and CSS too. This website is a great learning tool for anyone who wants to learn certain coding lanugages specified on the website. The link to this website is <a href="https://www.w3schools.com/">https://www.w3schools.com/</a>.<br>
                <br><br>
                <h4 style="color: white;">StackOverflow</h4>
                This is one of the most amazing websites that I have ever used. Almost litterally every coding question possible has probably been answered here. This is where I got alot of the answers to problems, when I really just did not know what to do.  The link to this website is <a href="https://stackoverflow.com/">https://stackoverflow.com/</a>.<br>
                <br><br>
                <h4 style="color: white;">PHP-Documentation</h4>
                This is the official documentation of everything in the PHP programming language that is server-side. The link to this website documentation is <a href="http://php.net/docs.php">http://php.net/docs.php</a>.<br>
                <br><br>

                <h2 style="color: white;">APIs Used: </h2>
                <h3 style="color: white;">What is an API?</h3>
                An API is a Application Programming Interface. Ok, so some websites host an API with features. One of these features, for in the context I use it in, is a search feature. So I have an API key that allows me to connect to their website through HTTP, and when I want to request data, I send that website my API key and my search query. The website gives me back a response, which I then parse into JSON(JavaScript Oriented Notation) and then, display the results in HTML as the search results that you see when you search something up on my website.<br>
                <br><br>
                <h4 style="color: white;">RapidAPI - ContextualWeb API</h4>
                This is a search result API that allows me to send search requests, and get a response. The link to the API page is <a href="https://rapidapi.com/contextualwebsearch/api/Web%20Search/functions">here</a>.<br>
                <br><br>
                <h4 style="color: white;">Mashape - FAROO API</h4>
                This is a search result API that allows me to send search requests, and get a response. The link to the API page is <a href="https://market.mashape.com/faroo/faroo-web-search">here</a>.<br>
                <br><br>
            </div>
        </div>
    </div>
</body>
</html>