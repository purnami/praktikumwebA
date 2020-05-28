<?php
    session_start();

    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    $conn = mysqli_connect("localhost","root","","perpustakaan");
    if(isset($_POST["login"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username= '$username' AND password= '$password' ");

        if(mysqli_num_rows($result) === 1){
            $row=mysqli_fetch_assoc($result);
            if($row["username"]=="admin"){
                $_SESSION["user"]="admin";
            }else{
                $_SESSION["user"]="user";
            }
            $_SESSION["login"]=true;
            header("Location: index.php");
            exit;
        }
        $error=true;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Login</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body>
        <h1>Halaman Login</h1>
        <?php if(isset($error)): ?>
            <p style="color: red; font-style: italic;">Username/password salah</p>
        <?php endif; ?>
        <form action="" method="post">
            <div><input type="text" name="username" id="username" placeholder="Username"></div>
            <div><input type="password" name="password" id="password" placeholder="Password"></div>
            <div><button type="submit" name="login">Login</button></div>
        </form>
        <div class="footer">
            Copyright 2020 Purnami Indryaswari
        </div>
    </body>
</html>