<?php

namespace dooaki\ClassAccessor;

use TypeError;

/**
 * Common methods called by Accessor Trait
 *
 * @author  do_aki <do_aki@gmail.com>
 */
trait AccessorCommon
{
    /**
     * get accessing property name
     *
     * @return string
     */
    protected function _getAccessingPropertyName()
    {
        return strtolower(
            preg_replace(
                '/[A-Z]/',
                '_$0',
                lcfirst(preg_replace('/^(get|set)/', '', debug_backtrace(false, 2)[1]['function']))
            )
        );
    }

    /**
     * validator for primitive type
     *
     * @param mixed $value validating value
     * @param string $type expected type
     * @param bool $nullable true if validating value is nullable
     * @param bool $is_call true if call, false if return
     * @throws TypeError
     */
    protected function _validatePrimitiveTypedProperty($value, $type, $nullable, $is_call)
    {
        $validator = "is_{$type}";
        if (!($nullable && $value === null) && !$validator($value)) {
            throw new TypeError(
                sprintf(
                    ($is_call ? '%s::%s must be %s, %s given' : 'Return value of %s::%s must be %s, %s returned'),
                    __CLASS__,
                    debug_backtrace(false, 2)[1]['function'],
                    $type,
                    self::_getType($value)
                )
            );
        }
    }

    /**
     * validator for object type
     *
     * @param mixed $value validating value
     * @param string $type expected type
     * @param bool $nullable true if validating value is nullable
     * @throws TypeError
     */
    protected function _validateObjectTypedProperty($value, $type, $nullable, $is_call)
    {
        if (!($nullable && $value === null) && !is_a($value, $type)) {
            throw new TypeError(
                sprintf(
                    ($is_call ? '%s::%s must be an instance of %s, %s given' : 'Return value of %s::%s must be an instance of %s, %s returned'),
                    __CLASS__,
                    debug_backtrace(false, 2)[1]['function'],
                    $type,
                    self::_getType($value)
                )
            );
        }
    }

    /**
     * return type string
     *
     * @param mixed $value target
     * @return string type
     */
    private function _getType($value)
    {
        if (is_object($value)) {
            return get_class($value);
        }
        return str_replace(['integer', 'double', 'boolean'], ['int', 'float', 'bool'], strtolower(gettype($value)));
    }
}
