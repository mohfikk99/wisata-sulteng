<!--jimbotron  -->
<div class="jumbotron jumbotron-fluid text-center" style="background-image: url(../assets/img/tampilan/budaya.jpg);">
  <img src="<?= base_url('assets/img/logo.jpg'); ?>" class="img-circel">
  <h1>WISATA BUDAYA</h1>
  <p>EXPLORE | ADVENTURE | TRIP</p>
</div>
<!--akhit jimbotron  -->

<!-- container -->
<div class="container">
  <!-- panel -->
  <div class="row justify-content-center">
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

  <!-- gambar -->
  <div class="row">
    <div class="col-sm-12">
      <div class="row">
        <?php foreach ($budaya as $b) : ?>
          <div class="col-lg-4">
            <div class="column">
              <img src="<?= base_url('assets/img/wisata/') .  $b->image; ?>" id="myImg" style="width:100%;">
              <div class="bottom-right" style="color:white; font-size:12px; font-style:italic;"><?= $b->sumber; ?></div>
              <div class="container">
              <h4><?= $b->name; ?></h4>
                <a class="btn btn-danger text-right" style="margin-left:25%" href="<?= base_url('sulteng/detail_wisata/').$b->id; ?>">Selengkapnya</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- akhir gambar -->
  </div>

</div>
<!-- akhir container -->
