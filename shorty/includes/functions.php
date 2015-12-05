<?php
// Un-comment the next line to turn debugging on
// Debugging should be turned off in production enviroment
$debug = 'ON';
function short_url_exist($url){
    $url = mysql_real_escape_string($url);
    $result = mysql_query("SELECT * FROM urls WHERE url_short='$url'");
    if (mysql_num_rows($result) >= 1){
        return TRUE;
    } else {
        return FALSE;
    }
}
function short_to_long_url($url){
    $url = mysql_real_escape_string($url);
    $result = mysql_query("SELECT * FROM urls WHERE url_short='$url'");
    if (mysql_num_rows($result) >= 1){
        $url_row = mysql_fetch_assoc($result);
        $page = $url_row['url_original'];
        return $page;
    } else {
        $error = 'URL is incorrect.';
        return $error;
    }
}
function url_exist($url){
    if (!isset($GLOBALS['debug'])){
        $headers = get_headers($url);
        if ((substr($headers[0], 9, 3)) == '404'){
            return FALSE;
        } elseif((substr($headers[0], 9, 3)) == '200') {
            return TRUE;
        }
    } else {
        return TRUE;
    }
}
function is_signed_in(){
    if (!isset($_SESSION['signed_in'])){
        return FALSE;
    } else {
        return TRUE;
    }
}
function views($url, $update = FALSE){
    $url_views_sql = "SELECT * FROM urls WHERE url_short='$url'";
    $url_views_result = mysql_query($url_views_sql);
    $url_views_row = mysql_fetch_assoc($url_views_result);
    if ($update == TRUE){
        $current_views = $url_views_row['url_views']+1;
        mysql_query("UPDATE urls SET url_views='$current_views' WHERE url_short='$url'");
    } else {
        $current_views = $url_views_row['url_views'];
    }
    return $current_views;
}
?>