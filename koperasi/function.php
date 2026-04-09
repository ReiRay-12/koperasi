<?php 
$conn = mysqli_connect("localhost", "root", "", "koperasi_jabbar_new");

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
    $nama= htmlspecialchars ($data["nama"]);
    $alamat= htmlspecialchars ($data["alamat"]);
    $tgl= htmlspecialchars ($data["tal_daftar"]);
    $jk= htmlspecialchars ($data["jk"]);
    $no_hp= htmlspecialchars ($data["no_hp"]);
    $foto= upload();
    if(!$foto){
        return false;
    }
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $level = $data["level"];
    
    if( $password !== $password2){
        echo "<script>
                    alert('konfirmasi password tidak sesuai!');
              </script>";
              return false;
    }

    //enkripsi
    $password = password_hash($password,PASSWORD_DEFAULT);
    

    $query="INSERT INTO anggota VALUES ('','$nama','$alamat','$tgl','$jk','$no_hp','$foto','$password','$password2','$level')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id_anggota"]; // ✅ Ini yang sesuai dengan form
    $nama= htmlspecialchars ($data["nama"]);
    $alamat= htmlspecialchars ($data["alamat"]);
    $tgl= htmlspecialchars ($data["tal_daftar"]);
    $jk= htmlspecialchars ($data["jk"]);
    $no_hp= htmlspecialchars ($data["no_hp"]);
    $fotolama =htmlspecialchars ($data["fotolama"]);

    if( $_FILES['foto']['error'] === 4){
        $foto = $fotolama;
    } else {
        $foto = upload();
    }
    // $foto= htmlspecialchars ($data["foto"]);
    

    $query="UPDATE anggota SET
                nama = '$nama',
                alamat = '$alamat',
                tal_daftar = '$tgl',
                jk = '$jk',
                no_hp = '$no_hp',
                foto = '$foto'
                WHERE id_anggota = '$id' ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM anggota WHERE 
    nama LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    no_hp LIKE '%$keyword%' OR
    jk LIKE '%$keyword%' OR
    tal_daftar LIKE '%$keyword%'
    ";
 
    return query($query);
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


    mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota = $id");
    return mysqli_affected_rows($conn);
}

function registrasi($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $level = $data["level"];
        // cek password
        if( $password !== $password2){
            echo "<script>
                        alert('konfirmasi password tidak sesuai!');
                  </script>";
                  return false;
        }

        //enkripsi
        $password = password_hash($password,PASSWORD_DEFAULT);

        //tambah database
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$level')");

        return mysqli_affected_rows($conn);
}       

function pinjam($data) {
    global $conn;
    $tgl_daftar= htmlspecialchars ($data["tgl_daftar"]);
    $id_anggota= htmlspecialchars ($data["id_anggota"]);
    $jumlah= htmlspecialchars ($data["jumlah"]);
    $keterangan= htmlspecialchars ($data["keterangan"]);
    $jangka_waktu= htmlspecialchars ($data["jangka_waktu"]);
    $id_user= htmlspecialchars($data["id_user"]);    

    $query="INSERT INTO pinjaman VALUES ('','$tgl_daftar','$id_anggota','$jumlah','$id_user','$jangka_waktu','$keterangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function simpan($data) {
    global $conn;
    $tgl_daftar= htmlspecialchars ($data["tgl_daftar"]);
    $id_anggota= htmlspecialchars ($data["id_anggota"]);
    $jumlah= htmlspecialchars ($data["jumlah"]);
    $keterangan= htmlspecialchars ($data["keterangan"]);
    $id_user= htmlspecialchars($data["id_user"]);    

    $query="INSERT INTO simpanan VALUES ('','$tgl_daftar','$id_anggota','$jumlah','$id_user','$keterangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
