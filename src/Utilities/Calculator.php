<?php

namespace MuathYe\Utilities;

class Calculator
{
    /*
    |--------------------------------------------------------------------------
    | Example Usage:
    |--------------------------------------------------------------------------
    |
    | The first thing you should now is that magic methods __call() and
    | __callStatic() are slow.
    |
    | $result = \App\Utilities\Calculator::
    | subtract(2)
    | ->subtract(2)
    | ->multiple(2)
    | ->toValue(5)
    | ->add(8)
    | ->add(8)
    | ->result();
    |
    | $result = new \App\Utilities\Calculator();
    | $result = $result->subtract(2)
    | ->subtract(2)
    | ->multiple(2)
    | ->toValue(5)
    | ->add(8)
    | ->add(8)
    | ->result();
    |
    | return $result;
    |
    */

    public static $currentValue;

    private static $instance = null;

    public function __call($method, $args)
    {
        switch ($method) {
            case 'toValue':
                return call_user_func_array(
                    array(get_called_class(), 'toValue'),
                    $args
                );
            case 'add':
                return call_user_func_array(
                    array(get_called_class(), 'add'),
                    $args
                );
            case 'subtract':
                return call_user_func_array(
                    array(get_called_class(), 'subtract'),
                    $args
                );
            case 'multiple':
                return call_user_func_array(
                    array(get_called_class(), 'multiple'),
                    $args
                );
            case 'divide':
                return call_user_func_array(
                    array(get_called_class(), 'divide'),
                    $args
                );
            case 'result':
                return call_user_func_array(
                    array(get_called_class(), 'result'),
                    $args
                );
            break;
        }
    }

    public static function __callStatic($name, $arguments)
    {
        switch ($name) {
            case 'toValue':
                return call_user_func_array(
                    array(get_called_class(), 'toValue'),
                    $arguments
                );
            case 'add':
                return call_user_func_array(
                    array(get_called_class(), 'add'),
                    $arguments
                );
            case 'subtract':
                return call_user_func_array(
                    array(get_called_class(), 'subtract'),
                    $arguments
                );
            case 'multiple':
                return call_user_func_array(
                    array(get_called_class(), 'multiple'),
                    $arguments
                );
            case 'divide':
                return call_user_func_array(
                    array(get_called_class(), 'divide'),
                    $arguments
                );
            case 'result':
                return call_user_func_array(
                    array(get_called_class(), 'result'),
                    $arguments
                );
            break;
        }
    }

    protected static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public static function toValue($value)
    {
        self::$currentValue = $value;
        return self::getInstance();
    }

    public static function add($value)
    {
        self::$currentValue += $value;
        return self::getInstance();
    }

    public static function subtract($value)
    {
        self::$currentValue -= $value;
        return self::getInstance();
    }

    public static function multiple($value)
    {
        self::$currentValue *= $value;
        return self::getInstance();
    }

    public static function divide($value)
    {
        self::$currentValue /= $value;
        return self::getInstance();
    }

    public static function result()
    {
        return self::$currentValue;
    }
}
