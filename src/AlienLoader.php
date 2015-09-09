<?php

namespace Sun;

class AlienLoader
{
    /**
     * Store alien configuration
     *
     * @var array
     */
    protected $alien;

    /**
     * Create a new alien instance
     */
    public function __construct()
    {
        if (file_exists(__DIR__ . '/../../../../config/alien.php') && function_exists('config')) {
            $this->alien = config('alien');
        } elseif(file_exists(__DIR__ . '/../../../../config/alien.php')) {
            $this->alien = require_once __DIR__ . '/../../../../config/alien.php';
        } else {
            $this->alien = require_once __DIR__ . '/../config.php';
        }

    }

    /**
     * Generate aliases for all registered alien
     */
    public function generateAlien()
    {
        foreach ($this->alien as $alias => $namespace) {
            class_alias($namespace, $alias);
        }
    }

    /**
     * To load alien
     */
    public static function load()
    {
        (new AlienLoader())->generateAlien();
    }
}