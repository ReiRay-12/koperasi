<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'function.php';
$dataanggota = query("SELECT * FROM anggota");

if(isset($_POST["cari"])){
    $dataanggota = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    
    <a href="logout.php">Logout</a>

    <h1>Data Anggota</h1>

    <a href="tambah.php">tambah</a>
    
    <br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukan Keyword Pencarian" autocomplete="off">
        <button type="text" name="cari">Cari</button>
    </form>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>id</th>
            <th>nama</th>
            <th>alamat</th>
            <th>tanggal</th>
            <th>Jenis Kelamin</ath>
            <th>Nomer HP</th>
            <th>foto</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($dataanggota as $row): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["alamat"]?></td>
            <td><?= $row["tal_daftar"] ?></td>
            <td><?= $row["jk"] ?></td>
            <td><?= $row["no_hp"] ?></td>
            <td><img src="img/<?= $row["foto"]; ?>" width="100" height="100"></td>
            <td>
                <a href="ubah.php?id_anggota=<?= $row['id_anggota']; ?>"> Ubah </a> | 
                <a href="hapus.php?id_anggota=<?= $row['id_anggota']; ?>" onclick="return confirm('yakin?');"> Hapus</a>
            </td>

        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>