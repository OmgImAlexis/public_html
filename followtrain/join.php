<?php
include_once 'includes/header.php';
echo '<form action="" method="POST">';
echo 'URL: <input name="url" type="text" />';
echo 'Description: <input name="description" type="text" />';
echo '<input type="submit" name="submit" value="Join" />';
echo '</form>';
if (((!isset($_POST['url'])) OR ($_POST['url'] == '')) OR ((!isset($_POST['description'])) OR ($_POST['description'] == '')) OR ((!isset($_POST['submit'])) OR ($_POST['submit'] == ''))){
    echo 'You need to fill in all of the fields above.';
} else {
    $url = mysql_real_escape_string($_POST['url']);
    $description = mysql_real_escape_string($_POST['description']);
    $date = date("Y\-m\-d H:i:s");
    if (timedout(url_to_short($url), $date) == FALSE){
        $url = url_to_short(mysql_real_escape_string($_POST['url']));
        $description = mysql_real_escape_string($_POST['description']);
        $date = date("Y\-m\-d H:i:s");
        $user_id = $_SESSION['user_id'];
        mysql_query("INSERT INTO train (user_id, url, description, date) VALUES ('$user_id', '$url', '$description', '$date')");
        echo 'You have been added to the <a href="train.php">train</a>.';
    } else {
        echo 'Please do not spam the train.';
    }
}
include_once 'includes/footer.php';
?>