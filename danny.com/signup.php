<?php
include_once 'includes/header.php';
echo '<script src="/js/user_check.js" type="text/javascript"></script>';
echo '<h2>Sign up</h2>';

if (!isset($_SESSION['signed_in']) && !isset($_POST['submit'])){
    echo '<form method="post" action="">';
    echo 'Username: <input type="text" name="user_name" id="user_name" /><span id="availability_status"></span><br />';
    echo 'Password: <input type="password" name="user_pass"><br />';
    echo 'Confirm: <input type="password" name="user_conf"><br />';
    echo 'Email: <input type="text" name="user_email"><br />';
    echo '<input type="submit" name="submit" value="Sign up" />';
    echo '</form>';
} elseif (!isset($_SESSION['signed_in']) && isset($_POST['submit'])){
        if(filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)){
            $user_name = mysql_real_escape_string($_POST['user_name']);
            $user_pass = hash('whirlpool', mysql_real_escape_string($_POST['user_pass']));
            $user_conf = hash('whirlpool', mysql_real_escape_string($_POST['user_conf']));
            $user_email = mysql_real_escape_string($_POST['user_email']);
            $date = date("Y\-m\-d H:i:s");
            $user_name_row = mysql_fetch_row(mysql_query("SELECT user_name FROM users WHERE user_name='$user_name'"));
            $user_name_row = $user_name_row[0];
            $user_email_row = mysql_fetch_row(mysql_query("SELECT user_email FROM users WHERE user_email='$user_email'"));
            $user_email_row = $user_email_row[0];
            $activation = hash('whirlpool', mysql_real_escape_string($_POST['user_email'].mt_rand(75,125)));;
            if ($user_name !== $user_name_row){
                if ($user_pass == $user_conf){
                    if ($user_email !== $user_email_row){
                        mysql_query("INSERT INTO users (user_name, user_display_name, user_pass, user_date, user_email, user_activated, user_activation) VALUES ('$user_name', '$user_name', '$user_pass', '$date', '$user_email', 'no', '$activation')");
                        echo 'Succesfully registered. You have been sent a verification email.';
                    } else {
                        echo 'There\'s already an account registered to that email address.';
                    }
                } else {
                    echo 'The passwords don\'t match.';
                }
            } else {
                echo 'The username you chose has been taken, please choose another.';
            }
        } else {
            echo 'The email you entered did not validate.';
        }
} else {
    echo "You're already signed in. Would you like to ".'<a href="/signout.php">sign out</a>?';
}
include_once 'includes/footer.php';
?>