<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact';

    protected $allowedFields = ['id', 'email', 'msg', 'created_at'];

    public function getContact()
    {
        return $this->findAll();
    }
    public function countContact()
    {
        return $this->countAll();
    }
}
