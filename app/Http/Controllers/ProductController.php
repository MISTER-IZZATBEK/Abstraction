<?php

namespace App\Http\Controllers;

use App\Fields\Store\MoneyField;
use App\Fields\Store\TextField;
use App\Http\Services\ResourceService;
use App\Models\Product;

class ProductController extends AbstractController
{
    public function __construct()
    {
        $this->service=new ResourceService(
            Product::class,
            [
                TextField::make('name')->setRules('required'),
                MoneyField::make('price')->setRules('required'),
            ]
        );
    }
}
