<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url('assets/'); ?>"
  data-template="vertical-menu-template"
  data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title><?= $title; ?></title>
  <meta name="description" content="" />

  <!-- Script untuk baca tema dari localStorage -->
  <script>
    (function () {
      const theme = localStorage.getItem('templateCustomizer-vertical-menu-template-starter--Style') || 'light';
      document.documentElement.classList.remove('light-style', 'dark-style');
      document.documentElement.classList.add(theme + '-style');
      document.documentElement.setAttribute('data-style', theme);
    })();
  </script>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico'); ?>" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/tabler-icons.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/fontawesome.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/flag-icons.css'); ?>" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/core.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/theme-default.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/demo.css'); ?>" />

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/node-waves/node-waves.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/@form-validation/form-validation.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/page-auth.css'); ?>" />

  <!-- Helpers & Config -->
  <script src="<?= base_url('assets/vendor/js/helpers.js'); ?>"></script>
  <script src="<?= base_url('assets/js/config.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/js/template-customizer.js'); ?>"></script>
  <style>
  [data-style="dark"] body {
    color: #e0e0e0;
  }

  [data-style="dark"] .text-body {
    color: #cfd3dc !important;
  }

  [data-style="dark"] .text-heading {
    color: #ffffff !important;
  }

  [data-style="dark"] ::placeholder {
    color: #999 !important;
    opacity: 0.8;
  }

  /* Default untuk light mode */
  label.form-label {
    color: #5f6e7a; /* Warna abu default */
  }

  /* Untuk dark mode */
  [data-style="dark"] label.form-label {
    color: #e0e0e0 !important; /* Putih terang untuk label */
  }

  /* Untuk placeholder input di dark mode */
  [data-style="dark"] input::placeholder {
    color: #bbb !important;
    opacity: 0.8;
  }

  /* Untuk input border di dark mode */
  [data-style="dark"] .form-control {
    background-color: #2f2f2f;
    color: #fff;
    border-color: #555;
  }

  /* Untuk input focus state di dark mode */
  [data-style="dark"] .form-control:focus {
    background-color: #2f2f2f;
    color: #fff;
    border-color: #777;
    box-shadow: none;
  }
/* Light mode default */
  .form-control {
    color: #000;
    background-color: #fff;
    border-color: #d9dee3;
  }

  /* Dark mode adjustments */
  [data-style="dark"] .form-control {
    color: #ffffff !important; /* Warna teks input */
    background-color: #2f2f2f !important; /* Background input */
    border-color: #444 !important; /* Border lebih gelap */
  }

  [data-style="dark"] .form-control::placeholder {
    color: #aaa !important; /* Placeholder agar tetap terlihat */
    opacity: 1;
  }

  /* Optional: Tambahan untuk label */
  [data-style="dark"] label.form-label {
    color: #e0e0e0 !important;
  }

</style>

</head>

<body>
  <div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="<?= base_url(); ?>" class="app-brand auth-cover-brand">
      <span class="app-brand-logo demo">
        <img src="<?= base_url('assets/img/favicon/favicon.ico'); ?>" width="32" alt="Logo">
      </span>
      <span class="app-brand-text demo text-heading fw-bold">Klinik Pertiwi</span>
    </a>

    <div class="authentication-inner row m-0">
      <!-- Left Side Illustration -->
              <div class="d-none d-lg-flex col-lg-8 p-0">
          <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img
              src="img/illustrations/auth-forgot-password-illustration-light.png"
              alt="auth-forgot-password-cover"
              class="my-5 auth-illustration d-lg-block d-none"
              data-app-light-img="illustrations/auth-forgot-password-illustration-light.png"
              data-app-dark-img="illustrations/auth-forgot-password-illustration-dark.png" />
            <img
              src="img/illustrations/bg-shape-image-light.png"
              alt="auth-forgot-password-cover"
              class="platform-bg"
              data-app-light-img="illustrations/bg-shape-image-light.png"
              data-app-dark-img="illustrations/bg-shape-image-dark.png" />
          </div>
        </div>

      <!-- Login Form -->
      <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto">
          <h4 class="mb-2 text-center text-heading">Selamat Datang!</h4>
           <p class="mb-6 text-center text-body">Silakan login ke akun Anda.</p>


          <!-- Flash Message -->
          <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $error; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>

          <!-- Form Login -->
          <form action="<?= site_url('auth/login'); ?>" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" autofocus />
            </div>

            <div class="mb-3 form-password-toggle">
              <label for="password" class="form-label">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password" />
              </div>
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-primary d-grid w-100">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/popper/popper.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/js/bootstrap.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/node-waves/node-waves.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/hammer/hammer.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/i18n/i18n.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/js/menu.js'); ?>"></script>

  <script src="<?= base_url('assets/vendor/libs/@form-validation/popular.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/@form-validation/bootstrap5.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/@form-validation/auto-focus.js'); ?>"></script>

  <script src="<?= base_url('assets/js/main.js'); ?>"></script>
  <script src="<?= base_url('assets/js/pages-auth.js'); ?>"></script>
</body>
</html>
