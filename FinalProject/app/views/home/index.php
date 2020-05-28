
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home</title>

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
            <a class="nav-link js-scroll-trigger" href="#tentang">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#kontak">Kontak</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= BASEURL; ?>home/login">Login</a>
          </li> -->
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="" data-toggle="modal" data-target="#loginModal">Login</a>
          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="" data-toggle="modal" data-target="#regisModal">Registrasi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Modal Login-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">LOGIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL; ?>home/login" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Password">
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Regis-->
<div class="modal fade" id="regisModal" tabindex="-1" role="dialog" aria-labelledby="regisModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="regisModalLabel">Registrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL; ?>home/regis" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="nama" name="nama" aria-describedby="emailHelp" placeholder="Nama">
        </div>
        <div class="form-group">
          <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Password">
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Registrasi</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <header class="bg-primary text-white" id="home">
    <div class="container text-center">
      <h1>Selamat Datang Di Sistem Perpustakaan</h1>
    </div>
  </header>

  <section id="tentang">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Tentang Sistem Perpustakaan</h2>
          <p class="lead">Kami menyediakan berbagai macam jenis buku, mulai dari buku pelajaran, buku cerita, novel, kamus, buku kuliah, dan sebagainya</p>
          
        </div>
      </div>
    </div>
  </section>

  <section id="kontak" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Kontak Kami</h2>
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

  <!-- Bootstrap core JavaScript -->
  <script src="<?= BASEURL; ?>home/vendor/jquery/jquery.min.js"></script>
  <script src="<?= BASEURL; ?>home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?= BASEURL; ?>home/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="<?= BASEURL; ?>home/js/scrolling-nav.js"></script>

</body>

</html>
