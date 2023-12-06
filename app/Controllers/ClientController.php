<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ClientController extends BaseController
{
    public function home_c()
    {
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header')
            . view('client/home_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function product_c()
    {
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header')
            . view('client/product_c', $data)
            . view('client/includes_c/footer', $data);
    }
    
    public function product_detail_c($id)
    {
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'product' => $modelProduct->getProduct(),
            'id_par' => $id,
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header')
            . view('client/product_detail_c', $data)
            . view('client/includes_c/footer', $data);
    }
}
