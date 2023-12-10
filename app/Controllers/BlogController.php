<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
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

            $data = [
                'blog' => $modelBlog->getBlog(),
                'category' => $modelCategory->getCategory(),
            ];
            return view('admin/includes/header')
                . view('admin/blog', $data)
                . view('admin/includes/footer');
        }
    }

    public function create()
    {
        // Get the validated data.
        $post = $this->request->getPost();

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

        $modelBlog = model(BlogModel::class);

        $modelBlog->save([
            'title' => isset($post['title']) ? $post['title'] : '',
            'description' => isset($post['description']) ? $post['description'] : '',
            'detail' => isset($post['detail']) ? $post['detail'] : '',
            'img' => isset($post['img']) ? $post['img'] : '',
            'auther' => isset($post['auther']) ? $post['auther'] : '',
            'category_id' => isset($post['category_id']) ? $post['category_id'] : '',
            'created_at' => isset($post['created_at']) ? $post['created_at'] : ''
        ]);

        $modelCategory = model(CategoryModel::class);

        $data = [
            'blog' => $modelBlog->getBlog(),
            'category' => $modelCategory->getCategory(),
        ];
        return view('admin/includes/header')
            . view('admin/blog', $data)
            . view('admin/includes/footer');
    }

    public function update($id)
    {
        // Get the validated data.
        $post = $this->request->getPost();

        // Update the record with the provided data.
        $modelBlog = model(BlogModel::class);

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

        return redirect()->to(base_url() . 'admin/blog');
    }

    public function delete($id)
    {
        $model = model(BlogModel::class);
        $model->where('id', $id)->delete();
        //------------------------------------------------------------------------ //
        return redirect()->to(base_url() . 'admin/blog');
    }
}
