<?php
namespace App\Middleware;

class RateLimiter {
    public static function handle(): void {
        session_start();
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = 'rate_' . $ip;
        $limit = 100; // 100 requests
        $window = 60; // per minute

        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = ['count' => 1, 'time' => time()];
        } else {
            if (time() - $_SESSION[$key]['time'] < $window) {
                $_SESSION[$key]['count']++;
                if ($_SESSION[$key]['count'] > $limit) {
                    http_response_code(429);
                    die('Too many requests.');
                }
            } else {
                $_SESSION[$key] = ['count' => 1, 'time' => time()];
            }
        }
    }
}