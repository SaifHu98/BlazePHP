<?php
namespace App\Controllers;

use Core\Http\Request;
use Core\Http\Response;
use Core\Auth\JWTAuth;
use Core\Database\DB;

class AuthController {
    public function login(Request \$request, Response \$response): void {
        \$username = \$request->input('username');
        \$password = \$request->input('password');

        \$stmt = DB::connect()->prepare("SELECT * FROM users WHERE username = ?");
        \$stmt->execute([\$username]);
        \$user = \$stmt->fetch();

        if (\$user && password_verify(\$password, \$user['password'])) {
            \$token = JWTAuth::generate(['id' => \$user['id'], 'username' => \$user['username']]);
            \$response->json(['token' => \$token]);
        } else {
            \$response->setStatusCode(401)->json(['error' => 'Invalid credentials']);
        }
    }

    public function profile(Request \$request, Response \$response): void {
        \$authHeader = \$request->header('HTTP_AUTHORIZATION');
        \$token = str_replace('Bearer ', '', \$authHeader ?? '');
        \$user = JWTAuth::verify(\$token);
        if (\$user) {
            \$response->json(['user' => \$user]);
        } else {
            \$response->setStatusCode(403)->json(['error' => 'Access denied']);
        }
    }
}