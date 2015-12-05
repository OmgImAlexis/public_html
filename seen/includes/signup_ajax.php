<?php
include_once 'connect.php';
if(isset($_POST['username'])) {
    $username = mysql_real_escape_string($_POST['username']);
    $check_for_username = mysql_query("SELECT user_id FROM users WHERE user_name='$username'");
    if(mysql_num_rows($check_for_username)){
        echo '1';
    } else {
        echo '0';
    }
}
?>