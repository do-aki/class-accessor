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
    private function _helperIntGetter() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'int', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param int $value
     * @return void
     */
    private function _helperIntSetter($value)
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
    private function _helperIntOrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'int', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param int|null $value
     * @return void
     */
    private function _helperIntOrNullSetter($value)
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
    private function _helperFloatGetter() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'float', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param float $value
     * @return void
     */
    private function _helperFloatSetter($value)
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
    private function _helperFloatOrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'float', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param float|null $value
     * @return void
     */
    private function _helperFloatOrNullSetter($value)
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
    private function _helperStringGetter() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'string', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param string $value
     * @return void
     */
    private function _helperStringSetter($value)
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
    private function _helperStringOrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'string', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param string|null $value
     * @return void
     */
    private function _helperStringOrNullSetter($value)
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
    private function _helperBoolGetter() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'bool', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param bool $value
     * @return void
     */
    private function _helperBoolSetter($value)
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
    private function _helperBoolOrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'bool', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param bool|null $value
     * @return void
     */
    private function _helperBoolOrNullSetter($value)
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
    private function _helperArrayGetter() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'array', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param array $value
     * @return void
     */
    private function _helperArraySetter($value)
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
    private function _helperArrayOrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'array', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param array|null $value
     * @return void
     */
    private function _helperArrayOrNullSetter($value)
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
    private function _helperCallableGetter() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'callable', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param callable $value
     * @return void
     */
    private function _helperCallableSetter($value)
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
    private function _helperCallableOrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'callable', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param callable|null $value
     * @return void
     */
    private function _helperCallableOrNullSetter($value)
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
    private function _helperResourceGetter() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, 'resource', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param resource $value
     * @return void
     */
    private function _helperResourceSetter($value)
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
    private function _helperResourceOrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, 'resource', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
        return $value;
    }

    /**
     * @param resource|null $value
     * @return void
     */
    private function _helperResourceOrNullSetter($value)
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, 'resource');
        $this->$name = $value;
    }

}
