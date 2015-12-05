<?php
session_start();
include_once 'includes/connect.php';
include_once 'includes/config.php';
include_once 'includes/functions.php';
?>
<html>
    <head>
        <title>
            Photoderp
        </title>
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <a href="index.php" style="font-size: 200%;text-decoration: none;">Photoderp</a><br />
                <a href="most_viewed.php" style="text-decoration: none;">Most viewed</a> | 
                <?php
                if (is_signed_in() == FALSE){
                    echo '<a href="signup.php" style="text-decoration: none;">Signup</a> | <a href="signin.php" style="text-decoration: none;">Signin</a><br /><br />';
                } else {
                    echo '<a href="signout.php" style="text-decoration: none;">Signout</a><br /><br />';
                }
                ?>
                