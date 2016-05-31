<?php
/*
* Author: Rohit Kumar
* Website: iamrohit.in
* Date: 31-05-2016
* App Name: encrypt, decrypt data
* Description: A simple OOPS based call to encrypt, decrypt your data
*/
class secure {
   // Set your unique has keys	
   private static $secretKey = 'Rohit'; 
   private static $secretIv = 'www.iamrohit.in';
   // Encryption method
   private static $encryptMethod = "AES-256-CBC"; 

   // pass string/number which you want to encrypt
   public static function encrypt($data) {
   	  $key = hash('sha256', self::$secretKey);
   	  $iv = substr(hash('sha256', self::$secretIv), 0, 16);
   	  $result = openssl_encrypt($data, self::$encryptMethod, $key, 0, $iv);
      return $result= base64_encode($result);
   }
   
   // pass encrypted data to decrypt
   public static function decrypt($data) {
   	  $key = hash('sha256', self::$secretKey);
   	  $iv = substr(hash('sha256', self::$secretIv), 0, 16);
   	  $result = openssl_decrypt(base64_decode($data), self::$encryptMethod, $key, 0, $iv);
      return $result;
   }
}

?>