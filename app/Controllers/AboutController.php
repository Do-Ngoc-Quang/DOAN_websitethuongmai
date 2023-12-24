<?php

namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class AboutController extends BaseController
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

            $modelUser = model(UserModel::class);
            $modelAbout = model(AboutModel::class);

            $data = [
                'user' => $modelUser->getUser(),
                'about' => $modelAbout->getAbout(),
            ];
            return view('admin/includes/header')
                . view('admin/about', $data)
                . view('admin/includes/footer');
        }
    }

    public function create()
    {
        $modelAbout = model(AboutModel::class);

        if (!$this->validate([
            'title' => 'required|max_length[500]|min_length[1]',
            'description' => 'required|max_length[1000]|min_length[1]',
            
        ])) {
            // The validation fails, so returns the form.
            return redirect()->to(base_url() . 'admin/about')->with('error_invalid', 'Vui lòng điền đầy đủ thông tin');
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        // Xử lý di chuyển ảnh
        $uploadedImg = $this->request->getFile('img');
        if ($uploadedImg->isValid() && !$uploadedImg->hasMoved()) {
            // Di chuyển ảnh vào thư mục cụ thể
            $newPath = './uploads/abouts/';
            $newFileName = $uploadedImg->getRandomName();
            $uploadedImg->move($newPath, $newFileName);

            // Lưu tên ảnh vào cơ sở dữ liệu
            $post['img'] = $newFileName;
        }

        $modelAbout->save([
            'title' => isset($post['title']) ? $post['title'] : '',
            'description' => isset($post['description']) ? $post['description'] : '',
            'img' => isset($post['img']) ? $post['img'] : '',
        ]);

        return redirect()->to(base_url() . 'admin/about')->with('success', 'Tạo bài viết thành công');
    }

    public function update($id)
    {
        $modelAbout = model(AboutModel::class);

        if (!$this->validate([
            'title' => 'required|max_length[500]|min_length[1]',
            'description' => 'required|max_length[1000]|min_length[1]',
        ])) {
            // The validation fails, so returns the form.
            return redirect()->to(base_url() . 'admin/about')->with('error_invalid', 'Thông tin không hợp lệ, cập nhật không thành công');
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        // Get the existing data from the database.
        $existingData = $modelAbout->find($id);

        // Merge the existing data with the new data.
        $data = array_merge($existingData, $post);

        // Handle image upload.
        $uploadedImg = $this->request->getFile('img');
        if ($uploadedImg && $uploadedImg->isValid() && !$uploadedImg->hasMoved()) {
            $newPath = './uploads/abouts/';
            $newFileName = $uploadedImg->getRandomName();
            $uploadedImg->move($newPath, $newFileName);

            // Update the 'img' field with the new file name.
            $data['img'] = $newFileName;
        }

        // Perform the update.
        $modelAbout->update($id, $data);

        return redirect()->to(base_url() . 'admin/about')->with('success', 'Cập nhật bài viết thành công');
    }

    public function delete($id)
    {
        $model = model(AboutModel::class);
        $model->where('id', $id)->delete();
        //------------------------------------------------------------------------ //
        return redirect()->to(base_url() . 'admin/about')->with('success', 'Xóa bài viết thành công');
    }
}

// dd($this->validator->getValidated());
// dd($post);
