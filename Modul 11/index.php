<?php
    $conn = mysqli_connect("localhost","root","","perpustakaan");
    $result = mysqli_query($conn, "SELECT * FROM buku ");
    
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
            <div class="image">
                <img src="toko buku.jpeg" alt="">
                <h1>Purnami's Bookstore</h1>
            </div>
            <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="tentang.html">Tentang</a></li>
                <li><a href="galeri.html">Galeri</a></li>
                <li><a href="kontak.html">Kontak</a></li>
            </ul>
            <div class="content2">
                <h2>Selamat Datang</h2>
                <p>Kami menyediakan berbagai macam jenis buku, mulai dari buku pelajaran, buku cerita, novel, kamus, buku kuliah, dan sebagainya</p>
                <h2>Galeri</h2>
                <?php 
                    $filter="";
                    $sort="";
                    // if(isset($_POST['search'])){
                    //     $filter=$_POST['filter'];
                    //     $sort=$_POST['sort'];
                    // }
                ?>
                <table>
                    <form action="" method="POST">
                    <tr>
                        <td>Filter berdasarakan : 
                            <select name="filter" id="filter">
                                <option value="" ></option>
                                <optgroup label="Jenis Buku">
                                    <option value="Komputer" >Komputer</option>
                                    <option value="Pertanian" >Pertanian</option>
                                    <option value="Kedokteran">Kedokteran</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                    <option value="Farmasi">Farmasi</option>
                                </optgroup>
                            </select>
                        </td>
                        <td>Sort berdasarakan : 
                            <select name="sort" id="sort">
                                <option value="" ></option>
                                <option value="namabuku">Nama buku sesuai abjad</option>
                                <option value="tahunterbit">Tahun terbit dari kecil ke besar</option>      
                            </select>
                        </td>
                        <td><button id="search" name="search">Cari</button></td>
                    </tr>
                    </form>
                </table>
                <?php 
                    if(isset($_POST['search'])){
                        $filter=$_POST['filter'];
                        $sort=$_POST['sort'];
                        if($sort=="namabuku"){
                            $result = mysqli_query($conn, "SELECT * FROM buku WHERE jenis_buku LIKE '%$filter%' ORDER BY nama_buku ASC  ");
                        }elseif($sort=="tahunterbit"){
                            $result = mysqli_query($conn, "SELECT * FROM buku WHERE jenis_buku LIKE '%$filter%' ORDER BY tahun_terbit ASC  ");
                        }else if($sort==""){
                            $result = mysqli_query($conn, "SELECT * FROM buku WHERE jenis_buku LIKE '%$filter%' ");
                        }
                    }
                ?>
                
                <?php while($row=mysqli_fetch_assoc($result)): ?>
                    <div class="img">
                        <img src="Buku/<?= $row["gambar"]; ?>" alt="">
                        <p>Judul : <?= $row["nama_buku"]; ?> <br>
                        Jenis Buku : <?= $row["jenis_buku"]; ?> <br>
                        Penerbit : <?= $row["penerbit"]; ?><br>
                        Penulis : <?= $row["penulis"]; ?> <br>
                        Tahun Terbit : <?= $row["tahun_terbit"]; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="footer">
            Copyright 2020 Purnami Indryaswari
        </div>
    </body>
</html>