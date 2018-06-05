<?php
require_once 'vendor/autoload.php';
require_once 'vendor/mashape/unirest-php/src/Unirest.php';
include('client.php');
$client_ip = client::get_ip();
$client_os = client::get_os();
$client_browser = client::get_browser();
$client_device = client::get_device();

header("content-type: text/html; charset=UTF-8");
$button = $_GET ['submit'];
$useragent=$_SERVER['HTTP_USER_AGENT'];
$search = lcfirst(trim($_GET ['search']));
$a = strtolower($search);
$a = str_ireplace('what is ','',$a);
$a = str_ireplace('what is','',$a);
$a = str_ireplace(' what is','',$a);
$a = strtolower(trim(str_ireplace(' ','+',$a)));
$desc = "";

if (!$button)
    echo "NO INPUT!";
else {
    if (strlen($a) <= 1) {
        header( "Location: https://searchthenexus.ddns.net" );
	} else {
                
        // GET THE DESCRIPTION
        try {
            $safeurl = str_replace('+', '%20', $a);
            $json_string = file_get_contents("http://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=" . $safeurl); 
            $parsed_json = json_decode($json_string);
            foreach($parsed_json->query->pages as $k) {
                $desc = $k->extract;
            }
        } catch(Exception $ignored) {}
        
        // GET THE DESCRIPTION

        // GET THE SEARCH RESULTS
        $response = Unirest\Request::get("https://faroo-faroo-web-search.p.mashape.com/api?q=$a",
        array("X-Mashape-Key" => "Oi3CiBytKFmsh0f2Q3TclrC6QxOgp1jjUqNjsnej50B3ST2xfe",
        "Accept" => "application/json"));

        $response2 = Unirest\Request::get("https://contextualwebsearch-websearch-v1.p.mashape.com/api/Search/WebSearchAPI?q=$a&count=50&autocorrect=false",array(
            "X-Mashape-Key" => "Ey7k8AnMJZmshvrdTltfeSHFmclFp1QvWYDjsnRGvzPF3h2f1T",
            "X-Mashape-Host" => "contextualwebsearch-websearch-v1.p.mashape.com",
            "Content-Type" => "application/json"));
        // GET THE SEARCH RESULTS

        // MAKE SURE USER GETS CORRECT RESULTS MESSAGE
        $resultsFoundMessage = "NULL";
        $resultsFound = substr_count($response->raw_body,"\"title\"");
        $resultsFound2 = substr_count($response2->raw_body,"\"title\"");
        $forced_amount = $resultsFound + $resultsFound2;
        if ($forced_amount == 1) {$resultsFoundMessage = "1 Result Found";} else {$resultsFoundMessage = "$forced_amount Results Found";}
        $x = 0;$y = 0;
        // MAKE SURE USER GETS CORRECT RESULTS MESSAGE

        // GET THE PICTURE
        $image = null;
        $z = 0;
        while ($z <= $resultsFound) {
            $tempjson = json_encode($response->body->results[$z]);
            $tempjson = json_decode($tempjson);
            $tempJsonIurl = $tempjson->url;
            if(stripos($tempJsonIurl, $a) !== false) {
                $image = $tempjson->iurl;
                break;
            } else {
                $z++;
            }
        }
        if($image == null) {
            while ($z <= $resultsFound) {
                $tempjson = json_encode($response->body->results[$z]);
                $tempjson = json_decode($tempjson);
                $tempJsonIurl = $tempjson->iurl;
                if(stripos($tempJsonIurl, $a) !== false) {
                    $image = $tempJsonIurl;
                    break;
                } else {
                    $z++;
                }
            }
        }
        // GET THE PICTURE
        
        

        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) { // IS A PHONE
            readfile("mobilesearch.php");
        } else {
            ?>
            <html lang="en" style="margin: 0; height: 100%; overflow: hidden">

            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>The Nexus &bull; <?php echo $search;?></title>
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
                    position: fixed; /* Sit on top of the page content */
                    display: none; /* Hidden by default */
                    width: 10%; /* Full width (cover the whole page) */
                    height: 100%; /* Full height (cover the whole page) */
                    top: 50; 
                    left: 50;
                    right: 50;
                    bottom: 50;
                    background-color: rgba(0,0,0,0.5); /* Black background with opacity */
                    z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
                    cursor: pointer; /* Add a pointer on hover */
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
                    <h3 style="color: white;"><?php echo $resultsFoundMessage; ?></h3>
                </div>
                
                <div style="margin-top:0%; padding: 2.5%">
                    <div style="float:left; width:75%; height: 80% ; overflow:scroll;">
                        <div style="padding: 0.5%">
                            <?php while ($x <= $resultsFound) {
                            $json = json_encode($response->body->results[$x]);
                            $json = json_decode($json);
                            $title = $json->title;
                            $url = $json->url;
                            $description = $json->kwic;
                            if($title != null) { ?>
                                <div>
                                    <h4><a href="<?php print_r($url);?>"><?php print_r($title);?></a></h4>
                                    <p style="margin-top: -20px;">
                                        <?php print_r($description);?>
                                    </p>
                                </div>
                                <br>
                                <?
                                }
                                $x++;
                            } ?>
                        <?php while ($y <= $resultsFound2) {
                            $json = json_encode($response2->body->value[$y]);
                            $json = json_decode($json);
                            $title = $json->title;
                            $url = $json->url;
                            $description = $json->description;
                            if($title != null) { ?>
                                <div>
                                    <h4><a href="<?php print_r($url);?>"><?php print_r($title);?></a></h4>
                                    <p style="margin-top: -20px;">
                                        <?php print_r($description);?>
                                    </p>
                                </div>
                                <br>
                                <?
                                }
                                $y++;
                            } ?>
                        </div>
                    </div>
                    <div style="float:right; width:20%; height: 80% ; overflow:scroll;">
                        <?php
                        if($image == null) {
                            if($desc != null) {?>
                                <div style="text-align:center; vertical-align: baseline;">
                                    <p><?php echo $desc;?></p>
                                </div><?php
                            }
                        } else {
                            if($desc != null) {?>
                                <div>
                                    <img src="<?php echo $image;?>" style="width:100%">
                                </div>
                                <div>
                                    <p><?php echo $desc;?></p>
                                </div><?php
                            }
                        }?>   
                    </div>
                </div>
            </body>
            </html>
            <?php
        }
    }
}