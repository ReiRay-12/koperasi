<?php
require 'function.php';
// $dataanggota = query("SELECT * FROM anggota");
if(isset($_POST["registrasi"])) {

    if(registrasi($_POST) > 0 ){
        echo "<script>
            alert('user baru berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
       //     document.location.href = 'index.php';
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
    

    <h1>Halaman Regis</h1>

    <form method="post" action="">
        <ul>
            <li>
                <label for="username">Username</label>
                <Input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label>
                <Input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi password</label>
                <Input type="password" name="password2" id="password2">
            </li> 
            <li>
                <label for="level">Level</label>
                <select name="level" id="level">
                    <option value="admin">Admin</option>
                    <option value="anggota">Anggota</option>
                </select>
            </li>
            <li>
                <button type="submit" name="registrasi">registerasi!</button>
            </li>
        </ul>
    </form>
</body>
</html>