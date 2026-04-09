<?php
require 'function.php';
$datamurid = query("SELECT * FROM siswa");

if(isset($_POST["cari"])){
    $datamurid = cari($_POST["keyword"]);
}

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atmint Only</title>
    <style>
        *{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        body {
            font-family: Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            background: rgba(71, 147, 227, 1);
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            font-size: 28px;
            color: white;
            padding: 30px 0;
        }

        h2 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            padding: 30px 0;
        }

        .search-container {
            text-align: center; 
            margin: 20px 0;
        }

        .caritextbox {
            padding: 8px;
            width: 250px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .caributton {
            padding: 8px 16px;
            background-color: #4FC3A1;
            color: white;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .caributton:hover {
            background-color: #324960;
        }

        /* Centering the Daftar Siswa title */
        .title-container {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Centering the "Tambah Siswa" Button */
        .center-button {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        /* Button Styling */
        a.button {
            display: inline-block;
            background-color: #4FC3A1;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #45a089;
        }

        /* Table Styles */
        .table-wrapper {
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td, .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #4FC3A1;
        }

        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }

        /* Action Buttons (Ubah, Hapus) */
        .action-buttons a {
            display: inline-block;
            background-color: #324960;
            color: white;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 12px;
            margin: 5px 5px;
            transition: background-color 0.3s ease;
        }

        .action-buttons a:hover {
            background-color: #2a3a47;
        }
        .action-buttons a:nth-child(1):hover {
            background-color: #81D4FA;
        }
        .action-buttons a:nth-child(2):hover {
            background-color: #EF5350;
        }

        /* Responsive Design */
        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }
            .table-wrapper:before {
                content: "Scroll horizontally >";
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }
            .fl-table thead, .fl-table tbody, .fl-table thead th {
                display: block;
            }
            .fl-table thead th:last-child {
                border-bottom: none;
            }
            .fl-table thead {
                float: left;
            }
            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }
            .fl-table td, .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }
            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }
            .fl-table tbody tr {
                display: table-cell;
            }
            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }
            .fl-table tr:nth-child(even) {
                background: transparent;
            }
            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="title-container">
        <h1>Daftar Siswa</h1>
    </div>

    <div class="search-container">
        <form action="" method="post">
            <input class="caritextbox" type="text" name="keyword" placeholder="Masukan keyword..." autofocus autocomplete="off">
            
            <button class="caributton" type="submit" name="cari">Cari</button>
        </form>
    </div>

    <!-- Centering the "Tambah Siswa" Button -->
    <div class="center-button">
        <a href="add.php" class="button">Tambah Siswa</a>
    </div>

    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Gambar</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($datamurid as $row): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td class="action-buttons">
                        <a href="edit.php?id=<?= $row['NIS']; ?>" class="button">Ubah</a>
                        <a href="delete.php?id=<?= $row["NIS"]; ?>" class="button" onclick="return confirm('Yakin?');">Hapus</a>
                    </td>
                    <td><img src="img/<?= $row["Foto"]; ?>" alt="murid" width="100" height="100"></td>
                    <td><?= $row["NIS"]; ?></td>
                    <td><?= $row["Nama"]; ?></td>
                    <td><?= $row["Jurusan"]; ?></td>
                    <td><?= $row["Email"]; ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
