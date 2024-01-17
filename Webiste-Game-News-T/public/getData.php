<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Corrected path

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$koneksi = new mysqli($servername, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

$query = "SELECT * FROM newsgame";
$result = $koneksi->query($query);

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$koneksi->close();
?>
