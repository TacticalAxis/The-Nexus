<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>The Nexus</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!-- Header -->
    <header id="home">
        <!-- Background Image -->
        <div class="bg-img" style="background-image: url('./img/nexusbackground.png'); background-attachment: fixed;">
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
                            <img class="logo" src="img/logo.png" alt="logo" style="width:70%;">
                            <img class="logo-alt" src="img/logo-alt.png" alt="logo" style="width:70%;">
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

        <!-- home wrapper -->
        <div class="home-wrapper">
            <div class="container">
                <div class="row">

                    <!-- home content -->
                    <div class="col-md-10 col-md-offset-1">
                        <div class="home-content">
                            <img src="img/logo.png" alt="logo" style="width:50%;">
                            <form action='search.php' method='GET'>
                                <input type='text' size='90' name='search' autocomplete='off' placeholder='The world is at your fingertips...'></br></br>
                                <center>
                                    <button type='submit' name='submit' value='SEARCH' class='main-btn noselect'>
                                        SEARCH
                                    </button>
                                </center>
                            </form>
                        </div>
                    </div>
                    <!-- /home content -->

                </div>
            </div>
        </div>
        <!-- /home wrapper -->

    </header>
    <!-- /Header -->
</body>
</html>