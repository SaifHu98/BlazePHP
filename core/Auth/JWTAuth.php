<?php
namespace Core\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTAuth {
    protected static string \$secret = 'ultrasecretkey2025';

    public static function generate(array \$payload): string {
        return JWT::encode(\$payload, self::\$secret, 'HS256');
    }

    public static function verify(string \$token): ?object {
        try {
            return JWT::decode(\$token, new Key(self::\$secret, 'HS256'));
        } catch (\Exception \$e) {
            return null;
        }
    }
}