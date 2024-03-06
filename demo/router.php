<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

function abort($statusCode = 404) //Here 404 is the default parameter. That way the function works without being given a parameter.
{
    http_response_code($statusCode);
    require "views/{$statusCode}.php";
    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

routeToController($uri, $routes);
