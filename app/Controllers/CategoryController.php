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
        // Get the validated data.
        $post = $this->request->getPost();

        $model = model(CategoryModel::class);

        $model->save([
            'slug' => isset($post['slug']) ? $post['slug'] : '',
            'name_category' => isset($post['name_category']) ? $post['name_category'] : '',
        ]);

        $data = [
            'category' => $model->getCategory(),
        ];

        return view('admin/includes/header')
            . view('admin/category', $data)
            . view('admin/includes/footer');
    }

    public function update($id)
    {
        $post = $this->request->getPost();

        $model = model(CategoryModel::class);

        // Get the existing data from the database.
        $existingData = $model->find($id);

        // Merge the existing data with the new data.
        $data = array_merge($existingData, $post);

        $model->update($id, $data);

        return redirect()->to(  base_url() .'admin/category');
    }

    public function delete($id)
    {
        $model = model(CategoryModel::class);
        $model->where('id', $id)->delete();
        //------------------------------------------------------------------------ //
        return redirect()->to(  base_url() .'admin/category');

    }
}