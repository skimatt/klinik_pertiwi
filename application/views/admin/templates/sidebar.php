<?php
  $uri = uri_string();
  $is_obat_active = in_array($uri, ['admin/obat', 'admin/laporan_stok_menipis', 'admin/laporan_stok_obat']);
  $is_penjualan_active = in_array($uri, ['admin/penjualan', 'admin/data_penjualan']);
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?php echo site_url('admin'); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="<?php echo base_url('assets/img/favicon/favicon.ico'); ?>" alt="Logo" width="32" />
      </span>
      <span class="app-brand-text demo menu-text fw-bold">Klinik Pertiwi</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

    <!-- Dashboard -->
    <li class="menu-item <?php echo ($uri == 'admin' || $uri == '') ? 'active' : ''; ?>">
      <a href="<?php echo site_url('admin'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <!-- Manajemen Obat (Dropdown) -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Manajemen Obat</span>
    </li>

    <li class="menu-item <?php echo $is_obat_active ? 'active open' : ''; ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-pill"></i>
        <div>Obat</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?php echo ($uri == 'admin/obat') ? 'active' : ''; ?>">
          <a href="<?php echo site_url('admin/obat'); ?>" class="menu-link">
            <div>Data Obat</div>
          </a>
        </li>
        <li class="menu-item <?php echo ($uri == 'admin/laporan_stok_menipis') ? 'active' : ''; ?>">
          <a href="<?php echo site_url('admin/laporan_stok_menipis'); ?>" class="menu-link">
            <div>Stok Menipis</div>
          </a>
        </li>
        <li class="menu-item <?php echo ($uri == 'admin/laporan_stok_obat') ? 'active' : ''; ?>">
          <a href="<?php echo site_url('admin/laporan_stok_obat'); ?>" class="menu-link">
            <div>Stok Obat</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item <?php echo (strpos($uri, 'admin/kategori') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('admin/kategori'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-category"></i>
        <div>Kategori Obat</div>
      </a>
    </li>
    <li class="menu-item <?php echo (strpos($uri, 'admin/jenis') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('admin/jenis'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-tags"></i>
        <div>Jenis Obat</div>
      </a>
    </li>
    <li class="menu-item <?php echo (strpos($uri, 'admin/suplier') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('admin/suplier'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-truck"></i>
        <div>Suplier</div>
      </a>
    </li>

    <!-- Transaksi -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Transaksi</span>
    </li>

    <li class="menu-item <?php echo $is_penjualan_active ? 'active open' : ''; ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
        <div>Transaksi</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?php echo ($uri == 'admin/penjualan') ? 'active' : ''; ?>">
          <a href="<?php echo site_url('admin/penjualan'); ?>" class="menu-link">
            <div>Buat Transaksi</div>
          </a>
        </li>
        <li class="menu-item <?php echo ($uri == 'admin/data_penjualan') ? 'active' : ''; ?>">
          <a href="<?php echo site_url('admin/data_penjualan'); ?>" class="menu-link">
            <div>Data Transaksi</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item <?php echo (strpos($uri, 'admin/laporan_penjualan') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('admin/laporan_penjualan'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-file-report"></i>
        <div>Laporan Penjualan</div>
      </a>
    </li>

    <!-- Sistem & Akses -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Sistem & Akses</span>
    </li>

    <li class="menu-item <?php echo (strpos($uri, 'admin/pengguna') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('admin/pengguna'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div>Pengguna</div>
      </a>
    </li>

    <li class="menu-item <?php echo (strpos($uri, 'admin/log_aktivitas') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('admin/log_aktivitas'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-history"></i>
        <div>Log Aktivitas</div>
      </a>
    </li>

    <!-- Logout -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Keluar</span>
    </li>

    <li class="menu-item">
      <a href="<?php echo site_url('auth/logout'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-logout"></i>
        <div>Logout</div>
      </a>
    </li>

  </ul>
</aside>
