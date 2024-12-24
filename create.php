<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_lengkap'];
    $cabang = $_POST['cabang_olahraga'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    $komentar = $_POST['komentar'];

    $sql = "INSERT INTO peserta (nama_lengkap, cabang_olahraga, jenis_kelamin, nomor_telepon, email, komentar)
            VALUES ('$nama', '$cabang', '$jenis_kelamin', '$telepon', '$email', '$komentar')";

    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>