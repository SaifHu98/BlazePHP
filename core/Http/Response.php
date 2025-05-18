<?php
namespace Core\Http;

class Response {
    protected int $statusCode = 200;

    public function setStatusCode(int $code): self {
        $this->statusCode = $code;
        http_response_code($code);
        return $this;
    }

    public function json(array $data): void {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function send(string $text): void {
        echo $text;
    }
}