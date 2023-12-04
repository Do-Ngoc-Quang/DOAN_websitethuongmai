<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ClientController extends BaseController
{
    public function product()
    {
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header')
            . view('client/product_c', $data)
            . view('client/includes_c/footer');
    }
}
