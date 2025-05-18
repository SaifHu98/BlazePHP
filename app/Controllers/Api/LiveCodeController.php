<?php
namespace App\Controllers\Api;

use Core\Http\Request;
use Core\Http\Response;
use Core\LiveCode\Playground;

class LiveCodeController {
    public function run(Request $request, Response $response): void {
        $payload = json_decode(file_get_contents('php://input'), true);
        $code = $payload['code'] ?? '';
        $output = Playground::run($code);
        $response->json(['output' => $output]);
    }
}