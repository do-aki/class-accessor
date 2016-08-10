<?php

namespace dooaki\ClassAccessor;

/**
 * accessor utility
 *
 * @author do_aki <do_aki@gmail.com>
 */
class AccessorUtility
{

    /** @var string message format for primitive typed setter */
    const PRIMITIVE_SETTER_MESSAGE_FORMAT = 'Argument 1 passed to %s::%s must be %s, %s given';
    /** @var string message format for primitive typed setter */
    const PRIMITIVE_GETTER_MESSAGE_FORMAT = 'Return value of %s::%s must be %s, %s returned';

    /** @var string message format for object typed setter */
    const OBJECT_SETTER_MESSAGE_FORMAT = 'Argument 1 passed to %s::%s must be an instance of %s, %s given';
    /** @var string message format for object typed getter */
    const OBJECT_GETTER_MESSAGE_FORMAT = 'Return value of %s::%s must be an instance of %s, %s returned';

    /** @var string message format for primitive typed setter */
    const TRAVERSABLE_SETTER_MESSAGE_FORMAT = 'Argument 1 passed to %s::%s must be %s[], %s included';

    /** @var string message format for primitive typed setter */
    const TRAVERSABLE_GETTER_MESSAGE_FORMAT = 'Return value of %s::%s must be %s[], %s included';

    /**
     * get accessing property name
     *
     * @return string
     */
    public static function getAccessingPropertyName()
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
     * return type string
     *
     * @param mixed $value target
     * @return string type
     */
    public static function getTypeName($value)
    {
        if (is_object($value)) {
            return get_class($value);
        }
        return str_replace(['integer', 'double', 'boolean'], ['int', 'float', 'bool'], strtolower(gettype($value)));
    }

}
