<?php
include 'functions.php';
$files = array_flatten(file_array());
$min = 0;
$max = count($files);
$i = 0;
while ($i < $max){
    $new_name_ = str_replace('./', '', $files[$i]);
    $new_name_ = substr($new_name_, -(((strlen($new_name_))-(strrpos($new_name_, '/')))));
    echo $new_name_.'<br />';
    if (($new_name_ !== './functions.php') AND ($new_name_ !== './_Thumbs.db') AND ($new_name_ !== './Thumbs.db') AND ($new_name_ !== './index.php') AND ($new_name_ !== './random_img.php') AND ($new_name_ !== 'functions.php') AND ($new_name_ !== '_Thumbs.db') AND ($new_name_ !== 'Thumbs.db') AND ($new_name_ !== 'index.php') AND ($new_name_ !== 'random_img.php')){
        $new_files[] = $files[$i];
    }
    $i++;
}
$max = count($new_files);
$random = rand($min, $max-1);
$image = new Imagick($new_files[$random]);
$image->thumbnailImage(500, 0);
echo '<img src=http://localhost/testing/'.$image.'>';
?>