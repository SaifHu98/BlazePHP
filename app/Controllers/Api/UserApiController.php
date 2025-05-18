<?php
namespace App\Controllers\Api;

use Core\Http\Request;
use Core\Http\Response;
use App\Models\User;

class UserApiController {
    public function index(Request $request, Response $response): void {
        $users = User::all();
        $response->json(['users' => $users]);
    }

    public function store(Request $request, Response $response): void {
        $username = htmlspecialchars($request->input('username'));
        $password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $role_id = (int)$request->input('role_id');
        User::create($username, $password, $role_id);
        $response->json(['status' => 'user_created']);
    }
}