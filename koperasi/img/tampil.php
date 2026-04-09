<?php

$conn = mysqli_connect("localhost","root","","lafuan_smkterput");

$result = mysqli_query($conn, "SELECT * FROM siswa");

// while( $ssw=mysqli_fetch_assoc($result)){
// var_dump($ssw);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atmint Only</title>
</head>
<body>
    <h1>Daftar Siswa</h1>

    <a href="add.php">Tambah Siswa</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>

        <?php while( $row=mysqli_fetch_assoc($result)): ?>
        <tr>
            <td>1</td>
            <td>
                <a href="">ubah</a>
                <a href="">hapus</a>
            </td>
            <td><img src="img/<?= $row["Foto"]; ?>" alt="murid" width="100" height="100"></td>
            <td><?= $row["NIS"]; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td><?= $row["Email"]; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>