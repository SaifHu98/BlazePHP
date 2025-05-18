<?php
namespace Core\Session;

class SessionManager {
    public static function start(): void {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    public static function set(string $key, $value): void {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key) {
        return $_SESSION[$key] ?? null;
    }

    public static function forget(string $key): void {
        unset($_SESSION[$key]);
    }

    public static function destroy(): void {
        session_destroy();
    }
}