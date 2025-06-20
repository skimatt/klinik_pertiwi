<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?php echo site_url('kasir'); ?>" class="app-brand-link">
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

    <!-- === Navigasi Utama === -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Navigasi Utama</span>
    </li>

    <li class="menu-item <?php echo (uri_string() == 'kasir' || uri_string() == '') ? 'active' : ''; ?>">
      <a href="<?php echo site_url('kasir'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <!-- === Transaksi & Data === -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Transaksi & Data</span>
    </li>

    <li class="menu-item <?php echo (strpos(uri_string(), 'kasir/penjualan') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('kasir/penjualan'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
        <div>Penjualan</div>
      </a>
    </li>

    <li class="menu-item <?php echo (strpos(uri_string(), 'kasir/laporan_saya') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('kasir/laporan_saya'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-file-report"></i>
        <div>Laporan Saya</div>
      </a>
    </li>

    <li class="menu-item <?php echo (strpos(uri_string(), 'kasir/lihat_obat') !== false) ? 'active' : ''; ?>">
      <a href="<?php echo site_url('kasir/lihat_obat'); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-pill"></i>
        <div>Lihat Obat</div>
      </a>
    </li>

    <!-- === Keluar === -->
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
