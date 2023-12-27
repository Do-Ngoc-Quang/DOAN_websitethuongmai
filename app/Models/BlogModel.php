<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';

    protected $allowedFields = ['id', 'title', 'description', 'detail', 'img', 'auther', 'category_id', 'created_at'];

    public function getBlog()
    {
        return $this->findAll();
    }

    public function getBlogById($id)
    {
        return $this->find($id);
    }

    public function countBlog()
    {
        return $this->countAll();
    }
}
