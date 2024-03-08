<?php
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

function authorize($condition)
{
    if (!$condition) {
        abort(Response::FORBIDDEN);
        // In PHP, the :: operator is called the scope resolution operator, 
        // and it is used to access static members (properties and methods) 
        // of a class, as well as constants defined within a class. This operator 
        // is also used to call a static method or access a static property without 
        // creating an instance of the class.
    }
}
