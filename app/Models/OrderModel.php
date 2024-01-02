<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';

    protected $allowedFields = ['id', 'name', 'phone_number', 'email', 'method_payment', 'total', 'status', 'created_at'];

    public function getOrder()
    {
        return $this->findAll();
    }
    public function countOrder()
    {
        return $this->countAll();
    }

     // status 0 là chưa xử lý
     public function countOrderWithStatus0()
     {
         return $this->where('status', 0)->countAllResults();
     }
 
     // status 1 là đã xử lý
     public function countOrderWithStatus1()
     {
         return $this->where('status', 1)->countAllResults();
     }
}
