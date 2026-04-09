<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'function.php';
$dataanggota = query("SELECT * FROM anggota");
if(isset($_POST["submit"])) {

    if(tambah($_POST) > 0 ){
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
    <!-- Button on the left side -->
    <div class="form-container">
        <a href="index.php" class="button">Kembali</a>
        
        <!-- The form on the right side -->
        <div class="form">
            <div class="title">Data Siswa</div>
            <div class="subtitle">Silahkan Masukan data</div>

             <form action="" method="post" enctype="multipart/form-data">
               
                <div class="input-container ic2">
                <label for="nama" class="placeholder">Nama</label> <br>
                    <input id="nama" class="input" type="text" name="nama" placeholder=" " required />
                    <div class="cut"></div>
                </div>

                <div class="input-container ic2">
                <label for="alamat" class="placeholder">alamat</label> <br>
                    <input id="alamat" class="input" type="text" name="alamat" placeholder=" " required />
                    <div class="cut cut-short"></div>
                </div>

                <div>
                    <label for="tal_daftar">Tanggal Daftar</label>
                    <input  id="tal_daftar" type="date" name="tal_daftar" id="tal_daftar">
                </div>

                <div class="input-container ic2">
                        <label>Jenis Kelamin</label>
                        <label>
                                <input id="jk" type="radio" name="jk" value="Laki-laki" required> Laki-laki
                        </label>
                        <label>
                                <input id="jk" type="radio" name="jk" value="Perempuan" required> Perempuan
                        </label>

                </div>

                <div>
                    <label>Nomer Telepon</label>
                    <input id="no_hp" type="text" name="no_hp" >
                </div>

                <div class="input-container ic2">
                    <label for="foto" class="file-label">Upload Foto</label>
                    <input id="foto" class="input-file" type="file" name="foto" accept="image/*" required onchange="previewImage(event)" />
                </div>
                
                <div>
                    <label for="password">Password</label>
                    <Input type="password" name="password" id="password">
                </div>

                <div>
                    <label for="password2">Konfirmasi password</label>
                    <Input type="password" name="password2" id="password2">
                </div>

                <div>
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="admin">Admin</option>
                        <option value="anggota">Anggota</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="submit">Kirim Data</button>
            </form>
        </div>
    </div>
</body>
</html>