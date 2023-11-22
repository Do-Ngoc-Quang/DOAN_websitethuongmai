<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function view($page = 'index')
    {
        $data['title']="Xây dựng website thương mại";
        return view('templates/header',$data)
        .view('pages/'.$page,$data)
        .view('templates/footer',$data);
    }
}