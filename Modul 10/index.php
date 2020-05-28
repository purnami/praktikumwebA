<?php
    $conn = mysqli_connect("localhost","root","","phpdasar");
    $totalDataPerPage=3;
    $resultTotalData=mysqli_query($conn, "SELECT * FROM mahasiswa");
    $totalData=mysqli_num_rows($resultTotalData);
    $totalPage=ceil($totalData/$totalDataPerPage);
    $activePage=( isset($_GET["page"])) ? $_GET["page"] : 1;
    $initialData= ($totalDataPerPage * $activePage) - $totalDataPerPage;

    $result = mysqli_query($conn, "SELECT * FROM mahasiswa LIMIT $initialData, $totalDataPerPage");
    
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
        <br><br>
        <?php if($activePage>1): ?>
            <a href="index.php?page=<?= $activePage - 1; ?>">&laquo;</a>
        <?php endif; ?>
        <?php for($i=1; $i<=$totalPage; $i++) : ?>
            <?php if( $i == $activePage ): ?>
                <a href="index.php?page=<?= $i; ?>" style="font-weight: bold; color: red; "><?= $i; ?></a>
            <?php else: ?>
                <a href="index.php?page=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if($activePage<$totalPage): ?>
            <a href="index.php?page=<?= $activePage + 1; ?>">&raquo;</a>
        <?php endif; ?>
        <br><br> 
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