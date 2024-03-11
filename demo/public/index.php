<?php

const BASE_PATH = __DIR__ . '/../';

// var_dump(BASE_PATH);

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    // dd($result);
    require base_path("{$class}.php");
});

require base_path("bootstrap.php");

$router = new \Core\Router();

$routes = require base_path("routes.php"); //the file 'routes.php simply returns an array(list) of routes.

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
