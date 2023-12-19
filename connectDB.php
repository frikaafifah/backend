<?php
$host = "localhost";
$username = "id21619948_rumahkos";
$password = "Rumahkos21#";
$database = "id21619948_rumahkos";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>