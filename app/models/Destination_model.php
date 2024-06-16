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

    public function save($data)
    {
        $query = "INSERT INTO $this->table (nama_destinasi, deskripsi, url_img) VALUES (:nama_destinasi, :deskripsi, :url_img)";
        $this->db->query($query);
        $this->db->bind('nama_destinasi', $data['nama_destinasi']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('url_img', $data['url_img']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE $this->table SET nama_destinasi = :nama_destinasi, deskripsi = :deskripsi, url_img = :url_img WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_destinasi', $data['nama_destinasi']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('url_img', $data['url_img']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}