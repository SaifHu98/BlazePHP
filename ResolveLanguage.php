<?php
namespace Core\Middleware;

use Core\Support\Translator;

class ResolveLanguage {
    public static function handle(): void {
        $lang = $_COOKIE['lang'] ?? ($_GET['lang'] ?? 'en');
        Translator::load($lang);
    }
}
