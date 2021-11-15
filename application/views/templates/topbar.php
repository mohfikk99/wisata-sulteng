<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav style="background-color: #990900;" class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" id="bar">
      

      <!-- Sidebar Toggle (Topbar) -->

      <a class="btn btn-danger ml-3" data-toggle="modal" data-target="#newsidebarModal">
        <i class="fa fa-bars"></i>
      </a>

      <!-- Topbar Search -->
      <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-gray-100 border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-danger" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form> -->
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user-check"></i>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Pengguna Aktif
            </h6>

            <a class="dropdown-item d-flex align-items-center">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <img class="avatar" style=" vertical-align: middle; width: 50px; height: 50px; border-radius: 50%;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                </div>
              </div>
              <div>
                <span class="font-weight-bold"><?= $user['name']; ?></span>
                <div class="small text-gray-500">Pengguna Sejak<?= date(' d F Y', $user['date_created']); ?></div>
              </div>
            </a>
          </div>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-100 small"><?= $user['name']; ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('user/index'); ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                My Profile
            </a>
            <a class="dropdown-item" href="<?= base_url('user/edit'); ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Edit Profile
            </a>
            <a class="dropdown-item" href="<?= base_url('user/changepassword');; ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Ubah Password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->
