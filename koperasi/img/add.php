<?php 
require 'function.php';
if(isset($_POST["submit"])) {

    if(tambah($_POST) > 0 ){
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'advancedtampil.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'advancedtampil.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Victim Here</title>
    <style>
        body {
            align-items: center;
            background-color: #000;
            display: flex;
            justify-content: center;
            height: 100vh;
            margin: 0;
            flex-direction: column; /* Align items vertically */
        }

        /* Container for form and the button */
        .form-container {
            display: flex;
            align-items: flex-start; /* Align button and form to the top */
            gap: 20px; /* Space between the button and the form */
        }

        /* Styling for the button */
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
            background-color: #dc2f55;
        }

        /* Styling for the form */
        .form {
            background-color: #15172b;
            border-radius: 20px;
            box-sizing: border-box;
            padding: 20px;
            width: 320px;
        }

        .title {
            color: #eee;
            font-family: sans-serif;
            font-size: 36px;
            font-weight: 600;
            margin-top: 30px;
            text-align: center;
        }

        .subtitle {
            color: #eee;
            font-family: sans-serif;
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
            text-align: center;
        }

        .input-container {
            height: 50px;
            position: relative;
            width: 100%;
        }

        .input-container.ic1 {
            margin-top: 40px;
        }

        .input-container.ic2 {
            margin-top: 30px;
        }

        .input {
            background-color: #303245;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            font-size: 18px;
            height: 100%;
            outline: 0;
            padding: 4px 20px 0;
            width: 100%;
        }

        .cut {
            background-color: #15172b;
            border-radius: 10px;
            height: 20px;
            left: 20px;
            position: absolute;
            top: -20px;
            width: 76px;
            transition: transform 200ms;
        }

        .cut-short {
            width: 50px;
        }

        .input:focus ~ .cut,
        .input:not(:placeholder-shown) ~ .cut {
            transform: translateY(8px);
        }

        .placeholder {
            color: #65657b;
            font-family: sans-serif;
            left: 20px;
            line-height: 14px;
            pointer-events: none;
            position: absolute;
            transform-origin: 0 50%;
            transition: transform 200ms, color 200ms;
            top: 20px;
        }

        .input:focus ~ .placeholder,
        .input:not(:placeholder-shown) ~ .placeholder {
            transform: translateY(-30px) translateX(10px) scale(0.75);
        }

        .input:not(:placeholder-shown) ~ .placeholder {
            color: #808097;
        }

        .input:focus ~ .placeholder {
            color: #dc2f55;
        }

        .input-file {
            display: none; /* Sembunyikan input file default */
        }

        .file-label {
            background-color: #303245;
            color: #eee;
            padding: 10px 20px;
            text-align: center;
            border-radius: 12px;
            cursor: pointer;
            display: inline-block;
            transition: background-color 0.3s ease;
            font-size: 16px;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }

        .file-label:hover {
            background-color: #4FC3A1;
        }

        .preview-container {
            margin-top: 20px;
            text-align: center;
        }

        .preview-image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 10px;
            border: 2px solid #4FC3A1;
            object-fit: cover;
        }

        .submit {
            background-color: #08d;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 50px;
            margin-top: 38px;
            width: 100%;
            text-align: center;
        }

        .submit:active {
            background-color: #06b;
        }

        /* Table styles for additional form fields */
        table {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <!-- Button on the left side -->
    <div class="form-container">
        <a href="advancedtampil.php" class="button">Kembali</a>
        
        <!-- The form on the right side -->
        <div class="form">
            <div class="title">Data Siswa</div>
            <div class="subtitle">Silahkan Masukan data</div>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-container ic1">
                    <input id="nis" class="input" type="text" name="nis" placeholder=" " required />
                    <div class="cut"></div>
                    <label for="nis" class="placeholder">NIS</label>
                </div>

                <div class="input-container ic2">
                    <input id="nama" class="input" type="text" name="nama" placeholder=" " required />
                    <div class="cut"></div>
                    <label for="nama" class="placeholder">Nama Siswa</label>
                </div>

                <div class="input-container ic2">
                    <select id="jurusan" class="input" name="jurusan" required>
                        <option value="">>--Pilih Jurusan--<</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
                        <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                    </select>
                    <div class="cut"></div>
                    <label for="jurusan" class="placeholder">Jurusan</label>
                </div>

                <div class="input-container ic2">
                    <input id="email" class="input" type="text" name="email" placeholder=" " required />
                    <div class="cut cut-short"></div>
                    <label for="email" class="placeholder">Email Siswa</label>
                </div>

                <div class="input-container ic2">
                    <input id="foto" class="input-file" type="file" name="foto" accept="image/*" required onchange="previewImage(event)" />
                    <label for="foto" class="file-label">Upload Foto Siswa</label>
                </div>
                
                <div class="preview-container">
                    <img id="preview" class="preview-image" src="#" alt="Preview Foto Siswa" style="display: none;" />
                </div>

                <script>
                function previewImage(event) {
                    const preview = document.getElementById('preview');
                    const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                            preview.src = e.target.result;
                            preview.style.display = "block"; // Tampilkan gambar
                            };
                        reader.readAsDataURL(file);
                        }
                }
                </script>



                <button type="submit" name="submit" class="submit">Kirim Data Siswa</button>
            </form>
        </div>
    </div>
</body>
</html>
