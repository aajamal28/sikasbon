<?php

namespace App\Controllers;

class Home extends BaseController
{
    function __construct()
    {
        //$request = \Config\Services::request();
    }

    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
        return view('main',$data);
    }
}
