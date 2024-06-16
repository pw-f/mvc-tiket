<?php

class Contact_model
{
    protected $table = 'contact';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMessages()
    {
        $query = "SELECT * FROM $this->table";
        $this->db->query($query);
        return $this->db->get();
    }

    public function addMessage($data)
    {
        $query = "INSERT INTO  $this->table (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('message', $data['message']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
?>
