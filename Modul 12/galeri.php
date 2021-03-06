<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Toko Buku</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="left">
            <div class="content">
                <img src="logo.png" alt="">
                <p>Artikel Populer</p>
                <ul class="list">
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="tentang.html">TENTANG</a></li>
                    <li><a href="galeri.html">GALERI</a></li>
                    <li><a href="kontak.html">KONTAK</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <h1>Galeri Purnami's Bookstrore</h1>
            <div class="img">
                <img src="buku1.PNG" alt="">
                <p>Judul : Buku sakti HTML, CSS & Javascript <br>
                Penerbit : Anak Hebat Indonesia <br>
                Penulis : Adam Saputra <br>
                Jumlah Hal. : 196</p>
                <h5>Rp. 60.000,00</h5>
            </div>
            <div class="img">
                <img src="buku2.PNG" alt="">
                <p>Judul : Novel buy my life<br>
                    Penerbit : Histeria<br>
                    Penulis : Mrs. Mathrange<br>
                    Jumlah Hal. : 635</p>
                    <h5>Rp. 87.600,00</h5>
            </div>
            <div class="img">
                <img src="buku3.PNG" alt="">
                <p>Judul : Berdamai dengan diri sendiri<br>
                    Penerbit : Anak Hebat Indonesia <br>
                    Penulis : Mutia Sayekti <br>
                    Jumlah Hal. : 224</p>
                    <h5>Rp. 42.500,00</h5>
            </div>
        </div>
        <div class="footer">
            Copyright 2020 Purnami Indryaswari
        </div>
    </body>
</html>