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

    public function detail($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function save($data)
    {
        $query = "INSERT INTO $this->table (id_destinasi, nama_tiket, stok_tiket, harga) VALUES (:id_destinasi, :nama_tiket, :stok_tiket, :harga)";
        $this->db->query($query);
        $this->db->bind('id_destinasi', $data['id_destinasi']);
        $this->db->bind('nama_tiket', $data['nama_tiket']);
        $this->db->bind('stok_tiket', $data['stok_tiket']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE " . $this->table . " SET id_destinasi = :id_destinasi, nama_tiket = :nama_tiket, stok_tiket = :stok_tiket, harga = :harga WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_destinasi', $data['id_destinasi']);
        $this->db->bind('nama_tiket', $data['nama_tiket']);
        $this->db->bind('stok_tiket', $data['stok_tiket']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}