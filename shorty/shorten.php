<?php
include_once 'includes/header.php';
$original = mysql_real_escape_string($_POST['original-url']);
$short = mysql_real_escape_string($_POST['short-url']);
$owner = $_SESSION['user_id'];
if ((substr($original, 0, 7)) == 'http://'){
    mysql_query("INSERT INTO urls (url_owner, url_original, url_short) VALUES ('$owner', '$original', '$short')");
    echo 'Your URL has been shortened. :D';
} else {
    $original = 'http://'.$original;
    if (url_exist($original)){
        mysql_query("INSERT INTO urls (url_owner, url_original, url_short) VALUES ('$owner', '$original', '$short')");
        echo 'Your URL has been shortened. :D';
    } else {
        echo 'The URL you entered doesn\'t exist.<br />Please go back and try again.';
    }
}
include_once 'includes/footer.php';
?>