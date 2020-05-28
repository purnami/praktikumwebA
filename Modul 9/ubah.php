<?php
require 'functions.php';
$id=$_GET["id"];
$query=mysqli_query($conn,"SELECT * FROM mahasiswa WHERE id=$id");
$mhs=mysqli_fetch_assoc($query);
if(isset($_POST["submit"])){
    
    if(ubah($id, $_POST)>0){
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
                <li>NIM : <input type="text" name="nim" id="" require value="<?= $mhs["nim"];?>"></li>
                <li>Nama : <input type="text" name="nama" id="" require value="<?= $mhs["nama"];?>"></li>
                <li>Email : <input type="text" name="email" id="" require value="<?= $mhs["email"];?>"></li>
                <li>Gambar : <input type="text" name="gambar" id="" require value="<?= $mhs["gambar"];?>"></li>
                <li><button type="submit" name="submit">Ubah</button></li>
            </ul>
            
        </form>
    </body>
</html>