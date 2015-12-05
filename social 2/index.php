<?php
include_once 'includes/header.php';
?>
<form action="" method="post">
<textarea name="status_body" id="status_body" placeholder="What's going on?"></textarea>
<input name="submit" type="submit" value="Post"/>
</form>
<?php
if (@isset($_POST['submit'])){
    post_status($_SESSION['user_id'], $_POST['status_body']);
}
news_feed($_SESSION['user_id'], 'yes');
include_once 'includes/footer.php';
?>