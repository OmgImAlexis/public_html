<div id="wrapper">
<?php
$title['page']="Minecraft Skin Displayer";
include "./header.php";
include "./sidebar.php";
?>
<div id="content">
<?php
$con = mysql_connect("localhost","wvvwme_daz","knowledge");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
echo '<h1>Minecraft Skin Displayer</h1>';
$username = $_POST['username'];
$image = 'http://s3.amazonaws.com/MinecraftSkins/'.$username.'.png';
echo <<< THIS
<form action="" method="POST">
<input type="text" name="username"></input>
<input type="submit" name="submit" value="Submit">
</form>
THIS;
if (!isset($_POST['username'])){
    echo 'Please enter a minecraft username. (Case sensitive)';
    }
if (isset($_POST['username'])){
$handle = @fopen("$image", "r");
if(strpos($handle, "Resource id") !== false)
{
  echo '<img src="http://s3.amazonaws.com/MinecraftSkins/'.$username.'.png" width="256" height="128"></img>';
mysql_select_db("wvvwme_mcsdisplayer", $con);

$sql="INSERT INTO displayer (username) VALUES ('$_POST[username]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($con);
} else {
    echo 'The username doesn\'t appear to exist, please make sure you typed it correctly. <br />Make sure you\'re using the correct UPPER and lower case letters.';
    }
}

// Show Last 5 Displayed
echo '<br /><h2>Last 5 Displayed</h2>';
mysql_connect(localhost,wvvwme_daz,knowledge);
@mysql_select_db(wvvwme_mcsdisplayer) or die( "Unable to select database");
$query="SELECT * FROM displayer ORDER BY ID desc LIMIT 5";
$result=mysql_query($query) or die(mysql_error());
$num=mysql_numrows($result);


mysql_close();

$i=0;
while ($i < $num) {
$uusername=mysql_result($result,$i,username);
echo '<img src="http://s3.amazonaws.com/MinecraftSkins/'.$uusername.'.png" width="256" height="128"></img><br />';
echo ''.$uusername.'';
echo '<br />';
echo '<br />';
$i++;
}

?>
</div>
</div>