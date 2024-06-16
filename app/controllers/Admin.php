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
        // $dir = $_SERVER['DOCUMENT_ROOT'] . '/mvc-tiket/public/assets/upload';
        // $image = uploadFile($_FILES['url_img'], $dir);
        // dd($image);
        $data = [
            'nama_destinasi' => $_POST['nama_destinasi'],
            'deskripsi' => $_POST['deskripsi'],
            'url_img' => $_POST['url_img']
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
        $data = [
            'id' => $id,
            'nama_destinasi' => $_POST['nama_destinasi'],
            'deskripsi' => $_POST['deskripsi'],
            'url_img' => $_POST['url_img']
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
}