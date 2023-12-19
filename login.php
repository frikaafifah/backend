<?php
include('connectDB.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare('SELECT * FROM users WHERE nama = ? AND password = ?');
        $stmt->execute([$nama, $password]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $response = array('message' => 'success', 'userid' => $result['userid'],'nama' => $result['nama'], 'hakakses'=>$result['hakakses']);
            echo json_encode($response);
        } else {
            $response = array('message' => 'failed');
            echo json_encode($response);
        }
    } catch (PDOException $e) {
            $response = array('message' => 'Database Error'. $e->getMessage());
            echo json_encode($response);
    }

    $pdo = null;
} else {
    $response = array('message' => 'Invalid method', 'success' => false);
    echo json_encode($response);
}
?>
