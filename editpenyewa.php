<?php
include("connectDB.php");

$fields = ["userid", "nama", "alamat", "telepon", "tanggallahir", "email", "kontakdarurat", "password", "sewa", "tanggalmasuk", "tanggalkeluar", "statusbayar", "catatan", "nokamar"];

foreach ($fields as $field) {
    $$field = $_POST[$field];
}

try {
    $conn->beginTransaction();

    $updateUserQuery = "UPDATE users SET nama = :nama, password = :password, alamat = :alamat, telepon = :telepon, tanggallahir = :tanggallahir, email = :email, kontakdarurat = :kontakdarurat";
    $updateUserQuery .= !empty($_FILES["file"]["name"]) ? ", gambar = :gambar" : "";
    $updateUserQuery .= " WHERE userid=:userid";

    $stmt = $conn->prepare($updateUserQuery);
    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":alamat", $alamat);
    $stmt->bindParam(":telepon", $telepon);
    $stmt->bindParam(":tanggallahir", $tanggallahir);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":kontakdarurat", $kontakdarurat);
    $stmt->bindParam(":userid", $userid);

    // if (!empty($_FILES["file"]["name"])) {
    //     $target_file = "uploads/" . uniqid() . '_' . basename($_FILES["file"]["name"]);
    //     $stmt->bindParam(":gambar", $target_file);
    // }
    
    if (!empty($_FILES["file"]["name"])) {
        $target_file = "uploads/" . uniqid() . '_' . basename($_FILES["file"]["name"]);
    
        // Check for file upload errors
        if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {
            throw new RuntimeException("File upload failed with error code " . $_FILES["file"]["error"]);
        }
    
        // Move the uploaded file to the target location
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            throw new RuntimeException("Failed to move uploaded file to target location");
        }
    
        $stmt->bindParam(":gambar", $target_file);
    }


    $stmt->execute();

    $updateKamarQuery = "UPDATE kamar SET biayasewa = :sewa, tanggalmasuk = :tanggalmasuk, tanggalkeluar = :tanggalkeluar, statusbayar = :statusbayar, catatan = :catatan, nokamar = :nokamar WHERE userid = :userid";

    $stmt = $conn->prepare($updateKamarQuery);
    $stmt->bindParam(":sewa", $sewa);
    $stmt->bindParam(":tanggalmasuk", $tanggalmasuk);
    $stmt->bindParam(":tanggalkeluar", $tanggalkeluar);
    $stmt->bindParam(":statusbayar", $statusbayar);
    $stmt->bindParam(":catatan", $catatan);
    $stmt->bindParam(":nokamar", $nokamar);
    $stmt->bindParam(":userid", $userid);
    $stmt->execute();

    $conn->commit();

    $response = ["message" => "success"];
    echo json_encode($response);
} catch (PDOException $e) {
    $conn->rollBack();
    echo json_encode(["message" => "failed" . $e->getMessage()]);
}
?>
