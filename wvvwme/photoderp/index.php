<?php
include_once 'includes/header.php';
if (is_signed_in() == TRUE){
    echo '<a href="upload_photo.php">Upload photo</a>';
} else {
    echo 'You must be <a href="signin.php">signed in</a> to post photos.<br />';
    $_GET['max'] = 10;
    include 'most_viewed.php';
}
include_once 'includes/footer.php';
?>