<?php

namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\BlogModel;
use App\Models\ContactModel;
use App\Models\OrderModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class DashboardController extends BaseController
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
            $modelCategory = model(CategoryModel::class);
            $modelBlog = model(BlogModel::class);
            $modelAbout = model(AboutModel::class);
            $modelContact = model(ContactModel::class);
            $modelOrder = model(OrderModel::class);

            $data = [
                'product' => $modelProduct->getProduct(),
                'category' => $modelCategory->getCategory(),
                'total_blog' => $modelBlog->countBlog(),
                'total_about' => $modelAbout->countAbout(),
                'total_contact' => $modelContact->countContact(),
                'unhandle_contact' => $modelContact->countContactWithStatus0(),
                'done_contact' => $modelContact->countContactWithStatus1(),
                'total_order' => $modelOrder->countOrder(),
                'unhandle_order' => $modelOrder->countOrderWithStatus0(),
                'done_order' => $modelOrder->countOrderWithStatus1(),
            ];

            return view('admin/includes/header')
                  .view('admin/dashboard', $data)
                  .view('admin/includes/footer');
            //--------------------------------------------------------------------------------------//
        }
    }
    

}