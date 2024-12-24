<?php
include 'db.php';

// Ambil data dari database
$sql = "SELECT * FROM peserta";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peserta</title>
    <link rel="stylesheet" href="form-style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Formulir Pendaftaran Peserta Lomba Olahraga Internasional</h1>
    </header>
    <!-- Formulir Pendaftaran -->
    <form action="create.php" method="post">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br>

        <label>Cabang Olahraga:</label>
        <select name="cabang_olahraga">
            <option value="Sepak bola">Sepak bola</option>
            <option value="Tenis meja">Tenis meja</option>
            <option value="Bola voli">Bola voli</option>
        </select><br>

        <label>Jenis Kelamin:</label>
        <select name="jenis_kelamin">
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
        </select><br>

        <label>Nomor Telepon:</label>
        <input type="tel" name="nomor_telepon" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Komentar:</label>
        <textarea name="komentar"></textarea><br>

        <button type="submit">Daftar</button>
    </form>

    <!-- Tabel Data Peserta -->
    <h2>Data Peserta</h2>
    <table border="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Cabang</th>
            <th>Jenis Kelamin</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Komentar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_lengkap'] ?></td>
            <td><?= $row['cabang_olahraga'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td><?= $row['nomor_telepon'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['komentar'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>