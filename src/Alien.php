<?php

namespace Sun;

use Exception;
use ReflectionClass;
use ReflectionMethod;

abstract class Alien
{
    /**
     * @var string $method method name
     */
    protected static $method;

    /**
     * @var array $arguments method arguments
     */
    protected static $arguments;


    /**
     * To execute method
     *
     * @param $object
     *
     * @throws Exception
     */
    public static function execute($object)
    {
        $class = new ReflectionClass($object);

        $className = $class->getName();

        if(! $class->hasMethod(static::$method)) {
            throw new Exception("Method [ ". static::$method. " ] not found.");
        }

        $reflectionMethod = new ReflectionMethod($className, static::$method);
        $reflectionMethod->invokeArgs($object, static::$arguments);
    }

    /**
     * @param $method
     * @param $arguments
     *
     * @throws Exception
     */
    public static function __callStatic($method, $arguments)
    {
        static::$method = $method;
        static::$arguments = $arguments;

        static::execute(static::registerAlien());
    }

    /**
     * To register Alien
     *
     * @return object
     */
    public abstract static function registerAlien ();

}
