<?php
namespace App\Middleware;

use Core\Http\Request;

class VerifyCsrfToken {
    public static function handle(Request $request): void {
        if ($request->method() === 'POST') {
            session_start();
            $token = $request->input('_token');
            if (!isset($_SESSION['_token']) || $_SESSION['_token'] !== $token) {
                http_response_code(419);
                die('CSRF token mismatch.');
            }
        }
    }
}