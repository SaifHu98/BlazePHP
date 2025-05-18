<?php
namespace App\Controllers\Api;

use Core\Http\Request;
use Core\Http\Response;
use Core\AI\Assistant;

class AIController {
    public function suggest(Request $request, Response $response): void {
        $context = $request->input('context') ?? 'general';
        $suggestions = Assistant::suggest($context);
        $response->json($suggestions);
    }
}