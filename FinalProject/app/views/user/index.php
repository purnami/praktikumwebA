<?php
// session_start();
$nama=$_SESSION["nama"];
$iduser=$_SESSION["id"];
// if($_SESSION["alert"]!=""){
//   $alert=$_SESSION["alert"];
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= BASEURL; ?>home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= BASEURL; ?>home/css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Sistem Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#katalog">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#tentang">Tentang</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#kontak">Kontak</a>
          </li>
          <li class="nav-item dropdown ml-4">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $nama; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item btnEditProfil" href="#" data-toggle="modal" data-target="#editProfilModal" data-id="<?= $iduser; ?>" >Edit Profile</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#peminjamanModal">Riwayat Peminjaman</a>
              <a class="dropdown-item" href="<?= BASEURL; ?>user/logout">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Modal peminjaman-->
<div class="modal fade" id="peminjamanModal" tabindex="-1" role="dialog" aria-labelledby="peminjamanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="peminjamanModalLabel">Riwayat Peminjaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Status Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <!-- <th>Aksi</th> -->
              </tr>
            </thead>
            <div>
            <?php 
            $i=1;
            foreach ($data['pinjam'] as $pinjam) : ?>
            <tbody class="tbody" data-idpinjam="<?= $pinjam['id']; ?>">
              <tr >
                <td><?= $i; ?></td>
                <td><?= $pinjam['nama_buku'];?></td>
                <?php 
                  if($pinjam['status']==0){  ?>
                    <td>Belum disetujui</td>
                <?php   }else if($pinjam['status']==1){ ?>
                    <td>Telah Disetujui</td>
                  <?php  }else if($pinjam['status']==-1){ ?>
                    <td>Tidak Disetujui</td>
                  <?php  } ?>
                <?php 
                  if($pinjam['status']==0 || $pinjam['status']==-1){ ?>
                    <td>-</td>
                <?php   }else{ ?>
                    <td><?= $pinjam['tgl_pinjam'];?></td>
                  <?php  } ?>
                  <?php 
                  if($pinjam['status']==0 || $pinjam['status']==-1){ ?>
                    <td>-</td>
                <?php   }else{ ?>
                    <td><?= $pinjam['tgl_kembali'];?></td>
                  <?php  } ?>
                
                <!-- <td>
                <button type="button" id="btbatal<?= $pinjam['id']; ?>" class="btn btn-primary btnbatal" data-id="<?= $batal['id'];?>">Batalkan</button> -->
                <!-- <a href="" class="btn btn-primary btnbatal" >Batalkan</a>  -->
                
                <!-- </td> -->
              </tr>

              <?php 
            $i++;
            endforeach; ?>
            </tbody>
            </div>
            
          </table>
        </div>
      </div>
      </div>
      <!-- <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div> -->
      <!-- </form> -->
    </div>
  </div>
</div>

 


  <header class="bg-primary text-white" id="home">
    <div class="container text-center">
      <h1>Selamat Datang <?= $nama; ?></h1>
    </div>
  </header>

  <section id="katalog">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="mb-5">Katalog Buku</h2>
            <form action="<?= BASEURL; ?>user/cari1" method="POST">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label>Cari disini : </label>
                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="cari...." autocomplete="off">
              </div>
              <div class="form-group col-md-2 mt-4 pt-2">
                  <button type="submit" class="btn btn-primary">Cari</button>
                </div>
              </div>
              </form>
              <p style="text-align: center; color: rgb(172, 169, 169);" class="pr-5">atau</p>
              <form action="<?= BASEURL; ?>user/cari2" method="POST">
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label>Filter berdasarkan : </label>
                  <select class="form-control" name="filter" id="filter">
                    <option value="" ></option>
                    <optgroup label="Kategori Buku">
                      <option value="Komputer" >Komputer</option>
                      <option value="Pertanian" >Pertanian</option>
                      <option value="Kedokteran">Kedokteran</option>
                      <option value="Teknik Sipil">Teknik Sipil</option>
                      <option value="Farmasi">Farmasi</option>
                    </optgroup>
                  </select>
                </div>
                <div class="form-group col-md-5">
                  <label>Sort berdasarakan :</label>
                  <select class="form-control" name="sort" id="sort">
                    <option value="" ></option>
                    <option value="namabuku">Nama buku sesuai abjad</option>
                    <option value="tahunterbit">Tahun terbit dari kecil ke besar</option>   
                  </select>
                </div>
                <div class="form-group col-md-2 mt-4 pt-2">
                  <button type="submit" class="btn btn-primary">Cari</button>
                </div>
              </div>
            <div class="row">
          </form>
          <?php foreach ($data['buku'] as $book) : ?>
            <form action="<?= BASEURL; ?>user/pinjam" method="POST">
          <a href="#" data-toggle="modal" data-target="#bukuModal" data-id="<?= $book['id'];?>" class="modalDetailBuku">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100" style="width: 12rem; ">
              <img style="width: 12rem; height: 15rem; " class="card-img-top " src="<?= BASEURL; ?>img/Buku/<?= $book['gambar'];?>" alt="">
              <div class="card-body">
                <h5 class="card-title"><?= $book['nama_buku']; ?></h5>
                <input type="hidden" class="form-control" name="idbuku" id="idbuku" value="<?= $book['id']; ?>">
                <input type="hidden" class="form-control" name="iduser" id="iduser" value="<?= $iduser; ?>">
              </div>
              </a>
              <button type="submit" id="btpinjam<?= $book['id']; ?>" data-id="<?= $book['id']; ?>" class="btn btn-primary btnpinjam">Pinjam</button>
              
            </div>
          </div>
          </form>
          <?php endforeach; ?>
          </div>
    </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
<div class="modal fade" id="bukuModal" tabindex="-1" role="dialog" aria-labelledby="bukuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bukuModalLabel">Detail Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
              <div class="col-md-8" id="detailbuku"></div>
              <div class="col-md-4" id="gambar"></div>
            </div>
      </div>
    </div>
  </div>
</div>



  <section id="tentang" class="bg-light"> 
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="mb-5">Tentang Sistem Perpustakaan</h2>
          <p class="lead">Kami menyediakan berbagai macam jenis buku, mulai dari buku pelajaran, buku cerita, novel, kamus, buku kuliah, dan sebagainya</p>
          
        </div>
      </div>
    </div>
  </section>


  <section id="kontak">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="mb-5">Kontak Kami</h2>
          <p>Handphone : 081234567890 <br>
            WhatApp : 081234567890 <br>
            Facebook : perpustakaan purnami <br>
            Instagram : @perpustakaanpurnami</p>
        </div>
      </div>
    </div>
  </section>

  

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Modal edit profil-->
 <div class="modal fade" id="editProfilModal" tabindex="-1" role="dialog" aria-labelledby="editProfilModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfilModalLabel">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL; ?>user/editProfil" method="post">
      <div class="modal-body">
      <input type="hidden" id="id" name="id">
      <div class="form-group">
          <input type="text" class="form-control form-control-user" id="nama" name="nama" aria-describedby="namaHelp" placeholder="Nama Admin">
        </div>
        <div class="form-group">
          <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Password">
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
          </div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= BASEURL; ?>home/vendor/jquery/jquery.min.js"></script>
  <script src="<?= BASEURL; ?>home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?= BASEURL; ?>home/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  
  <script src="<?= BASEURL; ?>home/js/scrolling-nav.js"></script>
  <script src="<?=BASEURL;?>admin/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  
  <script>
  
  $(function(){
    // $('.btnbatal').on('click', function(){
    //   console.log("ok1");
    // });
    // $('.tbody').on('click', function(){
    //   console.log("ok2");
    //   const idpinjam =$(this).data('idpinjam');
    //   console.log(idpinjam);
    // });
    
    var gambar= new Image(150, 200);
    
    
    $('.modalDetailBuku').on('click', function(){
      const id=$(this).data('id');
      
      // console.log(id);
      $.ajax({
        url: "http://localhost/PraktikumWebA/FinalProject/public/user/getdetailbuku/",
        data: {id : id},
        method: "POST",
        dataType: 'json',
        success: function(data){
          $('#detailbuku').html('Nama Buku : '+data.nama_buku+'<br>Kategori Buku : '+data.jenis_buku+
          '<br>Penulis : '+data.penulis+'<br>Penerbit : '+data.penerbit+'<br>Tahun Terbit : '+data.tahun_terbit+
          '<br>Nomor Rak : '+data.no_rak);
          
          gambar.src = 'http://localhost/PraktikumWebA/FinalProject/public/img/Buku/'+data.gambar;
          x=document.getElementById('gambar');
          x.appendChild(gambar);
          console.log(data);
        }
		  });
    });

    $('.btnEditProfil').on('click', function(){
		console.log("ok");
	

		const id=$(this).data('id');
		console.log(id);
		$.ajax({
			url: "http://localhost/PraktikumWebA/FinalProject/public/user/geteditprofil/",
			data: {id : id},
			method: "POST",
			dataType: 'json',
			success: function(data){
				$('#nama').val(data.nama);
				$('#email').val(data.email);
        $('#pass').val(data.password);
        $('#id').val(data.id);
        
				console.log(data);
			}
    });
  });
  });
  </script>

</body>

</html>
