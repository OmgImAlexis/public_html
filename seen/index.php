<?php
include_once 'includes/header.php';
echo '<h2>Recently added shows</h2>';
$show_result = mysql_query("SELECT * FROM shows ORDER BY show_id ASC LIMIT 0, 10");
while ($show_row = mysql_fetch_assoc($show_result)){
    echo '<a href="show.php?show_id='.$show_row['show_id'].'">'.$show_row['show_name'].'</a><br />';
}
include_once 'includes/footer.php';
?>