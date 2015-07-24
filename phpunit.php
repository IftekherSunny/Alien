<?php

namespace Sun;

require_once __DIR__ . '/vendor/autoload.php';

class FilesystemDriver
{
    public function name()
    {
        return 'dropbox';
    }
}

class Filesystem
{
    protected $driver;

    public function __construct(FilesystemDriver $driver)
    {
        $this->driver = $driver;
    }
    public function getDriverName()
    {
        return $this->driver->name();
    }
}

class FilesystemAlien extends Alien
{
    /**
     * To register Alien
     *
     * @return string namespace
     */
    protected static function registerAlien()
    {
        return 'Sun\Filesystem';
    }
}

interface FilesystemInterface
{
    public function getDriverName();
}

class FilesystemInterfaceAlien extends Alien
{
    /**
     * To register Alien
     *
     * @return string namespace
     */
    protected static function registerAlien()
    {
        return 'Sun\FilesystemInterface';
    }
}

class Session
{
    public function get()
    {
        return 'Session';
    }
}

class SessionAlien extends Alien
{

}
