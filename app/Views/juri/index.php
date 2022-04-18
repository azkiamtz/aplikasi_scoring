<?= $this->extend('layouts/index'); ?>
 <?= $this->section('content'); ?>
 <div class="body">
     <div class="container py-5">
         <div class="row d-flex justify-content-center mt-5">
             <div class="col-4 mt-5">
                 <div class="card mt-4 rounded shadow">
                     <div class="card-header fw-bold text-center" style="font-size: 1.6rem;">Scoring Pencak Silat</div>
                     <div class="card-body p-4">
                         <h5 class="text-center"><?= session('id_pertandingan'); ?></h5>
                         <form action="" method="post">
                             <div class="form-group">
                                 <label for="" class="form-label">Username</label>
                                 <input type="text" class="form-control" placeholder="Masukan username...">
                             </div>
                             <div class="form-group my-2">
                                 <label for="" class="form-label">Password</label>
                                 <input type="password" class="form-control" placeholder="Masukan password...">
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
 <?= $this->endSection('content'); ?>