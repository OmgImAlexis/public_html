<?php
include_once 'includes/header.php';
$url_result = mysql_query("SELECT * FROM urls ORDER BY url_views DESC LIMIT 0, 100");
$url_count = mysql_num_rows($url_result);
if ($url_count == 0){
    echo 'No URLs have been shortened yet.';
} else {
    echo '<h2>Top 100 most viewed redirects</h2>';
    while ($url_row = mysql_fetch_assoc($url_result)){
        echo '<a href="'.$url_row['url_original'].'">'.$url_row['url_original'].'</a> | ';
        echo '<a href="'.$site_url.$url_row['url_short'].'">'.$url_row['url_short'].'</a> - '.$url_row['url_views'].' views<br />';
    }
}
include_once 'includes/footer.php';
?>