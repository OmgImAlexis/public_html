<?php
include_once 'includes/header.php';
echo '<h2>Sign in</h2>';

if (@$_GET['activate'] == 'true'){
    $activation = mysql_clean($_GET['key']);
    mysql_query("UPDATE users SET user_activated='yes' WHERE user_activation='$activation'");
    if (mysql_affected_rows() == 1){
        echo 'Your account has sucessfully been activated.<br />';
        echo 'You may now <a href="/signin.php">signin</a> and start posting. :)';
    } else {
        echo 'The activation key you entered isn\'t linked to an account.';
    }
}

if ((!isset($_SESSION['signed_in'])) && (!isset($_POST['submit'])) && @$_GET['activate'] !== 'true'){
    echo 'If you do not already have an account please signup <a href="signup.php">here</a>.';
    echo '<form method="post" action="">';
    echo 'Username: <input type="text" name="user_name" /><br />';
    echo 'Password: <input type="password" name="user_pass"><br />';
    echo '<input type="submit" name="submit" value="Sign in" />';
    echo '</form>';
} elseif ((isset($_SESSION['signed_in'])) && (!isset($_POST['submit']))){
    echo "You're already signed in. Would you like to ".'<a href="signout.php">sign out</a>?';
}

if (!isset($_POST['submit']) && @$_GET['activate'] !== 'true'){
} elseif (isset($_POST['submit']) && @$_GET['activate'] !== 'true'){
    $user_name = strtolower(mysql_real_escape_string($_POST['user_name']));
    $user_pass = hash('whirlpool', mysql_real_escape_string($_POST['user_pass']));
    $users_result = mysql_query("SELECT * FROM users WHERE user_name='$user_name' AND user_pass='$user_pass'");
    $users_row = mysql_fetch_assoc($users_result);
    if ($user_name == strtolower($users_row['user_name']) && $user_pass == $users_row['user_pass']){
        $_SESSION['user_id'] = $users_row['user_id'];
        $_SESSION['user_name'] = $user_name;
        $_SESSION['signed_in'] = TRUE;
        echo 'Welcome, '.htmlspecialchars($_SESSION['user_name']).'.<br />';
        if (is_admin($_SESSION['user_id'], 'id') == TRUE){
            echo '<a href="dashboard.php">Proceed to the main dashboard</a>.';
        }
    } else {
        echo 'You have supplied a wrong user/password combination. Please try again.';
    }
}
include_once 'includes/footer.php';
?>