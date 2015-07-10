# Alien #

This package helps you to create alias for your class namespace.

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
 Php vendor/alien/publish
```

Then, open alien.php file located at config/alien.php.

Added your alias and namespace. Like as..

```php
 return [

     'Mail' => 'Sun\Mailer'

 ];
```

### License ###

This package is licensed under the [MIT License](https://bitbucket.org/IftekherSunny/alien/src/ab9fedcdc4d33d00d0cb0979e59c79b379d92c48/LICENSE)