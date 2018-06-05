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

    <title>The Nexus &bull;
        <?php echo $search;?>
    </title>
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
        <h3 style="color: white;">LIVE SUPPORT AND F.A.Q.</h3>
    </div>

    <div style="margin-top:0%; padding: 2.5%">
        <div style="float:left; width:75%; height: 80%; overflow:scroll;">
            <div style="padding: 0.5%">
                <h2 style="color: white;">Your Current Browser Information:</h2>
                Please note that the follwing information is not recorded, kept, stored or saved anywhere on our website to protect your privacy. We do not sell this information to advertisers either, like Mark Zuckerber does with Facebook. When requesting support, please copy the below text into the chat window, before your question. Please use ONE message, not multiple.<br>
                =========================================================<br>
                IP Address: <?php echo $client_ip; ?><br>
                Operating System: <?php echo $client_os; ?><br>
                Browser: <?php echo $client_browser; ?><br>
                Device: <?php echo $client_device; ?><br>
                =========================================================<br>
                <br>
                <h2 style="color: white;">RULES FOR DISCORD CHAT:</h2>
                1. You may not talk about hacking in any way shape or form. This includes asking for help with the making of illegal software.<br> 
                2. You not allowed to curse.<br>
                3. You can only share links from a reputable source. Distributing shortened links and/or links that automatically start downloads is not allowed.<br>
                4. Advertising on the server and/or in private message with members of the server is not allowed. This includes promoting other servers, channels, websites and more.<br>
                5. You are not allowed to spam on the server. Although we are not online 24/7 (because we are humans), you can still type out your message here or contact us via the contact page. Make sure that before doing these things, that you have checked out our FAQ, and seen if your issue has a solution.<br>
                6. You may not unnecessarily tag high staff members. When tagging a staff member include the message in it.<br>
                7. You may not impersonate staff members.<br>
                8. You may not disrespect staff. This includes swearing at staff members.<br>
                9. You are not allowed to share any NSFW media/content. This includes sending links, images, GIFs, and videos.<br>
                10. You should not bash other members and/or start/participate in heated arguments.<br>
                11. One should always follow staffs orders. If one does not follow one's orders punishments can be made.<br>
                12. This chat is only for support, not general talk! Please be considerate of others!<br>
                <br>
                <h2 style="color: white;">Frequently Asked Questions: </h2>
                1. Austin Dorr is getting excellence for DTE right?<br>
                2. ... <br>
            </div>
        </div>
        <div style="float:right; overflow: scroll;">
            <iframe src="https://titanembeds.com/embed/453460088590434305?defaultchannel=453460088590434307&theme=DiscordDark" height="80%" width="100%" frameborder="0"></iframe>
        </div>
    </div>

    
</body>
</html>