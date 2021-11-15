
<div class="container-fluid">
  <!--jimbotron  -->
  <div class="jumbotron jumbotron-fluid text-center" style="background-image: url(assets/img/oke.jpg);">
  <img src="<?= base_url('assets/img/logo.jpg'); ?>">
  <h1>WISATA SULTENG</h1>
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

    <!-- workingspace -->
    <div class="row workingspace">
      <div class="col-lg-1">

      </div>
      <div class="col-lg-5">
        <a href="" class="thumbnail">
          <img src="<?= base_url('assets/img/port/3.jpg'); ?>" class="depan" alt="">
        </a>
      </div>
      <div class="col-lg-5">
        <h3 class="Beauty"><span>Beauty</span> hidden on the <span>ekuator</span></h3>
        <p class="tersaji">Nikmati keindahan khatulistiwa yang tersaji secara indah, akurat, dan terpercaya yang akan menemani
        perjalanan dan petualangan anda, dimanapun kapanpun</p>
        <a href="<?= base_url('home/gelery'); ?>" class="btn btn-danger tombol">galery</a>
      </div>
    </div>
    <!-- akhir workingspace -->


    <div class="row workingspace">
      <div id="mapid" class="container-fluid" style="width: 700px; height: 400px;"></div>

      <script>
      navigator.geolocation.getCurrentPosition(function(location) {
      var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

      var map = L.map('mapid').setView([-0.887161, 119.861269], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      <?php foreach ($map as $marker) : ?>

      L.marker([<?= $marker['latitude'];?>, <?= $marker['longitude'];?>])
       .bindPopup('<span><?= $marker['name']; ?></span>  <br>' +
                  '<img src="<?= base_url('assets/img/wisata/') .  $marker['image']; ?>" style="width:100%;"> <br>' +
                  "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                  location.coords.latitude + "," + location.coords.longitude +
                  "&destination=<?= $marker['latitude']; ?>,<?= $marker['longitude']; ?>'style='font-size:12px; color:white; margin-top:10px;' class='btn btn-default'>Rute</a>" +
                  "<a href='<?= base_url('sulteng/detail_wisata/').+ $marker['id']; ?>' style='font-size:12px; color:white; margin-top:10px; margin-left:5px;' class='btn btn-default'>Detail</a>")
       .addTo(map)

      <?php endforeach; ?>

      });

      </script>
    </div>


    <!-- testimonial -->
    <section class="testimonial">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h5>"Keindahan Yang Tersembunyi Di Garis Khatulistiwa"</h5>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-6 justify-content-center d-flex">
          <figure class="figure">
            <img src="<?= base_url('assets/img/img.png'); ?>" class="figure-img img-fluid rounded-circle utama" alt="testi 2">
            <figcaption class="figure-caption">
              <h5>INDONESIA</h5>
              <p>SULAWESI TENGAH</p>
            </figcaption>
          </figure>
        </div>
      </div>
    </section>
    <!-- akhir testimonial -->
  </div>
  <!-- akhir container -->
</div>
<!-- /.container-fluid -->
