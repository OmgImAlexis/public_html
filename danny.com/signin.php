<?php
include_once 'includes/header.php';
if (!isset($_POST['submit'])){
    echo '<form method="post" action="">';
    echo 'Username: <input type="text" name="user_name" /><br />';
    echo 'Password: <input type="password" name="user_pass" /><br />';
    echo '<input type="submit" name="submit" />';
    echo '</form>';
} else {
    $user_name = strtolower(mysql_real_escape_string($_POST['user_name']));
    $user_pass = hash('whirlpool', mysql_real_escape_string($_POST['user_pass']));
    $users_result = mysql_query("SELECT * FROM users WHERE user_name='$user_name' AND user_pass='$user_pass'");
    $users_row = mysql_fetch_assoc($users_result);
    if ($user_name == strtolower($users_row['user_name']) && $user_pass == $users_row['user_pass']){
        $_SESSION['user_id'] = $users_row['user_id'];
        $_SESSION['user_name'] = $user_name;
        $_SESSION['signed_in'] = TRUE;
        echo 'Welcome, '.htmlspecialchars($_SESSION['user_name']).'.<br />';
    } else {
        echo 'You have supplied a wrong user/password combination. Please try again.';
    }
}
include_once 'includes/footer.php';
?>