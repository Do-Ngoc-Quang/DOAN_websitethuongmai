<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';

    protected $allowedFields = ['id', 'id_product', 'quantity'];

    public function getCart()
    {
        return $this->findAll();
    }
}
