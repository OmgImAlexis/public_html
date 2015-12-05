<?php
include_once 'includes/header.php';
$profile_id = isset( $_GET['id'] ) ? $_GET['id'] : $_SESSION['user_id'];
echo '<center>'.id_to_name($profile_id).'</center>';
news_feed($profile_id);
include_once 'includes/footer.php';
?>