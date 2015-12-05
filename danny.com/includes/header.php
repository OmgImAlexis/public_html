<?php
session_start();
include_once 'includes/connect.php';
include_once 'includes/functions.php';
$title = 'Danny\'s site';
?>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="includes/style.css" type="text/css">
    </head>
    <body>
    <div id="wrapper">
    <center><a href="http://danny.com"><?php echo resize_img('includes/header.png'); ?></a></center>
    <div id="content">
<a href="signin.php">signin</a> | <a href="signup.php">signup</a><br />