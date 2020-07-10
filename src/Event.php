<?php

namespace Cvar1984\LiteOtp;

/**
 * Class: Event dispatcher
 *
 * @abstract
 */
abstract class Event {
    /**
     * callables
     *
     * @var mixed
     */
    private static $callables = [];

    /**
     * on
     *
     * @param string $name
     * @param callable $method
     */
    public static function on(string $name, callable $method)
    {
        self::$callables[$name] = $method;
    }

    /**
     * call
     *
     * @param string $name
     * @param mixed $args
     */
    public static function call(string $name, $args = false)
    {
        if(!array_key_exists($name, self::$callables)) {
            throw new \BadMethodCallException($name);
        }
        return call_user_func(self::$callables[$name], $args);
    }
}
