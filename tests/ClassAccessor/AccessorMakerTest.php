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
        $this->assertTrue($accessor->hasMethod('_helperIntGetter'));
        $this->assertTrue($accessor->hasMethod('_helperIntOrNullGetter'));
        $this->assertTrue($accessor->hasMethod('_helperIntSetter'));
        $this->assertTrue($accessor->hasMethod('_helperIntOrNullSetter'));
    }

    public function testObjectAccessor()
    {
        $m = $this->createObjectAccessorMaker();
        eval($m->makeAccessor(__NAMESPACE__, 'OpDateAccessorImpl', [\DatePeriod::class, \DateInterval::class]));

        $accessor = new \ReflectionClass(__NAMESPACE__ . '\\OpDateAccessorImpl');
        $this->assertTrue($accessor->isTrait());

        $this->assertTrue($accessor->hasMethod('_helperDatePeriodObjectGetter'));
        $this->assertTrue($accessor->hasMethod('_helperDatePeriodObjectOrNullGetter'));
        $this->assertTrue($accessor->hasMethod('_helperDatePeriodObjectSetter'));
        $this->assertTrue($accessor->hasMethod('_helperDatePeriodObjectOrNullSetter'));

        $this->assertTrue($accessor->hasMethod('_helperDateIntervalObjectGetter'));
        $this->assertTrue($accessor->hasMethod('_helperDateIntervalObjectOrNullGetter'));
        $this->assertTrue($accessor->hasMethod('_helperDateIntervalObjectSetter'));
        $this->assertTrue($accessor->hasMethod('_helperDateIntervalObjectOrNullSetter'));
    }
}
