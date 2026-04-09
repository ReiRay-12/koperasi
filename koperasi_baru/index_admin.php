<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'config.php';
$datapengaduan = query("SELECT * FROM form_pengaduan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="logout.php">Logout</a>

<h1>Data Laporan</h1>

<a href="lapor.php">buat Laporan</a>

<br><br>

<!-- <form action="" method="POST">
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukan Keyword Pencarian" autocomplete="off">
    <button type="text" name="cari">Cari</button>
</form> -->

<br><br>


<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Bagian</th>
        <th>Jenis</th>
        <th>Deskripsi Kerusakan</th>
        <th>foto</th>
        <th>status</th>
        <th>udate status</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($datapengaduan as $row): ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= $row["nama_pelapor"]?></td>
        <td><?= $row["bagian"] ?></td>
        <td><?= $row["jenis"] ?></td>
        <td><?= $row["deskripsi"] ?></td>
        <td>
            <?php if (!empty($row["foto"])): ?>
                <img src="img/<?= $row["foto"]; ?>" width="100" height="100">
            <?php else: ?>
                Tidak ada foto
            <?php endif; ?>
        </td>
        <td><?= $row["status"] ?></td>
        <td>
            
            <form action="update_status.php" method="post" class="status-update-form">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                <select name="status">
                    <option value="">Silahkan Pilih</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                </select>
                <button type="submit" name="submit" class="submit">Kirim Data</button>
            </form>
        </td>

    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>