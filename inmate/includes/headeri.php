<?php
include_once('../global.php');
include_once('../root/connection.php');
include_once('../root/functions.php');

auth_login();


$db = new Database();

$message = array();


?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


    <style type="text/css">
    
    .sidebar[data-color="purple"]:after {
        background: #2472fff2 ;
        background: -moz-linear-gradient(top, #2472fff2  0%, #3a4e43d6  100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #2472fff2 ), color-stop(100%, #3a4e43d6 ));
        background: -webkit-linear-gradient(top, #2472fff2  0%, #3a4e43d6  100%);
        background: -o-linear-gradient(top, #2472fff2  0%, #3a4e43d6  100%);
        background: -ms-linear-gradient(top, #2472fff2  0%, #3a4e43d6  100%);
        background: linear-gradient(to bottom, #2472fff2  0%, #3a4e43d6  100%);
        background-size: 150% 150%;
    }

    .dropdown-menu.k-cust { 
        float: none;
        width: auto;
        margin-top: 0;
        background-color: transparent;
        border: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
    } 
    .dropdown.open .dropdown-menu.k-cust {
        position: static; 
    }  
</style>

</head>
<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="home.php" class="simple-text">
                Home
            </a>
        </div>


        <?php include_once('navbari.php'); ?>
        
    </div>
</div>

<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        </a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <p class="hidden-lg hidden-md">

                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Notification 1</a></li>
                        <li><a href="#">Notification 2</a></li>
                        <li><a href="#">Notification 3</a></li>
                        <li><a href="#">Notification 4</a></li>
                        <li><a href="#">Another notification</a></li>
                    </ul>
                </li>
                <li>
                    <a href=""> 
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href=""> 
                    </a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <p> 
                    </p>

                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </li>
            <li>
               <a href="../loginn/logout.php">
                <p>Log out</p>
            </a>

        </li>
        <li class="separator hidden-lg"></li>
    </ul>
</div>
</div>
</nav>


<div class="content">
    <div class="container-fluid">