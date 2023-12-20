<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $allowedFields = ['id', 'slug', 'name_product', 'price', 'quantity', 'img', 'detail', 'description', 'category_id'];

    public function getProduct()
    {
        return $this->findAll();
    }

    public function getProductBySlug($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getProduct_search_product($words)
    {
        $product = $this->like('name_product', $words)->get()->getResultArray();
        return $product;
    }

    public function getProductById($id)
    {
        return $this->find($id);
    }
    public function getProductLastest()
    {
        // return $this->findAll();
    }
}
