<?php

namespace dooaki\Test\ClassAccessor;

use dooaki\ClassAccessor\AccessorMaker;
use dooaki\ClassAccessor\Template\ObjectTypeMethods;
use dooaki\ClassAccessor\Template\PrimitiveTypeMethods;

class AccessorMakerTest extends \PHPUnit_Framework_TestCase
{
    public static function createPrimitiveAccessorMaker()
    {
        return new AccessorMaker(new PrimitiveTypeMethods());
    }

    public static function createObjectAccessorMaker()
    {
        return new AccessorMaker(new ObjectTypeMethods());
    }

    public function testPrimitiveAccessor()
    {
        $m = $this->createPrimitiveAccessorMaker();
        eval ($m->makeAccessor(__NAMESPACE__, 'PrimitiveAccessorImpl', AccessorMaker::$PrimitiveTypes));

        $accessor = new \ReflectionClass(__NAMESPACE__ . '\\PrimitiveAccessorImpl');
        $this->assertTrue($accessor->hasMethod('getInt'));
        $this->assertTrue($accessor->hasMethod('getIntOrNull'));
        $this->assertTrue($accessor->hasMethod('setInt'));
        $this->assertTrue($accessor->hasMethod('setIntOrNull'));
    }

    public function testObjectAccessor()
    {
        $m = $this->createObjectAccessorMaker();
        eval($m->makeAccessor(__NAMESPACE__, 'OpDateAccessorImpl', [\DatePeriod::class, \DateInterval::class]));

        $accessor = new \ReflectionClass(__NAMESPACE__ . '\\OpDateAccessorImpl');
        $this->assertTrue($accessor->isTrait());

        $this->assertTrue($accessor->hasMethod('getDatePeriodObject'));
        $this->assertTrue($accessor->hasMethod('getDatePeriodObjectOrNull'));
        $this->assertTrue($accessor->hasMethod('setDatePeriodObject'));
        $this->assertTrue($accessor->hasMethod('setDatePeriodObjectOrNull'));

        $this->assertTrue($accessor->hasMethod('getDateIntervalObject'));
        $this->assertTrue($accessor->hasMethod('getDateIntervalObjectOrNull'));
        $this->assertTrue($accessor->hasMethod('setDateIntervalObject'));
        $this->assertTrue($accessor->hasMethod('setDateIntervalObjectOrNull'));
    }
}
