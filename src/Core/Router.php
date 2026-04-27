<?php
namespace App\Core;

class Router
{
    protected $routes = [];

    // Get Router
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    // Post Router
    public function Post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    // Logic to find match
    public function resolve(Request $request)
    {
        $path = $request->getUri();
        $method = $request->getMethod();

        $callback = $this->routes[$method][$path] ?? null;

        if ($callback === false) {
            http_response_code(404);
            die("404 - Page Not Found");
        }

        // Handle "Controller@method"
        if (is_string($callback)) {
            [$controllerName, $methodName] = explode('@', $callback);
            $controllerName = "App\\Controllers\\" . $controllerName;

            $controller = new $controllerName();
            return $controller->$methodName($request);
        }

        return call_user_func($callback);
    }
}