<?php 

class AdminController extends Controller
{
    public function __construct()
    {
        // dd($_SESSION);
        admin_only();
    }
    
    protected function render($view, $data = [])
    {
        $this->view('admin/template/header');
        $this->view($view,$data);
        $this->view('admin/template/footer');
    }
}