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
                    AccessorUtility::getTypeName($value)
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
                    AccessorUtility::getTypeName($value)
                )
            );
        }
    }
}
