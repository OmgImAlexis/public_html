<?php
$mobiles = array("mobile","android");
$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
$i;

foreach($mobiles as $mobile) {
 if(strpos($agent, $mobile) !== false) {
  $i += 1; // I have tested it with a loop of 10, 50, 100 and 1000 that $i += 1 is faster than $i++
 }
}
if($i >= 1) {
  echo "You are using a mobile browser.";
}else{
  echo "It appears you are on a non mobile device or an unrecognized mobile device.";
}
?> 