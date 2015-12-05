<?php
function file_array($path = '.', $exclude = ".|..", $recursive = true) {
     $path = rtrim($path, "/") . "/";
     $folder_handle = opendir($path);
     $exclude_array = explode("|", $exclude);
     $result = array();
     while(false !== ($filename = readdir($folder_handle))) {
         if(!in_array(strtolower($filename), $exclude_array)) {
             if(is_dir($path . $filename . "/")) {
                                 // Need to include full "path" or it's an infinite loop
                 if($recursive) $result[] = file_array($path . $filename . "/", $exclude, true);
             } else {
                 $result[] = $path.$filename;
             }
         }
     }
     return $result;
}
function array_flatten($a){
    $ab = array(); if(!is_array($a)) return $ab;
    foreach($a as $value){
        if(is_array($value)){
            $ab = array_merge($ab,array_flatten($value));
        }else{
            array_push($ab,$value);
        }
    }
    return $ab;
}
?>