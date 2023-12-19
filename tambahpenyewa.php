<?php
include("connectDB.php");

$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];
$tgllahir = $_POST["tanggallahir"];
$email = $_POST["email"];
$kontakdarurat = $_POST["kontakdarurat"];
$hakakses = "user";
$password = $_POST["password"];
$sewa = $_POST["sewa"];
$tanggalmasuk = $_POST["tanggalmasuk"];
$tanggalkeluar = $_POST["tanggalkeluar"];
$statusbayar = $_POST["statusbayar"];
$catatan = $_POST["catatan"];
$nokamar = $_POST["nokamar"];

try {
    $conn->beginTransaction();

    $stmt = $conn->prepare("INSERT INTO users SET nama = :nama, password = :password, alamat = :alamat, telepon = :telepon, tanggallahir = :tanggallahir, email = :email, kontakdarurat = :kontakdarurat, hakakses = :hakakses");
    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":alamat", $alamat);
    $stmt->bindParam(":telepon", $telepon);
    $stmt->bindParam(":tanggallahir", $tgllahir);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":kontakdarurat", $kontakdarurat);
    $stmt->bindParam(":hakakses", $hakakses);
    $stmt->execute();


    $userId = $conn->lastInsertId();

    $stmt = $conn->prepare("INSERT INTO kamar SET userid = :user_id, nokamar = :nokamar, biayasewa = :sewa, tanggalmasuk = :tanggalmasuk, tanggalkeluar = :tanggalkeluar, statusbayar = :statusbayar, catatan = :catatan");
    $stmt->bindParam(":user_id", $userId);
    $stmt->bindParam(":sewa", $sewa);
    $stmt->bindParam(":tanggalmasuk", $tanggalmasuk);
    $stmt->bindParam(":tanggalkeluar", $tanggalkeluar);
    $stmt->bindParam(":statusbayar", $statusbayar);
    $stmt->bindParam(":catatan", $catatan);
    $stmt->bindParam(":nokamar", $nokamar);
    $stmt->execute();

    $conn->commit();

    $response = array("message" => "success");
    echo json_encode($response);

} catch (PDOException $e) {
    $conn->rollBack();
    echo json_encode(array("message" => "failed"));
}
?>
