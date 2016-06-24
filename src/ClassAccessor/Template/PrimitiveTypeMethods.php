<?php

namespace dooaki\ClassAccessor\Template;

/**
 * Class PrimitiveTypeMethods
 *
 * @author  do_aki <do_aki@gmail.com>
 */
class PrimitiveTypeMethods extends TemplateBase
{
    public function generateCode($type)
    {
        $tpl = implode(
            "\n\n",
            [
                $this->getGetMethodTemplate(),
                $this->getSetMethodTemplate(),
                $this->getGetOrNullMethodTemplate(),
                $this->getSetOrNullMethodTemplate(),
            ]
        );
        return str_replace('%TYPE_U%', ucfirst($type), str_replace('%TYPE%', $type, $tpl));
    }

    public function getUseList()
    {
        return [];
    }

    public function getClassComment()
    {
        return <<<'EOC'
/**
 * Accessor of primitive typed property
 *
 * (auto generated code)
 */
EOC;
    }

    protected function getGetMethodTemplate()
    {
        return <<< '_TPL'
    /**
     * @return %TYPE%
     */
    private function get%TYPE_U%() 
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveType($value, '%TYPE%', 'Return value of %s::%s must be %s, %s returned');
        return $value;
    }
_TPL;
    }

    protected function getSetMethodTemplate()
    {
        return <<< '_TPL'
    /**
     * @param %TYPE% $value
     * @return void
     */
    private function set%TYPE_U%($value)
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveType($value, '%TYPE%');
        $this->$name = $value;
    }
_TPL;
    }

    protected function getGetOrNullMethodTemplate()
    {
        return <<< '_TPL'
    /**
     * @return %TYPE%|null
     */
    private function get%TYPE_U%OrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }
        
        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, '%TYPE%', 'Return value of %s::%s must be %s, %s returned');
        return $value;
    }
_TPL;

    }

    protected function getSetOrNullMethodTemplate()
    {
        return <<< '_TPL'
    /**
     * @param %TYPE%|null $value
     * @return void
     */
    private function set%TYPE_U%OrNull($value)
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validatePrimitiveTypeOrNull($value, '%TYPE%');
        $this->$name = $value;
    }
_TPL;
    }
}
