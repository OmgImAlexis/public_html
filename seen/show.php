<?php
include_once 'includes/header.php';
echo '<h2>'.show_id_to_name($_GET['show_id']).'</h2>';
$show_id = clean_input($_GET['show_id']);
$episode_result = mysql_query("SELECT * FROM episodes WHERE show_id='$show_id' ORDER BY sort ASC");
while ($episode_row = mysql_fetch_assoc($episode_result)){
    $seasons = count($episode_row['show_season']);
    if (@$season_done[$episode_row['show_season']] != TRUE){
        if ($episode_row['show_season'] >= $seasons){
            echo '<b>Season'.$episode_row['show_season'].'</b><br />';
            $season_done[$episode_row['show_season']] = TRUE;
        }
    }
    echo $episode_row['episode_number'].'. <a href="episode.php?show_id='.$episode_row['show_id'].'&show_season='.$episode_row['show_season'].'&episode_id='.$episode_row['episode_id'].'">'.$episode_row['episode_name'].'</a><br />';
}
include_once 'includes/footer.php';
?>