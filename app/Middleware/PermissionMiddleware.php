<?php
namespace App\Middleware;

use Core\Http\Request;
use Core\Http\Response;
use App\Models\Permission;

class PermissionMiddleware {
    public static function handle(Request $request, Response $response, string $requiredAction, int $roleId): void {
        if (!Permission::hasPermission($roleId, $requiredAction)) {
            $response->setStatusCode(403)->send("Forbidden: You do not have access to this action.");
            exit;
        }
    }
}