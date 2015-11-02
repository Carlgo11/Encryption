<?php

class Encryption {

    public static function decrypt($encrypted, $password, $salt = null) {
        $key = hash(Config::getData("algorithm"), $salt . $password, true);
        $iv = base64_decode(substr($encrypted, 0, 22) . '==');
        $encrypted = substr($encrypted, 22);
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0\4");
        $hash = substr($decrypted, -32);
        $decrypted = substr($decrypted, 0, -32);
        if (md5($decrypted) != $hash) {
            return false;
        }
        return $decrypted;
    }

    public static function encrypt($decrypted, $password, $salt = null) {
        $key = hash(Config::getData("algorithm"), $salt . $password, true);
        srand();
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
        if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22) {
            return false;
        }
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
        return $iv_base64 . $encrypted;
    }

    public static function generateHash($password, $salt) {
        for ($i = Config::getData("hashing", "start_cost"); $i < 31; $i++) {
        $options = ['cost' => $i];
        $start = microtime(true);
        $hash = password_hash($password.$salt, PASSWORD_BCRYPT, $options);
        $end = microtime(true);
         if (($end - $start) * 1000 > Config::getData("hashing", "min_time")) {
            return $hash;
        }
        }
       
    }
    
    public static function verifyHash($password, $hash){
        return password_verify($password, $hash);
    }

    public static function generateSalt($section) {
        $length = Config::getData($section, "salt_length");
        return openssl_random_pseudo_bytes($length);
    }
}
