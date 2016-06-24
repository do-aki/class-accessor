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
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'int', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveType($value, 'int');
        $this->$name = $value;
    }

    /**
     * @return int|null
     */
    private function getIntOrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'int', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, 'int');
        $this->$name = $value;
    }

    /**
     * @return float
     */
    private function getFloat() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'float', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveType($value, 'float');
        $this->$name = $value;
    }

    /**
     * @return float|null
     */
    private function getFloatOrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'float', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, 'float');
        $this->$name = $value;
    }

    /**
     * @return string
     */
    private function getString() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'string', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveType($value, 'string');
        $this->$name = $value;
    }

    /**
     * @return string|null
     */
    private function getStringOrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'string', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, 'string');
        $this->$name = $value;
    }

    /**
     * @return bool
     */
    private function getBool() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'bool', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveType($value, 'bool');
        $this->$name = $value;
    }

    /**
     * @return bool|null
     */
    private function getBoolOrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'bool', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, 'bool');
        $this->$name = $value;
    }

    /**
     * @return array
     */
    private function getArray() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'array', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveType($value, 'array');
        $this->$name = $value;
    }

    /**
     * @return array|null
     */
    private function getArrayOrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'array', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, 'array');
        $this->$name = $value;
    }

    /**
     * @return callable
     */
    private function getCallable() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'callable', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveType($value, 'callable');
        $this->$name = $value;
    }

    /**
     * @return callable|null
     */
    private function getCallableOrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'callable', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, 'callable');
        $this->$name = $value;
    }

    /**
     * @return resource
     */
    private function getResource() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'resource', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveType($value, 'resource');
        $this->$name = $value;
    }

    /**
     * @return resource|null
     */
    private function getResourceOrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'resource', 'Return value of %s::%s must be %s, %s returned');
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
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, 'resource');
        $this->$name = $value;
    }

}
