Yii2 Weekly Schedule Selector (In development)
==============================================

A Yii2 plugin that provides the framework with a weekly schedule selector to 
attach to models that need a weekly schedule organization.

This plugin is based on the JQuery plugin day-schedule-selector developed by 
artsy. For more documentation of configurations visit (http://www.jqueryscript.net/time-clock/Create-A-Basic-Weekly-Schedule-with-Hour-Selector-Using-jQuery.html) 
or the official [repository](https://github.com/artsy/day-schedule-selector).

## Installation

To install, either run

```bash
$ php composer.phar require jlorente/yii2-weeklyschedule-selector "*"
```

or add

```json
    "require": {
        "jlorente/yii2-weeklyschedule-selector": "*"
    }
```

to the ```require``` section of your `composer.json` file and run the following 
commands from your project directory.
```bash
$ composer update
$ ./yii migrate --migrationPath=@app/vendor/jlorente/yii2-weeklyschedule-selector/src/migrations
```
The last command will create the table needed to handle the weekly schedule.

## Basic Usage

First at all you must include the module in your web application.

./console/config/main.php
```php
    // ... other configurations ...
    "modules" => [
        // ... other modules ...
        "command" => [
            "class" => "jlorente\weeklyschedule\Module"
        ]
    ]
```

## License 
Copyright &copy; 2015 José Lorente Martín <jose.lorente.martin@gmail.com>.

Licensed under the MIT license. See LICENSE.txt for details.