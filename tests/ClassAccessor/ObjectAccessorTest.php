<?php

namespace dooaki\Test\ClassAccessor;

use DateTimeInterface;
use DateTime;
use DateTimeImmutable;
use dooaki\ClassAccessor\AccessorCommon;
use stdClass;
use TypeError;

/**
 * Class ObjectAccessorTest
 *
 * @package Mdk\Test\ClassHelper\SimpleAccessor
 */
class ObjectAccessorTest extends \PHPUnit_Framework_TestCase
{

    /** @var object instance of PrimitiveAccessorTestImpl */
    private $test;

    /**
     * declare DateTimeAccessor (object accessor trait)
     * and PrimitiveAccessorTestImpl (using accessor trait)
     */
    public static function setUpBeforeClass()
    {
        // declare DateTimeAccessor
        eval (
        AccessorMakerTest::createObjectAccessorMaker()->makeAccessor(
            __NAMESPACE__,
            'DateTimeAccessor',
            [DateTimeInterface::class, DateTime::class]
        )
        );

        // declare ObjectAccessorTestImpl
        eval(
            "namespace " . __NAMESPACE__ . ";\n"
            . "use " . AccessorCommon::class . ";\n"
            . <<<'_CODE'
        class ObjectAccessorTestImpl {
            
            use AccessorCommon, DateTimeAccessor {
                getDateTimeObject as public getDateTime;
                setDateTimeObject as public setDateTime;
                getDateTimeInterfaceObjectOrNull as public getNullable;
                setDateTimeInterfaceObjectOrNull as public setNullable;
            }

            public $date_time;
            public $nullable;
        }
_CODE
        );
    }

    public function setUp()
    {
        /** @noinspection PhpUndefinedClassInspection */
        $this->test = new ObjectAccessorTestImpl();
    }

    public function test_set_and_get()
    {
        $setting_value = new DateTime();

        $this->test->setDateTime($setting_value);
        $this->assertSame($setting_value, $this->test->getDateTime());
    }

    public function test_throw_exception_if_send_null()
    {
        $this->setExpectedException(
            TypeError::class,
            __NAMESPACE__ . '\\ObjectAccessorTestImpl::setDateTime must be an instance of DateTime, null given'
        );

        $this->test->setDateTime(null);
    }

    public function test_throw_exception_if_send_invalid_type()
    {
        $this->setExpectedException(
            TypeError::class,
            __NAMESPACE__ . '\\ObjectAccessorTestImpl::setDateTime must be an instance of DateTime, stdClass given'
        );

        $this->test->setDateTime(new stdClass);
    }

    public function test_throw_exception_if_return_invalid_type()
    {
        $this->setExpectedException(
            TypeError::class,
            'Return value of ' . __NAMESPACE__ . '\\ObjectAccessorTestImpl::getDateTime must be an instance of DateTime, stdClass returned'
        );

        $this->test->date_time = new stdClass;
        $this->test->getDateTime();
    }

    public function test_settable_null()
    {
        $this->test->nullable = new DateTime();
        $this->test->setNullable(null);
        $this->assertNull($this->test->getNullable());
    }

    public function test_settable_subclass()
    {
        $setting_value = new DateTimeImmutable();

        $this->test->setNullable($setting_value);
        $this->assertSame($setting_value, $this->test->getNullable());
    }
}
