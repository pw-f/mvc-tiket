<?php

require "connection.php";

$users = "CREATE TABLE users (
    id int not null primary key auto_increment,
    nama varchar(255) not null,
    password varchar(255) not null,
    email varchar(255) not null,
    no_telp varchar(50) not null,
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
    harga int not null
)";

$pemesanan = "CREATE TABLE pemesanan (
    id int not null primary key auto_increment,
    id_users int not null,
    id_tiket int not null,
    tanggal_pemesanan date not null
)";

$tables = [$users, $role, $destinasi, $tiket, $pemesanan];

foreach ($tables as $insert_syntax) {
    if ($connection->query($insert_syntax) === TRUE) {
        echo "Table created successfully: " . explode(" ", $insert_syntax, 4)[2] . "<br>";
    } else {
        echo "Error creating table: " . $connection->error . "<br>";
    }
}

?>
