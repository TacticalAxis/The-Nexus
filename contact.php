<?php
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
$mail->FromName = "The Nexus";

$webhookurl = "https://discordapp.com/api/webhooks/453926372675551244/lz5xFJfIg67jis6iCGXVIIwqDkuvoqeWKZ-wYYF9u2uSBbdDgDet_lwK5fk79Pg1UJ0y";

if(isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $issue = $_POST['issue'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $msg = "`First Name:` $firstname\r\n`Last Name:` $lastname\r\n`Email:` $email\r\n`Comment:` $comment";
    $json_data = array ('content'=>"$msg");
    $make_json = json_encode($json_data);
    $ch = curl_init($webhookurl);
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $response999 = curl_exec($ch);
    $mail->Subject = "Feedback from $firstname $lastname on The Nexus";
    $mail->Body = "$firstname $lastname said: \"$comment\"";
    $mail->AddAddress('searchthenexus@gmail.com');
    $mail->Send();
    $mail->ClearAllRecipients( );
    $mail->Subject = "Feedback from You ($firstname $lastname) on The Nexus";
    $mail->Body = "You said: \"$comment\"";
    $mail->AddAddress($email);
    $mail->Send();
    header("Location: contact.php");
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

    <center>
        <h2 style="color: white;">Contact Us</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input style="width:50%;height:10%" type="text" name="firstname" autocomplete='off' placeholder="First Name"><br><br>
            <input style="width:50%;height:10%"type="text" name="lastname" autocomplete='off' placeholder="Last Name"><br><br>
            <input style="width:50%;height:10%"type="text" name="email" autocomplete='off' placeholder="Your Email"><br><br>
            <input style="width:50%;height:15%"type="text" name="comment" autocomplete='off' placeholder="Comment/Feedback..."><br><br>
            <center>
                <input style="width:50%;height:10%" type="submit" name="submit" value="Submit"><br>
            </center>
        </form>
    </center>
    
</body>
</html>