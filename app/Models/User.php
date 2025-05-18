<?php
namespace App\Models;

use Core\Database\DB;

class User {
    public static function all(): array {
        return DB::connect()->query("SELECT * FROM users")->fetchAll();
    }

    public static function create(string $username, string $password, int $role_id): void {
        $stmt = DB::connect()->prepare("INSERT INTO users (username, password, role_id) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $role_id]);
    }

    public static function delete(int $id): void {
        $stmt = DB::connect()->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }

    public static function findByUsername(string $username) {
        $stmt = DB::connect()->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}