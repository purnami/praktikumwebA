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
            <h1>Tentang Purnami's Bookstrore</h1>
            <h3>Kami menyediakan berbagai macam jenis buku, mulai dari buku pelajaran, buku cerita, novel, kamus, buku kuliah, dan sebagainya</h3>
        </div>
        <div class="footer">
            Copyright 2020 Purnami Indryaswari
        </div>
    </body>
</html>