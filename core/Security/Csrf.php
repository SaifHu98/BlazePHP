<?php
namespace Core\Security;

use Core\Http\Request;

class Csrf {
    public static function generate(): string {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function verify(Request $request): void {
        if ($request->method() === 'POST') {
            $token = $request->csrfToken();
            if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
                die('CSRF Token mismatch.');
            }
        }
    }
}