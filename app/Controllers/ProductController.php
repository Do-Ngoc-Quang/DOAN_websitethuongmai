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
        if (!$this->validate([
            'slug' => 'required|max_length[500]|min_length[1]',
            'name_product' => 'required|max_length[1000]|min_length[1]',
            'price' => 'required|max_length[5000]|min_length[1]',
            'quantity' => 'required|max_length[255]|min_length[1]',
            'detail' => 'required|max_length[255]|min_length[1]',
            'description' => 'required|max_length[255]|min_length[1]',
            'slug_category' => 'required|max_length[255]|min_length[1]'
        ])) {
            // The validation fails, so returns the form.
            return redirect()->to(base_url() . 'admin/product')->with('error_invalid', 'Please complete all information');
        }

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
            'slug' => isset($post['slug']) ? $post['slug'] : '',
            'name_product' => isset($post['name_product']) ? $post['name_product'] : '',
            'price' => isset($post['price']) ? $post['price'] : '',
            'quantity' => isset($post['quantity']) ? $post['quantity'] : '',
            'img' => isset($post['img']) ? $post['img'] : '',
            'detail' => isset($post['detail']) ? $post['detail'] : '',
            'description' => isset($post['description']) ? $post['description'] : '',
            'slug_category' => isset($post['slug_category']) ? $post['slug_category'] : ''
        ]);

        return redirect()->to(base_url() . 'admin/product')->with('success', 'Create successful products');
    }

    public function update($id)
    {
        // Kiểm tra xem người dùng đang thao tác ở trang product hay product-type
        $type = $this->request->getPost('type');

        if (!$this->validate([
            'slug' => 'required|max_length[500]|min_length[1]',
            'name_product' => 'required|max_length[1000]|min_length[1]',
            'price' => 'required|max_length[5000]|min_length[1]',
            'quantity' => 'required|max_length[255]|min_length[1]',
            'detail' => 'required|max_length[255]|min_length[1]',
            'description' => 'required|max_length[255]|min_length[1]',
            'slug_category' => 'required|max_length[255]|min_length[1]'
        ])) {
            // The validation fails, so returns the form.

            if (empty($type)) {
                // Nếu giá trị của trường input hidden 'type' là null hoặc chuỗi rỗng -> đang xử lý ở trang product
                return redirect()->to(base_url() . 'admin/product')->with('error_invalid', 'Invalid information, update failed');
            } else {
                // Ngược lại thì đang xử lý ở trang product-type
                return redirect()->to(base_url() . 'admin/product_type/' . $type)->with('error_invalid', 'Invalid information, update failed');
            }
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

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

        // dd($type);

        if (empty($type)) {
            // Nếu giá trị của trường input hidden 'type' là null hoặc chuỗi rỗng -> đang xử lý ở trang product
            return redirect()->to(base_url() . 'admin/product')->with('success', 'Product update successful');
        } else {
            // Ngược lại thì đang xử lý ở trang product-type
            return redirect()->to(base_url() . 'admin/product_type/' . $type)->with('success', 'Product update successful');
        }
    }

    public function delete($id)
    {
        // Kiểm tra xem người dùng đang thao tác ở trang product hay product-type
        $type = $this->request->getPost('type');

        $model = model(ProductModel::class);
        $model->where('id', $id)->delete();
        //------------------------------------------------------------------------ //

        if (empty($type)) {
            // Nếu giá trị của trường input hidden 'type' là null hoặc chuỗi rỗng -> đang xử lý ở trang product
            return redirect()->to(base_url() . 'admin/product')->with('success', 'Product deletion successful');
        } else {
            // Ngược lại thì đang xử lý ở trang product-type
            return redirect()->to(base_url() . 'admin/product_type/' . $type)->with('success', 'Product deletion successful');
        }
    }
}
