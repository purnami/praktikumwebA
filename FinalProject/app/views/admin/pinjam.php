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
            <h1 class="h3 mb-0 text-gray-800">Manajemen Peminjaman Buku</h1>
          </div>

         <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Nama Buku</th>
            <th>Status</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php 
        $i=1;
        foreach ($data['pinjam'] as $pinjam) : ?>
        <tbody>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $pinjam['nama'];?></td>
            <td><?= $pinjam['nama_buku'];?></td>
            <?php 
              if($pinjam['status']==1){ 
                $btn="Tolak"; ?>
                <td id="stspinjam<?= $pinjam['id_pinjam']; ?>">Telah Disetujui</td>
             <?php   }else if($pinjam['status']==0){ 
               $btn="Setuju";?>
                <td id="stspinjam<?= $pinjam['id_pinjam']; ?>">Belum disetujui</td>
              <?php  }else if($pinjam['status']==-1){ 
               $btn="Setuju";?>
                <td id="stspinjam<?= $pinjam['id_pinjam']; ?>">Tidak disetujui</td>
              <?php  }
            ?>
            <td id="tglpinjam<?= $pinjam['id_pinjam']; ?>"><?= $pinjam['tgl_pinjam'];?></td>
            <td id="tglkembali<?= $pinjam['id_pinjam']; ?>"><?= $pinjam['tgl_kembali'];?></td>
            <td>
            <button type="button" id="btstspinjam<?= $pinjam['id_pinjam']; ?>" class="btn btn-primary btnstspinjam" data-id="<?= $pinjam['id_pinjam'];?>"><?= $btn; ?></button>
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
    $('.btnstspinjam').on('click', function(){
      const id=$(this).data('id');
    //   console.log(id);
      $.ajax({
        url: "http://localhost/PraktikumWebA/FinalProject/public/admin/editpinjam/",
        data: {id : id},
        method: "POST",
        dataType: 'json',
        success: function(data){
          if(data.status==1){
            $('#stspinjam'+id).html('Telah Disetujui');
            $('#btstspinjam'+id).html('Tolak');
            
          }else if(data.status==0){
            $('#stspinjam'+id).html('Belum disetujui');
            $('#btstspinjam'+id).html('Setuju');
          }else if(data.status==-1){
            $('#stspinjam'+id).html('Tidak disetujui');
            $('#btstspinjam'+id).html('Setuju');
          }
          
          $('#tglpinjam'+id).html(data.tgl_pinjam);
          $('#tglkembali'+id).html(data.tgl_kembali);
        console.log(data);
        }
	});
    });
  });
  </script>


</body>

</html>

      