<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'function.php';

$id = $_GET["id_anggota"];

$dataanggota = query("SELECT * FROM anggota WHERE id_anggota = $id") [0];

if(isset($_POST["submit"])) {
    if(ubah($_POST) > 0 ){
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah!');
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
    <!-- Button on the left side -->
    <div class="form-container">
        <a href="index.php" class="button">Kembali</a>
        
        <!-- The form on the right side -->
        <div class="form">
            <div class="title">Data Siswa</div>
            <div class="subtitle">Silahkan Ubah data</div>


            

             <form action="" method="post" enctype="multipart/form-data">
               

             <input type="hidden" name="id_anggota" value="<?= $dataanggota["id_anggota"] ?>">
             <input type="hidden" name="fotolama" value="<?= $dataanggota["foto"] ?>">

                <div class="input-container ic2">
                <label for="nama" class="placeholder">Nama</label> <br>
                    <input id="nama" class="input" type="text" name="nama" placeholder=" " required
                    value="<?= $dataanggota["nama"]?>" />
                    <div class="cut"></div>
                   
                </div>

                <div class="input-container ic2">
                <label for="alamat" class="placeholder">alamat</label> <br>
                    <input id="alamat" class="input" type="text" name="alamat" placeholder=" " required 
                    value="<?= $dataanggota["alamat"]?>"/>
                    <div class="cut cut-short"></div>
                </div>

                <div>
                    <label for="tal_daftar">Tanggal Daftar</label>
                    <input  id="tal_daftar" type="date" name="tal_daftar" id="tal_daftar"
                    <?php $tanggal_fix = date('Y-m-d', strtotime($dataanggota["tal_daftar"])); ?>
                    value="<?= $tanggal_fix ?>">
                </div>

                <div class="input-container ic2">
                        <label>Jenis Kelamin</label>
                        <label>
                                <input id="jk" type="radio" name="jk" value="Laki-Laki" required
                                value="Laki-laki" <?= $dataanggota['jk'] == 'Laki-Laki' ? 'checked' : '' ?>> Laki-laki
                        </label>
                        <label>
                                <input id="jk" type="radio" name="jk" value="Perempuan" required
                                value="Perempuan" <?= $dataanggota['jk'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan
                        </label>

                </div>

                <div>
                    <label>Nomer Telepon</label>
                    <input id="no_hp" type="text" name="no_hp"
                     value="<?= $dataanggota['no_hp'] ?> ">
                </div>

                <div>
                    <label>Foto</label> <br>
                    <img src="img/<?= $dataanggota['foto'] ?>" width="100"><br>
                    <input id="foto" type="file" name="foto">
                </div>

                <button type="submit" name="submit" class="submit">ubah Data</button>
            </form>
        </div>
    </div>
    <form method="get" action=""></form>
</body>
</html>