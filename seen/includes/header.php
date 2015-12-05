<?php
session_start();
include_once 'includes/connect.php';
include_once 'includes/config.php';
include_once 'includes/functions.php';
?>
<html>
    <head>
        <title>
            Seen.tv
        </title>
        <link rel="stylesheet" href="includes/style.css" type="text/css">
        <script type="text/javascript" src="includes/js/jquery-1.7.2.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <center><?php echo '<a href="http://seen.tv">'.resize_img('includes/header.png').'</a>'; ?></center>
            <div id="content">
            