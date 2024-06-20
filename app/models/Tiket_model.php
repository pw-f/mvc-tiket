<?php

class Tiket_model
{
    protected $table = 'tiket';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function tiket_all()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tiket_by_destination($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_destinasi = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->get();
    }
}