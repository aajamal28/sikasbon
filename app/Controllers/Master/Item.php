<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;

class Item extends BaseController
{
    public function index()
    {
        $data['uri'] = $this->request->uri->getSegments();
        return view('master/item_list',$data);
    }
}
