<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

//NOTE about classes. If you would like a method to be applied to the instance then you must use the $this keyword.
class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid password.';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password.';
        }
    }

    public static function validate($attributes)
    {
        //an instance of the login form class takes in the atrributes
        $instance = new static($attributes);
        // if instance->failed, return instance->throw, otherwise return the instance.
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }


    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
