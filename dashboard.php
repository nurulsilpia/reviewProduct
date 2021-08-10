<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/product/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatables CSS CDN Link -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    
    <title>Dashboard</title>
  </head>
  <body>
    <!--PEMBUKA NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id=home>
    <div class="container-fluid mx-4">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Input Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="?menu=user">User</a></li>
              <li><a class="dropdown-item" href="?menu=jenis">Jenis</a></li>
              <li><a class="dropdown-item" href="?menu=product">Product</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary text-white" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <br>
    <!-- PENUTUP NAVBAR -->

    <?php
    switch(@$_GET['menu']){
        case 'user';
        include 'user.php';
        break;

        case 'jenis';
        include 'jenis.php';
        break;

        case 'product';
        include 'product.php';
        break;
    }
    ?>

    <!--PEMBUKA BODY DASHBOARD-->
    <section id="dashboard">
      
    </section>

    <?php if(@$_GET['menu'] == "") { ?>
      <section>
        <div class="text-center">
          <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background: url(images/bg.png); background-repeat: no-repeat; background-size: cover;">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
              <h1 class="display-4 fw-normal">Welcome</h1>
              <p class="lead fw-normal">Kelola Produkmu Sendiri Dengan Lebih Mudah. Mulai Dari Ubah Akun Hingga Mengatur Jenis Produk</p>
              <a class="btn btn-outline-secondary" href="#">Coming soon</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
          </div>

          <div class="img d-flex flex-wrap justify-content-center mb-5">
            <div class="img-user shadow m-3">
              <a href="?menu=user" class="text-decoration-none text-dark">
              <h3 class="mt-2 ">User</h3>
                <img src="images/user.svg" width="300" class="px-5">
              </a>
              <p class="m-2" style="max-width: 300px;">
                Hapus Akun Atau Ubah Kata Sandi Dan Username 
              </p>
            </div>
            <div class="img-jenis shadow m-3">
              <a href="?menu=jenis" class="text-decoration-none text-dark">
              <h3 class="mt-2">Jenis</h3>
                <img src="images/jenis.svg" width="300" class="px-5">
              </a>
              <p class="m-2" style="max-width: 300px;">
                Edit, Hapus, Atau Tambahkan Jenis Pruduk Anda
              </p>
            </div>
            <div class="img-product shadow m-3">
              <a href="?menu=product" class="text-decoration-none text-dark">
              <h3 class="mt-2">Produk</h3>
                <img src="images/product.svg" width="250" class="px-5">
              </a>
              <p class="m-2" style="max-width: 300px;">
                Kelola Detail Produk Anda
              </p>
            </div>
          </div>
        </div>
      </section>

    <?php } ?>
      
    <!-- PENUTUP BODY DASHBOARD -->



   <!-- Datatables CDN JS -->
   <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
      $('.datatab').DataTable();
    } );
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>