<?php
session_start();
$admin=$_SESSION["nama"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?=BASEURL;?>admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=BASEURL;?>admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?=BASEURL;?>admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $admin; ?></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= BASEURL; ?>admin/index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="<?= BASEURL; ?>admin/buku">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Buku</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="<?= BASEURL; ?>admin/pinjam">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Peminjaman</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
      <a class="nav-link" href="<?= BASEURL; ?>user/logout">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><h5><?= $admin; ?></h5></span>
    </ul>

  </nav>
  <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manajemen Buku</h1>
          </div>

         <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <button type="button" class="btn btn-primary modalTambahBuku" data-toggle="modal" data-target="#tambahBukuModal">Tambah Buku Baru</button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Buku</th>
            <th>Kategori Buku</th>
            <th>Stok</th>
          </tr>
        </thead>
        <?php 
        $i=1;
        foreach ($data['buku'] as $buku) : ?>
        <tbody>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $buku['nama_buku'];?></td>
            <td><?= $buku['jenis_buku'];?></td>
            <td>
            <button type="button" id="btdetail<?= $buku['id']; ?>" class="btn btn-info ml-2 modalDetailBuku" data-id="<?= $buku['id'];?>" data-toggle="modal" data-target="#bukuModal">Detail</button>
            <button type="button" id="btedit<?= $buku['id']; ?>" class="btn btn-success  modalEditBuku" data-id="<?= $buku['id'];?>" data-toggle="modal" data-target="#tambahBukuModal">Edit</button>
            <a href="<?=BASEURL;?>admin/hapusbuku/<?= $buku['id']; ?>" style="color: white;" id="bthapus<?= $buku['id']; ?>" class="btn btn-danger btnhapus" data-id="<?= $buku['id'];?>">Hapus</a>
            </td>
          </tr>

          <?php 
        $i++;
        endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

   
  <!-- Modal tambahBuku-->
  <div class="modal fade" id="tambahBukuModal" tabindex="-1" role="dialog" aria-labelledby="tambahBukuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL; ?>admin/tambahBuku" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      <input type="hidden" id="id" name="id">
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="nama" name="nama" aria-describedby="namaHelp" placeholder="Nama Buku">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="jenis" name="jenis" aria-describedby="jenisHelp" placeholder="Kategori Buku">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="penulis" name="penulis" aria-describedby="penulisHelp" placeholder="Penulis">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" aria-describedby="penerbitHelp" placeholder="Penerbit">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="tahun" name="tahun" aria-describedby="tahunHelp" placeholder="Tahun Terbit">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="rak" name="rak" aria-describedby="rakHelp" placeholder="Nomor Rak">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="stok" name="stok" aria-describedby="stokHelp" placeholder="Stok">
        </div>
        <div class="form-group">
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="gambar" name="gambar">
				<label class="custom-file-label" for="gambar">Pilih file gambar</label>
			</div>
		</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal detail-->
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
              <div class="col-md-4" id="gbr"></div>
            </div>
      </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Purnami 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=BASEURL;?>admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?=BASEURL;?>admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=BASEURL;?>admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=BASEURL;?>admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=BASEURL;?>admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=BASEURL;?>admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=BASEURL;?>admin/js/demo/datatables-demo.js"></script>

  <script>
  $(function(){
    $('.custom-file-input').on('change', function(){
      let fileName=$(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    }); 
    
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
          '<br>Nomor Rak : '+data.no_rak+'<br>Stok : '+data.stok);
          
          gambar.src = 'http://localhost/PraktikumWebA/FinalProject/public/img/Buku/'+data.gambar;
          x=document.getElementById('gbr');
          x.appendChild(gambar);
          console.log(data);
        }
		  });
    });

    
    $('.modalEditBuku').on('click', function(){
		// console.log("ok");
		$('#tambahBukuModalLabel').html('Edit Buku');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-content form').attr('action', 'http://localhost/PraktikumWebA/FinalProject/public/admin/editBuku/');

		const id=$(this).data('id');
		// console.log(id);
		$.ajax({
			url: "http://localhost/PraktikumWebA/FinalProject/public/admin/geteditbuku/",
			data: {id : id},
			method: "POST",
			dataType: 'json',
			success: function(data){
				$('#nama').val(data.nama_buku);
				$('#jenis').val(data.jenis_buku);
				$('#penulis').val(data.penulis);
        $('#penerbit').val(data.penerbit);
        $('#tahun').val(data.tahun_terbit);
				// $('#gambar').val(data.gambar);
        $('#rak').val(data.no_rak);
        $('#stok').val(data.stok);
				$('#id').val(data.id);
				console.log(data);
			}
    });
  
  });
  
  // $('.btnhapus').on('click', function(){
  //   const id=$(this).data('id');
	// 	// console.log(id);
	// 	$.ajax({
	// 		url: "http://localhost/PraktikumWebA/FinalProject/public/admin/hapusbuku/",
	// 		data: {id : id},
	// 		method: "POST",
	// 		dataType: 'json',
	// 		success: function(data){
	// 			// $('#nama').val(data.nama_buku);
	// 			// $('#jenis').val(data.jenis_buku);
	// 			// $('#penulis').val(data.penulis);
  //       // $('#penerbit').val(data.penerbit);
  //       // $('#tahun').val(data.tahun_terbit);
	// 			// // $('#gambar').val(data.gambar);
  //       // $('#rak').val(data.no_rak);
  //       // $('#stok').val(data.stok);
	// 			// $('#id').val(data.id);
	// 			console.log(data);
	// 		}
  //   });
  // });

  });
  </script>


</body>

</html>

      