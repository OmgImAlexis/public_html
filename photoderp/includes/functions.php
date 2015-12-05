<?php
function is_signed_in(){
    if (!isset($_SESSION['signed_in'])){
        return FALSE;
    } else {
        return TRUE;
    }
}
function id_to_name($user_id){
    $user_id = mysql_real_escape_string($user_id);
    $user_name = mysql_fetch_row(mysql_query("SELECT user_name FROM users WHERE user_id='$user_id'"));
    return $user_name[0];
}
function name_to_id($user_name){
    $user_name = mysql_real_escape_string($user_name);
    $user_id = mysql_fetch_row(mysql_query("SELECT user_id FROM users WHERE user_name='$user_name'"));
    return $user_id[0];
}
function resize_img($photo_name, $owner, $goal_width = 850, $goal_height = 2000){
    $image_array = getimagesize('photos/'.$owner.'/'.$photo_name);
    $width = $image_array[0];
    $height = $image_array[1];
    $return = array('width' => $width, 'height' => $height);
    if ($width/$height > $goal_width/$goal_height && $width > $goal_width){
        $return['width'] = $goal_width;
        $return['height'] = $goal_width/$width * $height;
    } elseif ($height > $goal_height){
        $return['width'] = $goal_height/$height * $width;
        $return['height'] = $goal_height;
    }
    $return = '<a href="view.php?photo_name='.$photo_name.'"><img width="'.$return['width'].'" height="'.$return['height'].'" src="photos/'.$owner.'/'.$photo_name.'"></a>';
    return $return;
}
function views($photo_name, $date, $update = FALSE){
    $photo_row = mysql_fetch_assoc(mysql_query("SELECT * FROM photos WHERE photo_name='$photo_name'"));
    $photo_time = substr($photo_row['photo_date'], 11);
    $photo_seconds = substr($photo_time, 6);
    $photo_minutes = substr($photo_time, 3, -3);
    $photo_hours = substr($photo_time, 0, -6);
    $photo_long_time = ((($photo_hours*60)+$photo_minutes)*60)+$photo_seconds;
    $compare_time = substr($date, 11);
    $compare_seconds = substr($compare_time, 6);
    $compare_minutes = substr($compare_time, 3, -3);
    $compare_hours = substr($compare_time, 0, -6);
    $compare_long_time = ((($compare_hours*60)+$compare_minutes)*60)+$compare_seconds;
    if ($update == TRUE){
        if (($compare_long_time - $photo_long_time) <= 120){ //5 minutes
            $current_views = $photo_row['photo_views'];
        } else {
            $current_views = $photo_row['photo_views']+1;
            mysql_query("UPDATE photos SET photo_views='$current_views', photo_date='$date' WHERE photo_name='$photo_name'");
        }
    } else {
        $current_views = $photo_row['photo_views'];
    }
    if ($current_views == 1){
        $return = 'Viewed '.$current_views.' time.';
    } else {
        $return = 'Viewed '.$current_views.' times.';
    }
    return $return;
}
function upload_to_imgur($filename){
    $handle = fopen($filename, 'r');
    $data = fread($handle, filesize($filename));

    // $data is file data
    $pvars   = array('image' => base64_encode($data), 'key' => '394f7a9b8e24e4c2fc9a49c973040a0a');
    $timeout = 30;
    $curl    = curl_init();

    curl_setopt($curl, CURLOPT_URL, 'http://api.imgur.com/2/upload.xml');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);

    $xml = curl_exec($curl);

    curl_close ($curl);
}
?>