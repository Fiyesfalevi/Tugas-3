<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM peserta WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_lengkap'];
    $cabang = $_POST['cabang_olahraga'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    $komentar = $_POST['komentar'];

    $sql = "UPDATE peserta SET
            nama_lengkap='$nama',
            cabang_olahraga='$cabang',
            jenis_kelamin='$jenis_kelamin',
            nomor_telepon='$telepon',
            email='$email',
            komentar='$komentar'
            WHERE id=$id";

    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Peserta</title>
    <link rel="stylesheet" href="form-style.css">
</head>
<body>
    <form method="POST">
        Nama Lengkap: <input type="text" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>"><br>
        Cabang Olahraga: <input type="text" name="cabang_olahraga" value="<?= $row['cabang_olahraga'] ?>"><br>
        Jenis Kelamin: 
        <select name="jenis_kelamin">
            <option value="pria" <?= $row['jenis_kelamin'] == 'pria' ? 'selected' : '' ?>>Pria</option>
            <option value="wanita" <?= $row['jenis_kelamin'] == 'wanita' ? 'selected' : '' ?>>Wanita</option>
        </select><br>
        Nomor Telepon: <input type="text" name="nomor_telepon" value="<?= $row['nomor_telepon'] ?>"><br>
        Email: <input type="email" name="email" value="<?= $row['email'] ?>"><br>
        Komentar: <textarea name="komentar"><?= $row['komentar'] ?></textarea><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>