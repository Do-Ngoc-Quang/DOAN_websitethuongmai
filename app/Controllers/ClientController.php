<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\CartModel;
use App\Models\CommentModel;
use App\Models\ReviewModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ClientController extends BaseController
{
    public function home_c()
    {
        $session = session();
        $cart = session('cart');
        if (!is_array($cart)) {
            // Nếu không tồn tại hoặc không phải là mảng, tạo một mảng rỗng
            $cart = [];
            $session->set('cart', $cart = []);
        }

        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);
        $modelBlog = model(BlogModel::class);
        $modelUser = model(UserModel::class);

        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
            'blog' => $modelBlog->getBlog(),
            'user' => $modelUser->getUser(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/home_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function product_c()
    {
        $session = session();
        $cart = session('cart');
        if (!is_array($cart)) {
            // Nếu không tồn tại hoặc không phải là mảng, tạo một mảng rỗng
            $cart = [];
            $session->set('cart', $cart = []);
        }

        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/product_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function search_product()
    {
        $session = session();
        $cart = session('cart');
        if (!is_array($cart)) {
            // Nếu không tồn tại hoặc không phải là mảng, tạo một mảng rỗng
            $cart = [];
            $session->set('cart', $cart = []);
        }

        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct_search_product(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/product_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function product_detail_c($id)
    {
        $session = session();
        $cart = session('cart');
        if (!is_array($cart)) {
            // Nếu không tồn tại hoặc không phải là mảng, tạo một mảng rỗng
            $cart = [];
            $session->set('cart', $cart = []);
        }

        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);
        $modelReview = model(ReviewModel::class);

        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct(),
            'id_par' => $id,
            'category' => $modelCategory->getCategory(),
            'review' => $modelReview->getReview(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/product_detail_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function review()
    {
        $post = $this->request->getPost();
        $modelReview = model(ReviewModel::class);

        $modelReview->save([
            'id_product' => isset($post['id_product']) ? $post['id_product'] : '',
            'review' => isset($post['review']) ? $post['review'] : '',
            'name' => isset($post['name']) ? $post['name'] : '',
            'email' => isset($post['email']) ? $post['email'] : '',
            'created_at' => isset($post['created_at']) ? $post['created_at'] : '',
        ]);

        return redirect()->to(base_url() . 'product_detail_c/' . $post['id_product']);
    }

    public function add_to_cart()
    {

        // $post = $this->request->getPost();
        // $modelCart = model(CartModel::class);

        // $modelCart->save([
        //     'id_product' => isset($post['id_product']) ? $post['id_product'] : '',
        //     'quantity' => isset($post['quantity']) ? $post['quantity'] : '',
        // ]);

        // return redirect()->to(base_url() . 'product_c');


        $post = $this->request->getPost();
        $session = session();

        $item = array(
            'id_product' => isset($post['id_product']) ? $post['id_product'] : '',
            'quantity' => isset($post['quantity']) ? $post['quantity'] : '',
        );

        if ($session->has('cart')) {
            $index = $this->exist_product_cart(isset($post['id_product']) ? $post['id_product'] : '');
            $cart = array_values(session('cart'));
            if ($index == -1)
                array_push($cart, $item);
            else
                $cart[$index]['quantity']++;
            $session->set('cart', $cart);
        } else {
            $cart = array($item);
            $session->set('cart', $cart);
        }

        return redirect()->to(base_url() . 'product_c');
    }

    private function exist_product_cart($id_product)
    {
        $items = array_values(session('cart'));
        for ($i = 0; $i < count($items); $i++)
            if ($items[$i]['id_product'] == $id_product)
                return $i;
        return -1;
    }

    public function update_cart_c($id_product)
    {
        $session = session();
        // Get the validated data.
        $post = $this->request->getPost();

        // // Update the record with the provided data.
        // $model = model(CartModel::class);

        // // Get the existing data from the database.
        // $existingData = $model->find($id);

        // // Merge the existing data with the new data.
        // $data = array_merge($existingData, $post);

        // // Perform the update.
        // $model->update($id, $data);

        // return redirect()->to(base_url() . 'shoping_cart_c');



        if ($session->has('cart')) {
            $index = $this->exist_product_cart($id_product);
            $cart = array_values(session('cart'));
            if ($index != -1) {
                if ($post['quantity'] == 0) {
                    //Xóa sản phẩm ra khỏi giỏ hàng khi số lượng nhập vào là 0
                    unset($cart[$index]);
                } else {
                    $cart[$index]['quantity'] = isset($post['quantity']) ? $post['quantity'] : '';
                }
            }

            $session->set('cart', $cart);
        }

        return redirect()->to(base_url() . 'shoping_cart_c');
    }

    public function delete_cart_c($id_product)
    {
        // $model = model(CartModel::class);
        // $model->where('id', $id)->delete();
        // //------------------------------------------------------------------------ //
        // return redirect()->to(base_url() . 'shoping_cart_c');

        $session = session();

        if ($session->has('cart')) {
            $index = $this->exist_product_cart($id_product);
            $cart = array_values(session('cart'));

            //Xóa sản phẩm ra khỏi giỏ hàng
            unset($cart[$index]);

            // Cập nhật session với mảng đã được xóa phần tử
            session()->set('cart', $cart);
        }

        return redirect()->to(base_url() . 'shoping_cart_c');
    }

    // view
    public function shoping_cart_c()
    {
        $session = session();
        $cart = session('cart');
        if (!is_array($cart)) {
            // Nếu không tồn tại hoặc không phải là mảng, tạo một mảng rỗng
            $cart = [];
            $session->set('cart', $cart = []);
        }

        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/shoping_cart_c', $data)
            . view('client/includes_c/footer', $data);
    }

    // view
    public function blog_c()
    {
        $session = session();
        $cart = session('cart');
        if (!is_array($cart)) {
            // Nếu không tồn tại hoặc không phải là mảng, tạo một mảng rỗng
            $cart = [];
            $session->set('cart', $cart = []);
        }

        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);
        $modelBlog = model(BlogModel::class);
        $modelUser = model(UserModel::class);
        $modelComment = model(CommentModel::class);


        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct(),
            'product_lastest' => $modelProduct->getProductLastest(),
            'category' => $modelCategory->getCategory(),
            'blog' => $modelBlog->getBlog(),
            'user' => $modelUser->getUser(),
            'comment' => $modelComment->getComment(),

        ];

        return view('client/includes_c/header', $data)
            . view('client/blog_c', $data)
            . view('client/includes_c/footer', $data);
    }

    // view
    public function blog_detail_c($id)
    {
        $session = session();
        $cart = session('cart');
        if (!is_array($cart)) {
            // Nếu không tồn tại hoặc không phải là mảng, tạo một mảng rỗng
            $cart = [];
            $session->set('cart', $cart = []);
        }

        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);
        $modelBlog = model(BlogModel::class);
        $modelUser = model(UserModel::class);
        $modelComment = model(CommentModel::class);

        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct(),
            'id_par' => $id,
            'category' => $modelCategory->getCategory(),
            'blog' => $modelBlog->getBlog(),
            'user' => $modelUser->getUser(),
            'comment' => $modelComment->getComment(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/blog_detail_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function comment()
    {
        $post = $this->request->getPost();
        $modelComment = model(CommentModel::class);

        $modelComment->save([
            'blog_id' => isset($post['blog_id']) ? $post['blog_id'] : '',
            'cmt' => isset($post['cmt']) ? $post['cmt'] : '',
            'name' => isset($post['name']) ? $post['name'] : '',
            'email' => isset($post['email']) ? $post['email'] : '',
            'created_at' => isset($post['created_at']) ? $post['created_at'] : '',
        ]);

        return redirect()->to(base_url() . 'blog_detail_c/' . $post['blog_id']);
    }
}
