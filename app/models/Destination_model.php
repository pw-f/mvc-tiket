<?php

class Destination_model 
{
    protected $table = 'destinasi';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function destination_all()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function detail($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}