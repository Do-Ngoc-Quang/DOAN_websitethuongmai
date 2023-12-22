<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'order_detail';

    protected $allowedFields = ['id', 'id_order', 'id_product', 'quantity'];

    public function getOrderDetail()
    {
        return $this->findAll();
    }
}
