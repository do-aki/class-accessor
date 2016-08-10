<?php

namespace dooaki\ClassAccessor;

use TypeError;

/**
 * Common methods called by Accessor Trait
 *
 * @author  do_aki <do_aki@gmail.com>
 */
trait TypeValidator
{
    use TypeValidatorAbstract;

    /**
     * validator for primitive type
     *
     * @param mixed $value validating value
     * @param string $type expected type
     * @param string $message_format exception message format
     * @throws TypeError
     */
    protected function validatePrimitiveType(
        $value,
        $type,
        $message_format = AccessorUtility::PRIMITIVE_SETTER_MESSAGE_FORMAT
    ) {
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
    protected function validatePrimitiveTypeOrNull(
        $value,
        $type,
        $message_format = AccessorUtility::PRIMITIVE_SETTER_MESSAGE_FORMAT
    ) {
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
    protected function validateObjectType(
        $value,
        $type,
        $message_format = AccessorUtility::OBJECT_SETTER_MESSAGE_FORMAT
    ) {
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
     * @param string $message_format exception message format
     * @throws TypeError
     */
    protected function validateObjectTypeOrNull(
        $value,
        $type,
        $message_format = AccessorUtility::OBJECT_SETTER_MESSAGE_FORMAT
    ) {
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

    protected function validatePrimitiveTypeOfTraversable(
        $value,
        $type,
        $message_format_arg = AccessorUtility::PRIMITIVE_SETTER_MESSAGE_FORMAT,
        $message_format_value = AccessorUtility::TRAVERSABLE_SETTER_MESSAGE_FORMAT
    ) {
        if (!is_array($value) && !$value instanceof \Traversable) {
            throw new TypeError(
                sprintf(
                    $message_format_arg,
                    __CLASS__,
                    debug_backtrace(false, 2)[1]['function'],
                    'array or an instance of Traversable',
                    AccessorUtility::getTypeName($value)
                )
            );
        }

        $validator = "is_{$type}";
        foreach ($value as $v) {
            if (!$validator($v)) {
                throw new TypeError(
                    sprintf(
                        $message_format_value,
                        __CLASS__,
                        debug_backtrace(false, 2)[1]['function'],
                        $type,
                        AccessorUtility::getTypeName($v)
                    )
                );
            }
        }
    }

    protected function validatePrimitiveTypeOrNullOfTraversable(
        $value,
        $type,
        $message_format_arg = AccessorUtility::PRIMITIVE_SETTER_MESSAGE_FORMAT,
        $message_format_value = AccessorUtility::TRAVERSABLE_SETTER_MESSAGE_FORMAT
    ) {
        if (!is_array($value) && !$value instanceof \Traversable) {
            throw new TypeError(
                sprintf(
                    $message_format_arg,
                    __CLASS__,
                    debug_backtrace(false, 2)[1]['function'],
                    'array or an instance of Traversable',
                    AccessorUtility::getTypeName($value)
                )
            );
        }

        $validator = "is_{$type}";
        foreach ($value as $v) {
            if ($v !== null && !$validator($v)) {
                throw new TypeError(
                    sprintf(
                        $message_format_value,
                        __CLASS__,
                        debug_backtrace(false, 2)[1]['function'],
                        $type,
                        AccessorUtility::getTypeName($v)
                    )
                );
            }
        }
    }

    protected function validateObjectTypeOfTraversable(
        $value,
        $type,
        $message_format_arg = AccessorUtility::PRIMITIVE_SETTER_MESSAGE_FORMAT,
        $message_format_value = AccessorUtility::TRAVERSABLE_SETTER_MESSAGE_FORMAT
    ) {
        if (!is_array($value) && !$value instanceof \Traversable) {
            throw new TypeError(
                sprintf(
                    $message_format_arg,
                    __CLASS__,
                    debug_backtrace(false, 2)[1]['function'],
                    'array or an instance of Traversable',
                    AccessorUtility::getTypeName($value)
                )
            );
        }

        foreach ($value as $v) {
            if ($v !== null && !is_a($v, $type)) {
                throw new TypeError(
                    sprintf(
                        $message_format_value,
                        __CLASS__,
                        debug_backtrace(false, 2)[1]['function'],
                        $type,
                        AccessorUtility::getTypeName($v)
                    )
                );
            }
        }
    }

    protected function validateObjectTypeOrNullOfTraversable(
        $value,
        $type,
        $message_format_arg = AccessorUtility::PRIMITIVE_SETTER_MESSAGE_FORMAT,
        $message_format_value = AccessorUtility::TRAVERSABLE_SETTER_MESSAGE_FORMAT

    ) {
        if (!is_array($value) && !$value instanceof \Traversable) {
            throw new TypeError(
                sprintf(
                    $message_format_arg,
                    __CLASS__,
                    debug_backtrace(false, 2)[1]['function'],
                    'array or an instance of Traversable',
                    AccessorUtility::getTypeName($value)
                )
            );
        }

        foreach ($value as $v) {
            if ($v !== null && !is_a($v, $type)) {
                throw new TypeError(
                    sprintf(
                        $message_format_value,
                        __CLASS__,
                        debug_backtrace(false, 2)[1]['function'],
                        $type,
                        AccessorUtility::getTypeName($v)
                    )
                );
            }
        }
    }

}
