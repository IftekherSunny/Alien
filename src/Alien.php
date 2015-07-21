<?php

namespace Sun;

use Exception;
use ReflectionClass;
use ReflectionMethod;
use DI\ContainerBuilder;

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
     * @return mixed
     * @throws Exception
     */
    public function execute($object)
    {
        $class = new ReflectionClass($object);

        $container = ContainerBuilder::buildDevContainer();

        $className = $class->getName();

        if (!$class->hasMethod(static::$method)) {
            throw new Exception("Method [ " . static::$method . " ] not found.");
        }

        try {
            $instance = $container->get($className);

            $reflectionMethod = new ReflectionMethod($className, static::$method);

            return $reflectionMethod->invokeArgs($instance, static::$arguments);
        } 
        catch (DefinitionException $e) {
            throw new BindingException("Binding Error.");
        }
    }

    /**
     * @param $method
     * @param $arguments
     *
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic($method, $arguments)
    {
        static::$method = $method;
        static::$arguments = $arguments;

        return static::execute(static::registerAlien());
    }


    /**
     * To register Alien
     *
     * @return object
     */
    abstract public static function registerAlien();

}
