<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ContactController extends BaseController
{
    public function index()
    {
        $session = session();
        // Kiểm tra xem 'infoUser' tồn tại và 'logged_in' là false
        if (!$session->has('infoUser') || $session->get('infoUser')['logged_in'] === false) {
            //----------------------------------------------//
            return redirect()->to(base_url() . 'admin/login');
            //----------------------------------------------//
        } else {
            //--------------------------------------------------------------------------------------//
            $modelContact = model(ContactModel::class);
            $data = [
                'contact' => $modelContact->getContact(),
            ];
            return view('admin/includes/header')
                . view('admin/contact', $data)
                . view('admin/includes/footer');
            //--------------------------------------------------------------------------------------//
        }
    }

    public function handle_status($id) 
    {
        $model = model(ContactModel::class);
        $data = [
            'status' => true,
        ];
        $model->update($id, $data);
        //------------------------------------------------------------------------ //
        return redirect()->to(base_url() . 'admin/contact')->with('success', 'Cập nhật trạng thái thành công');
    }
}
