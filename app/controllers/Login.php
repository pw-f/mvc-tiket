<?php

class Login extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            redirect('');
        }
    }
    public function index()
    {
        $this->view('auth/login');
    }

    public function store()
    {
        $user = $this->model('Auth_model')->login($_POST);
        if ($user == null) {
            Flasher::set('danger', 'Login failed');
            redirect('login');
        }
        $role = $user['id_role'];
        if ($role === 1) {
            Flasher::set('success', 'Login success');
            login($user);
            redirect('admin/index');
        }
        Flasher::set('success', 'Login success');
        login($user);
        redirect('home/index');
    }
}