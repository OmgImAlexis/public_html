<?php
function is_signed_in(){
    if (!isset($_SESSION['signed_in'])){
        return FALSE;
    } else {
        return TRUE;
    }
}
function id_to_name($user_id){
    $user_id = mysql_real_escape_string($user_id);
    $user_name = mysql_fetch_row(mysql_query("SELECT user_name FROM users WHERE user_id='$user_id'"));
    return $user_name[0];
}
function api_to_id($user_api){
    $user_api = mysql_real_escape_string($user_api);
    $user_row = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE user_api='$user_api'"));
    return $user_row['user_id'];
}
function timedout($url, $date){
    $train_row = mysql_fetch_assoc(mysql_query("SELECT * FROM train WHERE url='$url' ORDER BY date DESC LIMIT 0, 1"));
    $train_time = substr($train_row['date'], 11);
    $train_seconds = substr($train_time, 6);
    $train_minutes = substr($train_time, 3, -3);
    $train_hours = substr($train_time, 0, -6);
    $train_long_time = ((($train_hours*60)+$train_minutes)*60)+$train_seconds;
    $compare_time = substr($date, 11);
    $compare_seconds = substr($compare_time, 6);
    $compare_minutes = substr($compare_time, 3, -3);
    $compare_hours = substr($compare_time, 0, -6);
    $compare_long_time = ((($compare_hours*60)+$compare_minutes)*60)+$compare_seconds;
    if (($compare_long_time - $train_long_time) <= 300){
        return TRUE;
    } else {
        return FALSE;
    }
}
function url_to_short($url){
    // Strip Symbols
    $url = str_replace('/', '', $url);
    $url = str_replace('\\', '', $url);
    $url = str_replace(',', '', $url);
    $url = str_replace(':', '', $url);
    $url = str_replace(';', '', $url);
    $url = str_replace('`', '', $url);
    $url = str_replace('~', '', $url);
    $url = str_replace('!', '', $url);
    $url = str_replace('@', '', $url);
    $url = str_replace('#', '', $url);
    $url = str_replace('$', '', $url);
    $url = str_replace('%', '', $url);
    $url = str_replace('^', '', $url);
    $url = str_replace('&', '', $url);
    $url = str_replace('*', '', $url);
    $url = str_replace('(', '', $url);
    $url = str_replace(')', '', $url);
    $url = str_replace('+', '', $url);
    $url = str_replace('=', '', $url);
    $url = str_replace('[', '', $url);
    $url = str_replace(']', '', $url);
    $url = str_replace('{', '', $url);
    $url = str_replace('}', '', $url);
    $url = str_replace('|', '', $url);
    $url = str_replace('<', '', $url);
    $url = str_replace('>', '', $url);
    $url = str_replace('?', '', $url);
    $url = str_replace('\'', '', $url);
    $url = str_replace('"', '', $url);
    $url = str_replace('http://', '', $url);
    $url = str_replace('https://', '', $url);
    $url = str_replace('http//', '', $url);
    $url = str_replace('https//', '', $url);
    $url = str_replace('http', '', $url);
    $url = str_replace('https', '', $url);
    // Strip .tumblr.com
    if (substr($url, -11) == '.tumblr.com'){
        $url = substr($url, 0, -11);
    }
    $short = $url;
    return $short;
}
?>