<?php
$browser = $_SERVER['HTTP_USER_AGENT']; 
if(preg_match('/MSIE/i',$browser)){ 
    if (!isset($ie)){
        header('Location: http://tylerbridger.com/ie.php');
    }
}
$requested_file = 'index2.php';
$cache_dir = 'cache/';
$cache_file = 'index.html';
$cachetime = 5 * 60;
include 'includes/config.php';
if (file_exists($cache_dir.$cache_file) && time() - $cachetime < filemtime($cache_dir.$cache_file)){
     echo "<!-- Cached copy, generated ".date('H:i', filemtime($cache_dir.$cache_file))." -->\n";
     include($cache_dir.$cache_file);
     exit;
} else {
    ob_start();
    include $requested_file;
    $handle = fopen($cache_dir.$cache_file, 'w');
    fwrite($handle, ob_get_contents());
    fclose($handle);
    ob_end_flush();
}
?>