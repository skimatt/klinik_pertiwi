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
  <meta name="description" content="Laporan Stok Menipis untuk pengelolaan stok obat klinik." />

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
            <?php if ($this->session->flashdata('message')): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

           <!-- Filter Laporan -->
<div class="card mb-4">
  <div class="card-body">
    <form action="<?php echo site_url('admin/laporan_stok_menipis'); ?>" method="post">
      <div class="row">
        <!-- Kategori -->
        <div class="col-md-4 mb-3">
          <label class="form-label">Kategori</label>
          <select class="form-control" name="kategori">
            <option value="">-- Semua Kategori --</option>
            <?php foreach ($kategori as $item): ?>
              <option value="<?php echo $item['id_kategori']; ?>" 
                <?php echo (isset($kategori_selected) && $kategori_selected == $item['id_kategori']) ? 'selected' : ''; ?>>
                <?php echo $item['nama_kategori']; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Jenis -->
        <div class="col-md-4 mb-3">
          <label class="form-label">Jenis</label>
          <select class="form-control" name="jenis">
            <option value="">-- Semua Jenis --</option>
            <?php foreach ($jenis as $item): ?>
              <option value="<?php echo $item['id_jenis']; ?>" 
                <?php echo (isset($jenis_selected) && $jenis_selected == $item['id_jenis']) ? 'selected' : ''; ?>>
                <?php echo $item['nama_jenis']; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Tombol -->
        <div class="col-md-4 mb-3 d-flex align-items-end">
          <button type="submit" class="btn btn-primary">Tampilkan</button>
          <a href="<?php echo site_url('admin/laporan_stok_menipis'); ?>" class="btn btn-secondary ml-2">Reset</a>
        </div>
      </div>
    </form>
  </div>
</div>


            <!-- Laporan Stok Menipis -->
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Laporan Stok Menipis</h5>
                <a href="<?php echo site_url('admin/cetak_stok_menipis?kategori=' . urlencode($kategori_selected) . '&jenis=' . urlencode($jenis_selected)); ?>" class="btn btn-primary" target="_blank">
  <i class="ti ti-printer ti-xs"></i> Cetak PDF
</a>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Stok</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($obat as $item): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $item['nama_obat']; ?></td>
                        <td><?php echo $item['nama_kategori']; ?></td>
                        <td><?php echo $item['nama_jenis']; ?></td>
                        <td><?php echo $item['stok']; ?></td>
                        <td><?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
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