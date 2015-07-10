# Alien #

[![Total Downloads](https://poser.pugx.org/sun/alien/downloads)](https://packagist.org/packages/sun/alien)
[![Latest Stable Version](https://poser.pugx.org/sun/alien/v/stable)](https://packagist.org/packages/sun/alien) [![Latest Unstable Version](https://poser.pugx.org/sun/alien/v/unstable)](https://packagist.org/packages/sun/alien) [![License](https://poser.pugx.org/sun/alien/license)](https://packagist.org/packages/sun/alien)

Alien helps you to create alias for your class namespace.

### Installation Process ###

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
 Sun\Alien::load();
```



### Configuration ###

If you install Alien manually just open config.php file located at Alien/config.php.

If you install Alien via composer you need to publish Alien configuration file. Run this command in your terminal to publish alien configuration file. 

```
 Php vendor/sun/alien/publish
```

Then, open alien.php file located at config/alien.php.

Added your alias and namespace. Like as..

```php
 return [

     'Mail'	=> 'SunMailer\Mailer',
     'View'	=> 'SunMailer\View'

 ];
```

### License ###

This package is licensed under the [MIT License](https://github.com/IftekherSunny/Alien/blob/master/LICENSE)
