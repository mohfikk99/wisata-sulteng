<div class="container-fluid">

  <?= $this->session->flashdata('massage'); ?>

  <div class="card shadow mt-5">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Table User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Gambar</th>
              <th scope="col">Email</th>
              <th scope="col">Nama</th>
              <th scope="col">Bio</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Gambar</th>
              <th scope="col">Email</th>
              <th scope="col">Nama</th>
              <th scope="col">Bio</th>
            </tr>
          </tfoot>
          <tbody>
          <?php
          $no = 1;
          foreach ($aktif as $d) {
           ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td>
              <?= '<a class="badge badge-danger" href="'.base_url().'/admin/hapus_user/'.$d->id.'" onclick="return confirm(\'Anda yakin akan menghapus '.$d->name.'?\')">Delete</a>'?>
            </td>
            <td align="center">
              <img src="<?= base_url('./assets/img/profile/') .  $d->image; ?>" height="50" alt="">
            </td>
            <td><?= $d->email; ?></td>
            <td><?= $d->name; ?></td>
            <td><?= $d->bio; ?></td>

          </tr>
          <?php
          $no++;
            }
           ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>



  <div class="card shadow mt-5">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pesan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Pesan</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Pesan</th>
            </tr>
          </tfoot>
          <tbody>
          <?php
          $no = 1;
          foreach ($pesan as $d) {
           ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td>
              <?= '<a class="badge badge-danger" href="'.base_url().'/admin/hapus_pesan/'.$d['id'].'" onclick="return confirm(\'Anda yakin akan menghapus '.$d['nama'].'?\')">Delete</a>'?>
            </td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['email']; ?></td>
            <td><?= $d['pesan']; ?></td>

          </tr>
          <?php
          $no++;
            }
           ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
</div>
