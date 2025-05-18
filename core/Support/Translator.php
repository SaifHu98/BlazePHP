<?php
namespace Core\Support;

class Translator {
    protected static array $translations = [];

    public static function load(string $lang = 'en'): void {
        $file = __DIR__ . "/../../lang/$lang.php";
        if (file_exists($file)) {
            self::$translations = include $file;
        }
    }

    public static function get(string $key): string {
        return self::$translations[$key] ?? $key;
    }
}