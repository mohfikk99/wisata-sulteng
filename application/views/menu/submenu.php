



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>

          <?= $this->session->flashdata('massage'); ?>
          <a href="#" class="btn btn-danger mb-3" data-toggle="modal" data-target="#newsubMenuModal">Tambahkan Submenu Baru</a>

          <!-- DataTales Example -->
          <div class="card shadow mt-5">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Submenu</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">title</th>
                      <th scope="col">Menu</th>
                      <th scope="col">url</th>
                      <th scope="col">icon</th>
                      <th scope="col">active</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">title</th>
                      <th scope="col">Menu</th>
                      <th scope="col">url</th>
                      <th scope="col">icon</th>
                      <th scope="col">active</th>
                      <th scope="col">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($submenu as $sm) : ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $sm['title']; ?></td>
                      <td><?= $sm['menu']; ?></td>
                      <td><?= $sm['url']; ?></td>
                      <td><?= $sm['icon']; ?></td>
                      <td><?= $sm['is_active']; ?></td>
                      <td>
                      <a class="badge badge-success tampil" href="<?= base_url().'/menu/edit/'.$sm['id']; ?>">Edit</a>
                      <?= '<a class="badge badge-danger" href="'.base_url().'/menu/hapus/'.$sm['id'].'" onclick="return confirm(\'Anda yakin akan menghapus '.$sm['title'].'?\')">Delete</a>'?>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>






        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <!-- modal -->
      <div class="modal fade" id="newsubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newsubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newsubMenuModalLabel">Add New Submenu</h5>
              <title><?php echo $judul; ?></title>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="<?= base_url('menu/submenu'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="submenu title">
              </div>
              <div class="form-group">
                <select class="form-control" name="menu_id" id="menu_id">
                  <option value="">select menu</option>
                  <?php foreach($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="submenu url">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="submenu icon">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                  <label class="form-check-label" for="is_active">
                    Active?
                  </label>

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>

          </div>
        </div>
      </div>
