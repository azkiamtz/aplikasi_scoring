<?= $this->extend('layouts/index'); ?>
 <?= $this->section('content'); ?>
 <div class="container py-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Buat Pertandingan Baru</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Pertandingan</button>
        </li>        
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-md-3 d-flex justify-content-center">
                            <img src="<?= base_url(); ?>/assets/image/logo.png" style="width: 10rem; height: 10rem; object-fit: contain;" alt="">
                        </div>
                        <div class="col-12 col-md-9">
                            <h2 class="fw-bold text-center">Form Pembuatan Pertandingan Pencak Silat</h2>                            
                        </div>
                    </div>
                    <hr>
                    <form action="<?= base_url(); ?>/moderatorcontroller/add_pertandingan" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6" style="border-right: 1px solid #d6d6d7;">
                                <div class="form-group">
                                    <label class="form-label pertandingan">Pemain 1</label>
                                    <textarea name="pemain1" class="form-control <?= ($valid->hasError('pemain1')) ? 'is-invalid' : ''; ?>" rows="4" placeholder="Masukan nama pemain 1"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $valid->getError('pemain1'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label pertandingan">Pemain 2</label>
                                    <textarea name="pemain2" class="form-control <?= ($valid->hasError('pemain2')) ? 'is-invalid' : ''; ?>" rows="4" placeholder="Masukan nama pemain 2"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $valid->getError('pemain2'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label pertandingan">Kelas Partai</label>
                                    <input type="text" class="form-control <?= ($valid->hasError('kelas')) ? 'is-invalid' : ''; ?>" placeholder="Masukan kelas partai" name="kelas">
                                    <div class="invalid-feedback">
                                        <?= $valid->getError('kelas'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                        <label class="form-label pertandingan">Pilih Wasit</label>
                                        <select name="wasit" class="form-control <?= ($valid->hasError('wasit')) ? 'is-invalid' : ''; ?>">
                                            <?php foreach($wasit as $j): ?>
                                                <option value="<?= $j['id_user']; ?>"><?= $j['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $valid->getError('wasit'); ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-12 col-md-2">
                                    <div class="form-group">
                                        <label class="form-label pertandingan">Pilih Juri 1</label>
                                        <select name="juri1" class="form-control <?= ($valid->hasError('juri1')) ? 'is-invalid' : ''; ?>">
                                            <?php foreach($juri as $j): ?>
                                                <option value="<?= $j['id_user']; ?>"><?= $j['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $valid->getError('juri1'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="form-group">
                                        <label class="form-label pertandingan">Pilih Juri 2</label>
                                        <select name="juri2" class="form-control <?= ($valid->hasError('juri2')) ? 'is-invalid' : ''; ?>">
                                            <?php foreach($juri as $j): ?>
                                                <option value="<?= $j['id_user']; ?>"><?= $j['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $valid->getError('juri2'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="form-group">
                                        <label class="form-label pertandingan">Pilih Juri 3</label>
                                        <select name="juri3" class="form-control <?= ($valid->hasError('juri3')) ? 'is-invalid' : ''; ?>">
                                            <?php foreach($juri as $j): ?>
                                                <option value="<?= $j['id_user']; ?>"><?= $j['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $valid->getError('juri3'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label pertandingan">Pilih Juri 4</label>
                                        <select name="juri4" class="form-control <?= ($valid->hasError('juri4')) ? 'is-invalid' : ''; ?>">
                                            <?php foreach($juri as $j): ?>
                                                <option value="<?= $j['id_user']; ?>"><?= $j['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $valid->getError('juri4'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label pertandingan">Pilih Juri 5</label>
                                        <select name="juri5" class="form-control <?= ($valid->hasError('juri5')) ? 'is-invalid' : ''; ?>">
                                            <?php foreach($juri as $j): ?>
                                                <option value="<?= $j['id_user']; ?>"><?= $j['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $valid->getError('juri5'); ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group mt-4 d-lg-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Buat Pertandingan Baru</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-md-3 d-flex justify-content-center">
                            <img src="<?= base_url(); ?>/assets/image/logo.png" style="width: 10rem; height: 10rem; object-fit: contain;" alt="">
                        </div>
                        <div class="col-12 col-md-9">
                            <h2 class="fw-bold text-center">Data Pertandingan Pencak Silat</h2>                            
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th class="align-middle">No</th>
                                <th class="align-middle">Tanggal</th>
                                <th class="align-middle">Wasit</th>                                
                                <th class="align-middle">Kelas</th>
                                <th class="align-middle">Pemain 1</th>
                                <th class="align-middle">Pemain 2</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($pertandingan as $p): ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++; ?></td>
                                        <td class="align-middle"><?= date('l, d F Y',strtotime($p['tanggal'])); ?></td>
                                        <td class="align-middle"><?= $p['nama']; ?></td>
                                        <td class="align-middle"><?= $p['kelas']; ?></td>
                                        <td class="align-middle"><?= $p['pemain1']; ?></td>
                                        <td class="align-middle"><?= $p['pemain2']; ?></td>
                                        <td class="align-middle"><?= ($p['status'] == 'berlangsung') ? '<span class="badge bg-success">Berlangsung</span>' : '<span class="badge badge-secondary">Selesai</span>'; ?></td>
                                        <td class="align-middle">
                                            <div class="d-flex inline-block justify-content-center">
                                                <form action="<?= base_url(); ?>/moderatorcontroller/delete_pertandingan/<?= $p['id_pertandingan']; ?>" method="post">
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pertandingan ini?')" style="margin-right: 2px;"><i class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                                <a href="" class="btn btn-sm text-white" style="background: #0984e3;">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <?= $this->endSection('content'); ?>
 <?= $this->section('js'); ?>
 <script>
     <?php if (session()->getFlashdata('success')) { ?>
          iziToast.success({
              title : 'Berhasil!',            
              message: "<?= session()->getFlashdata('success') ?>",
              position: 'bottomLeft'
          });
  
      <?php } ?>
 </script>
 <?= $this->endSection('js'); ?>