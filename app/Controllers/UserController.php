<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    public function index_login()
    {
        $session = session();
        return view('admin/auth_login');
    }

    public function index_register()
    {
        return view('admin/auth_register');
    }

    public function create()
    {
        // Checks whether the submitted data passed the validation rules.
        if (
            !$this->validate([
                'user_name' => 'required|max_length[255]|min_length[1]',
                'user_email' => 'required|max_length[255]|min_length[1]',
                'user_password' => 'required|max_length[255]|min_length[1]',
            ])
        ) {
            // The validation fails, so returns the form.
        }
        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(UserModel::class);

        $model->save([
            'user_name' => $post['user_name'],
            'user_email' => $post['user_email'],
            'user_fullname	' => '',
            'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_BCRYPT),
            'user_role' => false,
        ]);

        //--------------------------------------------------------//
        return redirect()->to(base_url() . 'admin/register');
        //--------------------------------------------------------//
    }

    public function authentication()
    {
        $session = session();
        $model = model('App\Models\UserModel');
        if (! $this->validate([
            'user_name' => 'required|max_length[255]|min_length[3]',
            'user_password' => 'required|max_length[255]|min_length[3]'
        ])) {
            // The validation fails, so returns the form.
            return $this->index_login();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();
        $data['user_item'] = $model->checkUser($post['user_name'], ($post['user_password']));

        if(isset($data['user_item']))
        {
            $infoUser = [
                'username'  => $data['user_item']['user_name'],
                'logged_in' => true,
            ];
            $_SESSION['infoUser']=$infoUser;

            //--------------------------------------------------------//
                return redirect()->to( base_url() .'admin/dashboard');
            //--------------------------------------------------------//
        }
        else
        {
            return $this->index_login();
        }

    }

    public function logout()
    {
        $session = session();
        // Lấy session hiện tại
        $infoUser = $_SESSION['infoUser'];

        // Đặt giá trị 'logged_in' thành false
        $infoUser['logged_in'] = false;

        // Gán giá trị mới vào session
        $_SESSION['infoUser'] = $infoUser;

        return redirect()->to( base_url() .'admin/login');
    }


    // public function update($id)
    // {
    //     // Checks whether the submitted data passed the validation rules.
    //     if (
    //         !$this->validate([
    //             'name_category' => 'required|max_length[255]|min_length[3]',
    //         ])
    //     ) {
    //         // The validation fails, so returns the form.
    //     }
    //     // Gets the validated data.
    //     $post = $this->validator->getValidated();

    //     //------------------------------------------------------------------------ //
    //     $model = model(CategoryModel::class);

    //     $data = [
    //         'name_category' => $post['name_category'],
    //     ];

    //     $model->update($id, $data);

    //     //------------------------------------------------------------------------ //
    //     return redirect()->to(  base_url() .'admin/category');
    // }

    public function view()
    {
        $session = session();

        $userModel = new UserModel();

        // Lấy session hiện tại
        $infoUser = $_SESSION['infoUser'];
        $username = $infoUser['username'];

        $user = $userModel->getUserByUsername($username);

        return view('admin/includes/header')
        . view('admin/account', $user)
        . view('admin/includes/footer');
 
    }
}