<?php
include_once 'includes/header.php';
if ($_GET['get'] == ''){
    include_once 'index.php';
} else {
    if (short_url_exist($_GET['get']) == FALSE){
        echo 'The short URL you entered doesn\'t exist.';
    } else {
        $page = short_to_long_url($_GET['get']);
        views($_GET['get'], $update = TRUE);
        header("Location: $page"); 
    }
}
include_once 'includes/footer.php';
?>