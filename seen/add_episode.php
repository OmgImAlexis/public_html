<?php
include_once 'includes/header.php';
echo '<form method="post" action="">';
echo 'Show name: <input type="text" name="show_name" /><br />';
echo 'Season number: <input type="text" name="show_season" /><br />';
echo 'Episode name: <input type="text" name="episode_name" /><br />';
echo 'Episode number: <input type="text" name="episode_number" /><br />';
echo '<input type="submit" name="submit" value="Add episode" /></form>';
if(@isset($_POST['submit'])){
    if ($_POST['episode_name'] == clean_input('')){
        $episode_name = '--Unknown--';
    } else {
        $episode_name = clean_input($_POST['episode_name']);
    }
    if (!isset($_GET['show_id'])){
        $show_id = show_name_to_id(clean_input($_POST['show_name']));
    } else {
        $show_id = clean_input($_GET['show_id']);
    }
    mysql_query("INSERT INTO episodes(show_id, show_season, episode_name, episode_number, sort) VALUES('".$show_id."', '".clean_input($_POST['show_season'])."', '".$episode_name."', '".clean_input($_POST['episode_number'])."', '".clean_input($_POST['show_season']).'_'.clean_input($_POST['episode_number'])."')");
    echo 'New episode succesfully added.';
}
include_once 'includes/footer.php';
?>