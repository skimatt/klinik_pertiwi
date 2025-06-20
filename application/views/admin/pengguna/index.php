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
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php $this->load->view('admin/templates/sidebar'); ?>

      <div class="layout-page">
        <?php $this->load->view('admin/templates/header'); ?>

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-4 mb-4"><?php echo $title; ?></h4>

            <!-- Flash Message -->
            <?php if ($this->session->flashdata('message')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>
            <?php endif; ?>

            <!-- Filter -->
            <div class="card mb-4">
              <div class="card-body">
                <form action="<?php echo site_url('admin/pengguna'); ?>" method="post">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Role</label>
                      <select class="form-control" name="role">
                        <option value="">-- Semua Role --</option>
                        <option value="admin" <?php echo (isset($role_selected) && $role_selected == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="kasir" <?php echo (isset($role_selected) && $role_selected == 'kasir') ? 'selected' : ''; ?>>Kasir</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3 d-flex align-items-end">
                      <button type="submit" class="btn btn-primary">Filter</button>
                      <a href="<?php echo site_url('admin/pengguna'); ?>" class="btn btn-secondary ml-2">Reset</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Table -->
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Pengguna</h5>
                <a href="<?php echo site_url('admin/pengguna/tambah'); ?>" class="btn btn-primary">
                  <i class="ti ti-plus ti-xs"></i> Tambah Pengguna
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($pengguna as $item): ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $item['nama']; ?></td>
                          <td><?php echo $item['username']; ?></td>
                          <td><?php echo ucfirst($item['role']); ?></td>
                          <td>
                            <?php
                              if (isset($item['status'])) {
                                echo $item['status'] === 'aktif'
                                  ? '<span class="badge bg-success">Aktif</span>'
                                  : '<span class="badge bg-danger">Nonaktif</span>';
                              } else {
                                echo '<span class="badge bg-secondary">Tidak Diketahui</span>';
                              }
                            ?>
                          </td>
                          <td>
                            <a href="<?php echo site_url('admin/pengguna/edit/' . $item['id_user']); ?>" class="btn btn-sm btn-info">
                              <i class="ti ti-edit ti-xs"></i> Edit
                            </a>
                            <?php if ($item['id_user'] != $this->session->userdata('id_user')): ?>
                              <a href="<?php echo site_url('admin/pengguna/hapus/' . $item['id_user']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengguna ini?');">
                                <i class="ti ti-trash ti-xs"></i> Hapus
                              </a>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if (empty($pengguna)): ?>
                        <tr>
                          <td colspan="6" class="text-center text-muted">Tidak ada data pengguna.</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <?php $this->load->view('admin/templates/footer'); ?>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
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