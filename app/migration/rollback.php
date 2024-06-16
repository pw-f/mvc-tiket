<?php

require "connection.php";

$drop = "DROP DATABASE {$dbname}";
$create = "CREATE DATABASE {$dbname}";

$connection->query($drop);
$connection->query($create);

echo "rollback berhasil";