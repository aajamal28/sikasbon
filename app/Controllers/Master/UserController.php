<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\DivisiModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $divModel;
    protected $usrModel;

    function __construct()
    {
        $this->divModel = new DivisiModel();
        $this->usrModel = new UserModel();
    }

    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
        $data['user'] = $this->usrModel->getUser();
        return view('master/user_list',$data);
    }

    public function register()
    {
        $data['uri'] = $this->request->uri->getSegments();
        $data['role'] = [
            [
                "code" => "R00",
                "name" => "Superuser"
            ],
            [
                "code" => "R01",
                "name" => "User"
            ],
            [
                "code" => "R02",
                "name" => "Manager"
            ],
            [
                "code" => "R03",
                "name" => "Kasir"
            ],
            [
                "code" => "R04",
                "name" => "Acc Ldr."
            ],
            [
                "code" => "R05",
                "name" => "Acc Mgr."
            ],
            [
                "code" => "R06",
                "name" => "Director"
            ],
        ];
        $data['divisi'] = $this->divModel->getDivisi();
        return view('master/user_register',$data);
    }

    public function save()
    {
        $post = $this->request->getPost();
        $dataUser = [
            "usr_id" => $post['usrId'],
            "usr_name" => $post['usrName'],
            "usr_dvid" => $post['usrDiv'],
            "usr_mail" => $post['usrMail'],
            "usr_phone" => $post['usrPhone'],
            "usr_telegram" => $post['usrTelegram'],
            "usr_role" => $post['usrRole'],
            "usr_password" => password_hash($post['usrId'],PASSWORD_DEFAULT)
        ];
        $this->usrModel->saveUser($dataUser);
        session()->setFlashdata("success", "User berhasil disimpan!!!");
		return redirect()->to(site_url('/master/user/list'));
    }
}
