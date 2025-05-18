<?php
namespace App\Controllers;

use Core\Http\Request;
use Core\Http\Response;
use Core\Database\DB;

class UserController {
    public function index(Request $request, Response $response): void {
        $users = DB::connect()->query("SELECT id, username, role FROM users")->fetchAll();
        include __DIR__ . '/../Views/admin/users/index.php';
    }

    public function create(Request $request, Response $response): void {
        include __DIR__ . '/../Views/admin/users/create.php';
    }

    public function store(Request $request, Response $response): void {
        $username = htmlspecialchars($request->input('username'));
        $password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $role = htmlspecialchars($request->input('role'));

        $stmt = DB::connect()->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $role]);

        header("Location: /admin/users");
    }

    public function delete(Request $request, Response $response): void {
        $id = (int) $request->input('id');
        $stmt = DB::connect()->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: /admin/users");
    }
}