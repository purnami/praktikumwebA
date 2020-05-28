<?php
    $conn = mysqli_connect("localhost","root","","phpdasar");
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    // $row=mysqli_fetch_row($result);
    // var_dump($row);
    // $assoc=mysqli_fetch_assoc($result);
    // var_dump($assoc);
    // $array=mysqli_fetch_array($result);
    // var_dump($array);
    // $object=mysqli_fetch_object($result);
    // var_dump($object);
    // while($mhs=mysqli_fetch_assoc($result)){
    //     var_dump($mhs);
    // }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mahasiswa</title>
    </head>
    <body> 
        <h1>Daftar Mahasiswa</h1>
        <a href="tambah.php">Tambah Data</a>
        <table border="1" cellpadding="5" style="text-align: center;">
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Gambar</th>
                <th>Opsi</th>
            </tr>
            <?php 
            $i=1;
            while($row=mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><img src="<?= $row["gambar"]; ?>" alt=""></td>
                <td><a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>|<a href="hapus.php?id=<?= $row["id"]; ?>">hapus</a></td>
                <?php $i++; ?>
            </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>