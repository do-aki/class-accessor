<?php

namespace dooaki\Test\ClassAccessor;

use dooaki\ClassAccessor\Accessor;
use dooaki\ClassAccessor\AccessorMaker;
use stdClass;
use TypeError;

class PrimitiveAccessorTest extends \PHPUnit_Framework_TestCase
{
    /** @var  object */
    private $test;

    /**
     * make method name at PrimitiveAccessorTestImpl
     *
     * @param string $method get or set
     * @param string $type
     * @param bool $nullable
     * @return string method name
     */
    private static function _makeMethodName($method, $type, $nullable)
    {
        return $method . ($nullable ? 'Nullable' : '') . ucfirst($type) . 'Var';
    }

    /**
     * make property name at PrimitiveAccessorTestImpl
     *
     * @param string $type
     * @param bool $nullable
     * @return string property name
     */
    private static function _makePropertyName($type, $nullable)
    {
        return ($nullable ? 'nullable_' : '') . $type . '_var';
    }

    /**
     * declare PrimitiveAccessorTestImpl (using accessor trait)
     */
    public static function setUpBeforeClass()
    {
        $props = [];
        $vars = [];
        foreach (AccessorMaker::$PrimitiveTypes as $type) {
            $u_type = ucfirst($type);

            $vars[] = 'public $' . self::_makePropertyName($type, false) . '_var;';
            $props[] = "_helper{$u_type}Getter as public " . self::_makeMethodName('get', $type, false) . ";";
            $props[] = "_helper{$u_type}Setter as public " . self::_makeMethodName('set', $type, false) . ";";


            $vars[] = 'public $' . self::_makePropertyName($type, true) . '_var;';
            $props[] = "_helper{$u_type}OrNullGetter as public " . self::_makeMethodName('get', $type, true) . ";";
            $props[] = "_helper{$u_type}OrNullSetter as public " . self::_makeMethodName('set', $type, true) . ";";
        }

        eval(
            "namespace " . __NAMESPACE__ . ";\n"
            . "use " . Accessor::class . ";\n"
            . "class PrimitiveAccessorTestImpl {\n"
            . "    use Accessor {\n"
            . implode("\n", $props)
            . "\n}\n"
            . implode("\n", $vars)
            . "\n}\n"
        );
    }

    public function setUp()
    {
        /** @noinspection PhpUndefinedClassInspection */
        $this->test = new PrimitiveAccessorTestImpl();
    }

    /**
     * @return array
     */
    public function provideAllData()
    {
        static $resource, $object;
        if ($resource === null) {
            $resource = tmpfile();
        }
        if ($object === null) {
            $object = new \stdClass();
        }

        return [
            'int' => [
                'ok_values' => [5963],
                'ng_values' => [1.0, "0", false, [], $object],
            ],
            'float' => [
                'ok_values' => [3.14],
                'ng_values' => [0, '1.0', false, [], $object],
            ],
            'string' => [
                'ok_values' => ['0'],
                'ng_values' => [0, 1.0, false, [], $object],
            ],
            'bool' => [
                'ok_values' => [true],
                'ng_values' => ["true", 1, 0, [], $object],
            ],
            'array' => [
                'ok_values' => [[], [1]],
                'ng_values' => [false, "array", $object],
            ],
            'callable' => [
                'ok_values' => ['is_int', function(){}],
                'ng_values' => [4649, 'echo', [], $object],
            ],
            'resource' => [
                'ok_values' => [$resource],
                'ng_values' => [0, [], $object],
            ],
        ];
    }

    /**
     * @return \Generator
     */
    public function provideOkValues()
    {
        foreach ($this->provideAllData() as $type => $v) {
            foreach ($v['ok_values'] as $index => $ok_value) {
                yield "{$type}[{$index}]" => [$type, $ok_value];
            }
        }
    }

    /**
     * @return \Generator
     */
    public function provideNgValues()
    {
        foreach ($this->provideAllData() as $type => $v) {
            foreach ($v['ng_values'] as $index => $ng_value) {
                yield "{$type}[{$index}]" => [$type, $ng_value];
            }
        }
    }

    /**
     * @return \Generator
     */
    public function provideAllTypes()
    {
        foreach (array_keys($this->provideAllData()) as $type) {
            yield $type => [$type];
        }
    }

    /**
     * @dataProvider provideOkValues
     * @param string $type
     * @param mixed $ok_value
     */
    public function test_set_and_get($type, $ok_value)
    {
        $getter = self::_makeMethodName('get', $type, false);
        $setter = self::_makeMethodName('set', $type, false);

        $this->test->$setter($ok_value);
        $this->assertSame($ok_value, $this->test->$getter());
    }

    /**
     * @dataProvider provideOkValues
     * @param string $type
     * @param mixed $ok_value
     */
    public function test_set_and_get_as_property($type, $ok_value)
    {
        $setter = self::_makeMethodName('set', $type, false);
        $prop = self::_makePropertyName($type, false);

        $this->test->$setter($ok_value);
        $this->assertSame($ok_value, $this->test->$prop);
    }

    /**
     * @dataProvider provideNgValues
     * @param string $type
     * @param mixed $ng_value
     */
    public function test_throw_exception_if_send_invalid_type($type, $ng_value)
    {
        $this->setExpectedException(TypeError::class);

        $setter = self::_makeMethodName('set', $type, false);
        $this->test->$setter($ng_value);
    }

    /**
     * @dataProvider provideAllTypes
     * @param string $type
     */
    public function test_throw_exception_if_send_object($type)
    {
        $this->setExpectedException(TypeError::class);

        $setter = self::_makeMethodName('set', $type, true);
        $this->test->$setter(new stdClass());
    }

    /**
     * @dataProvider provideAllTypes
     * @param string $type
     */
    public function test_throw_exception_if_send_null($type)
    {
        $this->setExpectedException(TypeError::class);

        $setter = self::_makeMethodName('set', $type, false);
        $this->test->$setter(null);
    }

    /**
     * @dataProvider provideNgValues
     * @param string $type
     * @param mixed $ng_value
     */
    public function test_throw_exception_if_return_invalid_type($type, $ng_value)
    {
        $this->setExpectedException(TypeError::class);

        $getter = self::_makeMethodName('get', $type, false);
        $prop = self::_makePropertyName($type, false);


        $this->test->$prop = $ng_value;
        $this->test->$getter();
    }

    /**
     * @dataProvider provideAllTypes
     * @param string $type
     */
    public function test_settable_null_if_nullable($type)
    {
        $setter = self::_makeMethodName('set', $type, true);
        $getter = self::_makeMethodName('get', $type, true);
        $prop = self::_makePropertyName($type, true);

        $this->test->$setter(null);

        $this->assertNull($this->test->$getter());
        $this->assertNull($this->test->$prop);
    }
}
