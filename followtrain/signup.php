<?php
include_once 'includes/header.php';
echo '<h2>Sign up</h2>';

if (!isset($_SESSION['signed_in'])){
    echo '<form method="post" action="">';
    echo 'Username: <input type="text" name="user_name" /><br />';
    echo 'Password: <input type="password" name="user_pass"><br />';
    echo 'Confirm: <input type="password" name="user_conf"><br />';
    echo 'Email: <input type="text" name="user_email"><br />';
    echo '<input type="submit" name="submit" value="Sign up" />';
    echo '</form>';
} else {
    echo "You're already signed in. Would you like to ".'<a href="/signout.php">sign out</a>?';
}

if (!isset($_SESSION['signed_in']) && !isset($_POST['submit'])){
} elseif (!isset($_SESSION['signed_in']) && isset($_POST['submit'])){
    $user_name = mysql_real_escape_string($_POST['user_name']);
    $user_pass = hash('whirlpool', mysql_real_escape_string($_POST['user_pass']));
    $user_conf = hash('whirlpool', mysql_real_escape_string($_POST['user_conf']));
    $user_email = mysql_real_escape_string($_POST['user_email']);
    $date = date("Y\-m\-d H:i:s");
    $user_api = hash('whirlpool', 'apitumblrkeyisthis'.$user_name);
    $result = mysql_query("SELECT * FROM users WHERE user_name='$user_name'");
    $row = mysql_fetch_assoc($result);
    if ($user_name !== $row['user_name']){
        if ($user_pass == $user_conf){
            mysql_query("INSERT INTO users (user_name, user_pass, user_date, user_email, user_api) VALUES ('$user_name', '$user_pass', '$date', '$user_email', '$user_api')");
            echo 'Succesfully registered. You can now <a href="signin.php">sign in</a> and start gaining followers. :)';
        } else {
            echo 'The passwords don\'t match.';
        }
    } else {
        echo 'The username you chose has been taken, please choose another.';
    }
}
include_once 'includes/footer.php';
?>