
<div class="container-fluid">
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

</div>
