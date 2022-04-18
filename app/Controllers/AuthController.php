<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JuriModel;
use App\Models\PertandinganModel;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $user;
    protected $juri;
    protected $pertandingan;
    function __construct()
    {
        $this->user = new UserModel();
        $this->juri = new JuriModel();
        $this->pertandingan = new PertandinganModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/index', $data);
    }
    public function loginProcess()
    {
        $username = $this->request->getVar('username');
        $password = sha1($this->request->getVar('password'));
        $cek = $this->user->where(['username' => $username, 'password' => $password])->first();
        if (!empty($cek)) {
            if ($cek['level'] == 'MOD') {
                session()->set([
                    'id_user' => $cek['id_user'],
                    'nama' => $cek['nama'],
                    'username' => $cek['username'],
                    'status' => $cek['user_status'],
                ]);
                return redirect()->to(base_url('/moderator-page'));
            }else if ($cek['level'] == 'WAS') {
                $p = $this->pertandingan->where(['id_user' => $cek['id_user'], 'status' => 'berlangsung'])->first();
                session()->set([
                    'id_user' => $cek['id_user'],
                    'nama' => $cek['nama'],
                    'username' => $cek['username'],
                    'status' => $cek['user_status'],
                    'id_pertandingan' => $p['id_pertandingan']
                ]);
                return redirect()->to(base_url('/wasit-page'));
            }else{
                $p = $this->juri->where(['id_user' => $cek['id_user'], 'status' => 'berlangsung'])->first();
                session()->set([
                    'id_user' => $cek['id_user'],
                    'nama' => $cek['nama'],
                    'username' => $cek['username'],
                    'status' => $cek['user_status'],
                    'id_pertandingan' => $p['id_pertandingan']
                ]);
                return redirect()->to(base_url('/juri-page'));
            }
        }else{
            session()->setFlashdata('failed', 'Username atau Password salah.');
            return redirect()->to(base_url('/'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
