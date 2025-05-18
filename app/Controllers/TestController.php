<?php
namespace App\Controllers;

use Core\Http\Request;
use Core\Http\Response;
use Core\Utils\SecureHelper;

class TestController {
    public function secure(Request $request, Response $response): void {
        $data = $request->input('data');
        $safe = SecureHelper::secureInput($data);
        $encrypted = SecureHelper::encryptField($safe);
        $decrypted = SecureHelper::decryptField($encrypted);
        $response->json([
            'original' => $data,
            'sanitized' => $safe,
            'encrypted' => $encrypted,
            'decrypted' => $decrypted
        ]);
    }
}