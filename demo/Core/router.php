<?php

$routes = require base_path("routes.php"); //the file 'routes.php simply returns an array(list) of routes.

function abort($statusCode = 404) //Here 404 is the default parameter. That way the function works without being given a parameter.
{
    http_response_code($statusCode);
    require base_path("views/{$statusCode}.php");
    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri, $routes);
