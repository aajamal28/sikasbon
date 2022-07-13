<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
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
        return view('master/user_register',$data);
    }
}
