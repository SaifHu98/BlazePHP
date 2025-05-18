<?php
namespace Core\Utils;

use Core\Encryption\Vault;

class SecureHelper {
    public static function secureInput(string $value): string {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }

    public static function encryptField(string $value): string {
        return Vault::encrypt($value);
    }

    public static function decryptField(string $value): string {
        return Vault::decrypt($value);
    }
}