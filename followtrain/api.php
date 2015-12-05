<?php
include_once 'includes/connect.php';
include_once 'includes/config.php';
include_once 'includes/functions.php';
$url = mysql_real_escape_string($_GET['url']);
$description = mysql_real_escape_string($_GET['description']);
$date = date("Y\-m\-d H:i:s");
$user_id = api_to_id($_GET['api']);
if (timedout(url_to_short($url), $date) == FALSE){
    mysql_query("INSERT INTO train (user_id, url, description, date) VALUES ('$user_id', '$url', '$description', '$date')");
} else {
    echo 'Please do not spam the train.';
}
?>