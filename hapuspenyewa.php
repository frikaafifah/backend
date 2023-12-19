<?php
include('connectDB.php');

$userid = $_POST["userid"];

try {
    $tables = ['users', 'kamar', 'pengaduan'];

    foreach ($tables as $table) {
        $checkSql = "SELECT * FROM $table WHERE userid = :userid";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bindParam(':userid', $userid);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            $deleteSql = "DELETE FROM $table WHERE userid = :userid";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bindParam(':userid', $userid);
            $deleteStmt->execute();
        }
    }


    echo json_encode(['message' => 'success']);
} catch(PDOException $e) {
    echo json_encode(['message' => 'failed' . $e->getMessage()]);
}
?>
