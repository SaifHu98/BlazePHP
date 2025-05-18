<?php
namespace Core\Middleware;

use Core\Http\Request;

class Firewall {
    public static function inspect(Request $request): void {
        $banned = ['<script>', '<?php', 'eval(', 'base64_decode'];
        foreach ($request->all() as $input) {
            foreach ($banned as $term) {
                if (stripos($input, $term) !== false) {
                    die('Suspicious input detected.');
                }
            }
        }
    }
}