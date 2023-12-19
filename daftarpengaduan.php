<?php
include('connectDB.php');

$userid = isset($_POST["userid"]) ? $_POST["userid"] : '';

if (empty($userid)) {
    $sql = "SELECT * FROM pengaduan ORDER BY tanggal ASC";
    $stmt = $conn->prepare($sql);
} else {
    $sql = "SELECT * FROM pengaduan WHERE userid=:userid ORDER BY tanggal ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":userid", $userid);
}

$stmt->execute();
$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}
echo json_encode($data);  
$conn = null;
?>
