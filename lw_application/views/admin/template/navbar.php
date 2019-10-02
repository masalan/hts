

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= site_url('admin/dashboard') ?>" class="nav-link">Tableau de Bords</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= site_url('admin/dashboard') ?>" class="nav-link">Message</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Recherche produit" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-link">

        </li>
    </ul>


 <!-- Right navbar links -->
 <ul class="navbar-nav ml-auto">
 <?php if($this->tank_auth->is_logged_in()): ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> <?php echo __('Howdy'); ?>
          <span class="badge badge-danger navbar-badge"> <?php echo $this->tank_auth->get_username(); ?> </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="<?php echo site_url('auth/change_password'); ?>"> <?php echo __('Change Password'); ?></a>

          <div class="dropdown-divider"></div>
          <a href="<?php echo site_url('auth/change_email'); ?>"> <?php echo __('Change Email'); ?></a>

          <div class="dropdown-divider"></div>
          <a title="logout" href="<?php echo site_url('auth/logout'); ?>"> <?php echo __('Logout'); ?></a>
        </div>
      </li>
      <?php endIf; ?>

 </ul>






            
</nav>