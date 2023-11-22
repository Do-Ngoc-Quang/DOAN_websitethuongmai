<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class DashboardController extends BaseController
{
    
    public function index()
    {
        $user = model(UserModel::class);

        $data = [
            'user' => $user->getUser(),
        ];



        return view('admin/includes/header', $data)
            . view('admin/dashboard')
            . view('admin/includes/footer');
    }


}