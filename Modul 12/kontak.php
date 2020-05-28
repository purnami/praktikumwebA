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
            <h1>Kontak Purnami's Bookstrore</h1>
            <p>Handphone : 081234567890 <br>
            WhatApp : 081234567890 <br>
            Facebook : purnami's bookstore <br>
            Instagram : @purnami'sbookstore</p>
        </div>
        <div class="footer">
            Copyright 2020 Purnami Indryaswari
        </div>
    </body>
</html>