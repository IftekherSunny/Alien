<?php

namespace Sun;

class AlienLoader
{
    /**
     * @var $alien config.php
     */
    protected $alien;

    public function __construct()
    {
        if (file_exists(__DIR__ . '/../../../../config/alien.php')) {
            $this->alien = require_once __DIR__ . '/../../../../config/alien.php';
        } else {
            $this->alien = require_once __DIR__ . '/../config.php';
        }

    }

    public function generateAlien()
    {
        foreach ($this->alien as $alias => $namespace) {
            class_alias($namespace, $alias);
        }
    }

    public static function load()
    {
        (new AlienLoader())->generateAlien();
    }
}