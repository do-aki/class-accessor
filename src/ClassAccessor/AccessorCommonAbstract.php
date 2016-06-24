<?php

namespace dooaki\ClassAccessor;

/**
 * like interface used by Accessor Trait
 *
 * @author  do_aki <do_aki@gmail.com>
 */
trait AccessorCommonAbstract
{
    abstract protected function _validatePrimitiveTypedProperty($value, $type, $nullable, $is_call);

    abstract protected function _validateObjectTypedProperty($value, $type, $nullable, $is_call);
}
