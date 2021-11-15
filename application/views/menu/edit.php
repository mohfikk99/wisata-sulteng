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

    <?php foreach ($user_sub_menu as $menu): ?>


    <?= form_open_multipart("menu/update"); ?>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
        <input type="hidden" name="id" value="<?= $menu->id; ?>">
        <input type="text" class="form-control" id="title" name="title" value="<?= $menu->title; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">menu</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="menu" name="menu_id" value="<?= $menu->menu_id; ?>">

      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">url</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="url" name="url" value="<?= $menu->url; ?>">

      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">icon</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="icon" name="icon" value="<?= $menu->icon; ?>">
      
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 col-form-label">Aksi</label>
      <div class="col-sm-10">
        <select class="form-control" name="is_active">
          <option><?= $menu->is_active; ?></option>
          <option value="1">1 = Active</option>
          <option value="0">0 = Not Active</option>
        </select>
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
