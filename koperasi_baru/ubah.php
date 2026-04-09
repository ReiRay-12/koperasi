<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'config.php';
$id = $_GET["id"];
$datapengaduan = query("SELECT * FROM form_pengaduan WHERE id = $id") [0];
if(isset($_POST["submit"])) {

    if(ubah_status($_POST) > 0 ){
        echo "<script>
            alert('Data berhasil diupdate!');
            document.location.href = 'index_admin.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diupdate!');
            document.location.href = 'index_admin.php';
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
    <title>Edit Laporan Kerusakan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Button on the left side -->
    <div class="form-container">
        <a href="data_laporan.php" class="button">Kembali</a>
        
        <!-- The form on the right side -->
        <div class="form">
            <div class="title">Data Laporan</div>
            <div class="subtitle">Silahkan Masukan data</div>

             <form action="" method="post" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?= $datapengaduan["id"] ?>">
             <input type="hidden" name="fotolama" value="<?= $datapengaduan['foto']; ?>">
               
                <div class="input-container ic2">
                <label for="nama" class="placeholder">Nama</label> <br>
                    <input id="nama" class="input" type="text" name="nama" placeholder=" " required 
                    value="<?= $datapengaduan["nama_pelapor"]?>" />
                    <div class="cut"></div>
                </div>

                <div class="input-container ic2">
                <label for="bagan" class="placeholder">Kelas / Bagian</label> <br>
                    <input id="bagan" class="input" type="text" name="bagan" placeholder=" " required
                    value="<?= $datapengaduan["bagian"]?>" />
                    <div class="cut cut-short"></div>
                </div>

                <div>
                    <label for="jenis">Jenis Kerusakan</label>
                    <input  id="jenis" type="text" name="jenis" id="jenis" required 
                    value="<?= $datapengaduan["jenis"]?>" />
                </div>

                <div class="input-container ic2">
                        <label>Deskripsi Kerusakan</label>
                        <input  id="deskripsi" type="text" name="deskripsi" id="deskripsi" required 
                        value="<?= $datapengaduan["deskripsi"]?>" />
                </div>


                <div>
                    <label>Foto</label> <br>
                    <?php if (!empty($datapengaduan['foto'])): ?>
                        <img src="img/<?= $datapengaduan['foto'] ?>" width="100"><br>
                    <?php else: ?>
                        <p>Tidak ada foto</p>
                    <?php endif; ?>
                    <input id="foto" type="file" name="foto">
                </div>

                <div class="input-container ic2">
                <label>Status Laporan</label>
                    <select name="status" id="status">
                        <option value="">-- Select --</option>

                        <option value="Menunggu" <?= ($datapengaduan["status"] == "Menunggu") ? 'selected' : ''; ?>>Menunggu</option>
                    <option value="Diproses" <?= ($datapengaduan["status"] == "Diproses") ? 'selected' : ''; ?>>Diproses</option>
                    <option value="Selesai" <?= ($datapengaduan["status"] == "Selesai") ? 'selected' : ''; ?>>Selesai</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="submit">Kirim Data</button>
            </form>
        </div>
    </div>
</body>
</html>