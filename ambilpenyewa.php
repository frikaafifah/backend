<?php
include('connectDB.php');

$userid = $_POST["userid"];

$sql = "
    SELECT *
    FROM users, kamar
    WHERE users.userid = :userid AND users.userid = kamar.userid
    ORDER BY kamar.id ASC
";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":userid", $userid);  // Corrected: Move bindParam before execute
$stmt->execute();

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data);

$conn = null;
?>
