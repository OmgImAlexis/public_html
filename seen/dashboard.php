<?php
include_once 'includes/header.php';
echo '<form action="" method="post">';
$show_result = mysql_query("SELECT * FROM shows ORDER BY show_id ASC");
while ($show_row = mysql_fetch_assoc($show_result)){
    echo '<b>'.$show_row['show_name'].'</b><br />';
    $episode_result = mysql_query("SELECT * FROM episodes WHERE show_id='".$show_row['show_id']."'");
    while ($episode_row = mysql_fetch_assoc($episode_result)){
        $show_id = $episode_row['show_id'];
        $show_season = $episode_row['show_season'];
        $episode_number = $episode_row['episode_number'];
        echo $episode_number.'. '.$episode_row['episode_name'].'<input type="checkbox" name="watched['.$show_id.']['.$show_season.']['.$episode_number.']" value"TRUE"><br />';
    }
    echo '<br />';
}
echo '<input name="submit" type="submit" value="Update watched shows" />';
echo '</form>';
if (@isset($_POST['submit'])){
    $table = $_POST['watched'];
    foreach ($table as $i1 => $n1){
        foreach ($n1 as $i2 => $n2){
            foreach ($n2 as $i3 => $n3){
                $user_id = $_SESSION['user_id'];
                mysql_query("INSERT INTO watched (user_id, show_id, show_season, episode_number) VALUES ('$user_id', '$i1', '$i2', '$i3')");
            }
        }
    }
}
include_once 'includes/footer.php';
?>