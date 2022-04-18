<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JuriModel;
use App\Models\PertandinganModel;
use App\Models\UserModel;

class ModeratorController extends BaseController
{
    protected $user;
    protected $pertandingan;
    protected $juri;
    function __construct()
    {
        $this->user = new UserModel();
        $this->pertandingan = new PertandinganModel();
        $this->juri = new JuriModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Moderator Page',
            'juri' => $this->user->where(['level' => 'JUR', 'user_status' => 'free'])->findAll(),
            'wasit' => $this->user->where(['level' => 'WAS', 'user_status' => 'free'])->findAll(),
            'pertandingan' => $this->pertandingan->pertandingan(),
            'valid' => \Config\Services::validation()
        ];
        return view('moderator/index', $data);
    }
    public function add_pertandingan()
    {
        if (!$this->validate([
            'pemain1' => [
                'rules' => 'required|alpha_numeric_space',
                'errors' => [
                    'required' => 'Field harus diisi',
                    'alpha_numeric_space' => 'Mengandung karakter yang dilarang'
                ]
            ],
            'pemain2' => [
                'rules' => 'required|alpha_numeric_space',
                'errors' => [
                    'required' => 'Field harus diisi',                    
                    'alpha_numeric_space' => 'Mengandung karakter yang dilarang'
                ]
            ],
            'kelas' => [
                'rules' => 'required|alpha_numeric_space',
                'errors' => [
                    'required' => 'Field harus diisi',                    
                    'alpha_numeric_space' => 'Mengandung karakter yang dilarang'
                ]
            ],
            'juri1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',                    
                ]
            ],
            'juri2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',                    
                ]
            ],
            'juri3' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',                    
                ]
            ],
            'juri4' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',                    
                ]
            ],
            'juri5' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',                    
                ]
            ],
            'wasit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',                    
                ]
            ],
        ])) {
            return redirect()->to(base_url('/moderator-page'))->withInput();
        }        
        $id_wasit = $this->request->getVar('wasit');        
        for ($i=1; $i<=5 ; $i++) { 
            $id_juri = $this->request->getVar('juri'.$i);
            $this->juri->insert([                
                'id_user' => $id_juri,
                'status' => 'berlangsung',
                'id_pertandingan' => 0
            ]);        
        }        
        $kelas = $this->request->getVar('kelas');
        $pemain1 = $this->request->getVar('pemain1');
        $pemain2 = $this->request->getVar('pemain2');
        $this->pertandingan->insert([
            'id_user' => $id_wasit,            
            'pemain1' => $pemain1,
            'pemain2' => $pemain2,
            'kelas' => $kelas,
            'status' => 'berlangsung'
        ]);
        session()->setFlashdata('success', 'Pertandingan berhasil di Tambahkan');
        return redirect()->to(base_url('/moderator-page'));
    }
    public function delete_pertandingan($id)
    {
        $this->pertandingan->delete($id);        
        session()->setFlashdata('success', 'Pertandingan berhasil di Hapus');
        return redirect()->to(base_url('/moderator-page'));
    }
}
