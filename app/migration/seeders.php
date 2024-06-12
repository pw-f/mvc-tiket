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
    ('Mountain Escape', 'A serene mountain retreat.', 'https://i.natgeofe.com/n/cfa19a0d-eff0-4628-8fdd-2ad8d66845dd/mountain-range-appenzell-switzerland.jpg'),
    ('Ubud Waterfall','Inland Ubud and the surrounding area form Bali cultural heartland. Ubud is home to a huge number of temples, museums and art galleries.','https://deih43ym53wif.cloudfront.net/tegenungan-waterfall-on-petanu-river-kemenuh-ubud-bali-shutterstock_2299217401.jpg_ce45150648.jpg'),
    ('Garuda Wisnu Kencana (GWK)','Taman Budaya Garuda Wisnu Kencana, atau kerap disebut dengan GWK, adalah sebuah taman wisata budaya di bagian selatan pulau Bali.','https://img.okezone.com/content/2022/11/12/408/2706261/5-fakta-menarik-patung-gwk-venue-santap-malam-para-delegasi-g20-FWdOjzKWuI.JPG'),
    ('Kebun Raya Bedugul','Kebun Raya Eka Karya Bali atau kadang disebut Kebun Raya Bedugul adalah sebuah kebun botani terbesar di Indonesia yang terletak di Desa Candikuning, Kecamatan Baturiti, Kabupaten Tabanan, Bali berjarak sekitar 60 km dari Denpasar. Kebun ini merupakan kebun raya pertama yang didirikan oleh putra bangsa Indonesia.','https://blog.pigijo.com/wp-content/uploads/2021/11/cover4.png'),
    ('Taman Ujung','Taman Ujung atau Taman Sukasada, adalah sebuat taman di banjar Ujung, desa Tumbu, kecamatan Karangasem, Karangasem, Bali. Taman ini terletak sekitar 5 km di sebelah tenggara kota Amlapura. Pada masa Hindia Belanda tempat ini dikenal dengan nama Waterpaleis atau istana air.','https://cdn.idntimes.com/content-images/post/20220111/242058449-586436432538663-1368554818866556631-n-cd5e6aa72f53b7b70d470fd3bf5ce72f_600x400.jpg')";

if ($connection->query($destinasi_seeder) === TRUE) {
    echo "Data inserted successfully into table: destinasi<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

$tiket_seeder = "INSERT INTO tiket (id_destinasi, nama_tiket, harga) VALUES
    (1, 'Beach Day Pass', 100),
    (1, 'Beach Night Pass', 150),
    (2, 'Mountain Day Pass', 150),
    (2, 'Mountain Weekend Pass', 200),
    (3, 'Ubud Waterfall Day Pass', 100),
    (3, 'Ubud Waterfall Weekend Pass', 150),
    (4, 'GWK Day Pass', 100),
    (4, 'GWK Weekend Pass', 150),
    (5, 'Kebun Raya Day Pass', 100),
    (5, 'Kebun Raya Weekend Pass', 150),
    (6, 'Taman Ujung Day Pass', 100),
    (6, 'Taman Ujung Weekend Pass', 150)";

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
