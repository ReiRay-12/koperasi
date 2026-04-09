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

    if(simpan($_POST) > 0 ){
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
        <label for="jumlah">Jumlah simpan</label>
        <Input type="text" name="jumlah" id="jumlah">
    </div> <br>
    
    <div>
        <label for="keterangan">Keterangan Simpan</label>
        <Input type="text" name="keterangan" id="keterangan">
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