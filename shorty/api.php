<?php
include_once 'includes/connect.php';
include_once 'includes/config.php';
include_once 'includes/functions.php';
if ((isset($_GET['original_url'])) AND (isset($_GET['short_url'])) AND (isset($_GET['api_key']))){
    $original_url = mysql_real_escape_string($_GET['original_url']);
    $short_url = mysql_real_escape_string($_GET['short_url']);
    $api_key = mysql_real_escape_string($_GET['api_key']);
    $api_key_real = mysql_query("SELECT * FROM users WHERE user_api_key='$api_key'");
    if (mysql_num_rows($api_key_real) !== 0){
        $user_row = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE user_api_key='$api_key'"));
        $url_owner = $user_row['user_id'];
        if (short_url_exist($short_url) == TRUE){
            echo 'Please choose another short URL, the one you tried has already been used.';
        } else {
            if ((substr($original_url, 0, 7)) == 'http://'){
                mysql_query("INSERT INTO urls (url_owner, url_original, url_short) VALUES ('$url_owner', '$original_url', '$short_url')");
                echo 'Your URL has been shortened. :D';
            } else {
                $original_url = 'http://'.$original_url;
                if (url_exist($original_url)){
                    mysql_query("INSERT INTO urls (url_owner, url_original, url_short) VALUES ('$url_owner', '$original_url', '$short_url')");
                    echo 'Your URL has been shortened. :D';
                } else {
                    echo 'The URL you entered doesn\'t exist.<br />Please go back and try again.';
                }
            }
        }
    }
}
?>