<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comment';

    protected $allowedFields = ['id', 'blog_id', 'cmt', 'name', 'email', 'created_at'];

    public function getComment()
    {
        return $this->findAll();
    }

    public function getCommentById($id)
    {
        return $this->find($id);
    }

}
