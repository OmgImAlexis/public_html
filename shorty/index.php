<?php
include_once 'includes/header.php';
if (is_signed_in() == TRUE){
echo 'API key: '.$_SESSION['api_key'];
?>
<form action="shorten.php" method="post">
Original URL: <input type="text" name="original-url" value=""><br />
Shortened URL: <input type="text" name="short-url" value=""><br />
<input type="submit" name="submit" value="Shorten">
</form>
<?php
} else {
    echo 'You need to be <a href="signin.php">signed-in</a> to shorten URLs.<br /> If you don\'t already have an account you can sign-up <a href="signup.php">here</a>.';
}
include_once 'includes/footer.php';
?>