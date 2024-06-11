<?php

class Home extends Controller
{
    public function index() 
    {      
        $data = [
            'judul' => 'Home',
            'nav' => component('modal-landing'),
            'modal' => component('nav-landing'),
            'destinasi' => $this->model('Home_model')->destination(),
        ];

        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer', $data);
    }
}
