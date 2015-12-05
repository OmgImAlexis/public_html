<?php
session_start();
include_once 'includes/connect.php';
include_once 'includes/config.php';
include_once 'includes/functions.php';
?>
<html>
    <head>
        <title>
            placeholder
        </title>
        <link rel="stylesheet" href="includes/style.css" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <center><a href="index.php" style="text-decoration: none;"><img src="includes/header.png"></img></a><br />
                <a href="signin.php" style="text-decoration: none;">Signin</a> | <a href="signout.php" style="text-decoration: none;">Signout</a></center>
                <div id="menu">
                <?php include_once "includes/menu.php"; ?>
                </div>
                <div id="main">
                