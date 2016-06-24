dooaki\ClassAccessor
=============

[![Build Status](https://travis-ci.org/do-aki/class-accessor.svg?branch=master)](https://travis-ci.org/do-aki/class-accessor)
[![Coverage Status](https://coveralls.io/repos/github/do-aki/class-accessor/badge.svg?branch=master)](https://coveralls.io/github/do-aki/class-accessor?branch=master)

Requirements
-------------
* PHP 5.5 or later

Installation
-------------

you can install run the command.

```
composer require dooaki/class-accessor
```

Synopsis
-------------

```php
<?php
use dooaki\ClassAccessor\Accessor;

class Person
{

    private $first_name;
    private $age;

    use Accessor {
        _helperStringOrNullGetter as public getFirstName;
        _helperStringOrNullSetter as public setFirstName;
        _helperIntGetter as public getAge;
        _helperIntSetter as public setAge;
    }

    public function show()
    {
        echo "{$this->first_name} ({$this->age})";
    }
}

$p = new Person();
$p->setFirstName('john');
$p->setAge(23);

var_dump($p->getFirstName()); // string(4) "john"
var_dump($p->getAge()); // int(23)
$p->show(); // john (23)


$p->setFirstName(null); // ok name is nullable
$p->setAge("23"); // TypeError exception!
```

Description
-------------

`\dooaki\ClassAccessor\Accessor` trait generates type constrained getter/setter for your class.

you can use `(get|set)(Int|Float|String|Bool|Array|Callable|Resource)(OrNull)?` method.


make_accessor command
------------

you can create any typed accessor.

### command example
```
vendor/bin/make_accessor -n My\DateAccessor -c DateTimeInterface -c DateInterval -f DateAccessor.php
```

#### options

* __-n__ name of making trait
* __-c__ class or interface for accessor method
* __-f__ output file


### code example (using)
```php
<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/DateAccessor.php';

use My\DateAccessor;
use dooaki\ClassAccessor\Accessor;

class DelayedDateTime {

    /** @var DateTimeInterface  */
    private $date_time;

    /** @var  DateInterval */
    private $delay;

    use Accessor, DateAccessor {
        _helperDateTimeInterfaceObjectGetter as public getDateTime;
        _helperDateTimeInterfaceObjectSetter as public setDateTime;
        _helperDateIntervalObjectOrNullGetter as public getDelay;
        _helperDateIntervalObjectOrNullSetter as public setDelay;
    }

    public function __construct(DateTime $date_time)
    {
        $this->date_time = $date_time;
    }

    public function get()
    {
        $retval = clone $this->date_time;
        if ($this->delay) {
            $retval->sub($this->delay);
        }
        return $retval;
    }
}

$m = new DelayedDateTime(new DateTime());
$m->setDelay(new DateInterval('P1D'));

echo $m->get()->format('Y-m-d H:i:s');
```

Thanks
------------
this module is inspired by [MagicSpice](https://github.com/gree/MagicSpice)


Author
------------
do_aki

License
------------
MIT License
