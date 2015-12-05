<?php
include_once 'includes/header.php';
echo '<h2>Sign in</h2>';

if ((!isset($_SESSION['signed_in'])) && (!isset($_POST['submit']))){
    echo 'If you do not already have an account please signup <a href="signup.php">here</a>.';
    echo '<form method="post" action="">';
    echo 'Username: <input type="text" name="user_name" /><br />';
    echo 'Password: <input type="password" name="user_pass"><br />';
    echo '<input type="submit" name="submit" value="Sign in" />';
    echo '</form>';
} elseif ((isset($_SESSION['signed_in'])) && (!isset($_POST['submit']))){
    echo "You're already signed in. Would you like to ".'<a href="signout.php">sign out</a>?';
}

if (!isset($_POST['submit'])){
} elseif (isset($_POST['submit'])){
    $user_name = strtolower(mysql_real_escape_string($_POST['user_name']));
    $user_pass = hash('whirlpool', mysql_real_escape_string($_POST['user_pass']));
    if ($user_name == 'guest'){
            $_SESSION['user_id'] = '1';
            $_SESSION['user_name'] = 'Guest';
            $_SESSION['signed_in'] = TRUE;
            if (!is_dir('photos/'.'1'.'/')){
                mkdir('photos/'.'1'.'/', 0775);
            }
            echo 'Welcome, '.htmlspecialchars($_SESSION['user_name']).".<br />".'<a href="index.php">Proceed to the main dashboard</a>.';
    } else {
        $users_result = mysql_query("SELECT * FROM users WHERE user_name='$user_name' AND user_pass='$user_pass'");
        $users_row = mysql_fetch_assoc($users_result);
        if ($user_name == strtolower($users_row['user_name']) && $user_pass == $users_row['user_pass']){
            $_SESSION['user_id'] = $users_row['user_id'];
            $_SESSION['user_name'] = $user_name;
            $_SESSION['signed_in'] = TRUE;
            if (!is_dir('photos/'.$users_row['user_id'].'/')){
                mkdir('photos/'.$users_row['user_id'].'/', 0775);
            }
            echo 'Welcome, '.htmlspecialchars($_SESSION['user_name']).".<br />".'<a href="index.php">Proceed to the main dashboard</a>.';
        } else {
            echo 'You have supplied a wrong user/password combination. Please try again.';
        }
    }
}
include_once 'includes/footer.php';
?>