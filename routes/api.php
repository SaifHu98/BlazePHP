<?php
use App\Controllers\Api\AIController;
use App\Controllers\Api\LiveCodeController;

$router->get('/api/ai/suggest', [AIController::class, 'suggest']);
$router->post('/api/livecode/run', [LiveCodeController::class, 'run']);
