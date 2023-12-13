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
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);
        $modelBlog = model(BlogModel::class);
        $modelUser = model(UserModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
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
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/product_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function product_detail_c($id)
    {
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);
        $modelReview = model(ReviewModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
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
        $post = $this->request->getPost();
        $modelCart = model(CartModel::class);

        $modelCart->save([
            'id_product' => isset($post['id_product']) ? $post['id_product'] : '',
            'quantity' => isset($post['quantity']) ? $post['quantity'] : '',
        ]);

        return redirect()->to(base_url() . 'product_c');
    }

    public function shoping_cart_c()
    {
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
            'product' => $modelProduct->getProduct(),
            'category' => $modelCategory->getCategory(),
        ];

        return view('client/includes_c/header', $data)
            . view('client/shoping_cart_c', $data)
            . view('client/includes_c/footer', $data);
    }

    public function blog_c()
    {
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);
        $modelBlog = model(BlogModel::class);
        $modelUser = model(UserModel::class);
        $modelComment = model(CommentModel::class);


        $data = [
            'cart' => $modelCart->getCart(),
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

    public function blog_detail_c($id)
    {
        $modelCart = model(CartModel::class);
        $modelProduct = model(ProductModel::class);
        $modelCategory = model(CategoryModel::class);
        $modelBlog = model(BlogModel::class);
        $modelUser = model(UserModel::class);
        $modelComment = model(CommentModel::class);

        $data = [
            'cart' => $modelCart->getCart(),
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
