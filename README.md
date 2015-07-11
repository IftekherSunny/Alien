## Alien

[![Total Downloads](https://poser.pugx.org/sun/alien/downloads)](https://packagist.org/packages/sun/alien)
[![Latest Stable Version](https://poser.pugx.org/sun/alien/v/stable)](https://packagist.org/packages/sun/alien) [![Latest Unstable Version](https://poser.pugx.org/sun/alien/v/unstable)](https://packagist.org/packages/sun/alien) [![License](https://poser.pugx.org/sun/alien/license)](https://packagist.org/packages/sun/alien)

Alien helps you to create alias for your class namespace.

## Installation Process

Just copy Alien folder somewhere into your project directory. Then include Alien autoloader.

```php
 require_once('/path/to/alien/autoload.php');
```

Alien is also available via Composer/Packagist.

```
 composer require sun\alien
```

You need to call Alien load method to initialize everything.

```php
 Sun\AlienLoader::load();
```



## Configuration

If you install Alien manually just open config.php file located at Alien/config.php.

If you install Alien via composer you need to publish Alien configuration file. Run this command in your terminal to publish alien configuration file. 

```
 Php vendor/sun/alien/publish
```

Then, open alien.php file located at config/alien.php.

Added your alias and namespace. Like as..

```php
 return [
     'File' => 'Sun\FilesystemAlien',
     'Mail'	=> 'SunMailer\MailerAlien',
     'View'	=> 'SunMailer\ViewAlien'

 ];
```

## Creating Alien Class

You can create Alien class by extending Alien class. Here an example -

```php
use Sun;

class FilesystemAlien extends Alien
{

    /**
     * To register Alien
     *
     * @return object
     */
    public static function registerAlien()
    {
        return new Filesystem();
    }
}
```

Now you can use any method of your class static way ( without creating object of your class ).

###### Example:

Let, Filesystem class has a method create(). Calling create method of Filesystem class -

```php
$filesystem = new Filesystem;
$filesystem->create();
```

Using Alien Now, you can also call create method by this way -

```php
File::create();
```

## License

This package is licensed under the [MIT License](https://github.com/IftekherSunny/Alien/blob/master/LICENSE)
