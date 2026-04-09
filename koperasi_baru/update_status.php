<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'config.php';

if (!isset($_POST['id']) || !isset($_POST['status'])) {
    header('Location: index_admin.php');
    exit;
}

$id = htmlspecialchars($_POST['id']);
$status = htmlspecialchars($_POST['status']);
$validStatuses = ['Menunggu', 'Diproses', 'Selesai'];

if (!in_array($status, $validStatuses)) {
    $status = 'Menunggu';
}

if (update_status(['id' => $id, 'status' => $status]) >= 0) {
    echo "<script>
        alert('Status berhasil diupdate!');
        document.location.href = 'index_admin.php';
    </script>";
} else {
    echo "<script>
        alert('Status gagal diupdate.');
        document.location.href = 'index_admin.php';
    </script>";
}
