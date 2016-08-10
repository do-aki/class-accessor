<?php

namespace dooaki\ClassAccessor\Template;

/**
 * Class TemplateImpl
 *
 * @author  do_aki <do_aki@gmail.com>
 */
abstract class TemplateBase implements TemplateInterface
{

    private $type_list;

    public function getLibraryNamespace()
    {
        return preg_replace('/\\\\[^\\\\]+$/', '', __NAMESPACE__);
    }

    public function addType($type)
    {
        $this->type_list[] = $type;
    }

    public function generate($namespace, $trait_name)
    {
        $methods = $this->generateMethods();

        $use_list = $this->getUseList();
        $ns = $this->getLibraryNamespace();
        if ($namespace !== $ns) {
            array_unshift($use_list, $ns . "\\TypeValidatorAbstract");
            array_unshift($use_list, $ns . "\\AccessorUtility");
        }

        $code = "namespace {$namespace};\n\n";

        if ($use_list) {
            foreach ($use_list as $use) {
                $code .= "use {$use};\n";
            }

            $code .= "\n";
        }

        $code .= $this->getClassComment() . "\n";
        $code .= "trait {$trait_name}\n{\n\n";
        $code .= "    use TypeValidatorAbstract;\n\n";
        $code .= $methods;
        $code .= "}\n";
        return $code;
    }

    public function generateMethods()
    {
        $code = '';
        foreach ($this->type_list as $type) {
            $code .= $this->generateCode($type) . "\n\n";
        }

        return $code;
    }

    abstract public function generateCode($type);

    abstract public function getClassComment();

    abstract public function getUseList();
}
