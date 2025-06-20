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
  <meta name="description" content="Log Aktivitas untuk pengelolaan stok obat klinik." />

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

  <!-- Bootstrap 4 -->
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
      <!-- Sidebar -->
      <?php $this->load->view('admin/templates/sidebar'); ?>
      <!-- / Sidebar -->

      <!-- Layout page -->
      <div class="layout-page">
        <!-- Header -->
        <?php $this->load->view('admin/templates/header'); ?>
        <!-- / Header -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-4 mb-6"><?php echo $title; ?></h4>

            <!-- Flash Messages -->
            <?php if ($this->session->flashdata('message')): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <!-- Filter -->
            <div class="card mb-4">
              <div class="card-body">
                <form action="<?php echo site_url('admin/log_aktivitas'); ?>" method="get">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Pengguna</label>
                      <select class="form-control" name="id_user">
                        <option value="">-- Semua Pengguna --</option>
                        <?php foreach ($pengguna as $user): ?>
                          <option value="<?php echo $user['id_user']; ?>" <?php echo $this->input->get('id_user') == $user['id_user'] ? 'selected' : ''; ?>>
                            <?php echo $user['nama']; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label class="form-label">Dari Tanggal</label>
                      <input type="date" class="form-control" name="dari" value="<?php echo $this->input->get('dari'); ?>" />
                    </div>
                    <div class="col-md-3 mb-3">
                      <label class="form-label">Sampai Tanggal</label>
                      <input type="date" class="form-control" name="sampai" value="<?php echo $this->input->get('sampai'); ?>" />
                    </div>
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                      <button type="submit" class="btn btn-primary">Tampilkan</button>
                      <a href="<?php echo site_url('admin/log_aktivitas'); ?>" class="btn btn-secondary ml-2">Reset</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>

<!-- Tabel Log Aktivitas -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Daftar Log Aktivitas</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>no</th>
            <th>Pengguna</th>
            <th>Aktivitas</th>
            <th>Waktu</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = count($log_aktivitas); foreach ($log_aktivitas as $log): ?>
<tr>
  <td><?php echo $no--; ?></td>
  <td><?php echo $log['nama'] ?: '-'; ?></td>
  <td><?php echo $log['aktivitas']; ?></td>
  <td><?php echo tanggal_indonesia($log['waktu']); ?></td>
</tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
</div>

          </div>
          <!-- / Content -->

          <!-- Footer -->
          <?php $this->load->view('admin/templates/footer'); ?>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- / Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
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