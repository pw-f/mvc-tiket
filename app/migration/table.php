<?php

require "connection.php";

$users = "CREATE TABLE users (
    id int not null primary key auto_increment,
    nama varchar(255) not null,
    password varchar(255) not null,
    email varchar(255) not null unique,
    no_telp varchar(50) not null unique,
    id_role int not null
)";

$role = "CREATE TABLE role (
    id int not null primary key auto_increment,
    role varchar(255) not null
)";

$destinasi = "CREATE TABLE destinasi (
    id int not null primary key auto_increment,
    nama_destinasi varchar(255) not null,
    deskripsi text not null,
    url_img varchar(255) not null
)";

$tiket = "CREATE TABLE tiket (
    id int not null primary key auto_increment,
    id_destinasi int not null,
    nama_tiket varchar(255) not null,
    stok_tiket int not null,
    harga int not null
)";

$pemesanan = "CREATE TABLE pemesanan (
    id int not null primary key auto_increment,
    id_users int not null,
    id_destinasi int not null,
    id_tiket int not null,
    qty int not null,
    total_price int not null,
    bukti_bayar varchar(255) null,
    status_tiket ENUM('diterima', 'menunggu pembayaran', 'dibatalkan') null,
    tanggal_pemesanan datetime null
)";

$contact = "CREATE TABLE contact (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    message TEXT NOT NULL
)";

$tables = [$users, $role, $destinasi, $tiket, $pemesanan, $contact];

foreach ($tables as $insert_syntax) {
    if ($connection->query($insert_syntax) === TRUE) {
        echo "Table created successfully: " . explode(" ", $insert_syntax, 4)[2] . "<br>";
    } else {
        echo "Error creating table: " . $connection->error . "<br>";
    }
}

?>
