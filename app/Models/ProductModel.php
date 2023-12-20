<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $allowedFields = ['id', 'name_product', 'price', 'quantity', 'img', 'detail', 'description', 'category_id'];

    public function getProduct()
    {
        return $this->findAll();
    }

    public function getProduct_search_product()
    {
        return $this->findAll();
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
