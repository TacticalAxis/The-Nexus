<?php
require_once 'vendor/autoload.php';
require_once 'vendor/mashape/unirest-php/src/Unirest.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'searchthenexus@gmail.com';
$mail->Password = 'TheNexus1234#';
$mail->SetFrom('no-reply@searchthenexus.ddns.net');
$mail->FromName = "searchthenexus.ddns.net";
$id = "null";

include('client.php');
$client_ip = client::get_ip();
$client_os = client::get_os();
$client_browser = client::get_browser();
$client_device = client::get_device();
$webhookurl = "https://discordapp.com/api/webhooks/453790276046290965/Z1-RsJDhD-s_OBTtPw6qHlA0upMgOBBIK0GUYBusYD6Sa0Z8nRlPxjtT2NMRAaXdh_RM";

if(isset($_POST['submit']) && $id == "null") { 
    $name = $_POST['name'];
    $name = str_ireplace(' ','',$name);
    $id = $name . rand();
    $issue = $_POST['issue'];
    $user_email = $_POST['email'];
    $msg = "**ID: $id**\r\nName: $name\r\nIssue: $issue\r\nIP: $client_ip\r\nOS: $client_os\r\nBROWSER: $client_browser\r\nDEVICE: $client_device";
    $json_data = array ('content'=>"$msg");
    $make_json = json_encode($json_data);
    $ch = curl_init($webhookurl);
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $response999 = curl_exec($ch);
    $mail->Subject = "Regarding Support Ticket $id from The Nexus";
    $mail->Body = "Dear $name, \r\nYour ticket $id has been sucessfully sent to us, and is waiting approval and potential completion!\r\nHere are your details: \r\n$msg";
    $mail->AddAddress($user_email);
    $mail->AddAddress('searchthenexus@gmail.com');
    $mail->Send();
    header("Location: support.php");
}

header("content-type: text/html; charset=UTF-8");
?>
<html lang="en" style="margin: 0; height: 100%; overflow: hidden">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Nexus &bull; Support</title>
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
        <div style="float:left; width:70%; height: 80%; overflow:scroll;">
            <div style="padding: 0.5%">
                <h2 style="color: white;">Rules for Support Form and Discord Chat:</h2>
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
                <h5 style="color: white;">How Do I Use the Website?</h5>
                Go to our about page. At the top of your screen, there is a navigation bar. There, it says About. Click it. Or go here <a href="about.php">About</a><br>
                <br>
                <h5 style="color: white;">How do I search things?</h5>
                Go to our home page. At the top of your screen, there is a navigation bar. There, it says Home. Click it. Or go here <a href="https://searchthenexus.ddns.net">Home Page</a><br>
                <br>
                <h5 style="color: white;">Is there a User Documentation?</h5>
                Go to our user documentation page. At the top of your screen, there is a navigation bar. There, it says User Documentation. Click it. Or go here <a href="user-documentation.php">User Documentation</a><br>
                <br>
                <h5 style="color: white;">How Can I contact you?</h5>
                Go to our contact page. At the top of your screen, there is a navigation bar. There, it says Contact. Click it. Or go here <a href="contact.php">Contact</a><br>
                <br>
                <h5 style="color: white;">Is there any copyright information?</h5>
                Go to our copyrights page. At the top of your screen, there is a navigation bar. There, it says Copyrights. Click it. Or go here <a href="copyrights.php">Copyrights</a><br>
                <br>
                <h5 style="color: white;">Is my user data stored on the websites?</h5>
                We do not breach other people's privacy. All infomation from users are handled internally, and is removed when an issue is resolved.<br>
                <br>
                <h5 style="color: white;">One of the pages ain't working!</h5>
                Well, on our end we have made sure that all of the pages are working. First go to our home page, then click on every other page to check if it is working. If they are all working, then it means that you may have had an error in your URL. If that does not work, then try doing [Ctrl + Shift + R] on your computer keyboard. This force-reloads the page and makes sure that the cache is deleted. This may help fix any errors that occured when you previously tried to visit the page.<br>
            </div>
        </div>
        <div style="float:right; overflow: scroll; width: 25%;">
            <h2 style="color: white;">Support Ticket Request</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="name" autocomplete='off' placeholder="Your Name"><br><br>
                <input type="text" name="issue" autocomplete='off' placeholder="The Issue"><br><br>
                <input type="text" name="email" autocomplete='off' placeholder="Your Email"><br>
                <br>
                <center>
                    <input type="submit" name="submit" value="Submit"><br>
                </center>
            </form>
        </div>
    </div>

    
</body>
</html>