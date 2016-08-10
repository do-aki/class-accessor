<?php

namespace dooaki\ClassAccessor;

/**
 * like interface used by Accessor Trait
 *
 * @author  do_aki <do_aki@gmail.com>
 */
trait TypeValidatorAbstract
{
    abstract protected function validatePrimitiveType($value, $type, $message_format = '');

    abstract protected function validatePrimitiveTypeOrNull($value, $type, $message_format = '');

    abstract protected function validateObjectType($value, $type, $message_format = '');

    abstract protected function validateObjectTypeOrNull($value, $type, $message_format = '');

    abstract protected function validatePrimitiveTypeOfTraversable(
        $value,
        $type,
        $message_format_arg = '',
        $message_format_value = ''
    );

    abstract protected function validatePrimitiveTypeOrNullOfTraversable(
        $value,
        $type,
        $message_format_arg = '',
        $message_format_value = ''
    );

    abstract protected function validateObjectTypeOfTraversable(
        $value,
        $type,
        $message_format_arg = '',
        $message_format_value = ''
    );

    abstract protected function validateObjectTypeOrNullOfTraversable(
        $value,
        $type,
        $message_format_arg = '',
        $message_format_value = ''
    );
}
