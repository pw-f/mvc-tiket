<?php

class Pemesanan_model
{
    private $table = 'pemesanan';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
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

    public function update($data)
    {
        $query = "UPDATE $this->table SET
                    status_tiket = :status_tiket
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('status_tiket', $data['status_tiket']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function get_by_id_user($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_users = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function add_pemesanan($data)
    {
        $query = "INSERT INTO $this->table (id_users, id_destinasi, id_tiket, qty, total_price, bukti_bayar, status_tiket, tanggal_pemesanan)
                    VALUES
                    (:id_user, :id_destinasi, :id_tiket, :qty, :total_price, :bukti_bayar, :status_tiket , now())";
        $this->db->query($query);
        $this->db->bind('id_user', (int)$data['id_user']);
        $this->db->bind('id_destinasi', (int)$data['id_destinasi']);
        $this->db->bind('id_tiket', (int)$data['id_tiket']);
        $this->db->bind('qty', (int)$data['qty']);
        $this->db->bind('total_price', (int)$data['total_price']);
        $this->db->bind('bukti_bayar', null);
        $this->db->bind('status_tiket', "menunggu pembayaran");
        $this->db->execute();
        return $this->db->lastInsertId();
    }

    public function add_bukti_bayar($data)
    {
        $query = "UPDATE pemesanan SET bukti_bayar = :bukti_bayar, status_tiket = :status_tiket WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('status_tiket', "diproses");
        $this->db->bind('bukti_bayar', $data['bukti_bayar']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function batal_status($id)
    {
        $query = "UPDATE pemesanan SET status_tiket = :status_tiket WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('status_tiket', "dibatalkan");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_status($data)
    {
        $query = "UPDATE pemesanan SET status_tiket = :status_tiket WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['pemesanan']['id']);
        $this->db->bind('status_tiket', $data['status_tiket']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}