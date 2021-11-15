<!--jimbotron  -->
<div class="jumbotron jumbotron-fluid text-center" style="background-image: url(../assets/img/tampilan/cerita.png);">
<img src="<?= base_url('assets/img/logo.jpg'); ?>" class="img-circel">
<h1>Cerita</h1>
<p>EXPLORE | ADVENTURE | TRIP</p>
</div>
<!--akhit jimbotron  -->

<!-- container -->
<div class="container">
  <!-- panel -->
  <div class="row justify-content-center mb-5">
    <div class="col-10 info-panel">
      <div class="row">
        <div class="col-lg">
          <img src="<?= base_url('assets/'); ?>img/testi/jelajahi.jpg" alt="employee" class="float-left">
          <h4>EXPLORE</h4>
          <p>Kunjungi Dan Nikmati Keindahannya</p>
        </div>
        <div class="col-lg">
          <img src="<?= base_url('assets/'); ?>img/testi/petualangan.jpg" alt="hires" class="float-left">
          <h4>ADVENTURE</h4>
          <p>Tantangan Dan Keberanian</p>
        </div>
        <div class="col-lg">
          <img src="<?= base_url('assets/'); ?>img/testi/trip.jpg" alt="security" class="float-left">
          <h4>TRIP</h4>
          <p>Langkah Awal Dari Sebuah Perjalanan</p>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir panel -->


  <!-- card -->
  <div class="row">
    <div class="col-sm-12">
      <div class="row ">
        <?php foreach ($cerita as $c): ?>
          <div class="col-lg-3">

            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header bg-gradient-danger py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-gray-100"><?= $c['name']; ?></h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="cerita">
                  <img src="<?= base_url('assets/img/cerita/') .  $c['gambar']; ?>"style="max-width:100%">
                  <div class="bottom-left"> <i class="fas fa-map-marked-alt"></i> <?= $c['lokasi'] ?></div>
                </div>
                <h6 style="color:black"><?= $c['caption'] ?></h6>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- akhir card -->
</div>
