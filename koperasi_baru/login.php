<?php 
session_start();

if( isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

require 'config.php';

if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){
        
        // cek  password
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {
            // Set session login dan level
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["level"] = $row["level"]; 
        
            // Arahkan sesuai level
            if ($_SESSION["level"] === "admin") {
                header("Location: index_admin.php");
            } else {
                header("Location: index.php");
            }
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php if(isset($error)): ?>
            <p>Username atau password salah</p>
    <?php endif ?>

    <h1>halaman login</h1>

    <form method="post" action="">
         <div>
             <label for="username">Username</label>
             <Input type="text" name="username" id="username">
         </div>

         <div>
             <label for="password">Password</label>
             <Input type="password" name="password" id="password">
         </div>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>