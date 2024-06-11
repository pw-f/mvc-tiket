<?php

class Pesan extends Controller
{
    public function index() 
    {
        echo "Pemesanan tiket wisata";
    }

    public function tiket($params = null) 
    {
        $tiket = "tiket ke -" . $params;
        $destinasi = $this->model('Destination_model')->detail($params);
        // $tiket = $this->model('Home_model')->tiket($params);
        $data = [
            'judul' => 'Pemesanan tiket',
            'destinasi' => $destinasi,
            'tiket' => $tiket
        ];

        $this->view('template/header', $data);
        $this->view('pesan/tiket', $data);
    }
}
