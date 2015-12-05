<?php
function is_signed_in(){
    if (!isset($_SESSION['signed_in'])){
        return FALSE;
    } else {
        return TRUE;
    }
}
function post_status($user_id, $status_body){
    $user_id = mysql_real_escape_string($user_id);
    $status_body = mysql_real_escape_string(htmlspecialchars($status_body));
    $status_date = date("Y\-m\-d H:i:s");
    mysql_query("INSERT INTO status (status_body, user_id, status_date) VALUES ('$status_body', '$user_id', '$status_date')");
}
function news_feed($user_id, $news_feed = 'no'){
    $user_id = mysql_real_escape_string($user_id);
    if ($news_feed == 'yes'){
        $friends_query = "SELECT * FROM friends WHERE requester_id='".$user_id."' AND accepted_state='1'";
        $friends_result = mysql_query($friends_query);
        $friends_row = mysql_fetch_assoc($friends_result);
        $status_query = "SELECT * FROM status WHERE user_id='".$friends_row['accepter_id']."' OR user_id='$user_id' ORDER BY status_date DESC ";
    } else {
        $friends_row = $user_id;
        $status_query = "SELECT * FROM status WHERE user_id='".$friends_row['accepter_id']."' ORDER BY status_date DESC ";
    }
    $status_result = mysql_query($status_query);
    while ($status_row = mysql_fetch_assoc($status_result)){
        echo id_to_name($status_row['user_id']).' - '.$status_row['status_date'].'<br />'.nl2br($status_row['status_body']).'<br /><br />';
    }
}
function id_to_name($user_id){
    $user_id = mysql_real_escape_string($user_id);
    $user_name = mysql_fetch_row(mysql_query("SELECT user_name FROM users WHERE user_id='$user_id'"));
    return $user_name[0];
}
function add_friend($requester_id, $accepter_id){
    $requester_id = mysql_real_escape_string($requester_id);
    $accepter_id = mysql_real_escape_string($accepter_id);
    $accept_status = 0;
    mysql_query("INSERT INTO friends (requester_id, accepter_id, accept_status) VALUES ('$requester_id', '$accepter_id', '$accept_status')");
}
function delete_friend(){
    return TRUE;
}
function accept_friend(){
    return TRUE;
}
?>