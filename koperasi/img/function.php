<?php 
$conn = mysqli_connect("localhost", "root", "", "lafuan_smkterput");

function query($query){
    global $conn;
    $result =  mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    $nis= htmlspecialchars ($data["nis"]);
    $nama= htmlspecialchars ($data["nama"]);
    $jurusan= htmlspecialchars ($data["jurusan"]);
    $email= htmlspecialchars ($data["email"]);
    $foto= upload();
    if(!$foto){
        return false;
    }
    

    $query="INSERT INTO siswa VALUES ('$nis','$nama','$jurusan','$email','$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile=$_FILES['foto']['name'];
    $ukuranFile=$_FILES['foto']['size'];
    $error=$_FILES['foto']['error'];
    $tmpName=$_FILES['foto']['tmp_name'];

    if($error===4){
        echo "<script>
            alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
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

function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM siswa WHERE NIS = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $nis= htmlspecialchars ($data["nis"]);
    $nama= htmlspecialchars ($data["nama"]);
    $jurusan= htmlspecialchars ($data["jurusan"]);
    $email= htmlspecialchars ($data["email"]);
    $gambarLama= htmlspecialchars($data["gambarLama"]);

    if ($_FILES['foto']['error'] === 4) {
        $foto = $gambarLama; // Tidak ada file baru diunggah
    } else {
        $foto = upload(); // Fungsi untuk upload file baru
    }

    $query="UPDATE siswa SET
            NIS='$nis',
            Nama='$nama',
            Jurusan='$jurusan',
            Email='$email',
            Foto='$foto' 
            WHERE NIS='$nis'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM siswa WHERE 
        NIS LIKE '%$keyword%' OR
        Nama LIKE '%$keyword%' OR 
        Email LIKE '%$keyword%' OR
        Jurusan LIKE '%$keyword%' OR 
        Foto LIKE '%$keyword%' 
        ";
        return query($query);
}
?>