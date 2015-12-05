<?php
session_start();
?>
<html>
<head>
<title><?php echo $_SESSION['number']; ?></title>
</head>
<?php
include 'functions.php';
$files = array_flatten(file_array('images'));
$count = count($files);
$i = 1;
while ($i <= $count){
    rename('D:/wamp/www/idk/'.$files[$i], 'D:/wamp/www/idk/pngs/'.substr($files[$i], 7).'.png');
    $i++;
}
?>