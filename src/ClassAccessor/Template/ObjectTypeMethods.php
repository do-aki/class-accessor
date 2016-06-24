<?php

namespace dooaki\ClassAccessor\Template;

/**
 * Class ObjectTypeMethods
 *
 * @author  do_aki <do_aki@gmail.com>
 */
class ObjectTypeMethods extends TemplateBase
{
    private $use_list = [];

    public function generateCode($type)
    {
        $this->use_list[] = $type;

        return str_replace('%TYPE%', preg_replace('#^.+\\\\#', '', $type), implode(
            "\n\n",
            [
                $this->getGetMethodTemplate(),
                $this->getSetMethodTemplate(),
                $this->getGetOrNullMethodTemplate(),
                $this->getSetOrNullMethodTemplate(),
            ]
        ));
    }

    public function getUseList()
    {
        return $this->use_list;
    }

    public function getClassComment()
    {
        return <<<'EOC'
/**
 * Accessor of object typed property
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
    private function get%TYPE%Object()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $value = $this->$name;
        $this->_validateObjectTypedProperty($value, %TYPE%::class, false, false);
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
    private function set%TYPE%Object($value)
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->_validateObjectTypedProperty($value, %TYPE%::class, false, true);
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
    private function get%TYPE%ObjectOrNull()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $value = $this->$name;
        $this->_validateObjectTypedProperty($value, %TYPE%::class, true, false);
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
    private function set%TYPE%ObjectOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->_validateObjectTypedProperty($value, %TYPE%::class, true, true);
        $this->$name = $value;
    }
_TPL;
    }
}
