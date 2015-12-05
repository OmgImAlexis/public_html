<?php
include_once 'includes/header.php';
echo '<h2>Sign out</h2>';
if(!isset($_SESSION['signed_in'])){
    echo 'You are not signed in. Would you <a href="signin.php">like to</a>?';
} else {
    session_destroy();
    session_write_close();
    echo 'Succesfully signed out, thank you for visiting.';
}
include_once 'includes/footer.php';
?>