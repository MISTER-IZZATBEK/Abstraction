<?php

namespace App\Http\Services;

class ResourceService extends AbstractService
{
    protected $fields;

    public function __construct($fields, $model)
    {
        $this->fields=$fields;
        $this->model=$model;
    }

    public function getFields()
    {
        return $this->fields;
    }
}
