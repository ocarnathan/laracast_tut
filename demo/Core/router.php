<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];


    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        //the code commented below can replace the code above. See the built-in compact method.
        // $this->routes[] =  compact('method', 'uri', 'controller');
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require base_path($route['controller']);
            }
        }

        // abort
        $this->abort();
    }

    public function abort($statusCode = 404) //Here 404 is the default parameter. That way the function works without being given a parameter.
    {
        http_response_code($statusCode);
        require base_path("views/{$statusCode}.php");
        die();
    }
}

// $routes = require base_path("routes.php"); //the file 'routes.php simply returns an array(list) of routes.

// function abort($statusCode = 404) //Here 404 is the default parameter. That way the function works without being given a parameter.
// {
//     http_response_code($statusCode);
//     require base_path("views/{$statusCode}.php");
//     die();
// }

// function routeToController($uri, $routes)
// {
//     if (array_key_exists($uri, $routes)) {
//         require base_path($routes[$uri]);
//     } else {
//         abort();
//     }
// }
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// routeToController($uri, $routes);
