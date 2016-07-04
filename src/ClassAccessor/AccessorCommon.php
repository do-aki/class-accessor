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
     * @param string $message_format exception message format
     * @throws TypeError
     */
    protected function validatePrimitiveType($value, $type, $message_format = 'Argument 1 passed to %s::%s must be %s, %s given')
    {
        $validator = "is_{$type}";
        if (!$validator($value)) {
            throw new TypeError(
                sprintf(
                    $message_format,
                    __CLASS__,
                    debug_backtrace(false, 2)[1]['function'],
                    $type,
                    AccessorUtility::getTypeName($value)
                )
            );
        }

    }

    /**
     * validator for primitive type
     *
     * @param mixed $value validating value
     * @param string $type expected type
     * @param string $message_format exception message format
     * @throws TypeError
     */
    protected function validatePrimitiveTypeOrNull($value, $type, $message_format = 'Argument 1 passed to %s::%s must be %s, %s given')
    {
        $validator = "is_{$type}";
        if ($value !== null && !$validator($value)) {
            throw new TypeError(
                sprintf(
                    $message_format,
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
     * @param string $message_format exception message format
     * @throws TypeError
     */
    protected function validateObjectType($value, $type, $message_format = '%s::%s must be an instance of %s, %s given')
    {
        if (!is_a($value, $type)) {
            throw new TypeError(
                sprintf(
                    $message_format,
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
     * @throws TypeError
     */
    protected function validateObjectTypeOrNull($value, $type, $message_format = '%s::%s must be an instance of %s, %s given')
    {
        if ($value !== null && !is_a($value, $type)) {
            throw new TypeError(
                sprintf(
                    $message_format,
                    __CLASS__,
                    debug_backtrace(false, 2)[1]['function'],
                    $type,
                    AccessorUtility::getTypeName($value)
                )
            );
        }
    }

}
