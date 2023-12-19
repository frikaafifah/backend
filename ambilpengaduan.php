<?php
include('connectDB.php');
$userid = $_POST["userid"];

$sql = "SELECT * pengaduan WHERE userid=:userid ORDER BY tanggal ASC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":userid",$userid);
$stmt->execute();
$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}
echo json_encode($data);     
$conn = null;
?>
