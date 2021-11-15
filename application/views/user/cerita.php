
    <?= $this->session->flashdata('massage'); ?>

    <div class="container-fluid">
      <a href="#" class="btn btn-danger mb-3" data-toggle="modal" data-target="#newsubMenuModal">Tambahkan Cerita</a>
      <!-- card -->
      <div class="row">
        <div class="col-sm-12">
          <div class="row ">
            <?php foreach ($user_cerita as $c): ?>
              <div class="col-lg-3">

                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header bg-gradient-danger py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-100"><?= $c['name']; ?></h6>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-100"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Pengaturan</div>
                        <a class="dropdown-item" href="<?= base_url('user/edit_cerita/').$c['id']; ?>">Edit</a>
                        <a class="dropdown-item" href="<?= base_url('user/hapus/').$c['id']; ?>">Hapus</a>
                        <div class="dropdown-divider"></div>
                      </div>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <div class=" card-body">
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

    <!-- modal -->
    <div class="modal fade" id="newsubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newsubMenuModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newsubMenuModalLabel">Tambah Cerita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?= form_open_multipart('user/cerita');?>
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" id="user_name" name="email" value="<?= $user['email']; ?>" readonly hidden>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly hidden>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="ket" name="lokasi" placeholder="lokasi">
            </div>

            <div class="form-group">
              <textarea name="caption" rows="4" cols="52" placeholder="Caption Anda"></textarea>
              <?= form_error('caption', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group row">
              <div class="col-sm-2">Gambar</div>

                  <div class="col-sm-10">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="gambar" name="gambar">
                      <label class="custom-file-label" for="gambar"></label>
                      <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>

        </div>
      </div>
    </div>
</div>
