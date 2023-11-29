<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $allowedFields = ['id', 'name_product', 'price', 'quantity', 'img', 'detail', 'category_id'];

    public function getAll()
    {
        return $this->findAll();
    }
}
