<?php 
//if (!@$_SESSION['email']){
//session_start();
//}
require 'dbcon.php'; 
//$sql = "SELECT * FROM news ORDER BY date ";
//$posts = $db->query($sql);

//require 'dbconn.php'; 
//$sql = "SELECT * FROM comments ORDER BY commid ";
//$comments = $db->query($sql);
// Start session to check if they are logged in


?>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Web and Moble application Development">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JStreet-Dev</title>
     <!-- Fallback to homescreen for Chrome <39 on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Web Starter Kit">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <meta name="theme-color" content="#3372DF">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/bootstrap-theme.css">
    <link rel="stylesheet" href="styles/bootstrap-theme.css.map">
    <link rel="stylesheet" href="styles/bootstrap-theme.min.css">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/bootstrap.css.map">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
</head>

<body>
    

    <!-- nav start -->
    
    <header class="app-bar promote-layer">
        <div class="app-bar-container">
            <button class="cmn-toggle-switch cmn-toggle-switch__htra"><span>toggle menu</span>
            </button>
            <h1 class="logo"><a href="index.php">Jstreet<strong>-Dev</strong></a></h1>
            <section class="app-bar-actions">
                <!-- Put App Bar Buttons Here -->

                <button id="login_btn"><strong><span class="glyphicon glyphicon-log-out" style="align:center;" aria-hidden="true" action="logout.php" method="post" ></span>Logout</strong>
                </button>
             
            </section>
            
        </div>
      
    </header>
     

    <nav class="navdrawer-container promote-layer">
        <h4>Code Together</h4>
        <ul>
            <li>
                <a id="welcome"></a>
            </li>
            <li><a id="my_overview" href="index.php #profile">Overview</a>
            </li>
            <li><a id="my_profile" href="index.php #profile">Personal Info</a>
            </li>
            <li><a id="my_service" href="index.php #services">Services</a>
            </li>
            <li><a id="my_contact" href="index.php #contactme">Contact Me</a>
            </li>
            <li><a href="https://jstreetdev.wordpress.com/" target="_blank">Blog</a>
            </li>
        </ul>
     
    </nav>

    <!-- nav end -->

    <div id="bgimg">