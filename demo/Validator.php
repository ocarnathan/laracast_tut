<?php

//This method is an example of a pure function., A pure function is a function 
// that is not contingent or dependant upon state or values from the outside world. 
// When a class only contains pure functions it it ideal to use the static keyword. 
// This allows the method/function to be called without instantiating an instance of the class.
class Validator
{
    //Validator::string
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        //validate email
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
