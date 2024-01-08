<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class CategoryController extends BaseController
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
            $model = model(CategoryModel::class);

            $data = [
                'category' => $model->getCategory(),
            ];
            return view('admin/includes/header')
                . view('admin/category', $data)
                . view('admin/includes/footer');
        }
    }

    public function create()
    {
        $model = model(CategoryModel::class);
        if (!$this->validate([
            'slug' => 'required|max_length[255]|min_length[1]',
            'name_category' => 'required|max_length[255]|min_length[1]'
        ])) {
            // The validation fails, so returns the form.
            return redirect()->to(base_url() . 'admin/category')->with('error_invalid', 'Vui lòng điền đầy đủ thông tin');
        }
        // Gets the validated data.
        $post = $this->validator->getValidated();
        $model->save([
            'slug' => isset($post['slug']) ? $post['slug'] : '',
            'name_category' => isset($post['name_category']) ? $post['name_category'] : '',
        ]);
        return redirect()->to(base_url() . 'admin/category')->with('success', 'Tạo danh mục thành công');
    }

    public function update($id)
    {
        $model = model(CategoryModel::class);
        if (!$this->validate([
            'slug' => 'required|max_length[255]|min_length[1]',
            'name_category' => 'required|max_length[255]|min_length[1]'
        ])) {
            return redirect()->to(base_url() . 'admin/category')->with('error_invalid', 'Thông tin không hợp lệ, cập nhật không thành công');
        }
        // Gets the validated data.
        $post = $this->validator->getValidated();
        // Get the existing data from the database.
        $existingData = $model->find($id);
        // Merge the existing data with the new data.
        $data_update = array_merge($existingData, $post);
        $model->update($id, $data_update);
        return redirect()->to(base_url() . 'admin/category')->with('success', 'Cập nhật danh mục thành công');
    }

    public function delete($id)
    {
        $model = model(CategoryModel::class);
        $model->where('id', $id)->delete();
        //------------------------------------------------------------------------ //
        return redirect()->to(base_url() . 'admin/category')->with('success', 'Xóa danh mục thành công');
    }
}
