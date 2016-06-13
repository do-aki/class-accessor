<?php

namespace dooaki\ClassAccessor;

use dooaki\ClassAccessor\Template\TemplateInterface;

/**
 * Accessor Trait Maker
 *
 * @author  do_aki <do.hiroaki@gmail.com>
 */
class AccessorMaker
{
    /**
     * @var string[] list of primitive type (validatable by is_xxx function)
     */
    public static $PrimitiveTypes = [
        'int',
        'float',
        'string',
        'bool',
        'array',
        'callable',
        'resource',
    ];

    private $template;

    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    public function makeAccessor($namespace, $trait_name, array $type_list)
    {
        $tpl = $this->template;
        foreach ($type_list as $type) {
            $tpl->addType($type);
        }
        return $tpl->generate($namespace, $trait_name);

    }
}
