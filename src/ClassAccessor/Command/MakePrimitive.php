<?php

namespace dooaki\ClassAccessor\Command;

use dooaki\ClassAccessor\AccessorMaker;
use dooaki\ClassAccessor\Template\PrimitiveTypeMethods;

/**
 * composer make_primitive
 *
 * @author  do_aki <do_aki@gmail.com>
 */
class MakePrimitive
{
    public static function run()
    {
        file_put_contents(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'PrimitiveAccessor.php',
            "<?php\n" . (new AccessorMaker(new PrimitiveTypeMethods()))->makeAccessor(
                'dooaki\\ClassAccessor',
                'PrimitiveAccessor',
                AccessorMaker::$PrimitiveTypes
            )
        );
    }
}
