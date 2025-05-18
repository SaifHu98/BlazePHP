<?php
namespace App\Models;

use Core\Database\DB;

class Role {
    public static function all(): array {
        return DB::connect()->query("SELECT * FROM roles")->fetchAll();
    }

    public static function create(string $name): void {
        $stmt = DB::connect()->prepare("INSERT INTO roles (name) VALUES (?)");
        $stmt->execute([$name]);
    }

    public static function rename(int $id, string $name): void {
        $stmt = DB::connect()->prepare("UPDATE roles SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);
    }

    public static function getById(int $id): ?array {
        $stmt = DB::connect()->prepare("SELECT * FROM roles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}