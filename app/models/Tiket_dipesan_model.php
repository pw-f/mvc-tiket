<?php

class Tiket_dipesan_model
{
    protected $db;
    protected $table = 'tiket_dipesan';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
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

    public function getLastTicketCode($prefix)
    {
        $this->db->query("SELECT kode_tiket FROM " . $this->table . " WHERE kode_tiket LIKE :prefix ORDER BY kode_tiket DESC LIMIT 1");
        $this->db->bind('prefix', $prefix . '%');
        return $this->db->single();
    }

    public function addTicketCode($id_pemesanan, $kode_tiket)
    {
        $this->db->query("INSERT INTO $this->table (id_pemesanan, kode_tiket) VALUES (:id_pemesanan, :kode_tiket)");
        $this->db->bind('id_pemesanan', $id_pemesanan);
        $this->db->bind('kode_tiket', $kode_tiket);
        $this->db->execute();
    }

    public function update_local_qr($data)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET local_url_qr = :local_url_qr WHERE id = :id');
        $this->db->bind('local_url_qr', $data['local_url_qr']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
    }

    public function get_by_ticket_code($kode_tiket)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_tiket = :kode_tiket');
        $this->db->bind('kode_tiket', $kode_tiket);
        return $this->db->single();
    }
}