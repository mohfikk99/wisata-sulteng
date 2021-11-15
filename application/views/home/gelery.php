<!--jimbotron  -->
<div class="jumbotron jumbotron-fluid text-center" style="background-image: url(../assets/img/tampilan/oke.png);">
<img src="<?= base_url('assets/img/logo.jpg'); ?>" class="img-circel">
<h1>GELERY</h1>
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


<div class="row">
  <?php foreach ($wisata as $p) : ?>
    <div class="col-lg-4">
      <div class="tulisan">
        <div class="column">
          <img src="<?= base_url('assets/img/wisata/') .  $p['image']; ?>" alt="Nature" style="width:100%" class="image">
          <div class="middle">
            <div class="text"><?= $p['name']; ?></div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

</div>
<!-- akhir container -->
