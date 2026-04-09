<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'config.php';
$dataanggota = query("SELECT * FROM form_pengaduan");
if(isset($_POST["submit"])) {

    if(tambah($_POST) > 0 ){
        echo "<script>
            alert('Data berhasil ditambahkan!');
           document.location.href = 'index.php';
        </script>";
    } else {
        echo 
        "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'lapor.php';
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
    <title>Form Laporan Kerusakan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Button on the left side -->
    <div class="form-container">
        <a href="index.php" class="button">Kembali</a>
        
        <!-- The form on the right side -->
        <div class="form">
            <div class="title">Data Laporan</div>
            <div class="subtitle">Silahkan Masukan data</div>

             <form action="" method="post" enctype="multipart/form-data">
               
                <div class="input-container ic2">
                <label for="nama" class="placeholder">Nama</label> <br>
                    <input id="nama" class="input" type="text" name="nama" placeholder=" " required />
                    <div class="cut"></div>
                </div>

                <div class="input-container ic2">
                <label for="bagan" class="placeholder">Kelas / Bagian</label> <br>
                    <input id="bagan" class="input" type="text" name="bagan" placeholder=" " required />
                    <div class="cut cut-short"></div>
                </div>

                <div>
                    <label for="jenis">Jenis Kerusakan</label>
                    <input  id="jenis" type="text" name="jenis" id="jenis">
                </div>

                <div class="input-container ic2">
                        <label>Deskripsi Kerusakan</label>
                        <input  id="deskripsi" type="text" name="deskripsi" id="deskripsi">
                </div>


                <div class="input-container ic2">
                    <label for="foto" class="file-label">Upload Foto</label>
                    <input id="foto" class="input-file" type="file" name="foto" accept="image/*" onchange="previewImage(event)" />
                </div>
    
                <button type="submit" name="submit" class="submit">Kirim Data</button>
            </form>
        </div>
    </div>
</body>
</html>