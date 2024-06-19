<?php

class Destinasi extends Controller
{
    public function index()
    {
        $destinasi = $this->model('Destination_model')->destination_all();
        $data = [
            'judul' => 'Destinasi',
            'destinasi' => $destinasi,
        ];

        $this->view('template/header', $data);
        $this->view('home/destinasi', $data);
        $this->view('template/footer', $data);
    }
}