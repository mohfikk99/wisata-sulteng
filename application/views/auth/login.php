
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#" >SULTENG </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <form action="<?= base_url('auth');?>" method="post">
              <div class="input-group">
                <input required type="text" name="keyword" class="form-control" placeholder="search..." autocomplete="off" autofocus>
                  <div class="input-group-append">
                    <button  class="btn btn-outline-secondary" type="submit">cari</botton>
                  </div>
              </div>


                    <?php  foreach ($cari as $c) : ?>
                      
                      <?= $c['name']; ?>
                        
                    <?php endforeach; ?>
            
            </li>
          </ul> -->
      
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <div onclick="myFunction()" class="nav-link dropdown">
              <a class="dropbtn">Pariwisata</a>
              <div id="myDropdown" class="dropdown-content" style="border-radius:10px;">
                <a href="<?= base_url('sulteng/alam'); ?>">Wisata Alam</a>
                <a href="<?= base_url('sulteng/kuliner'); ?>">Wisata Kuliner</a>
                <a href="<?= base_url('sulteng/religi'); ?>">Wisata Religi</a>
                <a href="<?= base_url('sulteng/sejarah'); ?>">Wisata Sejarah</a>
                <a href="<?= base_url('sulteng/budaya'); ?>">Kebudayaan</a>
              </div>
            </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('sulteng/cerita'); ?>">Cerita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('sulteng/tentang_kami'); ?>">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a href="" class="btn btn-danger mb-3" data-toggle="modal" data-target="#newModal">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--akhir navbar-->

    <!--jimbotron  -->
    <div class="jumbotron jumbotron-fluid text-center" style="background-image: url(assets/img/oke.jpg);">
    <img src="<?= base_url('assets/img/logo.jpg'); ?>" class="img-circel">
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
              <img src="<?= base_url('assets/'); ?>img/testi/petualangan.jpg" alt="petualangan" class="float-left">
              <h4>ADVENTURE</h4>
              <p>Tantangan dan Keberanian</p>
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
        <div class="col-lg-5 ">
          <a href="" class="thumbnail">

              <img src="<?= base_url('assets/img/port/3.jpg'); ?>" class="depan" alt="">

          </a>
        </div>
        <div class="col-lg-5">
          <h3><span>Beauty</span> hidden on the <span>ekuator</span></h3>
          <p>Nikmati keindahan khatulistiwa yang tersaji secara indah, akurat, dan terpercaya yang akan menemani
          perjalanan dan petualangan anda, dimanapun kapanpun</p>
          <a href="<?= base_url('sulteng/gelery'); ?>" class="btn btn-danger">galery</a>
        </div>
      </div>
      <!-- akhir workingspace -->


      <!-- testimonial -->
      <section class="testimonial">
        <div class="row justify-content-center">
          <div id="mapid"  style=" width: 800px; height: 400px; margin-bottom:100px;"></div>
          <div class="col-lg-8">
            <h5>"Keindahan Yang Tersembunyi Di Garis Khatulistiwa"</h5>
          </div>
        </div>

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


    <!-- modal -->
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="files">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                </div>

                <?= $this->session->flashdata('massage'); ?>

                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-danger btn-user btn-block">
                    Masuk
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/forgotpassword') ?>">Lupa Sandi?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/registration'); ?>">Buat Akun baru!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir modal -->



    <script>

        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
    </script>
