<?php

require "connection.php";

$relasi_pemesanan = "ALTER TABLE pemesanan
    ADD FOREIGN KEY (id_users) REFERENCES users(id),
    ADD FOREIGN KEY (id_destinasi) REFERENCES destinasi(id),
    ADD FOREIGN KEY (id_tiket) REFERENCES tiket(id);
";

$relasi_tiket = "ALTER TABLE tiket
    ADD FOREIGN KEY (id_destinasi) REFERENCES destinasi(id);
";

$relasi_users = "ALTER TABLE users
    ADD FOREIGN KEY (id_role) REFERENCES role(id);
";

$tiket_dipesan = "ALTER TABLE tiket_dipesan
    ADD FOREIGN KEY (id_pemesanan) REFERENCES pemesanan(id)
";


$relations = [$relasi_pemesanan, $relasi_tiket, $relasi_users, $tiket_dipesan];

foreach ($relations as $relasi) {
    if ($connection->query($relasi) === TRUE) {
        echo "Relationship added successfully: " . explode(" ", $relasi, 4)[2] . "<br>";
    } else {
        echo "Error adding relationship: " . $connection->error . "<br>";
    }
}

echo "relationships created successfully!";