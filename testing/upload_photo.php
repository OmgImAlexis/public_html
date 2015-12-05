<?php
echo '<form enctype="multipart/form-data" action="" method="POST">';
echo '<input type="hidden" name="MAX_FILE_SIZE" value="20971520" />';
echo 'Send this file: <input name="file" type="file" />';
echo '<input type="submit" value="Upload" />';
echo '</form>';
if (!isset($_FILES["file"]["name"])){
} else {
    $allowed_types = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
    if (in_array($_FILES["file"]["type"], $allowed_types) && ($_FILES["file"]["size"] < 20971520)){
        if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            $photo_name = $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], 'photos/'.$_FILES["file"]["name"]);
        }
    } else {
        echo 'Invalid file, please upload either a gif, jpeg or png file only.<br />';
        echo 'The file you attempted to upload was a '.$_FILES["file"]["type"];
    }
}
?>