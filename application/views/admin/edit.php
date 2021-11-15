<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
  <div class="col-lg-8">

    <?php foreach ($wisata as $w): ?>


    <?= form_open_multipart("admin/update"); ?>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Nama Wisata</label>
      <div class="col-sm-10">
        <input type="hidden" name="id" value="<?= $w->id; ?>">
        <input type="text" class="form-control" id="name" name="name" value="<?= $w->name; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 col-form-label">kategori</label>
      <div class="col-sm-10">
        <select class="form-control" name="kategori">
          <option><?= $w->kategori; ?></option>
          <option>alam</option>
          <option>kuliner</option>
          <option>religi</option>
          <option>budaya</option>
          <option>sejarah</option>
          <option>terbaru</option>
          <option>populer</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="sumber" class="col-sm-2 col-form-label">Sumber Foto</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sumber" name="sumber" value="<?= $w->sumber; ?>">
      </div>
    </div>



    <div class="form-group row">
      <label for="ulasan" class="col-sm-2 col-form-label">Ulasan</label>
      <div class="col-sm-10">
        <textarea name="ulasan" rows="8" cols="71"><?= $w->ulasan; ?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="ulasan" class="col-sm-2 col-form-label">Kordinat Lat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ulasan" name="latitude" value="<?= $w->latitude; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="ulasan" class="col-sm-2 col-form-label">Kordinat Long</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ulasan" name="longitude" value="<?= $w->longitude; ?>">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2">Gambar</div>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-3">
            <img src="<?= base_url('assets/img/wisata/'). $w->image; ?>" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image">
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
