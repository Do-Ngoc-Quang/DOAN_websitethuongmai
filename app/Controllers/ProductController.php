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
            return view('admin/includes/header', $data)
                . view('admin/product', $data)
                . view('admin/includes/footer');
        }
    }

    public function product_type($slug_category)
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
                'slug_category' => $slug_category,
            ];
            return view('admin/includes/header', $data)
                . view('admin/product_type', $data)
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
            $newPath = './uploads/products/';
            $newFileName = $uploadedImg->getRandomName();
            $uploadedImg->move($newPath, $newFileName);

            // Lưu tên ảnh vào cơ sở dữ liệu
            $post['img'] = $newFileName;
        }

        $modelProduct = model(ProductModel::class);

        $modelProduct->save([
            'slug' => isset($post['slug']) ? $post['slug'] : '',
            'name_product' => isset($post['name_product']) ? $post['name_product'] : '',
            'price' => isset($post['price']) ? $post['price'] : '',
            'quantity' => isset($post['quantity']) ? $post['quantity'] : '',
            'img' => isset($post['img']) ? $post['img'] : '',
            'detail' => isset($post['detail']) ? $post['detail'] : '',
            'description' => isset($post['description']) ? $post['description'] : '',
            'slug_category' => isset($post['slug_category']) ? $post['slug_category'] : ''

        ]);

        $modelCategory = model(CategoryModel::class);

        $data = [
            'product' => $modelProduct->getProduct(),
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
