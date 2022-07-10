<?php

namespace App\Fields\Store;

use Illuminate\Support\Str;

class Field
{

    protected $name;
    protected $rules;
    protected $defaultRules;

    public function __construct($name)
    {
        return $this->name=$name;
    }

    public function getType()
    {
        return 'text';
    }
    public function setRules($rules)
    {
        $this->rules=$rules;
        return $this;
    }

    public function setName($name)
    {
        return $this->name=$name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRules()
    {
        $rules=explode('|', $this->rules);
        $defaultRules=explode('|', $this->defaultRules);

        return array_merge($defaultRules, $rules);
    }

    public static function make($name)
    {
        $class=get_called_class();
        return new $class($name);
    }

    public function fill($object, $data)
    {
        $object->{$this->getName()}=$data[$this->getName()];
    }

}
