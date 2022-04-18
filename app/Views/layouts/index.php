<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fa/css/all.css">
    <!-- Izitoast -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/alert/iziToast.min.css">
    <title><?= $title; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid py-2 px-md-5">
        <a class="navbar-brand fw-bold d-none d-md-block" href="#">Selamat Datang</a>
        <a class="navbar-brand fw-bold d-block d-md-block" href="#">Hai, <?= session('nama'); ?></a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav">               
            <li class="nav-item dropdown d-none d-md-block">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hai, <?= session('nama'); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Setting Akun</a></li>
                <li><a class="dropdown-item text-danger fw-bold" href="<?= base_url('/logout'); ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
              </ul>
            </li>
            <li class="nav-item d-block d-md-none">
                <a href="" class="nav-link">Setting Akun</a>
                <a class="nav-link fw-bold" href="<?= base_url('/logout'); ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?= $this->renderSection('content'); ?>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/assets/plugins/alert/iziToast.min.js"></script>
    <?= $this->renderSection('js'); ?> 
  </body>
</html>