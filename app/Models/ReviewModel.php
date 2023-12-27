<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'review_product';

    protected $allowedFields = ['id', 'id_product', 'review', 'name', 'email', 'created_at'];

    public function getReview()
    {
        return $this->findAll();
    }

    public function getReviewById($id)
    {
        return $this->find($id);
    }
    public function countReview()
    {
        return $this->countAll();
    }
}
