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
        $pemesananId = $this->model('Pemesanan_model')->add_pemesanan($_POST);
        if ($pemesananId > 0) {
            $_SESSION['pemesanan'] = $_POST;
            $_SESSION['pemesanan']['id'] = $pemesananId;

            Flasher::set_user('Tiket Berhasil Dipesan mohon lanjutkan Pembayaran');
            return redirect('pesan/bukti_bayar');
        } else {
            // Handle error jika pemesanan gagal
            Flasher::set_user('Tiket Gagal Dipesan, silahkan coba lagi.');
            return redirect('pesan/pemesanan');
        }
    }

    public function bukti_bayar()
    {
        $pemesanan_data = isset($_SESSION['pemesanan']) ? $_SESSION['pemesanan'] : null;
        $id_tiket = $pemesanan_data['id_tiket'];
        $id_destinasi = $pemesanan_data['id_destinasi'];
        $id_user = $pemesanan_data['id_user'];
        $qty = $pemesanan_data['qty'];
        $total_price = $pemesanan_data['total_price'];

        $id_pemesanan = $_SESSION['pemesanan']['id'];

        $tiket = $this->model('Tiket_model')->detail($id_tiket);
        $destinasi = $this->model('Destination_model')->detail($id_destinasi);
        $user = $this->model('Auth_model')->user_by_id($id_user);

        $data = [
            'judul' => 'Bukti Bayar',
            'pemesanan_data' => $pemesanan_data,
            'id_pemesanan' => $id_pemesanan,
            'tiket' => $tiket,
            'destinasi' => $destinasi,
            'user' => $user,
            'qty' => $qty,
            'total_price' => $total_price
        ];

        $this->view('template/header', $data);
        $this->view('pesan/bukti_bayar', $data);
    }

    public function bukti_bayar_2()
    {
        $pemesanan_data = $this->model('Pemesanan_model')->detail($_POST['id']);
        $id_tiket = $pemesanan_data['id_tiket'];
        $id_destinasi = $pemesanan_data['id_destinasi'];
        $id_user = $pemesanan_data['id_users'];
        $qty = $pemesanan_data['qty'];
        $total_price = $pemesanan_data['total_price'];

        $id_pemesanan = $_POST['id'];

        $tiket = $this->model('Tiket_model')->detail($id_tiket);
        $destinasi = $this->model('Destination_model')->detail($id_destinasi);
        $user = $this->model('Auth_model')->user_by_id($id_user);

        $data = [
            'judul' => 'Bukti Bayar',
            'pemesanan_data' => $pemesanan_data,
            'id_pemesanan' => $id_pemesanan,
            'tiket' => $tiket,
            'destinasi' => $destinasi,
            'user' => $user,
            'qty' => $qty,
            'total_price' => $total_price
        ];

        $this->view('template/header', $data);
        $this->view('pesan/bukti_bayar', $data);
    }

    public function batal_pesan()
    {
        $id = $_POST['id'];
        if($this->model('Pemesanan_model')->batal_status($id) > 0){
            Flasher::set_user('Pemesanan dibatalkan');
            return redirect('pesanan');
        }
        
    }

    public function update_bukti_bayar()
    {
        //dir itu direktori local tempat gambar nanti tersimpan
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/mvc-tiket/public/assets/bukti_bayar';
        //disini hanya akan mengembalikan nama image setelah image tersimpan
        $imageName = uploadFile($_FILES['bukti_bayar'], $dir);
        if ($imageName === false) {
            // Flasher::set_user('Gagal upload bukti bayar');
            return redirect('pesan/bukti_bayar');
        }
        $image_bukti = BASEURL . '/assets/bukti_bayar/'. $imageName;
        $id_tiket = (int)$_POST['id_tiket'];
        $id = (int)$_POST['id'];
        //simpan bukti bayar
        $data = [
            'id' => $id,
            'id_tiket' => $id_tiket,
            'bukti_bayar' => $image_bukti
        ];
   
        $send = $this->model('Pemesanan_model')->add_bukti_bayar($data);
        if($send > 0) {
            Flasher::set_user('Bukti Bayar Berhasil Tersimpan!, silahkan menunggu email pemesanan dikonfirmasi');
            unset($_SESSION['pemesanan']);
            return redirect('home/index');
        }
        if($send == 0) {        
            Flasher::set_user('Gagal upload bukti bayar');
            return redirect('pesan/bukti_bayar');
        }
    }
}
