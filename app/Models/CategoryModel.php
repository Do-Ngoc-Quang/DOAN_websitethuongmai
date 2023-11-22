<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';

    protected $allowedFields = ['id', 'name_category'];

    public function getCategory()
    {
        return $this->findAll();
    }

}
