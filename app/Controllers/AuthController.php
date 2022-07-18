<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $usrModel;

    function __construct()
    {
        $this->usrModel = new UserModel();
    }

    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $user = $this->request->getPost('usrNik');
        $pwd = $this->request->getPost('usrPassword');

        $cek = $this->usrModel->getUser($user);

        if (!$cek) {
            $session->setFlashdata('msg', 'User tidak terdaftar!!!');
            return redirect()->to('/');
        } else {
            $pass = $cek['usr_password'];
            $verify = password_verify($pwd, $pass);
            if ($verify) {
                $ses_data = [
                    'usrid'       => $cek['usr_id'],
                    'name'    => $cek['usr_name'],
                    'role'    => $cek['usr_role'],
                    'div'   => $cek['usr_dvid'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                if ($cek['usr_role'] != 'R00') {
                    return redirect()->to('/transaction/overview');
                } else {
                    return redirect()->to('/home');
                }
            } else {
                $session->setFlashdata('msg', 'Password anda salah');
                return redirect()->to('/');
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
