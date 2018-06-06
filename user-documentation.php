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
    <title>The Nexus &bull; User Documentation</title>
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
        <h3 style="color: white;">USER DOCUMENTATION</h3>
    </div>

    <div style="margin-top:0%; padding: 2.5%">
        <div style="float:center; width:50%; height: 80%; overflow:scroll;">
            <div style="padding: 0.5%">
                <h2 style="color: white;">How to use the Website: </h2>
                 1. Go to the Home Page. <a href="https://searchthenexus.ddns.net">Click!</a><br>
                 2. Click on the search bar<br>
                 3. Type something into it<br>
                 4. View results, and scroll down to see more.<br>
                 5. To Check out the Information about this website, click on the respective tabs in the navigation bar at the top, or click <a href="about.php">About</a>, <a href="user-documentation.php">User Documentation</a>, <a href="copyrights.php">Copyrights</a>, <a href="contact.php">Contact</a>, <a href="support.php">Support</a>
                <br><br>
                <h2 style="color: white;">Need and Opportunity:</h2>
                I am going to create a website that allows people to search any* information on the internet, because my stakeholders want a new search engine, other than Google, Bing, Duck Duck Go, and Yahoo. The website has been requested by my stakeholders.<br>
                For more information see the Conceptual Statement.<br>
                <br>
                <h2 style="color: white;">Conceptual Statement:</h2>
                The need for my website, is to create a user-friendly, easy-to-use alternative to the Google, Bing, Duck Duck Go, and Yahoo search engines. This benefits not only me, as the website’s creator, but it also benefits other people who are also “bored” of using these other search engines. My stakeholders, Blake, Isaac and Eirik, need a website that allows them to search up any information on the internet. My stakeholders are getting tired of the “boring old Google” and “Bing” – they want something more user friendly – a product created with their own intentions in mind. Taken this into consideration, I have created a new search engine in PHP, called ‘The Nexus’. My stakeholders want me, the website creator, to create a user-friendly, appealing website, that suits their needs, for doing research – just as you would on Google. This is no normal website – this is a website where you can search the internet for whatever you want. <br>
                <br>
                <h2 style="color: white;">Website Criteria and Specifications: </h2>
                &bull; Website should have a clean, good-looking interface, like Google’s User Interface<br>
                Justification: Because Users need to be able to use this website without prior knowledge of this website<br><br>
                
                &bull; Website needs to include complete functioning search functions and support functions<br>
                Justification: Because these are the core functions of my website<br><br>
                
                &bull; Website Needs to have user friendly controls such as scrollbar, smooth, responsive animations<br>
                Justification: This is to allow user to navigate the website smoothly<br><br>
                
                &bull; Website needs to attract all people who are bored of using Google, Bing, Yahoo, or Duck Duck Go<br>
                Justification: Because we are a competitor of Google, as we are better than them<br><br>
                
                &bull; Website Must be created by only one person, that is ME (Nathan D)<br>
                Justification: This is to reveal to the teacher that it doesn't take 100 people to make one really good complicated but efficient website.<br><br>
                
                &bull; Website Must have edited pictures and videos<br>
                Justification: This is to help the user to be able to easily navigate the website and know what to do<br><br>
                
                &bull; Website Must have at least 4 pages like(Home, About, User Documentation, Copyrights, Contact, and Support)<br>
                Justification: This is much more easier on the eyes, than if all the information was cluttered onto one page<br><br>
                
                &bull; Website Must have a page with copyright information<br>
                Justification: This is to show that the materials used had licences. The website is completely aligned with the ethical principles of the licences.<br><br>
                
                &bull; Must have links connecting the pages<br>
                Justification: This helps with fleunt navigation purposes on the client's end<br><br>
                
                &bull; Homepage must have a title<br>
                Justification: This is there to proudly display the name of this new search engine<br><br>
                
                &bull; I should have a contacts page so I can be contacted by site users<br>
                Justification: So that I can get suggestions and feedback for the future<br><br>

                &bull; I should have a support page<br>
                Justification: So that users can report any current faults, which are then automatically sent to the website's email address, the client's email address, and the live discord support chat<br><br>
                <br>
            </div>
        </div>
        <img src="img/nexusbackground.png" alt="logo" style="width:35%; postion: absolute; margin-top:-42%; margin-left: 55%">
        <!-- <img src="img/nexusbackground.png" alt="logo" style="width:35%; postion: absolute; margin-top:-22%; margin-left: 55%"> -->
    </div>

    
</body>
</html>