<?php
include('connectDB.php');

$id = $_POST["id"];

try {

    $sql = "DELETE FROM pengaduan WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $response = array('message' => 'success');
    echo json_encode($response);
} catch(PDOException $e) {
    $response = array('message' => 'failed');
    echo json_encode($response);
}
?>
