<?php

class Pesan extends Controller
{
    public function __construct()
    {
        login_required();
    }

    public function tiket($params = null) 
    {
        $destination = $this->model('Destination_model')->detail($params);
        $tiket = $this->model('Tiket_model')->tiket_by_destination($params);
        $destinasi = $this->model('Destination_model')->destination_all();
        $data = [
            'judul' => 'Pemesanan tiket',
            'destination' => $destination,
            'tiket' => $tiket,
            'destinasi' => $destinasi
        ];

        $this->view('template/header', $data);
        $this->view('pesan/tiket', $data);
        $this->view('template/footer', $data);
    }

    public function confirm()
    {
        // dapatkan info user login
        $user_id = $_SESSION['user']['id'];
        $user = $this->model('Auth_model')->user_by_id($user_id);

        // dapatkan info tiket,jumlah tiket dipesan dan destinasi
        $ticket_id = $_POST['ticket_id'];
        $qty = $_POST['quantity'];
        $total_price = $_POST['total_price'];
        $destination_id = $_POST['destination_id'];

        //ambil data tiket dan destinasi
        $tiket = $this->model('Tiket_model')->detail($ticket_id);
        $destination = $this->model('Destination_model')->detail($destination_id);
        
        $data = [
            'judul' => 'Konfirmasi pemesanan tiket',
            'user' => $user,
            'tiket' => $tiket,
            'qty' => $qty,
            'total_price' => $total_price,
            'destination' => $destination
        ];

        $this->view('template/header', $data);
        $this->view('pesan/confirm', $data);
    }

    public function pemesanan()
    {
        if($this->model('Pemesanan_model')->add_pemesanan($_POST) > 0) {
            Flasher::set_user('Tiket Berhasil Dipesan mohon lanjutkan Pembayaran');
            return redirect('pesan/bukti_bayar');
        }
    }

    public function bukti_bayar()
    {
        $pemesanan_user = $this->model('Pemesanan_model')->get_by_id_user($_SESSION['user']['id']);

        $data = [
            'judul' => 'Bukti Bayar',
            'pemesanan_user' => $pemesanan_user
        ];
        $this->view('template/header', $data);
        $this->view('pesan/bukti_bayar', $data);
    }

    public function update_bukti_bayar()
    {
        dd($_POST);
        if($this->model('Pemesanan_model')->add_bukti_bayar($_POST) > 0) {
            Flasher::set_user('Bukti Bayar Berhasil Tersimpan');
            return redirect('home');
        }
    }
}
