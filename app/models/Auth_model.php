<?php

class Auth_model
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

    public function checkEmail($email)
    {
        $query = "SELECT * FROM $this->table WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function login($data)
    {
        $query = "SELECT * FROM $this->table WHERE email = :email AND password = :password";
        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();
        return $this->db->single();
    }

    public function user_by_id($user_id)
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $user_id);
        $this->db->execute();
        return $this->db->single();
    }
}