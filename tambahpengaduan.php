<?php
include("connectDB.php");

$userid = $_POST["userid"];
$nama = $_POST["nama"];
$judul = $_POST["judul"];
$deskripsi = $_POST["deskripsi"];
$tanggal = $_POST["tanggal"];
$nokamar = $_POST["nokamar"];

$target_dir = "uploads/";
$original_filename = basename($_FILES["file"]["name"]);

$imageFileType = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
$unique_filename = uniqid() . '_' . $original_filename;
$target_file = $target_dir . $unique_filename;

try {
    $stmt = $conn->prepare("INSERT INTO pengaduan SET userid=:userid, nama=:nama, judul=:judul, deskripsi=:deskripsi, tanggal=:tanggal, nokamar=:nokamar" . (!empty($_FILES["file"]["name"]) ? ", bukti=:bukti" : ""));
    $stmt->bindParam(":userid", $userid);
    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":judul", $judul);
    $stmt->bindParam(":deskripsi", $deskripsi);
    $stmt->bindParam(":tanggal", $tanggal);
    $stmt->bindParam(":nokamar", $nokamar);
    if (!empty($_FILES["file"]["name"])) {
        $stmt->bindParam(":bukti", $target_file);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    }
    $stmt->execute();

    $response = array("message" => "success");
    echo json_encode($response);

} catch (PDOException $e) {
    $conn->rollBack();
    echo json_encode(array("message" => "failed"));
}
?>
