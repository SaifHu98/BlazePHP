<?php
namespace App\Controllers;

use Core\Http\Request;
use Core\Http\Response;
use Core\Security\Csrf;

class HomeController {
    public function index(Request $request, Response $response): string {
        $token = Csrf::generate();
        return "<form method='POST' action='/send'>
                    <input type='text' name='message' required>
                    <input type='hidden' name='_token' value='{$token}'>
                    <button type='submit'>Send</button>
                </form>";
    }

    public function send(Request $request, Response $response): void {
        $msg = htmlspecialchars($request->input('message'), ENT_QUOTES, 'UTF-8');
        $response->json(['message' => "Received: {$msg}"]);
    }
}