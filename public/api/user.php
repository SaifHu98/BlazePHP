<?php
require_once '../../core/init.php';

use Core\Auth;
use Core\Response;

header('Content-Type: application/json');

$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
    Response::json(['error' => 'توكن مفقود'], 401);
}

$token = trim(str_replace('Bearer', '', $authHeader));
$user = Auth::validateJWT($token);

if ($user) {
    Response::json($user);
} else {
    Response::json(['error' => 'توكن غير صالح أو منتهي'], 403);
}
