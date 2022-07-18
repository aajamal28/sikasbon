<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url('assets/img/sanoh1-2.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?= APP_NAME ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= site_url('/home'); ?>" class="nav-link <?php if($uri[0] == 'home' )  echo 'active' ?>">
            <i class="nav-icon fas fa-tachometer-alt "></i>
            <p>
              Dashboard

            </p>
          </a>
        </li>
        <?php if( session()->get('role') == 'R00' ) : ?>
        <li class="nav-item <?php if($uri[0] == 'master')  echo 'menu-open' ?>">
          <a href="#" class="nav-link <?php if($uri[0] == 'master')  echo 'active' ?>">
            <i class="nav-icon fas fa-database"></i>
            <p>
              MASTER DATA
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- <li class="nav-item">
              <a href="<?= site_url('master/item/list') ?>" class="nav-link <?php if (isset($uri[1]) && ($uri[1] == 'item'))  echo 'active' ?>">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Item</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Supplier</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= site_url('master/user/list') ?>" class="nav-link <?php if (isset($uri[1]) && ($uri[1] == 'user' ) && ($uri[2] == 'list'))  echo 'active' ?>">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>List User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('master/user/register') ?>" class="nav-link <?php if (isset($uri[1]) && ($uri[1] == 'user') && ($uri[2] == 'register' ))  echo 'active' ?>">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Register User</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif ?>
        <li class="nav-item <?php if($uri[0] == 'transaction')  echo 'menu-open' ?>">
          <a href="#" class="nav-link <?php if($uri[0] == 'transaction')  echo 'active' ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>
              TRANSACTION
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('transaction/overview') ?>" class="nav-link <?php if (isset($uri[1]) && ($uri[1] == 'overview'))  echo 'active' ?>">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Overview</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('transaction/request') ?>" class="nav-link <?php if (isset($uri[1]) && ($uri[1] == 'request'))  echo 'active' ?>">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Permintaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('transaction/refund') ?>" class="nav-link <?php if (isset($uri[1]) && ($uri[1] == 'refund'))  echo 'active' ?>">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Realisasi</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item ">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              REPORT
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Saldo Cash</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Transaction</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Akun
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('auth/logout') ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-primary"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>