<?php

class Register_model
{
    protected $table = 'users';
    protected $db;
    protected $user = USER_ROLE;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function register($data)
    {
        $query = "INSERT INTO $this->table (nama, password, email, no_telp, id_role) VALUES (:nama, :password, :email, :no_telp, $this->user)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}