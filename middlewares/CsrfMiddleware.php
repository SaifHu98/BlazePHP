<?php
namespace Middleware;

use Core\Request;

class CsrfMiddleware {
    public static function handle(Request $request): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            if (!isset($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $request->csrfToken()) {
                die("CSRF token validation failed.");
            }
        }
    }
}