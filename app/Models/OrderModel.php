<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';

    protected $allowedFields = ['id'];

    public function getOrder()
    {
        return $this->findAll();
    }
}
