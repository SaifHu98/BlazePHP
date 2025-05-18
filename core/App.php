<?php
namespace Core;

use Core\Router;
use Core\Request;
use Core\Response;
use Middleware\CsrfMiddleware;
use Middleware\AuthMiddleware;

class App {
    protected Router $router;
    protected Request $request;
    protected Response $response;

    public function __construct() {
        $this->router = new Router();
        $this->request = new Request();
        $this->response = new Response();

        // Middlewares
        CsrfMiddleware::handle($this->request);
        AuthMiddleware::checkAuth();

        require_once __DIR__ . '/../routes/web.php';
    }

    public function run(): void {
        $this->router->dispatch($this->request, $this->response);
    }
}