<?php
function RIJNDAEL_encrypt($text){
 
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
     $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
     $key = "This is a very secret key";
     return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv));
     
}
 
function RIJNDAEL_decrypt($text){
 
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
     $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
     $key = "This is a very secret key";
   //I used trim to remove trailing spaces
 return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($text), MCRYPT_MODE_ECB, $iv));
     
}
 
//example
 echo RIJNDAEL_decrypt(RIJNDAEL_encrypt('penis')).'<br />'; 
 echo RIJNDAEL_encrypt('penis');
?>