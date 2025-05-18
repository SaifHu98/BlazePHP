<?php
namespace Core;

class Router {
    protected array $routes = [];

    public function get(string $uri, callable|array $action): void {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, callable|array $action): void {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(Request $request, Response $response): void {
        $uri = $request->uri();
        $method = $request->method();

        $route = $this->routes[$method][$uri] ?? null;
        if (!$route) {
            $response->setStatusCode(404)->send("Not Found");
            return;
        }

        [$class, $method] = $route;
        echo call_user_func([new $class, $method], $request, $response);
    }
}