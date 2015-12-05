<?php
include_once 'includes/header.php';
echo '<h2>'.show_id_to_name($_GET['show_id']).'</h2>';
echo '<h3>'.episode_id_to_name($_GET['show_id'], $_GET['show_season'], $_GET['episode_id']).'</h3>';
$episode_id = clean_input($_GET['episode_id']);
$episode_result = mysql_query("SELECT * FROM episodes WHERE episode_id='$episode_id' ORDER BY sort ASC");
while ($episode_row = mysql_fetch_assoc($episode_result)){
    echo 'S'.$episode_row['show_season'].'E'.$episode_row['episode_number'].'<br />';
    echo 'Episode description: '.$episode_row['episode_description'].'<br />';
}
include_once 'includes/footer.php';
?>