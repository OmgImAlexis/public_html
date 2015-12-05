<?php
include_once 'includes/header.php';
if ($_SESSION['user_id'] == 4){
    if (!isset($_GET['id'])){
        echo 'No id present.';
    } else {
        $id = mysql_real_escape_string($_GET['id']);
        mysql_query("DELETE FROM train WHERE url_id='$id'");
        echo '<script>location.href=\'index.php\'</script>';
    }
} else {
    echo '<script>location.href=\'index.php\'</script>';
}
include_once 'includes/footer.php';
?>