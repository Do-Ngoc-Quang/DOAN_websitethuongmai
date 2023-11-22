<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'users';

    protected $allowedFields = ['id', 'user_name', 'user_email', 'user_password', 'user_role'];

    public function checkUser($user_name, $user_password)
    {
        $user = $this->where(['user_name' => $user_name])->first();

        if ($user && password_verify($user_password, $user['user_password'])) {
            return $user;
        }

        return null;
    }


    // public function checkUser($user_name)
    // {
    //     return $this->where(['user_name' => $user_name])->first();
    // }

}