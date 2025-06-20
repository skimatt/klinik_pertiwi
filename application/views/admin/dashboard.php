
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

  <!-- Chart.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

  <!-- Custom CSS for enhanced dashboard -->
  <style>
    .dashboard-stats-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .dashboard-stats-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .stats-card-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .stats-card-warning {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .stats-card-danger {
      background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    
    .stats-card-info {
      background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    
    .stats-card-success {
      background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }
    
    .chart-container {
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
    }
    
    .chart-container:hover {
      transform: translateY(-2px);
    }
    
    .activity-item {
      padding: 15px;
      margin-bottom: 10px;
      background: #f8f9fa;
      border-radius: 10px;
      border-left: 4px solid #667eea;
      transition: all 0.3s ease;
    }
    
    .activity-item:hover {
      background: #e9ecef;
      transform: translateX(5px);
    }
    
    .gradient-text {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    
    .pulse-animation {
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    
    .floating-card {
      animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }
  </style>

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
              <!-- Charts Section -->
            <div class="row g-4 mb-4">
              <!-- Stock Overview Chart -->
              <div class="col-lg-6">
                <div class="card chart-container h-100">
                  <div class="card-header">
                    <h5 class="gradient-text mb-0">📈 Overview Stok Obat</h5>
                    <p class="text-muted small mb-0">Distribusi stok keseluruhan</p>
                  </div>
                  <div class="card-body">
                    <canvas id="stockOverviewChart" height="300"></canvas>
                  </div>
                </div>
              </div>
              
              <!-- System Overview Chart -->
              <div class="col-lg-6">
                <div class="card chart-container h-100">
                  <div class="card-header">
                    <h5 class="gradient-text mb-0">📊 Overview Sistem</h5>
                    <p class="text-muted small mb-0">Perbandingan data keseluruhan</p>
                  </div>
                  <div class="card-body">
                    <canvas id="salesTrendChart" height="300"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Category Distribution and System Stats -->
            <div class="row g-4 mb-4">
              <div class="col-lg-8">
                <div class="card chart-container h-100">
                  <div class="card-header">
                    <h5 class="gradient-text mb-0">📈 Distribusi Data Sistem</h5>
                    <p class="text-muted small mb-0">Visualisasi data berdasarkan kategori sistem</p>
                  </div>
                  <div class="card-body">
                    <canvas id="categoryChart" height="250"></canvas>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4">
                <div class="card chart-container h-100">
                  <div class="card-header">
                    <h5 class="gradient-text mb-0">⚡ Status Stok</h5>
                    <p class="text-muted small mb-0">Kondisi stok saat ini</p>
                  </div>
                  <div class="card-body">
                    <canvas id="systemStatusChart" height="250"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Activity Log -->
            <div class="row">
              <div class="col-12">
                <div class="card chart-container">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                      <h5 class="gradient-text mb-0">🚀 Aktivitas Terbaru</h5>
                      <p class="text-muted small mb-0">Log aktivitas real-time sistem</p>
                    </div>
                    <div class="dropdown">
                      <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="logAktivitas" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-refresh me-2"></i>Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-download me-2"></i>Export</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-share me-2"></i>Share</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <?php if (!empty($log_aktivitas)): ?>
                        <?php foreach ($log_aktivitas as $index => $log): ?>
                          <div class="col-md-6 mb-3">
                            <div class="activity-item">
                              <div class="d-flex align-items-center">
                                <div class="avatar me-3">
                                  <span class="avatar-initial rounded-circle bg-primary">
                                    <i class="ti ti-activity"></i>
                                  </span>
                                </div>
                                <div class="flex-grow-1">
                                  <h6 class="mb-1"><?php echo $log->aktivitas; ?></h6>
                                  <small class="text-muted">
                                    <i class="ti ti-user me-1"></i><?php echo isset($log->nama_user) ? $log->nama_user : 'Pengguna'; ?>
                                    <i class="ti ti-clock ms-2 me-1"></i><?php echo date('d M Y H:i', strtotime($log->waktu)); ?>
                                  </small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php if ($index >= 5) break; // Limit to 6 items ?>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <div class="col-12">
                          <div class="text-center py-4">
                            <i class="ti ti-info-circle text-muted" style="font-size: 3rem;"></i>
                            <h6 class="text-muted mt-2">Belum ada aktivitas tercatat</h6>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
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
        <!-- Content wrapper -->
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
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

  <!-- Chart.js Initialization -->
  <script>
    // PHP data to JavaScript
    const dashboardData = {
      total_stok: <?php echo $total_stok; ?>,
      stok_menipis: <?php echo $stok_menipis; ?>,
      penjualan_hari_ini: <?php echo $penjualan_hari_ini; ?>,
      total_obat: <?php echo $total_obat; ?>,
      total_kategori: <?php echo $total_kategori; ?>,
      total_jenis: <?php echo $total_jenis; ?>,
      total_suplier: <?php echo $total_suplier; ?>,
      total_pengguna: <?php echo $total_pengguna; ?>
    };

    // Chart.js configuration with modern styling
    const chartColors = {
      primary: '#667eea',
      secondary: '#764ba2',
      success: '#43e97b',
      warning: '#f093fb',
      danger: '#4facfe',
      info: '#38f9d7'
    };

    // Stock Overview Doughnut Chart
    const stockCtx = document.getElementById('stockOverviewChart').getContext('2d');
    const stokAman = Math.max(0, dashboardData.total_stok - dashboardData.stok_menipis);
    new Chart(stockCtx, {
      type: 'doughnut',
      data: {
        labels: ['Stok Menipis', 'Stok Aman'],
        datasets: [{
          data: [
            dashboardData.stok_menipis,
            stokAman
          ],
          backgroundColor: [
            chartColors.warning,
            chartColors.success
          ],
          borderWidth: 0,
          cutout: '60%'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              padding: 20,
              usePointStyle: true
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + context.parsed.toLocaleString() + ' unit';
              }
            }
          }
        }
      }
    });

    // System Overview Bar Chart - Based on Real Data
    const salesCtx = document.getElementById('salesTrendChart').getContext('2d');
    new Chart(salesCtx, {
      type: 'bar',
      data: {
        labels: ['Total Stok', 'Stok Menipis', 'Total Obat', 'Kategori', 'Supplier', 'Pengguna'],
        datasets: [{
          label: 'Jumlah',
          data: [
            dashboardData.total_stok,
            dashboardData.stok_menipis,
            dashboardData.total_obat,
            dashboardData.total_kategori,
            dashboardData.total_suplier,
            dashboardData.total_pengguna
          ],
          backgroundColor: [
            chartColors.primary,
            chartColors.warning,
            chartColors.success,
            chartColors.info,
            chartColors.danger,
            chartColors.secondary
          ],
          borderRadius: 8,
          borderSkipped: false
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                const label = context.label;
                const value = context.parsed.y;
                if (label === 'Total Stok' || label === 'Stok Menipis' || label === 'Total Obat') {
                  return label + ': ' + value.toLocaleString() + ' unit';
                }
                return label + ': ' + value.toLocaleString();
              }
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return value.toLocaleString();
              }
            }
          }
        }
      }
    });

    // Data Comparison Polar Chart - Based on Real Data
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
      type: 'polarArea',
      data: {
        labels: ['Total Obat', 'Kategori', 'Jenis Obat', 'Supplier', 'Pengguna'],
        datasets: [{
          label: 'Jumlah',
          data: [
            dashboardData.total_obat,
            dashboardData.total_kategori,
            dashboardData.total_jenis,
            dashboardData.total_suplier,
            dashboardData.total_pengguna
          ],
          backgroundColor: [
            chartColors.primary + '80',
            chartColors.success + '80',
            chartColors.warning + '80',
            chartColors.danger + '80',
            chartColors.info + '80'
          ],
          borderColor: [
            chartColors.primary,
            chartColors.success,
            chartColors.warning,
            chartColors.danger,
            chartColors.info
          ],
          borderWidth: 2
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
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + context.parsed.r.toLocaleString();
              }
            }
          }
        },
        scales: {
          r: {
            beginAtZero: true,
            ticks: {
              display: false
            }
          }
        }
      }
    });

    // Stock Status Doughnut Chart - Based on Real Data
    const statusCtx = document.getElementById('systemStatusChart').getContext('2d');
    const totalStokValue = dashboardData.total_stok;
    const stokMenupisValue = dashboardData.stok_menipis;
    const stokAmanValue = totalStokValue - stokMenupisValue;
    
    new Chart(statusCtx, {
      type: 'doughnut',
      data: {
        labels: ['Stok Aman', 'Stok Menipis'],
        datasets: [{
          data: [stokAmanValue, stokMenupisValue],
          backgroundColor: [
            chartColors.success,
            chartColors.warning
          ],
          borderWidth: 0,
          cutout: '70%'
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
              usePointStyle: true,
              font: {
                size: 11
              }
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                const percentage = ((context.parsed / total) * 100).toFixed(1);
                return context.label + ': ' + context.parsed.toLocaleString() + ' (' + percentage + '%)';
              }
            }
          }
        }
      }
    });

    // Add real-time updates simulation
    setInterval(function() {
      // Simulate data updates (you can replace this with actual AJAX calls)
      const elements = document.querySelectorAll('.pulse-animation');
      elements.forEach(el => {
        el.style.opacity = '0.5';
        setTimeout(() => {
          el.style.opacity = '0.8';
        }, 500);
      });
    }, 5000);
  </script>
</body>
</html>