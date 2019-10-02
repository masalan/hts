


<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
        <a href="<?= site_url('admin/dashboard') ?>" class="brand-link">
      <img src="<?= site_url('img/i4.jpg') ?>" alt="HTS Gabon" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HTS Gabon</span>
    </a>

        <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= site_url('img/i8.jpg') ?>" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
        <a href="<?= site_url('admin/dashboard') ?>" class="d-block">Alexander Pierce</a>
        </div>
      </div>



        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= site_url('admin/dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i><p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('categorie') ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i><p> Catégories </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('produit') ?>" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i><p> Produits </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>