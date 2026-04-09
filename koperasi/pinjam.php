<?php 
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'function.php';
$dataanggota = query("SELECT * FROM anggota");

$id_user= query("SELECT * FROM user");

if(isset($_POST["submit"])) {

    if(pinjam($_POST) > 0 ){
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            // document.location.href = 'index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pinjaman</h1>
    <form method="post" action="">

    <div class="input-container ic2">
              <label for="tgl_daftar">Tanggal Daftar</label>
              <Input type="date" name="tgl_daftar" id="tgl_daftar">
    </div> <br>
    
    <div>
        <label for="id_anggota">Pilih anggota</label>
        <select name="id_anggota" id="id_anggota">
            <option disabled selected>Pilih</option>
            <?php foreach ($dataanggota as $anggota): ?>
            <option value="<?= $anggota['id_anggota']; ?>"><?= $anggota['nama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div> <br>

    <div>
        <label for="jumlah">Jumlah Pinjam</label>
        <Input type="text" name="jumlah" id="jumlah">
    </div> <br>
    
    <div>
        <label for="keterangan">Keterangan Pinjam</label>
        <Input type="text" name="keterangan" id="keterangan">
    </div> <br>

    <div>
        <label for="jangka_waktu">Jangka Waktu</label>
        <select name="jangka_waktu" id="jangka_waktu">
            <option disabled selected>Perbulan</option>
            <option value="1_bulan">1 Bulan</option>
            <option value="3_bulan">3 Bulan</option>
            <option value="6_bulan">6 Bulan</option>
            <option value="9_bulan">9 Bulan</option>
            <option value="12_bulan">12 Bulan</option>
        </select>
    </div> <br>

    <div>
        <label for="id_user">Pilih admin</label>
        <select name="id_user" id="id_user">
            <option disabled selected>Pilih</option>
            <?php foreach ($id_user as $id): ?>
            <option value="<?= $id['id_user']; ?>"><?= $id['username']; ?></option>
            <?php endforeach; ?>
        </select>
    </div> <br>

    <button type="submit" name="submit" class="submit">Kirim Data</button>
    <button type="reset" >Clear</button>
    </form>
</body>
</html>