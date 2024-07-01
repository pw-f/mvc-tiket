<?php

class Admin extends AdminController
{
    public function index()
    {
        $data = [
            'coment' => $this->model('Contact_model')->getMessages()
        ];
        $this->render('admin/index', $data);
    }


    /**
     * all about destinasi start here
     */
    public function destination()
    {
        $data = [
            'destination' => $this->model('Destination_model')->destination_all()
        ];
        $this->render('admin/destination/index', $data);
    }

    public function destination_create()
    {
        $this->render('admin/destination/create');
    }

    public function destination_store()
    {
        //dir itu direktori local tempat gambar nanti tersimpan
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/mvc-tiket/public/assets/upload';
        //disini hanya akan mengembalikan nama image setelah image tersimpan
        $imageName = uploadFile($_FILES['url_img'], $dir);
        if ($imageName === false) {
            return redirect('admin/destination_create');
        }
        $data = [
            'nama_destinasi' => $_POST['nama_destinasi'],
            'deskripsi' => $_POST['deskripsi'],
            //url image diolah dari local menjadi localhost agar gambar bisa di tampilkan
            'url_img' => STORAGE_IMG_UPLOAD . '/' . $imageName
        ];
        if ($this->model('Destination_model')->save($data) > 0) {
            Flasher::set('success', 'Berhasil Menambah Destinasi');
            return redirect('admin/destination/index');
        }
        
    }

    public function destination_edit($id)
    {
        $data = [
            'destination' => $this->model('Destination_model')->detail($id)
        ];
        $this->render('admin/destination/edit', $data);
    }

    public function destination_update($id)
    {
        $gambarLama = $_POST['gambar_lama'];
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/mvc-tiket/public/assets/upload';
        if ($_FILES['url_img']['error'] === 4) {
            $image = $gambarLama;
        } else {
            $imageName = uploadFile($_FILES['url_img'], $dir);
            $image = STORAGE_IMG_UPLOAD . '/' . $imageName;
        }
        if ($image === false) {
            return redirect('admin/destination_edit/' . $id);
        }
        $data = [
            'id' => $id,
            'nama_destinasi' => $_POST['nama_destinasi'],
            'deskripsi' => $_POST['deskripsi'],
            'url_img' => $image
        ];
        if ($this->model('Destination_model')->update($data) > 0) {
            Flasher::set('success', 'Berhasil Mengupdate Destinasi');
            return redirect('admin/destination/index');
        }
    }

    public function destination_delete($id)
    {
        if($this->model('Destination_model')->delete($id) > 0) {
            Flasher::set('success', 'Berhasil Menghapus Destinasi');
            redirect('admin/destination/index');
        }
    }
    /**
     * end part of destination
     */


    /**
     * part of tiket
     */
    public function tiket()
    {
        $data = [
            'destination' => $this->model('Destination_model')->destination_all(),
            'tiket' => $this->model('Tiket_model')->tiket_all()
        ];
        $this->render('admin/tiket/index', $data);
    }

    public function tiket_detail($id)
    {
        $param = (int) $id;
        $data = [
            'id' => $param,
            'destination' => $this->model('Destination_model')->detail($param),
            'tiket' => $this->model('Tiket_model')->tiket_by_destination($param)
        ];
        $this->render('admin/tiket/detail', $data);
    }

    public function tiket_create($id)
    {
        $data = [
            'destination' => $this->model('Destination_model')->detail($id)
        ];
        $this->render('admin/tiket/create', $data);
    }

    public function tiket_store()
    {
        // dd($_POST);
        if ($this->model('Tiket_model')->save($_POST) > 0) {
            Flasher::set('success', 'Berhasil Menambah Tiket');
            return redirect('admin/tiket/index');
        }
    }

    public function tiket_edit($id)
    {
        $tiket = [
            'tiket' => $this->model('Tiket_model')->detail($id),
        ];
        $destinasi = [
            'destination' => $this->model('Destination_model')->detail($tiket['tiket']['id_destinasi'])
        ];
        $data = array_merge($tiket, $destinasi);
        $this->render('admin/tiket/edit', $data);
    }

    public function tiket_update()
    {
        if ($this->model('Tiket_model')->update($_POST) > 0) {
            Flasher::set('success', 'Berhasil Mengupdate Tiket');
            return redirect('admin/tiket/index');
        }
    }

    public function tiket_delete($id)
    {
        if($this->model('Tiket_model')->delete($id) > 0) {
            Flasher::set('success', 'Berhasil Menghapus Tiket');
            redirect('admin/tiket/index');
        }
    }
    /**
     * end part of tiket
     */


    /**
     * part of pemesanan
     */
    public function pemesanan()
    {
        $pemesanan = $this->model('Pemesanan_model')->getAll();
        
        $detailedOrders = [];

        foreach ($pemesanan as $order) {
            $user = $this->model('Auth_model')->user_by_id($order['id_users']);
            $destinasi = $this->model('Destination_model')->detail($order['id_destinasi']);
            $tiket = $this->model('Tiket_model')->detail($order['id_tiket']);

            $detailedOrders[] = [
                'id' => $order['id'],
                'nama_user' => $user['nama'],
                'nama_destinasi' => $destinasi['nama_destinasi'],
                'tiket_dipesan' => $tiket['nama_tiket'],
                'jumlah_tiket_qty' => $order['qty'],
                'total_bayar' => $order['total_price'],
                'bukti_bayar' => $order['bukti_bayar'],
                'status_tiket' => $order['status_tiket'],
                'tanggal_pemesanan' => $order['tanggal_pemesanan']
            ];
        }

        $data = [
            'pemesanan' => $detailedOrders
        ];

        $this->render('admin/pemesanan/index', $data);
    }


    public function pemesanan_detail($id)
    {
        $data = [
            'pemesanan' => $this->model('Pemesanan_model')->detail($id),
        ];
        $user = $this->model('Auth_model')->user_by_id($data['pemesanan']['id_users']);
        $destinasi = $this->model('Destination_model')->detail($data['pemesanan']['id_destinasi']);
        $tiket = $this->model('Tiket_model')->detail($data['pemesanan']['id_tiket']);
        
        $data = array_merge($data, [
            'user' => $user,
            'destinasi' => $destinasi,
            'tiket' => $tiket
        ]);
        $this->render('admin/pemesanan/detail', $data);
    }

    public function pemesanan_update()
    {
        $data = [
            'pemesanan' => $this->model('Pemesanan_model')->detail($_POST['id']),
            'status_tiket' => $_POST['status_tiket']
        ];
        $user = $this->model('Auth_model')->user_by_id($data['pemesanan']['id_users']);
        $destinasi = $this->model('Destination_model')->detail($data['pemesanan']['id_destinasi']);
        $tiket = $this->model('Tiket_model')->detail($data['pemesanan']['id_tiket']);
        
        $data = array_merge($data, [
            'user' => $user,
            'destinasi' => $destinasi,
            'tiket' => $tiket
        ]);
        
        // Save ticket codes to pemesanan
        // $ticketCodesString = implode(',', $ticketCodes);
        // dd($ticketCodesString);
        // $this->model('Pemesanan_model')->updateStatus($data['pemesanan']['id'], $data['status_tiket'], $ticketCodesString);
        if($data['status_tiket'] == 'diterima') {
            // Generate ticket codes
            $ticketCodes = $this->generateTicketCodes($data['pemesanan']['id'], $destinasi['nama_destinasi'], $tiket['nama_tiket'], $data['pemesanan']['qty']);
            // Reduce ticket stock
            $this->model('Tiket_model')->reduceStock($data['pemesanan']['id_tiket'], $data['pemesanan']['qty']);
            // Send email to user
            $this->sendEmailToUser($user['email'], $destinasi['nama_destinasi'], $tiket['nama_tiket'], $ticketCodes);
        }

        if ($this->model('Pemesanan_model')->update_status($data) > 0) {
            Flasher::set('success', 'Berhasil Mengupdate Pemesanan');
            return redirect('admin/pemesanan');
        } else {
            Flasher::set('danger', 'Gagal Mengupdate Pemesanan');
            return redirect('admin/pemesanan');
        }
    }

    private function generateTicketCodes($pemesananId, $destinasiName, $ticketName, $qty)
    {
        $ticketCodes = [];
        $prefix = strtoupper(substr($destinasiName, 0, 3)) . strtoupper(substr($ticketName, 0, 3)); // Prefix dari destinasi dan nama tiket, misalnya MFW

        // Get the last ticket code
        $lastTicket = $this->model('Tiket_dipesan_model')->getLastTicketCode($prefix);
        $lastNumber = 0;

        if ($lastTicket) {
            $lastNumber = intval(substr($lastTicket['kode_tiket'], strlen($prefix)));
        }

        for ($i = 1; $i <= $qty; $i++) {
            $lastNumber++;
            $ticketCode = $prefix . str_pad($lastNumber, 3, '0', STR_PAD_LEFT); // Contoh: MFW001, MFW002, ...
            $ticketCodes[] = $ticketCode;

            // Simpan ke dalam tabel tiket
            $this->model('Tiket_dipesan_model')->addTicketCode($pemesananId, $ticketCode, $ticketCode);
        }

        return $ticketCodes;
    }

    /**
     * Generate a QR code for the given ticket code.
     *
     * @param string $ticketCode The ticket code to generate the QR code for.
     * @return string The file path of the generated QR code.
     */
    private function generateQRCode($ticketCode)
    {
        $tiket = $this->model('Tiket_dipesan_model')->get_by_ticket_code($ticketCode);
        
        // Set the path to the temporary directory where the QR code will be stored
        $tempDir = $_SERVER['DOCUMENT_ROOT'] . '/mvc-tiket/public/assets/qr/tmp/';

        // Generate a unique file name for the QR code based on the ticket code
        $fileName = $ticketCode . '.png';

        // Construct the file path for the QR code
        $filePath = $tempDir . $fileName;
        $localPath = BASEURL . '/assets/qr/tmp/' . $fileName;
        
        $data = [
            'id' => $tiket['id'],
            'local_url_qr' => $localPath
        ];
        $this->model('Tiket_dipesan_model')->update_local_qr($data);

        //update googledrive path google_drive_file_id
        // $googledrivepath = GoogleDriveApi::uploadFile($filePath) . $fileName; //salah

        // Generate the QR code
        // QR_ECLEVEL_L is the error correction level, 4 is the QR code size
        QRcode::png($ticketCode, $filePath, QR_ECLEVEL_L, 4);

        return $filePath;
    }


    private function sendEmailToUser($email, $destinasiName, $ticketName, $ticketCodes)
    {
        $subject = "Belitiket - Pesanan Tiket Diterima!";
        $message = "Berikut detail pesanan Anda dengan kode tiketnya:\n\n";
        $message .= $destinasiName . " ~ " . $ticketName . "\n";
        
        foreach ($ticketCodes as $code) {
            $qrCodePath = $this->generateQRCode($code);
            $qrCodeData = base64_encode(file_get_contents($qrCodePath));
            $qrCodeSrc = 'data:image/png;base64,' . $qrCodeData;
            
            $message .= "<p>$code</p>";
            $message .= "<img src='$qrCodeSrc' alt='$code' /><br />";
        }

        $mailer = new Mailer();
        // Contoh penggunaan di dalam controller
        $to = $email;
        $body = $message;

        // dd($body);

        if ($mailer->send($to, $subject, $body)) {
            Flasher::set_user('Pemesanan berhasil!, Email sent successfully!');
        } else {
            Flasher::set_user('Pemesanan gagal!, Failed to send email!');
        }
        // Send email logic here
        // mail($email, $subject, $message);
    }
    /**
     * end part of pemesanan
     */

     /**
     * end part of history pemesanan
     */
    public function history_pemesanan()
    {
        $history_pemesanan = $this->model('Tiket_dipesan_model')->getAll();
        // $pemesanan = $this->model('Tiket_dipesan_model')->detail();
        // $users = $this->model('Auth_model')->user_by_id($pemesanan['id_users']);
        $data = [
            'history_pemesanan' => $history_pemesanan,
            // 'user' => $users
        ];
        dd($data);
        
        $this->render('admin/pemesanan/history', $data);
    }
    /**
     * end part of history pemesanan
     */
}