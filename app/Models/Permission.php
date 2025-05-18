<?php
namespace App\Models;

use Core\Database\DB;

class Permission {
    public static function all(): array {
        return DB::connect()->query("SELECT * FROM permissions")->fetchAll();
    }

    public static function assign(int \$role_id, string \$action): void {
        \$stmt = DB::connect()->prepare("INSERT INTO role_permissions (role_id, action) VALUES (?, ?)");
        \$stmt->execute([\$role_id, \$action]);
    }

    public static function revoke(int \$role_id, string \$action): void {
        \$stmt = DB::connect()->prepare("DELETE FROM role_permissions WHERE role_id = ? AND action = ?");
        \$stmt->execute([\$role_id, \$action]);
    }

    public static function hasPermission(int \$role_id, string \$action): bool {
        \$stmt = DB::connect()->prepare("SELECT 1 FROM role_permissions WHERE role_id = ? AND action = ?");
        \$stmt->execute([\$role_id, \$action]);
        return (bool)\$stmt->fetchColumn();
    }
}