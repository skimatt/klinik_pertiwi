<nav
  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar">

  <!-- Toggle Menu for Mobile -->
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="ti ti-menu-2 ti-md"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    <!-- Theme Switcher -->
    <div class="navbar-nav align-items-center me-4">
      <div class="nav-item dropdown-style-switcher dropdown">
        <a
          class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
          href="javascript:void(0);"
          data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="ti ti-sun ti-md"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
          <li>
            <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
              <i class="ti ti-sun me-3"></i>
              <span class="align-middle">Light</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
              <i class="ti ti-moon-stars me-3"></i>
              <span class="align-middle">Dark</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
              <i class="ti ti-device-desktop-analytics me-3"></i>
              <span class="align-middle">System</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

        <!-- Notifikasi dan User Dropdown -->
    <ul class="navbar-nav flex-row align-items-center ms-auto">

<!-- Notifikasi -->
<li class="nav-item dropdown dropdown-notifications me-3">
  <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="ti ti-bell ti-md"></i>
    <?php if (!empty($obat_menipis)): ?>
      <span class="badge bg-danger rounded-pill badge-notifications"><?php echo count($obat_menipis); ?></span>
    <?php endif; ?>
  </a>

  <ul class="dropdown-menu dropdown-menu-end py-0" style="min-width: 320px; max-height: 400px; overflow-y: auto;">
    <li class="dropdown-header bg-primary text-white py-2 px-3">
      <i class="ti ti-alert-triangle me-2"></i> Notifikasi Stok Menipis
    </li>
    <li><hr class="dropdown-divider my-0" /></li>

    <!-- Jumlah total -->
    <li class="px-3 py-2">
      <h6 class="mb-0">Total Obat Menipis</h6>
      <p class="display-6 fw-semibold text-danger mb-0">
        <?php echo number_format(count($obat_menipis), 0, ',', '.'); ?>
      </p>
      <small class="text-muted">obat</small>
    </li>

    <li><hr class="dropdown-divider my-0" /></li>

    <?php if (!empty($obat_menipis)): ?>
      <?php foreach ($obat_menipis as $obat): ?>
        <li>
          <a class="dropdown-item d-flex align-items-start py-2" href="<?php echo site_url('admin/laporan_stok_menipis'); ?>">
            <div class="flex-shrink-0 me-2 mt-1">
              <i class="ti ti-package text-warning"></i>
            </div>
            <div class="flex-grow-1">
              <strong><?php echo htmlspecialchars($obat['nama_obat']); ?></strong><br />
              <small class="text-muted">Stok menipis</small>
            </div>
          </a>
        </li>
        <li><hr class="dropdown-divider my-0" /></li>
      <?php endforeach; ?>
    <?php else: ?>
      <li>
        <div class="dropdown-item text-center py-3">
          <i class="ti ti-checklist text-success mb-2" style="font-size: 20px;"></i><br />
          <span class="fw-medium">Semua stok aman</span><br />
          <small class="text-muted">Tidak ada obat yang menipis</small>
        </div>
      </li>
    <?php endif; ?>

    <li class="text-center py-2">
      <a href="<?php echo site_url('kasir/lihat_obat'); ?>" class="text-primary small fw-semibold">
        <i class="ti ti-arrow-right me-1"></i> Lihat Detail
      </a>
    </li>
  </ul>
</li>

    <!-- User Profile -->
    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a
          class="nav-link dropdown-toggle hide-arrow p-0"
          href="javascript:void(0);"
          data-bs-toggle="dropdown"
          aria-expanded="false">
          <div class="avatar avatar-online">
            <img
              src="<?php echo base_url('assets/img/avatars/8.png'); ?>"
              alt="Profile Picture"
              class="rounded-circle"
              style="width: 40px; height: 40px;" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item mt-0" href="javascript:void(0);">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">
                  <div class="avatar avatar-online">
                    <img
                      src="<?php echo base_url('assets/img/avatars/8.png'); ?>"
                      alt="Profile Picture"
                      class="rounded-circle"
                      style="width: 32px; height: 32px;" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-0"><?php echo htmlspecialchars($this->session->userdata('nama')); ?></h6>
                  <small class="text-muted">Kasir</small>
                </div>
              </div>
            </a>
          </li>
          <li><div class="dropdown-divider my-1"></div></li>
          <li>
            <a class="dropdown-item" href="<?php echo site_url('kasir/logout'); ?>">
              <i class="ti ti-logout me-3 ti-md"></i>
              <span class="align-middle">Logout</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
