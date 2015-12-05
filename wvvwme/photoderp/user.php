<?php
include_once 'includes/header.php';
$user_name = mysql_real_escape_string($_GET['user']);
$user_id = name_to_id($user_name);
$photo_result = mysql_query("SELECT * FROM photos WHERE user_id='$user_id' ORDER BY photo_views DESC LIMIT 0, 100");
$photo_count = mysql_num_rows($photo_result);
if ($photo_count == 0){
    echo 'No images have been uploaded by this user.';
} else {
    while ($photo_row = mysql_fetch_assoc($photo_result)){
        $date = date("Y\-m\-d H:i:s");
        echo '<b><h1>'.$photo_row['photo_title'].'</h1></b>'.resize_img($photo_row['photo_name'], $photo_row['user_id']).'<br />'.views($photo_row['photo_name'], $date).'<br />';
    }
}
include_once 'includes/footer.php';
?>