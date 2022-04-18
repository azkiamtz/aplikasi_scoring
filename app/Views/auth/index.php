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
    <!-- Izitoast -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/alert/iziToast.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fa/css/all.css">
    <title><?= $title; ?></title>
  </head>
  <body>
      <div class="body">
          <div class="container py-5">
              <div class="row d-flex justify-content-center mt-5">
                  <div class="col-8 col-lg-4 mt-5">
                      <div class="card mt-4 rounded shadow">
                          <div class="card-header fw-bold text-center" style="font-size: 1.6rem;">Scoring Pencak Silat</div>
                          <div class="card-body p-4">
                              <h5 class="text-center">Login Here</h5>
                              <form action="<?= base_url(); ?>/authcontroller/loginProcess" method="post">
                                  <div class="form-group">
                                      <label for="" class="form-label">Username</label>
                                      <input type="text" name="username" class="form-control" placeholder="Masukan username...">
                                  </div>
                                  <div class="form-group my-2">
                                      <label for="" class="form-label">Password</label>
                                      <input type="password" name="password" class="form-control" placeholder="Masukan password...">
                                  </div>
                                  <div class="form-group mt-3 d-flex justify-content-end">
                                      <button type="submit" class="btn btn-success">Login</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="<?= base_url(); ?>/assets/plugins/alert/iziToast.min.js"></script>
      <script>
         <?php if (session()->getFlashdata('failed')) { ?>
             iziToast.error({
                 title : 'Gagal!',            
                 message: "<?= session()->getFlashdata('failed') ?>",
                 position: 'topCenter'
             });
     
         <?php } ?>
     </script>

  </body>
</html>