<?php

namespace App\Controllers;

use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class OrderController extends BaseController
{

    public function index()
    {
        $session = session();

        // Kiểm tra xem 'infoUser' tồn tại và 'logged_in' là false
        if (!$session->has('infoUser') || $session->get('infoUser')['logged_in'] === false) {
            //----------------------------------------------//
            return redirect()->to(base_url() . 'admin/login');
            //----------------------------------------------//
        } else {
            //--------------------------------------------------------------------------------------//
            $modelProduct = model(ProductModel::class);
            $modelOrder = model(OrderModel::class);
            $modelOrderDetail = model(OrderDetailModel::class);

            $data = [
                'product' => $modelProduct->getProduct(),
                'order' => $modelOrder->getOrder(),
                'order_detail' => $modelOrderDetail->getOrderDetail(),
            ];

            return view('admin/includes/header')
                . view('admin/order', $data)
                . view('admin/includes/footer');
            //--------------------------------------------------------------------------------------//
        }
    }

    // public function delete($id)
    // {
    //     $model = model(OrderModel::class);
    //     $model->where('id', $id)->delete();
    //     //------------------------------------------------------------------------ //
    //     return redirect()->to(base_url() . 'admin/order');
    // }
}
