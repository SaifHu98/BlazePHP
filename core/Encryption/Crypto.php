<?php
namespace Core\Encryption;

use phpseclib3\Crypt\AES;

class Crypto {
    protected static string $key = 'ultra_secure_key_32byte_long!!';

    public static function encrypt(string $data): string {
        $cipher = new AES('cbc');
        $cipher->setKey(self::$key);
        $iv = random_bytes(16);
        $cipher->setIV($iv);
        $encrypted = $cipher->encrypt($data);
        return base64_encode($iv . $encrypted);
    }

    public static function decrypt(string $data): string {
        $data = base64_decode($data);
        $iv = substr($data, 0, 16);
        $ciphertext = substr($data, 16);
        $cipher = new AES('cbc');
        $cipher->setKey(self::$key);
        $cipher->setIV($iv);
        return $cipher->decrypt($ciphertext);
    }
}