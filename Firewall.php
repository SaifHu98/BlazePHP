<?php
namespace App\Middleware;

class Firewall {
    protected static array $bannedPatterns = [
        'eval\(', 'base64_', '<script>', '<?php', '\$_GET', '\$_POST', '\$_REQUEST'
    ];

    public static function handle(): void {
        foreach (array_merge($_GET, $_POST) as $input) {
            foreach (self::$bannedPatterns as $pattern) {
                if (preg_match('/' . preg_quote($pattern, '/') . '/i', $input)) {
                    http_response_code(403);
                    die('Blocked suspicious request.');
                }
            }
        }
    }
}