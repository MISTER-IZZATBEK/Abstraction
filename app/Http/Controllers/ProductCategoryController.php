<?php

namespace App\Http\Controllers;

use App\Fields\Store\TextField;
use App\Http\Services\ProductCategoryService;
use App\Http\Services\ResourceService;
use App\Models\ProductCategory;

class ProductCategoryController extends AbstractController
{
    public function __construct()
    {
      $this->service=new ResourceService(
          ProductCategory::class,
          [
          TextField::make('name')->setRules('required'),
          ]
      );
    }
}
