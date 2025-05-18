<?php
namespace App\Controllers;

use Core\Http\Request;
use Core\Http\Response;
use Core\Utils\SecureHelper;

class AdminController {
    public function dashboard(Request $request, Response $response): void {
        ob_start();
        include __DIR__ . '/../Views/admin/dashboard.php';
        $html = ob_get_clean();
        $response->send($html);
    }
}