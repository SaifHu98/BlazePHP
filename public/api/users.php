<?php
require_once '../../core/init.php';
use Core\DB;
use Core\Response;

$pdo = DB::connect();
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT id, name, email FROM users");
    Response::json($stmt->fetchAll());
}

if ($method === 'POST' && preg_match('#/api/users/(\d+)/delete#', $uri, $matches)) {
    $id = $matches[1];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
    Response::json(['deleted_id' => $id]);
}
