<?php

class Router
{
    private $routes = [];

    public function addRoute($method, $path, $handler)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function match($method, $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $this->matchPath($route['path'], $uri)) {
                return $route;
            }
        }

        return null;
    }

    private function matchPath($pattern, $uri)
    {
        $pattern = '#^' . str_replace('/', '\/', $pattern) . '$#';
        return preg_match($pattern, $uri);
    }
    public function url($path)
    {
        // Assuming that the application is running at the root level
        return $path;
    }
    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $route = $this->match($method, $uri);

        if ($route) {
            $handler = $route['handler'];
            call_user_func($handler);
        } else {
            http_response_code(404);
            echo '404 - Not Found';
        }
    }
}

?>