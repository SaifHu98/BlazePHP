<?php
namespace App\Middleware;

class SanitizeInput {
    public static function handle(): void {
        array_walk_recursive($_POST, function (&$value) {
            $value = trim(strip_tags($value));
        });
        array_walk_recursive($_GET, function (&$value) {
            $value = trim(strip_tags($value));
        });
    }
}