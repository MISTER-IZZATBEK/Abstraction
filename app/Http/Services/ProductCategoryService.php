<?php

namespace App\Http\Services;
use App\Fields\Store\TextField;
use App\Models\ProductCategory;


class ProductCategoryService extends AbstractService
{

    protected $rules;

    protected $model=ProductCategory::class;

    public function getFields()
    {
        return [
             TextField::make('name')->setRules('required'),
        ];
    }
}

