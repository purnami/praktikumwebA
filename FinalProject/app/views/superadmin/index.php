<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Super Admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?=BASEURL;?>admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=BASEURL;?>admin/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link href="<?=BASEURL;?>admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

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
        <div class="sidebar-brand-text mx-3">Super Admin</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" >
        <a id="dashboard" class="nav-link" href="<?= BASEURL; ?>superadmin/index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active" >
        <a id="admin" class="nav-link" href="<?= BASEURL; ?>superadmin/admin">
          <i class="fas fa-fw fa-id-card"></i>
          <span>Admin</span></a>
      </li>
      <li class="nav-item active" id="user">
        <a class="nav-link" href="<?= BASEURL; ?>superadmin/user">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="<?= BASEURL; ?>superadmin/buku">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Buku</span></a>
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
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><h5>Super Admin</h5></span>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" id="maincontent">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row"> 

            <!-- Earnings (Monthly) Card Example -->
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
              <a href="<?= BASEURL; ?>superadmin/admin">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                  
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" >Jumlah Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmladmin">5</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-id-card fa-3x text-gray-300"></i>
                    </div>
                   
                  </div>
                </div>
                </a>
              </div>
            </div>
            
            

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
              <a href="<?= BASEURL; ?>superadmin/user">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmluser">10</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-user fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
              <a href="<?= BASEURL; ?>superadmin/buku">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Buku</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmlbuku">100</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-book-open fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
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
  <script src="<?=BASEURL;?>admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=BASEURL;?>admin/js/demo/chart-area-demo.js"></script>
  <script src="<?=BASEURL;?>admin/js/demo/chart-pie-demo.js"></script>
  <script>
  $(function(){
    $.ajax({
        url: "http://localhost/PraktikumWebA/FinalProject/public/superadmin/jmladmin/",
        dataType: 'json',
        success: function(data){
          $('#jmladmin').html(data);
          
        console.log(data);
        }
	});
  $.ajax({
        url: "http://localhost/PraktikumWebA/FinalProject/public/superadmin/jmluser/",
        dataType: 'json',
        success: function(data){
          $('#jmluser').html(data);
          
        console.log(data);
        }
	});
  $.ajax({
        url: "http://localhost/PraktikumWebA/FinalProject/public/superadmin/jmlbuku/",
        dataType: 'json',
        success: function(data){
          $('#jmlbuku').html(data);
          
        console.log(data);
        }
	});

    const dashboard= document.getElementById('dashboard');
    dashboard.onclick=fungsi;
    function fungsi(){
      $('#maincontent').html('dsdgsd');
    }
   
  });
  </script>
</body>

</html>

      