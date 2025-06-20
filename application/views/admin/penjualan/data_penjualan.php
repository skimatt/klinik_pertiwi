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
  <title><?php echo $title; ?> - Klinik Pertiwi</title>
  <meta name="description" content="Data Penjualan untuk pengelolaan stok obat klinik." />

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
                <form action="<?php echo site_url('admin/data_penjualan'); ?>" method="get">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label class="form-label">Tanggal</label>
                      <input type="date" class="form-control" name="tanggal" value="<?php echo $this->input->get('tanggal'); ?>" />
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Kasir</label>
                      <select class="form-control" name="id_user">
                        <option value="">Semua Kasir</option>
                        <?php foreach ($pengguna as $user): ?>
                          <option value="<?php echo $user['id_user']; ?>" <?php echo $this->input->get('id_user') == $user['id_user'] ? 'selected' : ''; ?>>
                            <?php echo $user['nama']; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                      <button type="submit" class="btn btn-primary">Tampilkan</button>
                      <a href="<?php echo site_url('admin/data_penjualan'); ?>" class="btn btn-secondary ml-2">Reset</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Daftar Penjualan -->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Daftar Penjualan</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Nama Kasir</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (empty($penjualan)): ?>
                        <tr>
                          <td colspan="5" class="text-center">Tidak ada data penjualan.</td>
                        </tr>
                      <?php else: ?>
                        <?php $no = 1; foreach ($penjualan as $item): ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($item['tanggal'])); ?></td>
                           <td>Rp <?php echo number_format($item['total_hitung'], 0, ',', '.'); ?></td>
                            <td><?php echo $item['nama_user'] ?: '-'; ?></td>
                            <td>
                              <a href="<?php echo site_url('admin/detail_penjualan/' . $item['id_penjualan']); ?>" class="btn btn-sm btn-info">Detail</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <!-- Pagination -->
                <?php if ($this->pagination->create_links()): ?>
                  <div class="mt-3">
                    <?php echo $this->pagination->create_links(); ?>
                  </div>
                <?php endif; ?>
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