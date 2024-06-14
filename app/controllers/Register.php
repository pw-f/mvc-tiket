<?php

class Register extends Controller
{
    public function index()
    {
        $data['judul'] = 'Register';
        $this->view('template/header', $data);
        $this->view('auth/register');
    }

    public function store()
    {
        if ($this->model('Register_model')->register($_POST) > 0) {
            // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            redirect('login');
        }
    }
}