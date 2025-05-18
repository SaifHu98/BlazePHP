<?php
namespace Core\Http;

class Request {
    public function method(): string {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    public function uri(): string {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function input(string $key, $default = null) {
        return $_POST[$key] ?? $_GET[$key] ?? $default;
    }

    public function all(): array {
        return array_merge($_GET, $_POST);
    }

    public function header(string $key): ?string {
        return $_SERVER[$key] ?? null;
    }

    public function csrfToken(): ?string {
        return $_POST['_token'] ?? null;
    }
}