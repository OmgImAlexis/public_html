<?php
include_once 'includes/header.php';
if(!isset($_POST['submit'])){
    echo '<form method="post" action="">';
    echo 'Show name: <input type="text" name="show_name" /><br />';
    echo '<input type="submit" name="submit" value="Add show" /></form>';
} else {
    mysql_query("INSERT INTO shows(show_name) VALUES('".clean_input($_POST['show_name'])."')");
    echo 'New show succesfully added.';
    echo 'Please add all of the episodes corrisponding with the show you added.<br />';
    $show_id = mysql_fetch_row(mysql_query("SELECT show_id FROM shows WHERE show_name='".clean_input($_POST['show_name'])."'"));
    $show_id = $show_id[0];
    echo '<a href="add_episode.php?show_id='.$show_id.'">Add episodes</a>.';
}
include_once 'includes/footer.php';
    ?>