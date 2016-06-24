<?php

namespace dooaki\ClassAccessor;

/**
 * accessor utility
 *
 * @author do_aki <do_aki@gmail.com>
 */
class AccessorUtility {

    /**
     * return type string
     *
     * @param mixed $value target
     * @return string type
     */
    public static function getTypeName($value) {
        if (is_object($value)) {
            return get_class($value);
        }
        return str_replace(['integer', 'double', 'boolean'], ['int', 'float', 'bool'], strtolower(gettype($value)));
    }

}
