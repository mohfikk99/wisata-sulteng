
  <div class="container-fluid">
  <!--jimbotron  -->
  <div class="jumbotron jumbotron-fluid text-center" style="background-image: url(../assets/img/tampilan/air.jpg);">
  <img src="<?= base_url('assets/img/logo.jpg'); ?>" class="img-circel">
  <h1>WISATA ALAM</h1>
  <p class="judul">EXPLORE | ADVENTURE | TRIP</p>
  </div>
  <!--akhit jimbotron  -->

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

  <!-- colom -->
  <div class="row">
    <div class="col-sm-8">
      <div class="row">
        <?php foreach ($alam as $a) : ?>
          <div class="col-lg-6">
            <div class="column">
              <img src="<?= base_url('assets/img/wisata/') .  $a->image; ?>"style="width:100%">
              <div class="bottom-right" style="color:white; font-size:12px; font-style:italic;"><?= $a->sumber; ?></div>
              <div class="container">
                <h2><?= $a->name; ?></h2>
                <a class="btn btn-danger text-right" style="margin-left:25%" href="<?= base_url('referensi/detail_wisata/').$a->id; ?>">Selengkapnya</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- akhir colom-->

    <!-- terbaru -->
    <div class="col-sm-4">
      <div class="form-container o-hidden border-5 shadow-lg my-10">
        <h1>Terbaru</h1>
        <hr>
        <img src="<?= base_url('assets/img/wisata/') .  $terbaru->image; ?>" width="100% auto" class="image">
        <div class="overlay"><?= $terbaru->name; ?></div>
      </div>
      <div class="form-container o-hidden border-5 shadow-lg my-10">
        <h1>Event</h1>
        <hr>
        <img src="<?= base_url('assets/img/wisata/') .  $populer->image; ?>" width="100% auto" class="image">
        <div class="overlay"><?= $populer->name; ?></div>
      </div>
    </div>
  </div>
  <!-- akhir terbaru -->
</div>
