<?php

namespace dooaki\ClassAccessor\Template;

/**
 * Interface TemplateInterface
 * 
 * @author  do_aki <do_aki@gmail.com>
 */
interface TemplateInterface {
    public function addType($type);
    public function generate($namespace, $trait_name);
}