<?php
// BlazePHP Public Entry
require_once __DIR__ . '/../core/init.php';

use Core\Response;

header('Content-Type: text/html; charset=utf-8');

$data = [
    'message' => 'Welcome to BlazePHP!',
    'status' => 'OK',
    'documentation' => '/README.md',
    'admin' => '/frontend/vue-admin',
    'api' => '/api'
];

echo '<pre>' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</pre>';
