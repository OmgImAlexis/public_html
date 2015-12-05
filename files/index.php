<?php
include 'functions.php';
$files = array_flatten(file_array());
$s = 0;
$m = count($files);
while ($s < $m){
    $new_name_ = str_replace('./', '', $files[$s]);
    $new_name_ = substr($new_name_, -(((strlen($new_name_))-(strrpos($new_name_, '/')))-1));
    $new_name_ = substr($new_name_, 0, 7);
    if ($new_name_ == 'tumblr_'){
        $tumblr_[] = $files[$s];
    }
    $s++;
}
if (!isset($tumblr_)){
    echo 'No images to move.';
} else {
    $i = 0;
    $k = count($tumblr_);
    while ($i < $k){
        $old_name = str_replace('./', '', $tumblr_[$i]);
        $new_name = str_replace('./', '', $tumblr_[$i]);
        $new_name = substr($new_name, -(((strlen($new_name))-(strrpos($new_name, '/')))-1));
        rename('D:/wamp/www/files/'.$old_name, "D:/wamp/www/imgs/".$new_name);
        $i++;
    }
}
?>