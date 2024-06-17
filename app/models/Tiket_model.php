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
}