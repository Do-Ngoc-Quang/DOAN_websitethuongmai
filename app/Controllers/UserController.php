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
            'user_avatar	' => '',
            'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_BCRYPT),
            'user_role' => false,
        ]);

        //--------------------------------------------------------//
        // return redirect()->to(base_url() . 'admin/register');

        $data = [
            'create_success' => "Tạo tài khoản thành công",
        ];
        return view('admin/auth_register', $data);
        //--------------------------------------------------------//
    }

    public function authentication()
    {
        $session = session();
        $model = model('App\Models\UserModel');
        if (!$this->validate([
            'user_name' => 'required|max_length[255]|min_length[3]',
            'user_password' => 'required|max_length[255]|min_length[3]'
        ])) {
            // The validation fails, so returns the form.
            // return $this->index_login();

            $data = [
                'error_invaild' => "Vui lòng điền đầy đủ thông tin tài khoản",
            ];
            return view('admin/auth_login', $data);
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();
        $data['user_item'] = $model->checkUser($post['user_name'], ($post['user_password']));

        if (isset($data['user_item'])) {
            $infoUser = [
                'username'  => $data['user_item']['user_name'],
                'u_avatar'  => $data['user_item']['user_avatar'],
                'logged_in' => true,
            ];
            $_SESSION['infoUser'] = $infoUser;

            //--------------------------------------------------------//
            return redirect()->to(base_url() . 'admin/dashboard');
            //--------------------------------------------------------//
        } else {
            // return $this->index_login();

            $data = [
                'error_login' => "Tên tài khoản và mật khẩu không chính xác",
            ];
            return view('admin/auth_login', $data);
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

        // return redirect()->to(base_url() . 'admin/login');

        $data = [
            'logout_success' => "Đăng xuất thành công",
        ];
        return view('admin/auth_login', $data);
    }


    public function view()
    {
        $session = session();

        $userModel = model(UserModel::class);

        $data = [
            'user' => $userModel->getUser()
        ];

        return view('admin/includes/header')
            . view('admin/account', $data)
            . view('admin/includes/footer');
    }

    public function update($id)
    {
        // Gets the validated data.
        $post = $this->request->getPost();

        //------------------------------------------------------------------------ //
        $userModel = model(UserModel::class);

        // Get the existing data from the database.
        $existingData = $userModel->find($id);

        // Merge the existing data with the new data.
        $data = array_merge($existingData, $post);

        // Handle image upload.
        $uploadedImg = $this->request->getFile('avatar');
        if ($uploadedImg && $uploadedImg->isValid() && !$uploadedImg->hasMoved()) {
            $newPath = './uploads/avatars/';
            $newFileName = $uploadedImg->getRandomName();
            $uploadedImg->move($newPath, $newFileName);

            // Update the 'img' field with the new file name.
            $data['user_avatar'] = $newFileName;
        }


        // Perform the update.
        $userModel->update($id, $data);

        //------------------------------------------------------------------------ //
        return redirect()->to(base_url() . 'admin/account');
    }
}
