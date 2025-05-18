<?php
namespace Core;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use PDO;

class Auth {
    private static $secret = 'super_secret_key_123'; // غيره في الإنتاج

    public static function attempt($email, $password) {
        $pdo = DB::connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public static function generateJWT($user_id) {
        $payload = [
            'iss' => 'blazephp',
            'sub' => $user_id,
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24) // 24 ساعة
        ];
        return JWT::encode($payload, self::$secret, 'HS256');
    }

    public static function validateJWT($token) {
        try {
            $decoded = JWT::decode($token, new Key(self::$secret, 'HS256'));
            $user_id = $decoded->sub;

            $pdo = DB::connect();
            $stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = :id");
            $stmt->execute(['id' => $user_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return false;
        }
    }
}
