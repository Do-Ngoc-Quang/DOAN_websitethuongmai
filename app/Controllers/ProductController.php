<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductController extends BaseController
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

            $modelProduct = model(ProductModel::class);
            $modelCategory = model(CategoryModel::class);

            $data = [
                'product' => $modelProduct->getProduct(),
                'category' => $modelCategory->getCategory(),
            ];
            return view('admin/includes/header')
                . view('admin/product', $data)
                . view('admin/includes/footer');
        }
    }

    public function create()
    {
        // // Checks whether the submitted data passed the validation rules.
        // if (
        //     !$this->validate([
        //         'name_product' => 'required|max_length[255]|min_length[1]',
        //         'price' => 'required|max_length[255]|min_length[1]',
        //         'quantity' => 'required|max_length[255]|min_length[1]',
        //         // 'img' => 'required|max_length[255]|min_length[1]',
        //         'detail' => 'required|max_length[255]|min_length[1]',
        //         'category_id' => 'required|max_length[255]|min_length[1]',
        //     ])
        // ) {
        //     // The validation fails, so returns the form.
        // }
        // Gets the validated data.
        $post = $this->validator->getValidated();

        // Xử lý di chuyển ảnh
        $uploadedImg = $this->request->getFile('img');
        if ($uploadedImg->isValid() && !$uploadedImg->hasMoved()) {
            // Di chuyển ảnh vào thư mục cụ thể
            $newPath = './uploads/products/';
            $newFileName = $uploadedImg->getRandomName();
            $uploadedImg->move($newPath, $newFileName);

            // Lưu tên ảnh vào cơ sở dữ liệu
            $post['img'] = $newFileName;
        }

        $modelProduct = model(ProductModel::class);

        $modelProduct->save([
            'name_product' => isset($post['name_product']) ? $post['name_product'] : '',
            'price' => isset($post['price']) ? $post['price'] : '',
            'quantity' => isset($post['quantity']) ? $post['quantity'] : '',
            'img' => isset($post['img']) ? $post['img'] : '',
            'detail' => isset($post['detail']) ? $post['detail'] : '',
            'category_id' => isset($post['category_id']) ? $post['category_id'] : ''

        ]);

        $modelCategory = model(CategoryModel::class);

        $data = [
            'product' => $modelProduct->getAll(),
            'category' => $modelCategory->getCategory(),
        ];
        return view('admin/includes/header')
            . view('admin/product', $data)
            . view('admin/includes/footer');
    }

    public function update($id)
    {
        // Get the validated data.
        $post = $this->request->getPost();

        // Update the record with the provided data.
        $modelProduct = model(ProductModel::class);

        // Get the existing data from the database.
        $existingData = $modelProduct->find($id);

        // Merge the existing data with the new data.
        $data = array_merge($existingData, $post);

        // Handle image upload.
        $uploadedImg = $this->request->getFile('img');
        if ($uploadedImg && $uploadedImg->isValid() && !$uploadedImg->hasMoved()) {
            $newPath = './uploads/products/';
            $newFileName = $uploadedImg->getRandomName();
            $uploadedImg->move($newPath, $newFileName);

            // Update the 'img' field with the new file name.
            $data['img'] = $newFileName;
        }

        // Perform the update.
        $modelProduct->update($id, $data);

        return redirect()->to(base_url() . 'admin/product');
    }

    public function delete($id)
    {
        $model = model(ProductModel::class);
        $model->where('id', $id)->delete();
        //------------------------------------------------------------------------ //
        return redirect()->to(base_url() . 'admin/product');
    }
}
