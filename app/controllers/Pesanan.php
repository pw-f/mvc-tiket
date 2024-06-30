<?php

class Pesanan extends Controller
{
    public function index()
    {
        $pesanan = $this->model('Pemesanan_model')->get_by_id_user($_SESSION['user']['id']);
        foreach ($pesanan as $key => $value) {
            $pesanan[$key]['tiket'] = $this->model('Tiket_model')->detail($value['id_tiket']);
            $pesanan[$key]['destinasi'] = $this->model('Destination_model')->detail($value['id_destinasi']);
        }

        $data = [
            'judul'  => 'Pesanan Saya',
            'pesanan' => $pesanan,
        ];

        $this->view('template/header', $data);
        $this->view('pesanan/index', $data);
    }
}