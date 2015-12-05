<?php
include_once 'includes/header.php';
$photo_name = mysql_real_escape_string($_GET['photo_name']);
$photo_result = mysql_query("SELECT * FROM photos WHERE photo_name='$photo_name'");
$photo_count = mysql_num_rows($photo_result);
if ($photo_count == 0){
    echo 'That image doesn\'t exist.';
} else {
    $photo_row = mysql_fetch_assoc($photo_result);
    $date = date("Y\-m\-d H:i:s");
    echo '<b><h1>'.$photo_row['photo_title'].'</h1></b>'.resize_img($photo_row['photo_name'], $photo_row['user_id']).'<br />'.views($photo_row['photo_name'], $date, TRUE).'<br />';
    if ($photo_row['anon'] == 0){
        echo 'Posted by <a href="user.php?user='.id_to_name($photo_row['user_id']).'">'.id_to_name($photo_row['user_id']).'</a>.';
    } elseif ($photo_row['anon'] == 1){
        echo 'Posted by '.id_to_name(2).'.';
    }
}
include_once 'includes/footer.php';
?>