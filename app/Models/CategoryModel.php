<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';

    protected $allowedFields = ['id', 'slug', 'name_category'];

    public function getCategory()
    {
        return $this->findAll();
    }
}
