<?php

class Home extends Controller
{
    public function index() 
    {
        $destinasi = $this->model('Destination_model')->destination_all();
        $data = [
            'judul' => 'Home',
            'destinasi' => $destinasi,
        ];

        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer', $data);
    }

    public function contact()
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'message' => $_POST['message']
        ];

        $send = $this->model('Contact_model')->addMessage($data);
        if ($send > 0) {
            Flasher::set('success', 'Message sent successfully');
            redirect('home/index');
        }
    }
}
