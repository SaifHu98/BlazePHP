<?php
namespace Core\Http;

class Router {
    protected array $routes = [];

    public function get(string $uri, array $action): void {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, array $action): void {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(Request $request, Response $response): void {
        $uri = $request->uri();
        $method = $request->method();
        $route = $this->routes[$method][$uri] ?? null;

        if (!$route) {
            $response->setStatusCode(404)->json(['error' => 'Not Found']);
            return;
        }

        [$controller, $method] = $route;
        echo call_user_func([new $controller, $method], $request, $response);
    }
}