<?php
session_start();
include_once 'includes/connect.php';
include_once 'includes/config.php';
include_once 'includes/functions.php';
?>
<html>
    <head>
        <title>
            FollowTrain
        </title>
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <a href="index.php" style="font-size: 200%;text-decoration: none;">FollowTrain</a><br />
                <a href="train.php" style="text-decoration: none;">Train</a> | <a href="signin.php" style="text-decoration: none;">Signin</a> | <a href="signout.php" style="text-decoration: none;">Signout</a><br /><br />
                