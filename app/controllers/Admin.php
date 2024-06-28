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
        $this->render('admin/pemesanan/index');
    }
    /**
     * end part of pemesanan
     */
}