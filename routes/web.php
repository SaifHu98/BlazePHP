<?php
use App\Controllers\PermissionController;

$router->get('/admin/permissions', [PermissionController::class, 'index']);
$router->post('/admin/permissions/assign', [PermissionController::class, 'assign']);
$router->post('/admin/permissions/revoke', [PermissionController::class, 'revoke']);
$router->get('/admin/permissions/create', [PermissionController::class, 'create']);
$router->post('/admin/permissions/store', [PermissionController::class, 'store']);
$router->get('/admin/permissions/edit/{id}', [PermissionController::class, 'edit']);
$router->post('/admin/permissions/update/{id}', [PermissionController::class, 'update']);
$router->post('/admin/permissions/delete/{id}', [PermissionController::class, 'delete']);
$router->get('/admin/permissions/{id}', [PermissionController::class, 'show']);
$router->get('/admin/permissions/{id}/edit', [PermissionController::class, 'edit']);
$router->post('/admin/permissions/{id}/update', [PermissionController::class, 'update']);
$router->post('/admin/permissions/{id}/delete', [PermissionController::class, 'delete']);