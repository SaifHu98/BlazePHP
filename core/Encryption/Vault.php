<?php
namespace Core\Encryption;

use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Random;

class Vault {
    private static string $key = '32_character_super_secure_encryption_key';

    public static function encrypt(string $plaintext): string {
        $cipher = new AES('gcm');
        $cipher->setKey(self::$key);
        $iv = Random::string(12);
        $cipher->setNonce($iv);
        $ciphertext = $cipher->encrypt($plaintext);
        return base64_encode($iv . $ciphertext . $cipher->getTag());
    }

    public static function decrypt(string $encrypted): string {
        $data = base64_decode($encrypted);
        $iv = substr($data, 0, 12);
        $tag = substr($data, -16);
        $ciphertext = substr($data, 12, -16);
        $cipher = new AES('gcm');
        $cipher->setKey(self::$key);
        $cipher->setNonce($iv);
        $cipher->setTag($tag);
        return $cipher->decrypt($ciphertext);
    }
}