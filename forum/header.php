<?php session_start();?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="answer.css">
        <link href="w3.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    </head>
    <body>
        <div id="mytopnav" class="topnav w3-card">
            <a class="fa fa-home" href="index.php">  Home</a>
            <a class="fa fa-th-list" href="chatindex.php">  Live Forum</a>
            <span class="fa fa-user" style="color:#FEFFFF;font-size:180%;position:relative;left:580px;"><?php echo "  ".$_SESSION['name'];?></span>
            <a class="fa fa-sign-out" href="logout.php" id="logout"> Logout</a> 
        </div>