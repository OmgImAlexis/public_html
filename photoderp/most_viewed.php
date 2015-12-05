<?php
include_once 'includes/header.php';
if (!isset($_GET['max'])){
    $max = 100;
} else {
    $max = mysql_real_escape_string($_GET['max']);
}
$photo_result = mysql_query("SELECT * FROM photos ORDER BY photo_views DESC LIMIT 0, $max");
$photo_count = mysql_num_rows($photo_result);
if ($photo_count == 0){
    echo 'No images have been uploaded yet.';
} else {
    while ($photo_row = mysql_fetch_assoc($photo_result)){
        $date = date("Y\-m\-d H:i:s");
        echo '<b><h1>'.$photo_row['photo_title'].'</h1></b>'.resize_img($photo_row['photo_name'], $photo_row['user_id']).'<br />'.views($photo_row['photo_name'], $date).'<br />';
        if ($photo_row['anon'] == 0){
            echo 'Posted by <a href="user.php?user='.id_to_name($photo_row['user_id']).'">'.id_to_name($photo_row['user_id']).'</a>.';
        } elseif ($photo_row['anon'] == 1){
            echo 'Posted by '.id_to_name(2).'.';
        }
    }
}
include_once 'includes/footer.php';
?>