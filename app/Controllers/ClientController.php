<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ClientController extends BaseController
{
    public function index()
    {
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];
        return view('client/includes/header')
            . view('client/index', $data)
            . view('client/includes/footer');
    }
}
