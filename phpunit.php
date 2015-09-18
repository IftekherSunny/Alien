<?php

namespace Sun;

require_once __DIR__ . '/vendor/autoload.php';


/**
 * Class FilesystemDriver
 * @package Sun
 */
class FilesystemDriver
{
    public function name()
    {
        return 'dropbox';
    }
}

/**
 * Class Filesystem
 * @package Sun
 */
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

/**
 * Class FilesystemAlien
 * @package Sun
 */
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

/**
 * Interface FilesystemInterface
 * @package Sun
 */
interface FilesystemInterface
{
    public function getDriverName();
}

/**
 * Class FilesystemInterfaceAlien
 * @package Sun
 */
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

/**
 * Class Session
 * @package Sun
 */
class Session
{
    public function get()
    {
        return 'Session';
    }
}

/**
 * Class SessionAlien
 * @package Sun
 */
class SessionAlien extends Alien
{

}

/**
 * Class Helper
 * @package Sun
 */
class Helper
{
    public function profileLinkGenerator($username)
    {
        return "<a href='/profile/{$username}'>{$username}</a>";
    }
}

/**
 * Class HelperAlien
 * @package Sun
 */
class HelperAlien extends Alien
{
    /**
     * To register Alien
     *
     * @return string namespace
     */
    protected static function registerAlien()
    {
        return 'Sun\Helper';
    }
}


/**
 * Register aliases for all alien
 */
class_alias('Sun\FilesystemAlien', 'File');
class_alias('Sun\FilesystemInterfaceAlien', 'FileInterface');
class_alias('Sun\SessionAlien', 'Session');
class_alias('Sun\HelperAlien', 'Helper');


/**
 * Class User
 * @package Sun
 */
class User
{
    public function profileLink($username)
    {
        return \Helper::profileLinkGenerator($username);
    }
}