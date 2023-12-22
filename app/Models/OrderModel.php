<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';

    protected $allowedFields = ['id', 'name', 'phone_number', 'email', 'method_payment',  'created_at'];

    public function getOrder()
    {
        return $this->findAll();
    }
}
