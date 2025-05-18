<?php
namespace Core\Auth;

class Permission {
    public static function check(string \$role, string \$permission): bool {
        \$roles = [
            'admin' => ['view_users', 'edit_users', 'delete_users'],
            'editor' => ['view_users', 'edit_users'],
            'viewer' => ['view_users']
        ];
        return in_array(\$permission, \$roles[\$role] ?? []);
    }
}