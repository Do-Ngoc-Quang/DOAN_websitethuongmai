<?php

namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\BlogModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\CartModel;
use App\Models\CommentModel;
use App\Models\ContactModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
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

    public function product_detail_c($slug)
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
            'slug_par' => $slug,
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

        return redirect()->to(base_url() . 'product_detail_c/' . $post['slug_product']);
    }

    public function add_to_cart()
    {
        $session = session();

        $post = $this->request->getPost();

        // Update the record with the provided data.
        $modelProduct = model(ProductModel::class);
        // Get the existing data from the database.
        $existingProduct = $modelProduct->find(isset($post['id_product']) ? $post['id_product'] : '');

        if ($existingProduct['quantity'] <= 0) {

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
                'error_quantity' => "This product is currently out of stock",
                'cart' => array_values($session->get('cart')),
                'product' => $modelProduct->getProduct(),
                'slug_par' => $existingProduct['slug'],
                'category' => $modelCategory->getCategory(),
                'review' => $modelReview->getReview(),
            ];

            return view('client/includes_c/header', $data)
                . view('client/product_detail_c', $data)
                . view('client/includes_c/footer', $data);
        } else if ((int)$existingProduct['quantity'] - (int)(isset($post['quantity']) ? $post['quantity'] : '') < 0) {

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
                'error_quantity' => "Quantity available for this product is",
                'available_quantity' => $existingProduct['quantity'],
                'cart' => array_values($session->get('cart')),
                'product' => $modelProduct->getProduct(),
                'slug_par' => $existingProduct['slug'],
                'category' => $modelCategory->getCategory(),
                'review' => $modelReview->getReview(),
            ];

            return view('client/includes_c/header', $data)
                . view('client/product_detail_c', $data)
                . view('client/includes_c/footer', $data);
        } else {
            $item = array(
                'id_product' => isset($post['id_product']) ? $post['id_product'] : '',
                'quantity' => isset($post['quantity']) ? $post['quantity'] : '',
            );

            if ($session->has('cart')) {
                $index = $this->exist_product_cart(isset($post['id_product']) ? $post['id_product'] : '');
                $cart = array_values(session('cart'));
                if ($index == -1)
                    array_push($cart, $item);
                else {
                    if ((int)$existingProduct['quantity'] - (int)$cart[$index]['quantity'] == 0) {

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
                            'error_quantity' => "This product is currently out of stock",
                            'cart' => array_values($session->get('cart')),
                            'product' => $modelProduct->getProduct(),
                            'slug_par' => $existingProduct['slug'],
                            'category' => $modelCategory->getCategory(),
                            'review' => $modelReview->getReview(),
                        ];

                        return view('client/includes_c/header', $data)
                            . view('client/product_detail_c', $data)
                            . view('client/includes_c/footer', $data);
                    } else {
                        $cart[$index]['quantity']++;
                    }
                }

                $session->set('cart', $cart);
            } else {
                $cart = array($item);
                $session->set('cart', $cart);
            }

            return redirect()->to(base_url() . 'product_c');
        }
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

        // Update the record with the provided data.
        $modelProduct = model(ProductModel::class);
        // Get the existing data from the database.
        $existingProduct = $modelProduct->find($id_product);

        if ($session->has('cart')) {
            $index = $this->exist_product_cart($id_product);
            $cart = array_values(session('cart'));
            if ($index != -1) {
                if ($post['quantity'] == 0) {
                    //Xóa sản phẩm ra khỏi giỏ hàng khi số lượng nhập vào là 0
                    unset($cart[$index]);
                } else {
                    if ((int)$existingProduct['quantity'] - (int)$post['quantity'] < 0) {

                        $cart = session('cart');
                        if (!is_array($cart)) {
                            // Nếu không tồn tại hoặc không phải là mảng, tạo một mảng rỗng
                            $cart = [];
                            $session->set('cart', $cart = []);
                        }

                        $modelProduct = model(ProductModel::class);
                        $modelCategory = model(CategoryModel::class);

                        $data = [
                            'error_quantity' => "Quantity available for ",
                            'available_quantity' => $existingProduct['quantity'],
                            'cart' => array_values($session->get('cart')),
                            'product' => $modelProduct->getProduct(),
                            'slug_product' => $existingProduct['slug'],
                            'category' => $modelCategory->getCategory(),
                        ];

                        return view('client/includes_c/header', $data)
                            . view('client/shoping_cart_c', $data)
                            . view('client/includes_c/footer', $data);
                    } else {
                        $cart[$index]['quantity'] = $post['quantity'];
                    }
                }
            }
            $session->set('cart', $cart);
        }

        return redirect()->to(base_url() . 'shoping_cart_c');
    }

    public function delete_cart_c($id_product)
    {
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

    // Order
    public function order()
    {
        $session = session();

        $post = $this->request->getPost();
        $modelOrder = model(OrderModel::class);

        $modelOrder->save([
            'name' => isset($post['name']) ? $post['name'] : '',
            'phone_number' => isset($post['phone_number']) ? $post['phone_number'] : '',
            'email' => isset($post['email']) ? $post['email'] : '',
            'method_payment' => isset($post['method_payment']) ? $post['method_payment'] : '',
            'total' => isset($post['total']) ? $post['total'] : '',
            'status' => isset($post['status']) ? $post['status'] : '',
            'created_at' => isset($post['created_at']) ? $post['created_at'] : '',
        ]);

        // Lấy ID của đơn hàng vừa được thêm vào
        $idOrder = $modelOrder->insertID();

        $items = array_values(session('cart'));
        for ($i = 0; $i < count($items); $i++) {

            // Update the record with the provided data.
            $modelProduct = model(ProductModel::class);
            // Get the existing data from the database.
            $existingProduct = $modelProduct->find($items[$i]['id_product']);

            if ($existingProduct['quantity'] <= 0) {
                $data['quantity'] = 0;
            } else {
                $data['quantity'] = $existingProduct['quantity'] - (int)$items[$i]['quantity'];
            }

            // Perform the update.
            $modelProduct->update($items[$i]['id_product'], $data);

            $modelOrderDetail = model(OrderDetailModel::class);
            $modelOrderDetail->save([
                'id_order' => $idOrder,
                'id_product' => $items[$i]['id_product'],
                'quantity' => $items[$i]['quantity'],
            ]);
        }

        //Sau khi đặt hàng, xóa toàn bộ sản phẩm có trong session "cart"
        session()->set('cart', $cart = []);

        //
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
            'order_success' => "Order Success",
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

    public function about_c()
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
        $modelAbout = model(AboutModel::class);

        $data = [
            'cart' => array_values($session->get('cart')),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
            'about' => $modelAbout->getAbout(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/about_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function contact_c()
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
            . view('client/contact_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function send_contact_c()
    {
        $post = $this->request->getPost();
        $modelContact = model(ContactModel::class);

        $modelContact->save([
            'email' => isset($post['email']) ? $post['email'] : '',
            'msg' => isset($post['msg']) ? $post['msg'] : '',
            'created_at' => isset($post['created_at']) ? $post['created_at'] : '',
        ]);

        return redirect()->to(base_url() . 'contact_c/');
    }
}
