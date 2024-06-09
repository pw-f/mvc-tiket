<?php

require "connection.php";

$role_seeder = "INSERT INTO role (role) VALUES
    ('admin'),
    ('user')";

if ($connection->query($role_seeder) === TRUE) {
    echo "Data inserted successfully into table: role<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

$users_seeder = "INSERT INTO users (nama, password, email, no_telp, id_role) VALUES
    ('John Doe', 'password123', 'john.doe@example.com', '1234567890', 1),
    ('Jane Smith', 'password456', 'jane.smith@example.com', '0987654321', 2)";

if ($connection->query($users_seeder) === TRUE) {
    echo "Data inserted successfully into table: users<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

$destinasi_seeder = "INSERT INTO destinasi (nama_destinasi, deskripsi, url_img) VALUES
    ('Beach Paradise', 'A beautiful beach with crystal clear water.', 'https://media.istockphoto.com/id/1370813651/id/foto/papan-selancar-dan-pohon-palem-di-pantai-di-musim-panas.jpg?s=612x612&w=0&k=20&c=XAB5pY6ZHb13vXvFzYyWMuoOQceSzJHU9ei_t4yMH_w='),
    ('Mountain Escape', 'A serene mountain retreat.', 'https://i.natgeofe.com/n/cfa19a0d-eff0-4628-8fdd-2ad8d66845dd/mountain-range-appenzell-switzerland.jpg')";

if ($connection->query($destinasi_seeder) === TRUE) {
    echo "Data inserted successfully into table: destinasi<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

$tiket_seeder = "INSERT INTO tiket (id_destinasi, nama_tiket, harga) VALUES
    (1, 'Beach Day Pass', 100),
    (2, 'Mountain Weekend Pass', 200)";

if ($connection->query($tiket_seeder) === TRUE) {
    echo "Data inserted successfully into table: tiket<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

$pemesanan_seeder = "INSERT INTO pemesanan (id_users, id_tiket, tanggal_pemesanan) VALUES
    (1, 1, '2024-06-10'),
    (2, 2, '2024-06-11')";

if ($connection->query($pemesanan_seeder) === TRUE) {
    echo "Data inserted successfully into table: pemesanan<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

echo "All data seeded successfully!";
?>
