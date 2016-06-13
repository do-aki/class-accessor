<?php

namespace dooaki\ClassAccessor\Command;

use dooaki\ClassAccessor\AccessorMaker;
use dooaki\ClassAccessor\Template\ObjectTypeMethods;

/**
 * make_accessor command
 *
 * @author  do_aki <do_aki@gmail.com>
 */
class MakeAccessor
{
    const NAMESPACE_SEPARATOR = '\\';

    private $trait_namespace;
    private $trait_basename;
    private $class_list;
    private $output_file;

    public function __construct($trait, $class, $file)
    {
        $this->setTraitName($trait);
        $this->setClassList(is_array($class) ? $class : array($class));
        $this->setOutputFile($file);
    }

    public function setTraitName($name)
    {
        $n = trim($name, self::NAMESPACE_SEPARATOR);
        $pos = strrpos($n, self::NAMESPACE_SEPARATOR);
        if ($pos === false) {
            throw new \InvalidArgumentException("needs namespace in TraitName");
        }
        $this->trait_namespace = substr($n, 0, $pos);
        $this->trait_basename = substr($n, $pos + 1);
    }

    public function setClassList(array $class_list)
    {
        foreach ($class_list as $cls) {
            if (!class_exists($cls) && !interface_exists($cls) ) {
                throw new \InvalidArgumentException("class '{$cls}' is not exists");
            }
        }
        $this->class_list = $class_list;
    }

    public function setOutputFile($file)
    {
        $this->output_file = $file;
    }

    public function make()
    {
        if (!$this->trait_namespace || !$this->trait_basename || !$this->class_list || !$this->output_file) {
            throw new \BadMethodCallException('invalid state');
        }
        
        $code = (new AccessorMaker(new ObjectTypeMethods()))
            ->makeAccessor($this->trait_namespace, $this->trait_basename, $this->class_list);
        file_put_contents($this->output_file, "<?php\n" . $code);
    }

    public static function run()
    {
        $option_keys = array('help' => 'h', 'name' => 'n', 'class' => 'c', 'file' => 'f');

        $opts = getopt('hn:c:f:', ['help', 'name:', 'class:', 'file:'])
            + array_combine(array_keys($option_keys), array_fill(0, count($option_keys), null))
            + array_combine(array_values($option_keys), array_fill(0, count($option_keys), null));

        foreach ($option_keys as $long => $short) {
            $opts[$long] = $opts[$long] ?: $opts[$short];
            unset($opts[$short]);
        }

        if ($opts['help'] || empty($opts['name']) || empty($opts['class']) || empty($opts['file'])) {
            self::usage();
        }
        
        try {
            $maker = new self($opts['name'], $opts['class'], $opts['file']);
            $maker->make();
        } catch (\Exception $e) {
            echo $e->getMessage(), PHP_EOL;
            exit(1);
        }

        exit(0);
    }

    public static function usage()
    {
        echo "usage: make_accessor -n TraitName -c Class1 [-c Class2 [-c Class3...]] -f file" . PHP_EOL;
        exit(1);
    }

}