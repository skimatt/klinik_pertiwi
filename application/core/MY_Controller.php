<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('auth');
        }
    }
}

class Admin_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        // Cek apakah pengguna adalah admin
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('error', 'Akses ditolak! Hanya admin yang dapat mengakses halaman ini.');
            redirect('auth');
        }
    }
}

class Kasir_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        // Cek apakah pengguna adalah kasir
        if ($this->session->userdata('role') != 'kasir') {
            $this->session->set_flashdata('error', 'Akses ditolak! Hanya kasir yang dapat mengakses halaman ini.');
            redirect('auth');
        }
    }
}
?>