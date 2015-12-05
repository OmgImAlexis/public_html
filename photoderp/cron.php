<?php
include_once 'includes/header.php';
$photo_result = mysql_query("SELECT * FROM photos");
$photo_count = mysql_num_rows($photo_result);
if ($photo_count == 0){
    echo 'No images have been uploaded yet.';
} else {
    $deleted = 0;
    while ($photo_row = mysql_fetch_assoc($photo_result)){
        $file_name = 'photos/'.$photo_row['user_id'].'/'.$photo_row['photo_name'];
        if (file_exists($file_name)) {
            echo $file_name.'<br />';
        } else {
            $deleted++;
            mysql_query('DELETE FROM photos WHERE photo_name=\''.$photo_row['photo_name'].'\'');
        }
    }
    if ($deleted == 1){
        echo $deleted.' file has been removed from the database.';
    } else {
        echo $deleted.' files have been removed from the database.';
    }
}
include_once 'includes/footer.php';
?>