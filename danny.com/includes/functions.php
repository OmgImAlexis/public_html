<?php
function resize_img($original_name, $goal_width = 1000, $goal_height = 100){
    $image_array = getimagesize($original_name);
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
    $return = '<img width="'.$return['width'].'" height="'.$return['height'].'" src="'.$original_name.'">';
    return $return;
}
?>