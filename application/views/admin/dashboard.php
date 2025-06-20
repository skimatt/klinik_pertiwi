<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo base_url('assets/'); ?>"
  data-template="vertical-menu-template-starter">
  data-style="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title><?php echo $title; ?> - Stok Obat Klinik</title>
  <meta name="description" content="Manajemen Obat untuk pengelolaan stok obat klinik." />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon/favicon.ico'); ?>" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/tabler-icons.css'); ?>" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/rtl/core.css'); ?>" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/rtl/theme-default.css'); ?>" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css'); ?>" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/node-waves/node-waves.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  <!-- Bootstrap 4 for PHP 5.6 compatibility -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Helpers -->
  <script src="<?php echo base_url('assets/vendor/js/helpers.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/js/template-customizer.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/config.js'); ?>"></script>
</head>
<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <?php $this->load->view('admin/templates/sidebar'); ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php $this->load->view('admin/templates/header'); ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row g-6">
              <!-- Card Border Shadow -->
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-primary h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-primary">
                          <i class="ti ti-pill ti-28px"></i>
                        </span>
                      </div>
                      <h4 class="mb-0"><?php echo number_format($total_stok, 0, ',', '.'); ?></h4>
                    </div>
                    <p class="mb-1">Total Stok Obat</p>
                    <p class="mb-0">
                      <span class="text-heading fw-medium me-2">Unit</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-warning h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-warning">
                          <i class="ti ti-alert-triangle ti-28px"></i>
                        </span>
                      </div>
                      <h4 class="mb-0"><?php echo number_format($stok_menipis, 0, ',', '.'); ?></h4>
                    </div>
                    <p class="mb-1">Obat Stok Menipis</p>
                    <p class="mb-0">
                      <span class="text-heading fw-medium me-2">Obat</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-danger h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-danger">
                          <i class="ti ti-currency-dollar ti-28px"></i>
                        </span>
                      </div>
                      <h4 class="mb-0">Rp <?php echo number_format($penjualan_hari_ini, 0, ',', '.'); ?></h4>
                    </div>
                    <p class="mb-1">Penjualan Hari Ini</p>
                    <p class="mb-0">
                      <span class="text-heading fw-medium me-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-info h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-info">
                          <i class="ti ti-box ti-28px"></i>
                        </span>
                      </div>
                      <h4 class="mb-0"><?php echo number_format($total_obat, 0, ',', '.'); ?></h4>
                    </div>
                    <p class="mb-1">Total Obat</p>
                    <p class="mb-0">
                      <span class="text-heading fw-medium me-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <!--/ Card Border Shadow -->

              <!-- Additional Stats -->
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-success h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-success">
                          <i class="ti ti-category ti-28px"></i>
                        </span>
                      </div>
                      <h4 class="mb-0"><?php echo number_format($total_kategori, 0, ',', '.'); ?></h4>
                    </div>
                    <p class="mb-1">Total Kategori</p>
                    <p class="mb-0">
                      <span class="text-heading fw-medium me-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-primary h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-primary">
                          <i class="ti ti-tags ti-28px"></i>
                        </span>
                      </div>
                      <h4 class="mb-0"><?php echo number_format($total_jenis, 0, ',', '.'); ?></h4>
                    </div>
                    <p class="mb-1">Total Jenis</p>
                    <p class="mb-0">
                      <span class="text-heading fw-medium me-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-warning h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-warning">
                          <i class="ti ti-truck ti-28px"></i>
                        </span>
                      </div>
                      <h4 class="mb-0"><?php echo number_format($total_suplier, 0, ',', '.'); ?></h4>
                    </div>
                    <p class="mb-1">Total Suplier</p>
                    <p class="mb-0">
                      <span class="text-heading fw-medium me-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-danger h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-danger">
                          <i class="ti ti-users ti-28px"></i>
                        </span>
                      </div>
                      <h4 class="mb-0"><?php echo number_format($total_pengguna, 0, ',', '.'); ?></h4>
                    </div>
                    <p class="mb-1">Total Pengguna</p>
                    <p class="mb-0">
                      <span class="text-heading fw-medium me-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <!--/ Additional Stats -->

              <!-- Log Aktivitas Terbaru -->
              <div class="col-12">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Aktivitas Terbaru</h5>
                      <p class="card-subtitle">Real-time Log</p>
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn btn-text-secondary rounded-pill text-muted border-0 p-2 me-n1"
                        type="button"
                        id="logAktivitas"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti ti-dots-vertical ti-md text-muted"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="logAktivitas">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <ul class="p-0 m-0">
                      <?php if (!empty($log_aktivitas)): ?>
                        <?php foreach ($log_aktivitas as $log): ?>
                          <li class="d-flex mb-6">
                            <div class="avatar flex-shrink-0 me-4">
                              <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-activity ti-26px"></i>
                              </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0 fw-normal"><?php echo $log->aktivitas; ?></h6>
                                <small class="text-muted d-block">
                                  <?php echo isset($log->nama_user) ? $log->nama_user : 'Pengguna'; ?> •
                                  <?php echo date('d M Y H:i', strtotime($log->waktu)); ?>
                                </small>
                              </div>
                            </div>
                          </li>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <li class="d-flex mb-6">
                          <div class="me-2">
                            <h6 class="mb-0 fw-normal text-muted">Belum ada aktivitas tercatat.</h6>
                          </div>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <!--/ Log Aktivitas Terbaru -->
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <?php $this->load->view('admin/templates/footer'); ?>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <script src="<?php echo base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/libs/popper/popper.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/js/bootstrap.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/libs/node-waves/node-waves.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/libs/hammer/hammer.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/js/menu.js'); ?>"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

  <!-- Main JS -->
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</body>
</html>