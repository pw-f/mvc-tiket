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
    ('Gua Admin', 'password', 'admin@gmail.com', '087889287608', 1),
    ('Mas User', 'password', 'user1@gmail.com', '08987654321', 2),
    ('Mba User', 'password', 'user2@gmail.com', '08987643221', 2)";

if ($connection->query($users_seeder) === TRUE) {
    echo "Data inserted successfully into table: users<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

$destinasi_seeder = "INSERT INTO destinasi (nama_destinasi, deskripsi, url_img) VALUES
    ('Mertasari Beach', 'Pantai Mertasari merupakan salah satu pantai di Bali yang juga menawarkan keunikan berbeda dengan objek wisata bahari lainnya. Pantai di bagian selatan area Sanur ini sangat ideal sebagai tempat rekreasi dan relaksasi. Selain itu air lautnya cenderung tenang sehingga ramah untuk berenang oleh sebagian besar wisatawan. ', 'https://www.befreetour.com/img/attraction/pantai-mertasari20191023164721.jpg'),
    ('Monkey Forest', 'The Sacred Monkey Forest Sanctuary is a nature reserve and temple complex in Ubud, Bali, Indonesia. It is also known as the Ubud Monkey Forest. The Sanctuary is home to over 1260 long-tailed macaques, who are considered sacred by the local Balinese people.', 'https://monkeyforestubud.com/wp-content/uploads/2023/07/11.5.jpg?x18834'),
    ('Ubud Waterfall','Inland Ubud and the surrounding area form Bali cultural heartland. Ubud is home to a huge number of temples, museums and art galleries.','https://deih43ym53wif.cloudfront.net/tegenungan-waterfall-on-petanu-river-kemenuh-ubud-bali-shutterstock_2299217401.jpg_ce45150648.jpg'),
    ('Garuda Wisnu Kencana','Taman Budaya Garuda Wisnu Kencana, atau kerap disebut dengan GWK, adalah sebuah taman wisata budaya di bagian selatan pulau Bali.','https://img.okezone.com/content/2022/11/12/408/2706261/5-fakta-menarik-patung-gwk-venue-santap-malam-para-delegasi-g20-FWdOjzKWuI.JPG'),
    ('Kebun Raya Bedugul','Kebun Raya Eka Karya Bali atau kadang disebut Kebun Raya Bedugul adalah sebuah kebun botani terbesar di Indonesia yang terletak di Desa Candikuning, Kecamatan Baturiti, Kabupaten Tabanan, Bali berjarak sekitar 60 km dari Denpasar. Kebun ini merupakan kebun raya pertama yang didirikan oleh putra bangsa Indonesia.','https://blog.pigijo.com/wp-content/uploads/2021/11/cover4.png'),
    ('Taman Ujung','Taman Ujung atau Taman Sukasada, adalah sebuat taman di banjar Ujung, desa Tumbu, kecamatan Karangasem, Karangasem, Bali. Taman ini terletak sekitar 5 km di sebelah tenggara kota Amlapura. Pada masa Hindia Belanda tempat ini dikenal dengan nama Waterpaleis atau istana air.','https://cdn.idntimes.com/content-images/post/20220111/242058449-586436432538663-1368554818866556631-n-cd5e6aa72f53b7b70d470fd3bf5ce72f_600x400.jpg'),
    ('Balizoo','Bali Zoo is first zoological park is a wondrous place where you can learn the behaviour of over 500 rare and exotic animals in a lush, tropical environment. A park where you can participate in fascinating animal adventure activities, some of which are unique experiences of their kind in Indonesia.','https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit1440960gsm/events/2020/12/22/00036252-bce1-4bee-9d28-96bb5f51045f-1608649123618-b476b6b49600fc7a2a0c7ea46a18e38b.jpg'),
    ('Bali Bird Park','Taman Burung Bali adalah atraksi wisata sekaligus tempat penangkaran berbagai jenis spesies burung di Indonesia maupun mancanegara. Taman Burung Bali berlokasi di Jalan Serma Cok Ngurah Gambir, Singapadu, Batubulan, Gianyar, Bali.','https://lh3.googleusercontent.com/p/AF1QipN5I0jH_tg0ivOZCfi5M0B-DqIt5hIJYfQsosTk=s680-w680-h510')";

if ($connection->query($destinasi_seeder) === TRUE) {
    echo "Data inserted successfully into table: destinasi<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

$tiket_seeder = "INSERT INTO tiket (id_destinasi, nama_tiket, harga) VALUES
    (1, 'Beach Day Pass', 10000),
    (1, 'Beach Night Pass', 15000),
    (2, 'Mountain Day Pass', 35000),
    (2, 'Mountain Weekend Pass', 40000),
    (3, 'Ubud Waterfall Day Pass', 120000),
    (3, 'Ubud Waterfall Weekend Pass', 150000),
    (4, 'GWK Day Pass', 10000),
    (4, 'GWK Weekend Pass', 15000),
    (5, 'Kebun Raya Day Pass', 35000),
    (5, 'Kebun Raya Weekend Pass', 50000),
    (6, 'Taman Ujung Day Pass', 35000),
    (6, 'Taman Ujung Weekend Pass', 50000),
    (7, 'Balizoo Normal Pass', 125000),
    (7, 'Tiket Masuk + Elephant Expedition', 495000),
    (8, 'Domestic Pass', 140000),
    (8, 'International Pass', 385000)";

if ($connection->query($tiket_seeder) === TRUE) {
    echo "Data inserted successfully into table: tiket<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

$pemesanan_seeder = "INSERT INTO pemesanan (id_users, id_tiket, tanggal_pemesanan) VALUES
    (2, 5, '2024-06-10'),
    (3, 2, '2024-06-11')";

if ($connection->query($pemesanan_seeder) === TRUE) {
    echo "Data inserted successfully into table: pemesanan<br>";
} else {
    echo "Error inserting data into table: " . $connection->error . "<br>";
}

echo "All data seeded successfully!";
?>
