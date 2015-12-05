<?php
$mobiles = array("mobile","android");
$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
$i = 0;

foreach($mobiles as $mobile) {
 if(strpos($agent, $mobile) !== false) {
  $i += 1;
 }
}
if($i >= 1) {
  echo '<link rel="stylesheet" type="text/css" href="http://wvvw.me/mobile.css" media="screen"/>';
}else{
  echo '<link rel="stylesheet" type="text/css" href="http://wvvw.me/this.php" media="screen"/>';
}
?> 
<script type="text/javascript" src="curvycorners.js"></script>
<div id="header">
<?php
echo '<title>wvvw | '.$title['page'].'</title>';
?>
<a href="/" class="wvvwme"></a>
</div>