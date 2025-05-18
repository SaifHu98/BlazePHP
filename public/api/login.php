<?php
require_once '../../core/init.php'; // تضمين الفريمورك الخاص بك

use Core\Auth;
use Core\Response;

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (!$email || !$password) {
    Response::json(['error' => 'الرجاء إدخال البريد وكلمة المرور'], 400);
}

$user = Auth::attempt($email, $password);

if ($user) {
    $token = Auth::generateJWT($user['id']);
    Response::json(['token' => $token]);
} else {
    Response::json(['error' => 'بيانات الدخول غير صحيحة'], 401);
}
