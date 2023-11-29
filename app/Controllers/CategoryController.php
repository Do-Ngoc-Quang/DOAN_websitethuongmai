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
        // Checks whether the submitted data passed the validation rules.
        if (
            !$this->validate([
                'name_category' => 'required|max_length[255]|min_length[3]',
            ])
        ) {
            // The validation fails, so returns the form.
        }
        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(CategoryModel::class);

        $model->save([
            'name_category' => $post['name_category'],
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
        // Checks whether the submitted data passed the validation rules.
        if (
            !$this->validate([
                'name_category' => 'required|max_length[255]|min_length[3]',
            ])
        ) {
            // The validation fails, so returns the form.
        }
        // Gets the validated data.
        $post = $this->validator->getValidated();

        //------------------------------------------------------------------------ //
        $model = model(CategoryModel::class);
        $data = [
            'name_category' => $post['name_category'],
        ];
        $model->update($id, $data);
        //------------------------------------------------------------------------ //
        
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