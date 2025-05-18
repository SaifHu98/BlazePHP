<?php
namespace App\Middleware;

use Core\Http\Request;
use Core\Http\Response;
use Core\Auth\JWTAuth;

class ApiAuthMiddleware {
    public static function check(Request $request, Response $response): ?object {
        $authHeader = $request->header('HTTP_AUTHORIZATION');
        $token = str_replace('Bearer ', '', $authHeader ?? '');
        $user = JWTAuth::verify($token);
        if (!$user) {
            $response->setStatusCode(401)->json(['error' => 'Unauthorized']);
            exit;
        }
        return $user;
    }
}