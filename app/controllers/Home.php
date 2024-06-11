<?php

class Home extends Controller
{
    public function index() 
    {
        $destinasi = $this->model('Destination_model')->destination_all();
        $nav = component('nav-landing');
        $data = [
            'judul' => 'Home',
            'nav' => $nav,
            'destinasi' => $destinasi,
        ];

        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer', $data);
    }
}
