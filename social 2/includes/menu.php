<?php
echo '<a href="messages.php">Messages</a>';
echo "<br />\n";
echo '<a href="friends.php">Friends</a>';
echo "<br />\n";
echo '<a href="photos.php?pid='.$_SESSION['user_id'].'">Photos</a>';
echo "<br />\n";
echo '<a href="settings.php">Settings</a>';
?>