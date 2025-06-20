<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo base_url('assets/'); ?>"
  data-template="vertical-menu-template-starter"
  data-style="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title><?php echo $title; ?> - Stok Obat Klinik</title>
  <meta name="description" content="Dashboard Kasir untuk pengelolaan stok obat klinik." />

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

  <!-- Chart.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

  <!-- Helpers -->
  <script src="<?php echo base_url('assets/vendor/js/helpers.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/js/template-customizer.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/config.js'); ?>"></script>

  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
      --info-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
    }

    .enhanced-card {
      background: var(--card-gradient);
      border: none !important;
      border-radius: 16px;
      color: white;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .enhanced-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, rgba(255,255,255,0.1), transparent);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .enhanced-card:hover::before {
      opacity: 1;
    }

    .enhanced-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    .enhanced-card.border-primary {
      --card-gradient: var(--primary-gradient);
    }

    .enhanced-card.border-info {
      --card-gradient: var(--info-gradient);
    }

    .enhanced-card.border-success {
      --card-gradient: var(--success-gradient);
    }

    .enhanced-card.border-danger {
      --card-gradient: var(--danger-gradient);
    }

    .enhanced-card .card-body {
      position: relative;
      z-index: 2;
    }

    .enhanced-card .card-title {
      color: rgba(255, 255, 255, 0.9);
      font-weight: 500;
      margin-bottom: 8px;
    }

    .enhanced-card .card-text {
      color: white !important;
      font-weight: 700;
      font-size: 1.8rem;
    }

    .chart-container {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      border-top: 4px solid #667eea;
    }

    .chart-title {
      color: #495057;
      font-weight: 600;
      margin-bottom: 15px;
      font-size: 1.1rem;
    }

    .chart-wrapper {
      position: relative;
      height: 300px;
    }

    .chart-wrapper-small {
      position: relative;
      height: 250px;
    }

    .pulse-danger {
      animation: pulse-danger 2s infinite;
    }

    @keyframes pulse-danger {
      0% { box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3); }
      50% { box-shadow: 0 8px 25px rgba(239, 68, 68, 0.6); }
      100% { box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3); }
    }

    .metric-icon {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 2rem;
      opacity: 0.3;
    }

    .alert-enhanced {
      border: none;
      border-radius: 10px;
      padding: 15px 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
  </style>
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
              <div class="alert alert-success alert-enhanced alert-dismissible" role="alert">
                <i class="ti ti-check me-2"></i>
                <?php echo $this->session->flashdata('message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger alert-enhanced alert-dismissible" role="alert">
                <i class="ti ti-alert-triangle me-2"></i>
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <!-- Dashboard Cards -->
            <div class="row">
              <!-- Penjualan Hari Ini -->
              <div class="col-md-3 mb-4">
                <div class="card enhanced-card border-primary">
                  <div class="card-body">
                    <i class="ti ti-cash metric-icon"></i>
                    <h6 class="card-title">Penjualan Hari Ini</h6>
                    <h4 class="card-text" id="penjualan-counter">Rp <?php echo number_format($penjualan_hari_ini, 0, ',', '.'); ?></h4>
                    <small style="opacity: 0.8;">
                      <i class="ti ti-trending-up me-1"></i>Hari ini
                    </small>
                  </div>
                </div>
              </div>

              <!-- Total Transaksi Hari Ini -->
              <div class="col-md-3 mb-4">
                <div class="card enhanced-card border-info">
                  <div class="card-body">
                    <i class="ti ti-shopping-cart metric-icon"></i>
                    <h6 class="card-title">Transaksi Hari Ini</h6>
                    <h4 class="card-text" id="transaksi-counter"><?php echo $total_transaksi_hari_ini; ?> transaksi</h4>
                    <small style="opacity: 0.8;">
                      <i class="ti ti-clock me-1"></i>Real time
                    </small>
                  </div>
                </div>
              </div>

              <!-- Total Penjualan Kasir -->
              <div class="col-md-3 mb-4">
                <div class="card enhanced-card border-success">
                  <div class="card-body">
                    <i class="ti ti-chart-line metric-icon"></i>
                    <h6 class="card-title">Total Penjualan Anda</h6>
                    <h4 class="card-text" id="total-penjualan-counter"><?php echo $total_penjualan_saya; ?> kali</h4>
                    <small style="opacity: 0.8;">
                      <i class="ti ti-user me-1"></i>Semua waktu
                    </small>
                  </div>
                </div>
              </div>

              <!-- Obat Stok Menipis -->
              <div class="col-md-3 mb-4">
                <div class="card enhanced-card border-danger <?php echo ($stok_menipis > 0) ? 'pulse-danger' : ''; ?>">
                  <div class="card-body">
                    <i class="ti ti-alert-triangle metric-icon"></i>
                    <h6 class="card-title">Stok Menipis</h6>
                    <h4 class="card-text text-white" id="stok-menipis-counter"><?php echo $stok_menipis; ?> obat</h4>
                    <small style="opacity: 0.8;">
                      <i class="ti ti-exclamation-mark me-1"></i>Perlu perhatian
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Charts Section -->
            <?php if($total_penjualan_saya > 0): ?>
            <div class="row">
              <!-- Chart Transaksi Bulanan -->
              <div class="col-lg-8 mb-4">
                <div class="chart-container">
                  <h5 class="chart-title">
                    <i class="ti ti-chart-area me-2"></i>
                    Performa Penjualan Anda (Bulanan)
                  </h5>
                  <div class="chart-wrapper">
                    <canvas id="monthlyPerformanceChart"></canvas>
                  </div>
                </div>
              </div>

              <!-- Status Stok Chart -->
              <div class="col-lg-4 mb-4">
                <div class="chart-container">
                  <h5 class="chart-title">
                    <i class="ti ti-chart-donut me-2"></i>
                    Status Stok Obat
                  </h5>
                  <div class="chart-wrapper-small">
                    <canvas id="stockStatusChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Additional Charts Row -->
            <div class="row">
              <!-- Aktivitas Harian -->
              <div class="col-lg-6 mb-4">
                <div class="chart-container">
                  <h5 class="chart-title">
                    <i class="ti ti-activity me-2"></i>
                    Aktivitas Transaksi (Hari vs Bulan)
                  </h5>
                  <div class="chart-wrapper-small">
                    <canvas id="activityComparisonChart"></canvas>
                  </div>
                </div>
              </div>

              <!-- Obat Stok Menipis Detail -->
              <div class="col-lg-6 mb-4">
                <div class="chart-container">
                  <h5 class="chart-title">
                    <i class="ti ti-alert-circle me-2"></i>
                    Daftar Obat Stok Menipis
                  </h5>
                  <div style="max-height: 250px; overflow-y: auto;">
                    <?php if(isset($obat_menipis) && !empty($obat_menipis)): ?>
                      <?php foreach($obat_menipis as $obat): ?>
                      <div class="d-flex justify-content-between align-items-center p-2 mb-2 border rounded">
                        <div>
                          <strong><?php echo $obat['nama_obat']; ?></strong>
                          <br>
                          <small class="text-muted"><?php echo isset($obat['kategori']) ? $obat['kategori'] : 'Tidak ada'; ?></small>


                        </div>
                        <div class="text-end">
                          <span class="badge bg-danger"><?php echo $obat['stok']; ?> unit</span>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <div class="text-center text-muted p-4">
                        <i class="ti ti-check-circle" style="font-size: 3rem; opacity: 0.3;"></i>
                        <p>Semua stok obat dalam kondisi aman</p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php else: ?>
            <!-- First Time User Message -->
            <div class="row">
              <div class="col-12">
                <div class="chart-container text-center">
                  <i class="ti ti-chart-line" style="font-size: 4rem; color: #667eea; opacity: 0.5;"></i>
                  <h5 class="mt-3 mb-2">Selamat Datang!</h5>
                  <p class="text-muted">Grafik dan analisis akan muncul setelah Anda melakukan transaksi pertama.</p>
                  <a href="<?php echo base_url('kasir/penjualan'); ?>" class="btn btn-primary">
                    <i class="ti ti-plus me-2"></i>Buat Transaksi Pertama
                  </a>
                </div>
              </div>
            </div>
            <?php endif; ?>

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

  <!-- Dashboard JS -->
  <script>
    // Chart.js Global Configuration
    Chart.defaults.font.family = "'Public Sans', sans-serif";
    Chart.defaults.color = '#697a8d';

    // PHP Data untuk JavaScript
    const dashboardData = {
      penjualanHariIni: <?php echo (int)$penjualan_hari_ini; ?>,
      transaksiHariIni: <?php echo (int)$total_transaksi_hari_ini; ?>,
      transaksibulanIni: <?php echo (int)$total_transaksi_bulan_ini; ?>,
      totalPenjualan: <?php echo (int)$total_penjualan_saya; ?>,
      stokMenipis: <?php echo (int)$stok_menipis; ?>,
      jumlahObat: <?php echo isset($jumlah_obat) ? (int)$jumlah_obat : 0; ?>
    };

    // Counter Animation
    function animateCounter(element, start, end, duration, prefix = '', suffix = '') {
      const startTime = Date.now();
      const update = () => {
        const now = Date.now();
        const progress = Math.min((now - startTime) / duration, 1);
        const current = Math.floor(progress * (end - start) + start);
        element.textContent = prefix + current.toLocaleString('id-ID') + suffix;
        if (progress < 1) {
          requestAnimationFrame(update);
        }
      };
      update();
    }

    // Initialize Charts only if user has transactions
    <?php if($total_penjualan_saya > 0): ?>
    
    // Monthly Performance Chart
    const monthlyCtx = document.getElementById('monthlyPerformanceChart');
    if (monthlyCtx) {
      new Chart(monthlyCtx, {
        type: 'line',
        data: {
          labels: ['Hari Ini', 'Bulan Ini'],
          datasets: [{
            label: 'Jumlah Transaksi',
            data: [dashboardData.transaksiHariIni, dashboardData.transaksibulanIni],
            borderColor: '#667eea',
            backgroundColor: 'rgba(102, 126, 234, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#667eea',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 8
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 1
              },
              grid: {
                color: 'rgba(0,0,0,0.05)'
              }
            },
            x: {
              grid: {
                display: false
              }
            }
          }
        }
      });
    }

    // Stock Status Chart
    const stockCtx = document.getElementById('stockStatusChart');
    if (stockCtx) {
      const stokAman = Math.max(0, dashboardData.jumlahObat - dashboardData.stokMenipis);
      new Chart(stockCtx, {
        type: 'doughnut',
        data: {
          labels: ['Stok Aman', 'Stok Menipis'],
          datasets: [{
            data: [stokAman, dashboardData.stokMenipis],
            backgroundColor: [
              '#28c76f',
              '#ff4961'
            ],
            borderWidth: 0,
            hoverOffset: 8
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                padding: 15,
                usePointStyle: true
              }
            }
          },
          cutout: '65%'
        }
      });
    }

    // Activity Comparison Chart
    const activityCtx = document.getElementById('activityComparisonChart');
    if (activityCtx) {
      new Chart(activityCtx, {
        type: 'bar',
        data: {
          labels: ['Transaksi Hari Ini', 'Total Bulan Ini'],
          datasets: [{
            label: 'Jumlah',
            data: [dashboardData.transaksiHariIni, dashboardData.transaksibulanIni],
            backgroundColor: [
              'rgba(102, 126, 234, 0.8)',
              'rgba(40, 199, 111, 0.8)'
            ],
            borderColor: [
              '#667eea',
              '#28c76f'
            ],
            borderWidth: 2,
            borderRadius: 6
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 1
              },
              grid: {
                color: 'rgba(0,0,0,0.05)'
              }
            },
            x: {
              grid: {
                display: false
              }
            }
          }
        }
      });
    }

    <?php endif; ?>

    // Initialize animations when page loads
    window.addEventListener('load', () => {
      // Counter animations
      setTimeout(() => {
        const penjualanEl = document.getElementById('penjualan-counter');
        const transaksiEl = document.getElementById('transaksi-counter');
        const totalEl = document.getElementById('total-penjualan-counter');
        const stokEl = document.getElementById('stok-menipis-counter');

        if (penjualanEl) animateCounter(penjualanEl, 0, dashboardData.penjualanHariIni, 2000, 'Rp ', '');
        if (transaksiEl) animateCounter(transaksiEl, 0, dashboardData.transaksiHariIni, 1500, '', ' transaksi');
        if (totalEl) animateCounter(totalEl, 0, dashboardData.totalPenjualan, 1800, '', ' kali');
        if (stokEl) animateCounter(stokEl, 0, dashboardData.stokMenipis, 1200, '', ' obat');
      }, 300);
    });

    // Format currency for animation
    function formatCurrency(num) {
      return new Intl.NumberFormat('id-ID').format(num);
    }
  </script>
</body>
</html>