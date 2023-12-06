<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\CartModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ClientController extends BaseController
{
    public function home_c()
    {
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/home_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function product_c()
    {
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/product_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function product_detail_c($id)
    {
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
            'product' => $modelProduct->getProduct(),
            'id_par' => $id,
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/product_detail_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function add_to_cart()
    {
        $post = $this->request->getPost();
        $modelCart = model(CartModel::class);

        $modelCart->save([
            'id_product' => isset($post['id_product']) ? $post['id_product'] : '',
            'quantity' => isset($post['quantity']) ? $post['quantity'] : '',
        ]);

        return redirect()->to( base_url() .'product_c');
    }

    public function shoping_cart_c()
    {
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/shoping_cart_c', $data)
            . view('client/includes_c/footer', $data);
    }
}
