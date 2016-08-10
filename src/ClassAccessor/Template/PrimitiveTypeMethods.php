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
    private function _helper%TYPE_U%Getter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $value = $this->$name;
        $this->validatePrimitiveType($value, '%TYPE%', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
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
    private function _helper%TYPE_U%Setter($value)
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
    private function _helper%TYPE_U%OrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $value = $this->$name;
        $this->validatePrimitiveTypeOrNull($value, '%TYPE%', AccessorUtility::PRIMITIVE_GETTER_MESSAGE_FORMAT);
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
    private function _helper%TYPE_U%OrNullSetter($value)
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
