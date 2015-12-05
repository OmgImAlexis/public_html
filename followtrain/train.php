<?php
include_once 'includes/header.php';
echo '<h3><a href="join.php">Join the train.</a></h3>';
if (!isset($_GET['max'])){
    $max = 100;
} else {
    $max = mysql_real_escape_string($_GET['max']);
    if ($max > 10000){
        $max = 10000;
    }
}
$train_result = mysql_query("SELECT * FROM train ORDER BY date DESC LIMIT 0, $max");
$train_count = mysql_num_rows($train_result);
while ($train_row = mysql_fetch_assoc($train_result)){
    $url = $train_row['url'];
    // Avatar 30 x 30
    echo '<img src="http://api.tumblr.com/v2/blog/'.$url.'.tumblr.com/avatar/30">';
    echo '<a href="http://'.$url.'.tumblr.com">'.$url.'</a> | <a href="http://tumblr.com/follow/'.$url.'">Follow</a>';
    if ($_SESSION['user_id'] == 4){
        echo ' - <a href="delete.php?id='.$train_row['url_id'].'">Delete</a><br />';
    } else {
        echo '<br />';
    }
    echo stripslashes($train_row['description']).'<br /><br />';
}
include_once 'includes/footer.php';
?>