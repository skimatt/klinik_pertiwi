<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'kasir') {
            redirect('auth/login');
        }
    }

    // Dashboard
public function index() {
    $data['title'] = 'Dashboard Kasir';

    // Data penting terkait stok & penjualan
    $data['stok_menipis']       = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis']       = $this->Admin_model->get_obat_menipis_list(); 
    $data['penjualan_hari_ini'] = $this->Admin_model->get_penjualan_hari_ini_kasir($this->session->userdata('id_user'));

    // Statistik khusus kasir
    $data['total_penjualan_saya'] = $this->Admin_model->count_penjualan_by_user($this->session->userdata('id_user'));
    $data['total_transaksi_hari_ini'] = $this->Admin_model->count_transaksi_hari_ini_by_user($this->session->userdata('id_user'));
    $data['total_transaksi_bulan_ini'] = $this->Admin_model->count_transaksi_bulan_ini_by_user($this->session->userdata('id_user'));
    $data['jumlah_obat'] = $this->Admin_model->count_all_obat();

    // Log aktivitas user ini saja (kasir)
    $data['log_aktivitas'] = $this->Admin_model->get_log_aktivitas_kasir($this->session->userdata('id_user'), 5);

    $this->load->view('kasir/dashboard', $data);
}


    // Transaksi Penjualan - Buat Transaksi
    public function buat_transaksi() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Buat Transaksi';
        $data['obat'] = $this->Admin_model->get_all_obat();

        if ($this->input->post()) {
            $this->form_validation->set_rules('items', 'Item Transaksi', 'required');
            if ($this->form_validation->run() === TRUE) {
                $items = json_decode($this->input->post('items'), true);
                $total_harga = 0;
                $transaksi_items = [];

                // Validasi stok
                foreach ($items as $item) {
                    $obat = $this->Admin_model->get_obat_by_id($item['id_obat']);
                    if ($obat['stok'] < $item['jumlah']) {
                        $this->session->set_flashdata('error', 'Stok ' . $obat['nama_obat'] . ' tidak cukup.');
                        redirect('kasir/buat_transaksi');
                    }
                    $subtotal = $item['jumlah'] * $obat['harga'];
                    $total_harga += $subtotal;
                    $transaksi_items[] = [
                        'id_obat' => $item['id_obat'],
                        'jumlah' => $item['jumlah'],
                        'harga' => $obat['harga'],
                        'subtotal' => $subtotal
                    ];
                }

                // Simpan transaksi
                $transaksi = [
                    'tanggal' => date('Y-m-d H:i:s'),
                    'total_harga' => $total_harga,
                    'id_user' => $this->session->userdata('id_user'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $id_transaksi = $this->Admin_model->insert_transaksi($transaksi, $transaksi_items);

                if ($id_transaksi) {
                    $this->session->set_flashdata('message', 'Transaksi berhasil disimpan.');
                    redirect('kasir/cetak_nota/' . $id_transaksi);
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan transaksi.');
                }
            }
        }
        $this->load->view('kasir/transaksi/buat_transaksi', $data);
    }

    // Cetak Nota Transaksi
    public function cetak_nota($id_transaksi) {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['transaksi'] = $this->Admin_model->get_transaksi_by_id($id_transaksi, $this->session->userdata('id_user'));
        $data['detail'] = $this->Admin_model->get_detail_transaksi($id_transaksi);
        if (!$data['transaksi']) {
            show_404();
        }
        $html = $this->load->view('kasir/transaksi/cetak_nota', $data, TRUE);
        $this->pdf->create_pdf($html, 'Nota_Transaksi_' . $id_transaksi);
    }

  public function penjualan() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Penjualan Baru';
        $data['obat'] = $this->Admin_model->get_all_obat();

        if ($this->input->post()) {
            $this->form_validation->set_rules('id_obat[]', 'Obat', 'required');
            $this->form_validation->set_rules('jumlah[]', 'Jumlah', 'required|numeric|greater_than[0]');

            if ($this->form_validation->run() === TRUE) {
                $id_obat = $this->input->post('id_obat');
                $jumlah = $this->input->post('jumlah');
                $total_harga = 0;
                $details = [];

                // Hitung total dan validasi stok serta tanggal kadaluarsa
                foreach ($id_obat as $key => $obat_id) {
                    $obat = $this->Admin_model->get_obat_by_id($obat_id);
                    log_message('debug', 'Obat data for ID ' . $obat_id . ': ' . print_r($obat, TRUE));

                    if ($obat && isset($obat['harga']) && $obat['stok'] >= $jumlah[$key]) {
                        // Cek tanggal kadaluarsa
                        if (!is_null($obat['tanggal_kadaluarsa']) && strtotime($obat['tanggal_kadaluarsa']) < time()) {
                            $this->session->set_flashdata('error', 'Obat ' . $obat['nama_obat'] . ' sudah kadaluarsa pada ' . $obat['tanggal_kadaluarsa'] . '.');
                            log_message('error', 'Obat ' . $obat['nama_obat'] . ' kadaluarsa: ' . $obat['tanggal_kadaluarsa']);
                            redirect('kasir/penjualan');
                        }

                        $subtotal = $obat['harga'] * $jumlah[$key];
                        $total_harga += $subtotal;
                        $details[] = [
                            'id_obat' => $obat_id,
                            'jumlah' => $jumlah[$key],
                            'subtotal' => $subtotal
                        ];
                    } else {
                        $error_msg = 'Obat tidak ditemukan, harga tidak ada, atau stok ' . ($obat ? $obat['nama_obat'] : 'tidak diketahui') . ' tidak cukup.';
                        $this->session->set_flashdata('error', $error_msg);
                        log_message('error', $error_msg);
                        redirect('kasir/penjualan');
                    }
                }

                // Simpan penjualan
                $penjualan = [
                    'id_user' => $this->session->userdata('id_user'),
                    'tanggal' => date('Y-m-d H:i:s'),
                    'total_harga' => $total_harga,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                log_message('debug', 'Penjualan data: ' . print_r($penjualan, TRUE));
                log_message('debug', 'Details data: ' . print_r($details, TRUE));

                if ($id_penjualan = $this->Admin_model->insert_penjualan($penjualan, $details)) {
                    $this->session->set_flashdata('message', 'Penjualan berhasil disimpan. Nomor transaksi: ' . $id_penjualan);
                    redirect('kasir/penjualan');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan penjualan.');
                    log_message('error', 'Gagal menyimpan penjualan.');
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        $this->load->view('kasir/penjualan', $data);
    }

    // Data Penjualan
    public function data_penjualan() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Data Penjualan';
        $filters = [
            'id_user' => $this->session->userdata('id_user'),
            'dari' => $this->input->get('dari') ?: '',
            'sampai' => $this->input->get('sampai') ?: ''
        ];
        $data['penjualan'] = $this->Admin_model->get_transaksi_kasir($filters);
        $this->load->view('kasir/transaksi/data_penjualan', $data);
    }

    // Lihat Obat

    public function lihat_obat() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Daftar Obat';
        
        // Ambil keyword pencarian dari GET
        $keyword = $this->input->get('keyword', TRUE);
        $data['obat'] = $this->Admin_model->get_all_obat($keyword);
        $data['keyword'] = $keyword;

        log_message('debug', 'Data obat: ' . print_r($data['obat'], TRUE));
        $this->load->view('kasir/obat/lihat_obat', $data);
    }


    // Laporan Saya
public function laporan_saya() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Laporan Penjualan Saya';
        $data['dari'] = $this->input->post('dari') ? $this->input->post('dari') : date('Y-m-d', strtotime('-1 month'));
        $data['sampai'] = $this->input->post('sampai') ? $this->input->post('sampai') : date('Y-m-d');

        $filters = [
            'dari' => $data['dari'],
            'sampai' => $data['sampai'],
            'id_user' => $this->session->userdata('id_user')
        ];
        $data['penjualan'] = $this->Admin_model->get_laporan_penjualan_kasir($filters);
        log_message('debug', 'Laporan filters: ' . print_r($filters, TRUE));

        $this->load->view('kasir/laporan/laporan_saya', $data);
    }

    public function cetak_laporan_saya() {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');

        if (!$dari || !$sampai) {
            show_404();
        }

        $filters = [
            'dari' => $dari,
            'sampai' => $sampai,
            'id_user' => $this->session->userdata('id_user')
        ];
        $data['penjualan'] = $this->Admin_model->get_laporan_penjualan_kasir($filters);
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['nama_kasir'] = $this->session->userdata('nama');

        log_message('debug', 'Cetak laporan data: ' . print_r($data, TRUE));

        $html = $this->load->view('kasir/laporan/cetak_laporan_saya', $data, TRUE);
        $this->pdf->create_pdf($html, 'Laporan_Penjualan_Saya_' . date('Ymd'));
    }

    public function detail_penjualan($id_penjualan) {
        $data['title'] = 'Detail Penjualan';
        $data['penjualan'] = $this->Admin_model->get_penjualan_by_id($id_penjualan);
        $data['details'] = $this->Admin_model->get_penjualan_details($id_penjualan);

        if (!$data['penjualan'] || $data['penjualan']['id_user'] != $this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Penjualan tidak ditemukan atau tidak diizinkan.');
            log_message('error', 'Penjualan ID ' . $id_penjualan . ' tidak ditemukan atau tidak diizinkan.');
            redirect('kasir/laporan_saya');
        }

        $this->load->view('kasir/detail_penjualan', $data);
    }

    

    // Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>