<?php
session_start();
include_once 'includes/connect.php';
include_once 'includes/config.php';
include_once 'includes/functions.php';
?>
<html>
    <head>
        <title>
            Shorty - URL Shortener
        </title>
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <a href="index.php" style="font-size: 200%;text-decoration: none;">Shorty - URL shortener</a><br />
                <a href="top.php" style="text-decoration: none;">Most viewed URLs</a> | <a href="faq.php" style="text-decoration: none;">F.A.Q.</a><br />
                <a href="signin.php" style="text-decoration: none;">Signin</a> | <a href="signout.php" style="text-decoration: none;">Signout</a><br /><br />
                