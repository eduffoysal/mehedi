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
    public function url($path, $params = [])
    {
        // Determine the base path dynamically
        $basePath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
        
        $url = $basePath . $path;
    
        // Get the existing query parameters
        $currentParams = $_GET;
    
        // Merge the existing and new query parameters
        $allParams = array_merge($currentParams, $params);
    
        if (!empty($allParams)) {
            // Determine if the URL already contains a query string
            $url .= (strpos($url, '?') === false) ? '?' : '&';
    
            $url .= http_build_query($allParams);
        }
    
        return $url;
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
        // echo $route;
    }
}

?>