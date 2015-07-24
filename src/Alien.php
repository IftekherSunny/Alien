<?php

namespace Sun;

use Exception;
use ReflectionMethod;
use ReflectionException;
use DI\ContainerBuilder;
use DI\Definition\Exception\DefinitionException;

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
     * @param $namespace
     *
     * @return mixed
     * @throws BindingException
     * @throws MethodNotFoundException
     * @throws \DI\NotFoundException
     */
    public static function execute($namespace)
    {
        $container = ContainerBuilder::buildDevContainer();

        try {
            $instance = $container->get($namespace);

            $reflectionMethod = new ReflectionMethod($instance, static::$method);

            return $reflectionMethod->invokeArgs($instance, static::$arguments);
        } catch (DefinitionException $e) {
            throw new BindingException("Binding Error.");
        } catch (ReflectionException $e) {
            throw new MethodNotFoundException("Method [ " . static::$method . " ] not found.");
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
     * @return string namespace
     * @throws Exception
     */
    protected static function registerAlien()
    {
        throw new Exception('Alien does not implement registerAlien method.');
    }
}
