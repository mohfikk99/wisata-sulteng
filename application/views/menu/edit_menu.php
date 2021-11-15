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

    <?php foreach ($user_menu as $me): ?>


    <?= form_open_multipart("menu/update_menu"); ?>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Menu</label>
      <div class="col-sm-10">
        <input type="hidden" name="id" value="<?= $me->id; ?>">
        <input type="text" class="form-control" id="title" name="menu" value="<?= $me->menu; ?>">
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
