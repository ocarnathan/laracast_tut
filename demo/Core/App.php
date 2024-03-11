<?php

namespace Core;
// implementation of the Singleton design pattern in PHP
class App
{
    // The class has a static property ($container) that holds the single 
    // instance of the class. Since it is static, it belongs to the class 
    // itself, not to an instance of the class. This property will store the 
    // reference to the single instance of the App class.
    protected static $container;
    //static functions can  be called without instantiating a new object.
    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}
