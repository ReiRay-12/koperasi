<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "db_laporan");

function query($query){
    global $conn;
    // result buka data
    $result =  mysqli_query($conn,$query);
    //diambil datanya = rows
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


    function tambah($data) {
        global $conn;
    
        $nama = htmlspecialchars($data["nama"]);
        $bagan = htmlspecialchars($data["bagan"]);
        $jenis = htmlspecialchars($data["jenis"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);
    
        $foto = upload();
        if($foto === false){
            return false;
        }
    
        $query = "INSERT INTO form_pengaduan 
                  (nama_pelapor, bagian, jenis, deskripsi, foto) 
                  VALUES 
                  ('$nama','$bagan','$jenis','$deskripsi','$foto')";
    
        mysqli_query($conn, $query);
    
        if(mysqli_error($conn)){
            echo mysqli_error($conn);
        }
    
        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;
    
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $bagan = htmlspecialchars($data["bagan"]);
        $jenis = htmlspecialchars($data["jenis"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);
        $status = htmlspecialchars($data["status"]);
        $fotolama = htmlspecialchars($data["fotolama"]);
    
        if ($_FILES['foto']['error'] === 4) {
            $foto = $fotolama;
        } else {
            $foto = upload();
        }
    
        $query="UPDATE form_pengaduan SET
                    nama_pelapor = '$nama',
                    bagian = '$bagan',
                    jenis = '$jenis',
                    deskripsi = '$deskripsi',
                    foto = '$foto',
                    status = '$status'
                WHERE id = '$id'";
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;
    
        mysqli_query($conn, "DELETE FROM form_pengaduan WHERE id = $id");
    
        return mysqli_affected_rows($conn);
    }

function upload(){
    $namaFile=$_FILES['foto']['name'];
    $ukuranFile=$_FILES['foto']['size'];
    $error=$_FILES['foto']['error'];
    $tmpName=$_FILES['foto']['tmp_name'];

    if($error===4){
        return '';
    }

    $extensiGambarValid=['jpg','jpeg','png','gif','webp'];
    $extensiGambar=explode('.',$namaFile);
    $extensiGambar=strtolower(end($extensiGambar));
    if(!in_array($extensiGambar,$extensiGambarValid)){
        echo "<script>
            alert('File yang di upload bukan gambar!');
        </script>";
        return false;
    }

    if($ukuranFile>5000000){
        echo "<script>
                alert('Ukuran file terlalu besar!');
            </script>";
            return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;


    move_uploaded_file($tmpName,'img/'.$namaFileBaru);
    return $namaFileBaru;
}

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>