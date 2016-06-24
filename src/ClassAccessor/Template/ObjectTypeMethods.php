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
    private function _helper%TYPE%ObjectGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $value = $this->$name;
        $this->validateObjectType($value, %TYPE%::class, 'Return value of %s::%s must be an instance of %s, %s returned');
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
    private function _helper%TYPE%ObjectSetter($value)
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validateObjectType($value, %TYPE%::class);
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
    private function _helper%TYPE%ObjectOrNullGetter()
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $value = $this->$name;
        $this->validateObjectTypeOrNull($value, %TYPE%::class, 'Return value of %s::%s must be an instance of %s, %s returned');
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
    private function _helper%TYPE%ObjectOrNullSetter($value)
    {
        static $name;
        if (!$name) {
            $name = AccessorUtility::getAccessingPropertyName();
        }

        $this->validateObjectTypeOrNull($value, %TYPE%::class);
        $this->$name = $value;
    }
_TPL;
    }
}
