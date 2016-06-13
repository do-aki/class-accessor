<?php
namespace dooaki\ClassAccessor;

/**
 * Accessor of primitive typed property
 *
 * (auto generated code)
 */
trait PrimitiveAccessor {

    use AccessorCommonAbstract;

    /**
     * @return int
     */
    private function getInt() 
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'int', false, false);
        return $value;
    }

    /**
     * @param int $value
     * @return void
     */
    private function setInt($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'int', false, true);
        $this->$name = $value;
    }

    /**
     * @return int|null
     */
    private function getIntOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'int', true, false);
        return $value;
    }

    /**
     * @param int|null $value
     * @return void
     */
    private function setIntOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'int', true, true);
        $this->$name = $value;
    }

    /**
     * @return float
     */
    private function getFloat() 
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'float', false, false);
        return $value;
    }

    /**
     * @param float $value
     * @return void
     */
    private function setFloat($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'float', false, true);
        $this->$name = $value;
    }

    /**
     * @return float|null
     */
    private function getFloatOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'float', true, false);
        return $value;
    }

    /**
     * @param float|null $value
     * @return void
     */
    private function setFloatOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'float', true, true);
        $this->$name = $value;
    }

    /**
     * @return string
     */
    private function getString() 
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'string', false, false);
        return $value;
    }

    /**
     * @param string $value
     * @return void
     */
    private function setString($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'string', false, true);
        $this->$name = $value;
    }

    /**
     * @return string|null
     */
    private function getStringOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'string', true, false);
        return $value;
    }

    /**
     * @param string|null $value
     * @return void
     */
    private function setStringOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'string', true, true);
        $this->$name = $value;
    }

    /**
     * @return bool
     */
    private function getBool() 
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'bool', false, false);
        return $value;
    }

    /**
     * @param bool $value
     * @return void
     */
    private function setBool($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'bool', false, true);
        $this->$name = $value;
    }

    /**
     * @return bool|null
     */
    private function getBoolOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'bool', true, false);
        return $value;
    }

    /**
     * @param bool|null $value
     * @return void
     */
    private function setBoolOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'bool', true, true);
        $this->$name = $value;
    }

    /**
     * @return array
     */
    private function getArray() 
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'array', false, false);
        return $value;
    }

    /**
     * @param array $value
     * @return void
     */
    private function setArray($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'array', false, true);
        $this->$name = $value;
    }

    /**
     * @return array|null
     */
    private function getArrayOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'array', true, false);
        return $value;
    }

    /**
     * @param array|null $value
     * @return void
     */
    private function setArrayOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'array', true, true);
        $this->$name = $value;
    }

    /**
     * @return callable
     */
    private function getCallable() 
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'callable', false, false);
        return $value;
    }

    /**
     * @param callable $value
     * @return void
     */
    private function setCallable($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'callable', false, true);
        $this->$name = $value;
    }

    /**
     * @return callable|null
     */
    private function getCallableOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'callable', true, false);
        return $value;
    }

    /**
     * @param callable|null $value
     * @return void
     */
    private function setCallableOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'callable', true, true);
        $this->$name = $value;
    }

    /**
     * @return resource
     */
    private function getResource() 
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'resource', false, false);
        return $value;
    }

    /**
     * @param resource $value
     * @return void
     */
    private function setResource($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'resource', false, true);
        $this->$name = $value;
    }

    /**
     * @return resource|null
     */
    private function getResourceOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->_validatePrimitiveTypedProperty($value, 'resource', true, false);
        return $value;
    }

    /**
     * @param resource|null $value
     * @return void
     */
    private function setResourceOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->_getAccessingPropertyName();
        }

        $this->_validatePrimitiveTypedProperty($value, 'resource', true, true);
        $this->$name = $value;
    }

}
