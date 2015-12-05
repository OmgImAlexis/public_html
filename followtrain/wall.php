<?php
include_once 'includes/header.php';
echo '<h3><a href="join.php">Join the train.</a></h3>';
$train_result = mysql_query("SELECT * FROM train ORDER BY date DESC LIMIT 0, 100");
$train_count = mysql_num_rows($train_result);
$i = 0;
while ($train_row = mysql_fetch_assoc($train_result)){
    $url = $train_row['url'];
    // Avatar 64 x 64
    echo '<a href="http://'.$url.'.tumblr.com"><img src="http://api.tumblr.com/v2/blog/'.$url.'.tumblr.com/avatar/64"></a>';
    if ($i == 9){ // This makes it produce 10 per line
        echo '<br />';
    }
    $i++;
}
include_once 'includes/footer.php';
?>