<!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="text-center col-lg-12">

      <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>

      <?= $this->session->flashdata('massage'); ?>
    </div>
  </div>


  <a href="#" class="btn btn-danger mb-3" data-toggle="modal" data-target="#newsubMenuModal">Tambahkan</a>

  <!-- DataTales Example -->
  <div class="card shadow mt-5">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Table Wisata</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Gambar</th>
              <th scope="col">Nama Wisata</th>
              <th scope="col">Kategori</th>
              <th scope="col">Sumber</th>
              <th scope="col">Ulasan</th>
              <th scope="col">Kordinat lat</th>
              <th scope="col">Kordinat Long</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Gambar</th>
              <th scope="col">Nama Wisata</th>
              <th scope="col">Kategori</th>
              <th scope="col">Sumber</th>
              <th scope="col">Ulasan</th>
              <th scope="col">Kordinat lat</th>
              <th scope="col">Kordinat Long</th>
            </tr>
          </tfoot>
          <tbody>
          <?php
          $no = 1;
          foreach ($data_wisata as $wisata) {
           ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td>
              <a class="badge badge-success tampil" href="<?= base_url().'/admin/edit/'.$wisata['id']; ?>">Edit</a>
              <?= '<a class="badge badge-danger" href="'.base_url().'/admin/hapus/'.$wisata['id'].'" onclick="return confirm(\'Anda yakin akan menghapus '.$wisata['name'].'?\')">Delete</a>'?>
            </td>
            <td align="center">
              <img src="<?= base_url('assets/img/wisata/') .  $wisata['image']; ?>" height="50" alt="">
            </td>
            <td><?= $wisata['name']; ?></td>
            <td><?= $wisata['kategori']; ?></td>
            <td><?= $wisata['sumber']; ?></td>
            <td><?= $wisata['ulasan']; ?></td>
            <td><?= $wisata['latitude']; ?></td>
            <td><?= $wisata['longitude']; ?></td>

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
<!-- /.container-fluid -->


<!-- modal -->
<div class="modal fade" id="newsubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newsubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newsubMenuModalLabel">Tambahkan Wisata</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?= form_open_multipart('admin/index');?>
      <div class="modal-body">
        <div class="form-group">
          <select class="form-control" name="kategori">
            <option>alam</option>
            <option>kuliner</option>
            <option>religi</option>
            <option>budaya</option>
            <option>sejarah</option>
            <option>terbaru</option>
            <option>populer</option>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="name" name="name" placeholder="Refrensi Wisata">
          <?= form_error('ulasan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <textarea name="ulasan" rows="4" cols="52" placeholder="Ulasan Wisata"></textarea>
          <?= form_error('ulasan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="sumber" name="sumber" placeholder="Sumber foto">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="sumber" name="latitude" placeholder="Kordinat lat">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="sumber" name="longitude" placeholder="Kordinat long">
        </div>



        <div class="form-group row">
          <div class="col-sm-2">Gambar</div>

              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image"></label>
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
