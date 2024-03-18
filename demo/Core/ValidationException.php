<?php

namespace Core;
/* Since ValidationException extends Exception, it 
inherits behavior from the Exception class, thus making the
Exception class the parent class and the ValidationException class the child class.
*/

class ValidationException extends \Exception
{
    public readonly array $errors;
    public readonly array $old;

    public static function throw($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }
}
