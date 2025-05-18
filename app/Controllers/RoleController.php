<?php
namespace App\Controllers;

use Core\Http\Request;
use Core\Http\Response;
use App\Models\Role;

class RoleController {
    public function index(Request $request, Response $response): void {
        \$roles = Role::all();
        include __DIR__ . '/../Views/admin/users/roles.php';
    }

    public function store(Request $request, Response $response): void {
        Role::create(\$request->input('name'));
        header("Location: /admin/roles");
    }

    public function update(Request $request, Response $response): void {
        Role::rename((int)\$request->input('id'), \$request->input('name'));
        header("Location: /admin/roles");
    }
}