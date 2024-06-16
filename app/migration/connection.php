<?php
require "../config/config.php";

$host = DB_HOST;
$user = DB_USER;
$pass = DB_PASS;
$dbname = DB_NAME;

$connection = mysqli_connect($host, $user, $pass, $dbname);