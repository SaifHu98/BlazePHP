<?php
namespace Core\Http;

use Core\Http\Router;
use Core\Http\Request;
use Core\Http\Response;
use Core\Security\Csrf;
use Core\Middleware\Firewall;

class App {
    protected Router $router;
    protected Request $request;
    protected Response $response;

    public function __construct() {
        session_start();
        $this->router = new Router();
        $this->request = new Request();
        $this->response = new Response();

        Firewall::inspect($this->request);
        Csrf::verify($this->request);

        $router = $this->router;
        require_once __DIR__ . '/../../routes/web.php';
    }

    public function run(): void {
        $this->router->dispatch($this->request, $this->response);
    }
}