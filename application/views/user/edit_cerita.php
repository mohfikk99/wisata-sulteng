<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
  <div class="col-lg-8">
    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>

    <?php foreach ($cerita as $c): ?>


    <?= form_open_multipart("user/update"); ?>

    <div class="form-group row">
      <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
      <div class="col-sm-6">
        <input type="hidden" name="id" value="<?= $c->id; ?>">
        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $c->lokasi; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="caption" class="col-sm-2 col-form-label">caption</label>
      <div class="col-sm-10">
        <textarea name="caption" rows="7" cols="35"><?= $c->caption; ?></textarea>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2">Gambar</div>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-3">
            <img src="<?= base_url('assets/img/cerita/'). $c->gambar; ?>" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="gambar" name="gambar">
              <label class="custom-file-label" for="gambar"></label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row justify-content-end">
      <div class="col-sm-10">
        <button type="submit" name="submit" class="btn btn-danger">Edit</button>
      </div>
    </div>

    </form>
  <?php endforeach; ?>

  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
