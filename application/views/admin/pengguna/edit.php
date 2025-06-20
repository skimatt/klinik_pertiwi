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
  <meta name="description" content="Manajemen Pengguna untuk pengelolaan stok obat klinik." />

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
            <?php if (isset($error)): ?>
              <div class="alert alert-danger alert-dismiss-warning" role="alert-warning">
                <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <!-- Form Edit Pengguna -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Form Edit Pengguna</h5>
  </div>
  <div class="card-body">
    <?php echo form_open('admin/pengguna/edit/' . $pengguna['id_user']); ?>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama', $pengguna['nama']); ?>" required />
          <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="username" value="<?php echo set_value('username', $pengguna['username']); ?>" required />
          <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" />
          <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Role</label>
          <select class="form-control" name="role" required>
            <option value="admin" <?php echo set_select('role', 'admin', $pengguna['role'] == 'admin'); ?>>Admin</option>
            <option value="kasir" <?php echo set_select('role', 'kasir', $pengguna['role'] == 'kasir'); ?>>Kasir</option>
          </select>
          <?php echo form_error('role', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Status</label>
          <select class="form-control" name="status" required>
            <option value="aktif" <?php echo set_select('status', 'aktif', $pengguna['status'] == 'aktif'); ?>>Aktif</option>
            <option value="nonaktif" <?php echo set_select('status', 'nonaktif', $pengguna['status'] == 'nonaktif'); ?>>Nonaktif</option>
          </select>
          <?php echo form_error('status', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12 text-right">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?php echo site_url('admin/pengguna'); ?>" class="btn btn-secondary">Batal</a>
        </div>
      </div>
    <?php echo form_close(); ?>
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
  </div>

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