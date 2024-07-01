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
        $this->view('auth/register');
    }

    public function store()
    {
        if($this->model('Auth_model')->checkEmail($_POST['email'])) {
            Flasher::set('danger', 'Email already used');
            redirect('register');
        }
        if ($this->model('Auth_model')->register($_POST) > 0) {
            Flasher::set('success', 'Register success, please login');
            redirect('login');
        }
    }
}