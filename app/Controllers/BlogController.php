<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class BlogController extends BaseController
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

            $modelBlog = model(BlogModel::class);
            $modelCategory = model(CategoryModel::class);
            $modelUser = model(UserModel::class);

            $data = [
                'blog' => $modelBlog->getBlog(),
                'category' => $modelCategory->getCategory(),
                'user' => $modelUser->getUser(),
            ];
            return view('admin/includes/header')
                . view('admin/blog', $data)
                . view('admin/includes/footer');
        }
    }

    public function create()
    {
        $modelBlog = model(BlogModel::class);

        if (!$this->validate([
            'title' => 'required|max_length[500]|min_length[1]',
            'description' => 'required|max_length[1000]|min_length[1]',
            'detail' => 'required|max_length[5000]|min_length[1]',
            'auther' => 'required|max_length[255]|min_length[1]',
            'category_id' => 'required|max_length[255]|min_length[1]',
            'created_at' => 'required|max_length[255]|min_length[1]'
        ])) {
            // The validation fails, so returns the form.
            return redirect()->to(base_url() . 'admin/blog')->with('error_invalid', 'Vui lòng điền đầy đủ thông tin');
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        // Xử lý di chuyển ảnh
        $uploadedImg = $this->request->getFile('img');
        if ($uploadedImg->isValid() && !$uploadedImg->hasMoved()) {
            // Di chuyển ảnh vào thư mục cụ thể
            $newPath = './uploads/blogs/';
            $newFileName = $uploadedImg->getRandomName();
            $uploadedImg->move($newPath, $newFileName);

            // Lưu tên ảnh vào cơ sở dữ liệu
            $post['img'] = $newFileName;
        }

        $modelBlog->save([
            'title' => isset($post['title']) ? $post['title'] : '',
            'description' => isset($post['description']) ? $post['description'] : '',
            'detail' => isset($post['detail']) ? $post['detail'] : '',
            'img' => isset($post['img']) ? $post['img'] : '',
            'auther' => isset($post['auther']) ? $post['auther'] : '',
            'category_id' => isset($post['category_id']) ? $post['category_id'] : '',
            'created_at' => isset($post['created_at']) ? $post['created_at'] : ''
        ]);

        return redirect()->to(base_url() . 'admin/blog')->with('success', 'Tạo bài viết thành công');
    }

    public function update($id)
    {
        $modelBlog = model(BlogModel::class);

        if (!$this->validate([
            'title' => 'required|max_length[500]|min_length[1]',
            'description' => 'required|max_length[1000]|min_length[1]',
            'detail' => 'required|max_length[5000]|min_length[1]',
            'category_id' => 'required|max_length[255]|min_length[1]',
        ])) {
            // The validation fails, so returns the form.
            return redirect()->to(base_url() . 'admin/blog')->with('error_invalid', 'Thông tin không hợp lệ, cập nhật không thành công');
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        // Get the existing data from the database.
        $existingData = $modelBlog->find($id);

        // Merge the existing data with the new data.
        $data = array_merge($existingData, $post);

        // Handle image upload.
        $uploadedImg = $this->request->getFile('img');
        if ($uploadedImg && $uploadedImg->isValid() && !$uploadedImg->hasMoved()) {
            $newPath = './uploads/blogs/';
            $newFileName = $uploadedImg->getRandomName();
            $uploadedImg->move($newPath, $newFileName);

            // Update the 'img' field with the new file name.
            $data['img'] = $newFileName;
        }

        // Perform the update.
        $modelBlog->update($id, $data);

        return redirect()->to(base_url() . 'admin/blog')->with('success', 'Cập nhật bài viết thành công');
    }

    public function delete($id)
    {
        $model = model(BlogModel::class);
        $model->where('id', $id)->delete();
        //------------------------------------------------------------------------ //
        return redirect()->to(base_url() . 'admin/blog')->with('success', 'Xóa bài viết thành công');
    }
}

// dd($this->validator->getValidated());
// dd($post);
