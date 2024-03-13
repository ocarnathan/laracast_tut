<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlCheck($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}


function abort($statusCode = 404) //Here 404 is the default parameter. That way the function works without being given a parameter.
{
    http_response_code($statusCode);
    require base_path("views/{$statusCode}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
        // In PHP, the :: operator is called the scope resolution operator, 
        // and it is used to access static members (properties and methods) 
        // of a class, as well as constants defined within a class. This operator 
        // is also used to call a static method or access a static property without 
        // creating an instance of the class.
    }
    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    // Extracts variables from the associative array $attributes, making them available in the current symbol table.
    extract($attributes);

    // Requires and includes the specified view file located in the 'views/' directory.
    require base_path('views/' . $path);
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
}
