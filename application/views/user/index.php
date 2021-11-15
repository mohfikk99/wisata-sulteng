    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-center text-gray-800"><?= $title; ?></h1>
      <div class="row">
        <div class="col-lg-8">
          <?= $this->session->flashdata('massage'); ?>
        </div>
      </div>

      <div class="profil">
        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="" style="width:100%">
          <h1 class="text-left" ><?= $user['name']; ?></h1>
          <hr>
          <h6><?= $user['email']; ?></h6>
          <p class="bio"><?= $user['bio']; ?></p>
          <p>Pengguna Sejek <?= date(' d F Y', $user['date_created']); ?></p>
      </div>

      <!-- panel -->
      <div class="row justify-content-center">
        <div class="col-8 panel">
          <div class="row">
            <div class="col-lg">
              <!-- <a class="btn btn-danger float-left" href="<?= base_url('usaha/profil_toko'); ?>">TOKO</a> -->
            </div>
            <div class="col-lg">
              <a class="cer btn btn-danger" href="<?= base_url('user/cerita'); ?>">CERITA</a>
            </div>
            <div class="col-lg">
              <!-- <a class="btn btn-danger float-right" href="#">NARASI</a> -->
            </div>
          </div>
        </div>
      </div>
      <!-- akhir panel -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
