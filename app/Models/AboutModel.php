<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table = 'about';

    protected $allowedFields = ['id', 'title', 'description', 'img'];

    public function getAbout()
    {
        return $this->findAll();
    }
    public function countAbout()
    {
        return $this->countAll();
    }
}
