<?php
require_once '../../core/init.php';
use Core\Response;

$settingsFile = __DIR__ . '/../../config/settings.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $json = file_exists($settingsFile) ? file_get_contents($settingsFile) : '{}';
    echo $json;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    file_put_contents($settingsFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    Response::json(['status' => 'saved']);
}
