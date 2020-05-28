<?php
require 'functions.php';
if(isset($_POST["submit"])){
    
    if(tambah($_POST)>0){
        echo "berhasil";
    }else{
        echo "gagal";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE hmtl>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tambah</title>
    </head>
    <body>
        <h1>Tambah data</h1>
        <form action="" method="post">
            <ul>
                <li>NIM : <input type="text" name="nim" id="" require></li>
                <li>Nama : <input type="text" name="nama" id="" require></li>
                <li>Email : <input type="text" name="email" id="" require></li>
                <li>Gambar : <input type="text" name="gambar" id="" require></li>
                <li><button type="submit" name="submit">Tambah</button></li>
            </ul>
            
        </form>
    </body>
</html>