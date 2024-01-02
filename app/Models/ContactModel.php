<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact';

    protected $allowedFields = ['id', 'email', 'msg', 'status', 'created_at'];

    public function getContact()
    {
        return $this->findAll();
    }
    public function countContact()
    {
        return $this->countAll();
    }

    // status 0 là chưa xử lý
    public function countContactWithStatus0()
    {
        return $this->where('status', 0)->countAllResults();
    }

    // status 1 là đã xử lý
    public function countContactWithStatus1()
    {
        return $this->where('status', 1)->countAllResults();
    }
}
