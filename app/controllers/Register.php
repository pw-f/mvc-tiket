<?php

class Register extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            redirect('');
        }
    }

    public function index()
    {
        $data['judul'] = 'Register';
        $this->view('template/header', $data);
        $this->view('auth/register');
    }

    public function store()
    {
        if ($this->model('Auth_model')->register($_POST) > 0) {
            Flasher::set('success', 'Register success, please login');
            redirect('login');
        }
    }
}