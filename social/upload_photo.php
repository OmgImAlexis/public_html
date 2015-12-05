<?php
include_once 'includes/header.php';
echo '<form enctype="multipart/form-data" action="" method="POST">';
echo '<input type="hidden" name="MAX_FILE_SIZE" value="20971520" />';
echo 'Send this file: <input name="file" type="file" />';
echo '<input type="submit" value="Upload" />';
echo '</form>';
if (!isset($_FILES["file"]["name"])){
} else {
    $allowed_types = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
    if (in_array($_FILES["file"]["type"], $allowed_types) && ($_FILES["file"]["size"] < 20971520)){
        if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            $photo_name = $_FILES["file"]["name"];
            $user_id = $_SESSION['user_id'];
            move_uploaded_file($_FILES["file"]["tmp_name"], 'photos/'.$user_id.'/'.$_FILES["file"]["name"]);
            $photo_name = mysql_real_escape_string($photo_name);
            $user_id = mysql_real_escape_string($user_id);
            mysql_query("INSERT INTO photos (user_id, photo_name) VALUES ('$user_id', '$photo_name')");
        }
    } else {
        echo 'Invalid file, please upload either a gif, jpeg or png file only.<br />';
        echo 'The file you attempted to upload was a '.$_FILES["file"]["type"];
    }
}
include_once 'includes/footer.php';
?>