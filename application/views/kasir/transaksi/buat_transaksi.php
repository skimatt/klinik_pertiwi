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
  <meta name="description" content="Buat Transaksi untuk kasir." />

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
      <?php $this->load->view('kasir/templates/sidebar'); ?>
      <!-- / Sidebar -->

      <!-- Layout page -->
      <div class="layout-page">
        <!-- Header -->
        <?php $this->load->view('kasir/templates/header'); ?>
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

            <!-- Form Transaksi -->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Form Transaksi</h5>
              </div>
              <div class="card-body">
                <form id="transaksiForm" action="<?php echo site_url('kasir/buat_transaksi'); ?>" method="post">
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label class="form-label">Pilih Obat</label>
                      <select class="form-control" id="obatSelect">
                        <option value="">-- Pilih Obat --</option>
                        <?php foreach ($obat as $item): ?>
                          <option value="<?php echo $item['id_obat']; ?>" data-harga="<?php echo $item['harga']; ?>" data-stok="<?php echo $item['stok']; ?>">
                            <?php echo $item['nama_obat']; ?> (Stok: <?php echo $item['stok']; ?>)
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label">Jumlah</label>
                      <input type="number" class="form-control" id="jumlahInput" min="1" />
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                      <button type="button" class="btn btn-primary" id="tambahItem">Tambah</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="itemTable">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Obat</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Subtotal</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                  <input type="hidden" name="items" id="itemsInput" />
                  <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                    <a href="<?php echo site_url('kasir/data_penjualan'); ?>" class="btn btn-secondary">Batal</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <?php $this->load->view('kasir/templates/footer'); ?>
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
  <!-- Custom JS -->
  <script>
    $(document).ready(function() {
      let items = [];
      let no = 1;

      $('#tambahItem').click(function() {
        let id_obat = $('#obatSelect').val();
        let nama_obat = $('#obatSelect option:selected').text().split(' (')[0];
        let harga = parseInt($('#obatSelect option:selected').data('harga'));
        let stok = parseInt($('#obatSelect option:selected').data('stok'));
        let jumlah = parseInt($('#jumlahInput').val());

        if (!id_obat || !jumlah || jumlah <= 0) {
          alert('Pilih obat dan masukkan jumlah yang valid.');
          return;
        }
        if (jumlah > stok) {
          alert('Jumlah melebihi stok yang tersedia.');
          return;
        }

        let subtotal = harga * jumlah;
        items.push({ id_obat, jumlah });

        $('#itemTable tbody').append(`
          <tr>
            <td>${no++}</td>
            <td>${nama_obat}</td>
            <td>Rp ${harga.toLocaleString('id-ID')}</td>
            <td>${jumlah}</td>
            <td>Rp ${subtotal.toLocaleString('id-ID')}</td>
            <td><button type="button" class="btn btn-danger btn-sm hapusItem">Hapus</button></td>
          </tr>
        `);

        $('#itemsInput').val(JSON.stringify(items));
        $('#obatSelect').val('');
        $('#jumlahInput').val('');
      });

      $(document).on('click', '.hapusItem', function() {
        let row = $(this).closest('tr');
        let index = row.index();
        items.splice(index, 1);
        row.remove();
        $('#itemsInput').val(JSON.stringify(items));
        no--;
        $('#itemTable tbody tr').each(function(i) {
          $(this).find('td:first').text(i + 1);
        });
      });

      $('#transaksiForm').submit(function(e) {
        if (items.length === 0) {
          e.preventDefault();
          alert('Tambahkan setidaknya satu item transaksi.');
        }
      });
    });
  </script>
</body>
</html>