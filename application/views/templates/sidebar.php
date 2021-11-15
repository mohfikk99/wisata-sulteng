  <!-- Sidebar -->
<div class="modal fade" id="newsidebarModal" tabindex="-1" role="dialog" aria-labelledby="newsidebarModalLabel" aria-hidden="true">

  <ul style="background-color: #990900; margin:left;" class="modal-dialog modal-content navbar-nav sidebar sidebar-dark accordion"  role="document" id="accordionSidebar">
    <div class="modal-header">
      <h6 class="modal-title mr-3"><strong>SULTENG</strong></h6>
      <button type="button" class="btn bg-gray-100 close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>




    <!-- query menu -->
    <?php
      $role_id = $this->session->userdata('role_id');
      $queryMenu = "SELECT `user_menu`.`id`, `menu`
                      FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                     WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                ";

      $menu = $this->db->query($queryMenu)->result_array();
     ?>

    <!-- looping menu -->
    <?php foreach ($menu as $m) : ?>
    <hr class="sidebar-divider mt-3">
    <div class="sidebar-heading">
      <?= $m['menu']; ?>
    </div>

    <!-- siapkan sub menu sesuai menu -->
    <?php
    $menuid = $m['id'];
    $querysubmenu = "SELECT *
                    FROM `user_sub_menu` JOIN `user_menu`
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                   WHERE `user_sub_menu`.`menu_id` = $menuid
                     AND `user_sub_menu`.`is_active` = 1
                    ";
      $submenu = $this->db->query($querysubmenu)->result_array();
     ?>

        <?php foreach($submenu as $sm) : ?>
          <?php if ($title == $sm['title']) : ?>
          <li class="nav-item active">
          <?php else : ?>
            <li class="nav-item">
        <?php endif ; ?>
            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon']; ?>"></i>
              <span><?= $sm['title']; ?></span>
            </a>
          </li>
        <?php endforeach;  ?>





  <?php endforeach; ?>

  <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-camera-retro"></i>
    <span>Pariwisata</span>
  </a>
  <div id="collapseUtilities"  class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?= base_url('referensi/alam'); ?>">Wisata Alam</a>
      <a class="collapse-item" href="<?= base_url('referensi/kuliner'); ?>">Wisata Kuliner</a>
      <a class="collapse-item" href="<?= base_url('referensi/religi'); ?>">Wisata Religi</a>
      <a class="collapse-item" href="<?= base_url('referensi/sejarah'); ?>">Wisata Sejarah</a>
      <a class="collapse-item" href="<?= base_url('referensi/budaya'); ?>">Wisata Budaya</a>
    </div>
  </div>
</li>


<hr class="sidebar-divider mt-3">

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('referensi/Tentang_Kami'); ?>">
    <i class="far fa-hourglass"></i>
    <span> Tentang Kami</span></a>
</li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->


</div>
