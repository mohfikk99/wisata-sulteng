<div class="container-fluid">

  <!-- gambar -->
  <div class="row">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-5">
        <?php foreach ($detail as $p) : ?>
            <div class="column" style="margin-top:100px;">
              <img src="<?= base_url('assets/img/wisata/') .  $p->image; ?>" id="myImg" style="width:100%;">
              <div class="bottom-right" style="color:white; font-size:12px; font-style:italic;"><?= $p->sumber; ?></div>
              <div class="container">
              <h2><?= $p->name; ?></h2>
              <h6 class="title" >ULASAN</h6>
              <P><?= $p->ulasan; ?></span></p>
              </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- akhir gambar -->

    <div class="col-sm-1">
    </div>

    <div class="col-sm-4">
      <div id="mapid" class="container-fluid" style=" width: 400px; height: 500px; margin-top:180px;"></div>
      <script>
        navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        <?php foreach ($detail as $marker) : ?>
        var map = L.map('mapid').setView([<?= $marker->latitude;?>, <?= $marker->longitude;?>], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([<?= $marker->latitude;?>, <?= $marker->longitude;?>])
         .bindPopup('<span><?= $marker->name; ?></span>  <br>' +
                    '<img src="<?= base_url('assets/img/wisata/') .  $marker->image; ?>" style="width:100%;"> <br>' +
                    "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                    location.coords.latitude + "," + location.coords.longitude +
                    "&destination=<?= $marker->latitude; ?>,<?= $marker->longitude; ?>'style='font-size:12px; color:white; margin-top:10px;' class='btn btn-default'>Rute</a>")
         .addTo(map)

        <?php endforeach; ?>
        });
      </script>
    </div>
  </div>



</div>

</div>

</div>
