<?php 
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'function.php';
$id= $_GET["id_anggota"];

if ( hapus($id)>0){
    echo "<script>
            alert('data berhasil dihapus! ');
            document.location.href = 'index.php';
        </script>";
    } else {
        "<script>
            alert('data gagal dihapus! ');
             document.location.href = 'index.php';
        </script>";
}
?>