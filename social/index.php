<?php
include_once 'includes/header.php';
if (is_signed_in() == TRUE){
    echo '<form action="" method="post">';
    echo '<textarea name="status_body" id="status_body" placeholder="What\'s going on?"></textarea>';
    echo '<input name="post" type="submit" value="Post"/>';
    echo '<a href="upload_photo.php">Upload photo</a>';
    echo '</form>';
    if (@isset($_POST['post'])){
        post_status($_SESSION['user_id'], $_POST['status_body']);
    }
    news_feed($_SESSION['user_id'], 'yes');
}
include_once 'includes/footer.php';
?>