<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library(['form_validation', 'pagination', 'session']);
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses hanya untuk admin.');
            redirect('auth/login');
        }
    }

    // Dashboard
public function index() {
    $data['title'] = 'Dashboard Admin';
    
    // Data utama dashboard
    $data['total_stok'] = $this->Admin_model->get_total_stok();
    $data['penjualan_hari_ini'] = $this->Admin_model->get_penjualan_hari_ini();
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list();

    //  Penambahan data tambahan:
    $data['total_obat'] = $this->Admin_model->count_all_obat();                    // Total jumlah obat
    $data['total_kategori'] = $this->Admin_model->count_all_kategori();            // Total kategori obat
    $data['total_jenis'] = $this->Admin_model->count_all_jenis();                  // Total jenis obat
    $data['total_suplier'] = $this->Admin_model->count_all_suplier();              // Total suplier
    $data['total_pengguna'] = $this->Admin_model->count_all_pengguna();            // Total pengguna (admin/kasir)
    $data['total_penjualan'] = $this->Admin_model->count_all_penjualan();          // Total transaksi penjualan
    $data['log_aktivitas'] = $this->Admin_model->get_log_aktivitas_terbaru(); // Limit misal 5


    log_message('debug', 'Dashboard data: ' . print_r($data, TRUE));
    $this->load->view('admin/dashboard', $data);
}


    // Manajemen Obat
    public function obat() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Manajemen Obat';
        $data['obat'] = $this->Admin_model->get_all_obat_admin();
        log_message('debug', 'Obat data: ' . print_r($data['obat'], TRUE));
        $this->load->view('admin/obat/index', $data);
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    }

    public function tambah_obat() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Tambah Obat';
        $data['kategori'] = $this->Admin_model->get_all_kategori();
        $data['jenis'] = $this->Admin_model->get_all_jenis();
        $data['suplier'] = $this->Admin_model->get_all_suplier();

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim');
            $this->form_validation->set_rules('id_kategori', 'Kategori', 'required|numeric');
            $this->form_validation->set_rules('id_jenis', 'Jenis', 'required|numeric');
            $this->form_validation->set_rules('id_suplier', 'Suplier', 'required|numeric');
            $this->form_validation->set_rules('stok', 'Stok', 'required|numeric|greater_than_equal_to[0]');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('tanggal_kadaluarsa', 'Tanggal Kadaluarsa', 'required');

            if ($this->form_validation->run() === TRUE) {
                $obat = [
                    'nama_obat' => $this->input->post('nama_obat'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'id_jenis' => $this->input->post('id_jenis'),
                    'id_suplier' => $this->input->post('id_suplier'),
                    'stok' => $this->input->post('stok'),
                    'harga' => $this->input->post('harga'),
                    'tanggal_kadaluarsa' => $this->input->post('tanggal_kadaluarsa')
                ];
                if ($this->Admin_model->insert_obat($obat)) {
                    $this->session->set_flashdata('message', 'Obat berhasil ditambahkan.');
                    redirect('admin/obat');
                } else {
                    $data['error'] = 'Gagal menambahkan obat.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('admin/obat/tambah', $data);
    }

    public function edit_obat($id) {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Edit Obat';
        $data['obat'] = $this->Admin_model->get_obat_by_id_admin($id);
        $data['kategori'] = $this->Admin_model->get_all_kategori();
        $data['jenis'] = $this->Admin_model->get_all_jenis();
        $data['suplier'] = $this->Admin_model->get_all_suplier();

        if (!$data['obat']) {
            $this->session->set_flashdata('error', 'Obat tidak ditemukan.');
            redirect('admin/obat');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim');
            $this->form_validation->set_rules('id_kategori', 'Kategori', 'required|numeric');
            $this->form_validation->set_rules('id_jenis', 'Jenis', 'required|numeric');
            $this->form_validation->set_rules('id_suplier', 'Suplier', 'required|numeric');
            $this->form_validation->set_rules('stok', 'Stok', 'required|numeric|greater_than_equal_to[0]');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('tanggal_kadaluarsa', 'Tanggal Kadaluarsa', 'required');

            if ($this->form_validation->run() === TRUE) {
                $obat = [
                    'nama_obat' => $this->input->post('nama_obat'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'id_jenis' => $this->input->post('id_jenis'),
                    'id_suplier' => $this->input->post('id_suplier'),
                    'stok' => $this->input->post('stok'),
                    'harga' => $this->input->post('harga'),
                    'tanggal_kadaluarsa' => $this->input->post('tanggal_kadaluarsa')
                ];
                if ($this->Admin_model->update_obat($id, $obat)) {
                    $this->session->set_flashdata('message', 'Obat berhasil diperbarui.');
                    redirect('admin/obat');
                } else {
                    $data['error'] = 'Gagal memperbarui obat.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('admin/obat/edit', $data);
    }

    public function hapus_obat($id) {
        if ($this->Admin_model->delete_obat($id)) {
            $this->session->set_flashdata('message', 'Obat berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus obat.');
        }
        redirect('admin/obat');
    }

    // Manajemen Kategori
    public function kategori() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Manajemen Kategori';
        $data['kategori'] = $this->Admin_model->get_all_kategori();
        $this->load->view('admin/kategori/index', $data);
    }

    public function tambah_kategori() {
        $data['title'] = 'Tambah Kategori';

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

            if ($this->form_validation->run() === TRUE) {
                $kategori = [
                    'nama_kategori' => $this->input->post('nama_kategori')
                ];
                if ($this->Admin_model->insert_kategori($kategori)) {
                    $this->session->set_flashdata('message', 'Kategori berhasil ditambahkan.');
                    redirect('admin/kategori');
                } else {
                    $data['error'] = 'Gagal menambahkan kategori.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('admin/kategori/tambah', $data);
    }

    public function edit_kategori($id) {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->Admin_model->get_kategori_by_id($id);

        if (!$data['kategori']) {
            $this->session->set_flashdata('error', 'Kategori tidak ditemukan.');
            redirect('admin/kategori');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

            if ($this->form_validation->run() === TRUE) {
                $kategori = [
                    'nama_kategori' => $this->input->post('nama_kategori')
                ];
                if ($this->Admin_model->update_kategori($id, $kategori)) {
                    $this->session->set_flashdata('message', 'Kategori berhasil diperbarui.');
                    redirect('admin/kategori');
                } else {
                    $data['error'] = 'Gagal memperbarui kategori.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('admin/kategori/edit', $data);
    }

    public function hapus_kategori($id) {
        if ($this->Admin_model->delete_kategori($id)) {
            $this->session->set_flashdata('message', 'Kategori berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kategori.');
        }
        redirect('admin/kategori');
    }

    // Manajemen Jenis
    public function jenis() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Manajemen Jenis';
        $data['jenis'] = $this->Admin_model->get_all_jenis();
        $this->load->view('admin/jenis/index', $data);
    }

    public function tambah_jenis() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Tambah Jenis';

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim');

            if ($this->form_validation->run() === TRUE) {
                $jenis = [
                    'nama_jenis' => $this->input->post('nama_jenis')
                ];
                if ($this->Admin_model->insert_jenis($jenis)) {
                    $this->session->set_flashdata('message', 'Jenis berhasil ditambahkan.');
                    redirect('admin/jenis');
                } else {
                    $data['error'] = 'Gagal menambahkan jenis.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('admin/jenis/tambah', $data);
    }

    public function edit_jenis($id) {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Edit Jenis';
        $data['jenis'] = $this->Admin_model->get_jenis_by_id($id);

        if (!$data['jenis']) {
            $this->session->set_flashdata('error', 'Jenis tidak ditemukan.');
            redirect('admin/jenis');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim');

            if ($this->form_validation->run() === TRUE) {
                $jenis = [
                    'nama_jenis' => $this->input->post('nama_jenis')
                ];
                if ($this->Admin_model->update_jenis($id, $jenis)) {
                    $this->session->set_flashdata('message', 'Jenis berhasil diperbarui.');
                    redirect('admin/jenis');
                } else {
                    $data['error'] = 'Gagal memperbarui jenis.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('admin/jenis/edit', $data);
    }

    public function hapus_jenis($id) {
        if ($this->Admin_model->delete_jenis($id)) {
            $this->session->set_flashdata('message', 'Jenis berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus jenis.');
        }
        redirect('admin/jenis');
    }

    // Manajemen Suplier
    public function suplier() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Manajemen Suplier';
        $data['suplier'] = $this->Admin_model->get_all_suplier();
        $this->load->view('admin/suplier/index', $data);
    }

    public function tambah_suplier() {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Tambah Suplier';

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_suplier', 'Nama Suplier', 'required|trim');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
            $this->form_validation->set_rules('telepon', 'Telepon', 'trim|numeric');

            if ($this->form_validation->run() === TRUE) {
                $suplier = [
                    'nama_suplier' => $this->input->post('nama_suplier'),
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon')
                ];
                if ($this->Admin_model->insert_suplier($suplier)) {
                    $this->session->set_flashdata('message', 'Suplier berhasil ditambahkan.');
                    redirect('admin/suplier');
                } else {
                    $data['error'] = 'Gagal menambahkan suplier.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('admin/suplier/tambah', $data);
    }

    public function edit_suplier($id) {
        $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
        $data['title'] = 'Edit Suplier';
        $data['suplier'] = $this->Admin_model->get_suplier_by_id($id);

        if (!$data['suplier']) {
            $this->session->set_flashdata('error', 'Suplier tidak ditemukan.');
            redirect('admin/suplier');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_suplier', 'Nama Suplier', 'required|trim');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
            $this->form_validation->set_rules('telepon', 'Telepon', 'trim|numeric');

            if ($this->form_validation->run() === TRUE) {
                $suplier = [
                    'nama_suplier' => $this->input->post('nama_suplier'),
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon')
                ];
                if ($this->Admin_model->update_suplier($id, $suplier)) {
                    $this->session->set_flashdata('message', 'Suplier berhasil diperbarui.');
                    redirect('admin/suplier');
                } else {
                    $data['error'] = 'Gagal memperbarui suplier.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('admin/suplier/edit', $data);
    }

    public function hapus_suplier($id) {
        if ($this->Admin_model->delete_suplier($id)) {
            $this->session->set_flashdata('message', 'Suplier berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus suplier.');
        }
        redirect('admin/suplier');
    }

    // Manajemen Pengguna
   public function pengguna($param = null) {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 

    // Jika halaman tambah pengguna
    if ($param === 'tambah') {
        return $this->tambah_pengguna();
    }

    $data['title'] = 'Manajemen Pengguna';

    // Ambil filter jika ada
    $role_filter = $this->input->post('role');
    $filters = [];

    if (!empty($role_filter)) {
        $filters['role'] = $role_filter;
    }

    $data['role_selected'] = $role_filter;
    $data['pengguna'] = $this->Admin_model->get_pengguna_filtered($filters); // fungsi ini harus dibuat di model

    log_message('debug', 'Pengguna data: ' . print_r($data['pengguna'], TRUE));
    $this->load->view('admin/pengguna/index', $data);
}


    public function tambah_pengguna() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    $data['title'] = 'Tambah Pengguna';

    if ($this->input->post()) {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,kasir]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[aktif,nonaktif]');

        if ($this->form_validation->run() === TRUE) {
            $user = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role'),
                'status' => $this->input->post('status'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            if ($this->Admin_model->insert_user($user)) {
                $this->session->set_flashdata('message', 'Pengguna berhasil ditambahkan.');
                redirect('admin/pengguna');
            } else {
                $data['error'] = 'Gagal menambah pengguna.';
            }
        } else {
            $data['error'] = validation_errors();
        }
    }

    $this->load->view('admin/pengguna/tambah', $data);
}


    public function edit_pengguna($id) {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    $data['title'] = 'Edit Pengguna';
    $data['pengguna'] = $this->Admin_model->get_user_by_id($id);

    if (!$data['pengguna']) {
        $this->session->set_flashdata('error', 'Pengguna tidak ditemukan.');
        redirect('admin/pengguna');
    }

    if ($this->input->post()) {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_check_username[' . $id . ']');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,kasir]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[aktif,nonaktif]');

        if ($this->form_validation->run() === TRUE) {
            $user = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role'),
                'status' => $this->input->post('status'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->input->post('password')) {
                $user['password'] = md5($this->input->post('password'));
            }

            if ($this->Admin_model->update_user($id, $user)) {
                $this->session->set_flashdata('message', 'Pengguna berhasil diperbarui.');
                redirect('admin/pengguna');
            } else {
                $data['error'] = 'Gagal memperbarui pengguna.';
            }
        } else {
            $data['error'] = validation_errors();
        }
    }

    $this->load->view('admin/pengguna/edit', $data);
}


  public function check_username($username, $id) {
    $this->db->where('username', $username);
    $this->db->where('id_user !=', $id);

    if ($this->db->get('user')->num_rows() > 0) {
        $this->form_validation->set_message('check_username', 'Username sudah digunakan.');
        return FALSE;
    }
    return TRUE;
}



public function hapus_pengguna($id) {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
    $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 

    if ($id == $this->session->userdata('id_user')) {
        $this->session->set_flashdata('error', 'Tidak dapat menghapus pengguna yang sedang login.');
        redirect('admin/pengguna');
    }

    if ($this->Admin_model->delete_user($id)) {
        $this->session->set_flashdata('message', 'Pengguna berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus pengguna.');
    }

    redirect('admin/pengguna');
}


// Log Aktivitas
public function log_aktivitas() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    $data['title'] = 'Log Aktivitas';

    $config['base_url'] = site_url('admin/log_aktivitas');
    $filters = [];
    if ($this->input->get('id_user')) {
        $filters['id_user'] = $this->input->get('id_user');
    }
    if ($this->input->get('dari')) {
        $filters['dari'] = $this->input->get('dari');
    }
    if ($this->input->get('sampai')) {
        $filters['sampai'] = $this->input->get('sampai');
    }

    $config['total_rows'] = $this->Admin_model->count_log_aktivitas($filters);
    $config['per_page'] = 20;
    $config['uri_segment'] = 3;
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['log_aktivitas'] = $this->Admin_model->get_all_log_aktivitas($filters, $config['per_page'], $page);
    $data['pengguna'] = $this->Admin_model->get_all_users();
    log_message('debug', 'Log aktivitas filters: ' . print_r($filters, TRUE));
    $this->load->view('admin/log_aktivitas/index', $data);
}

// Data Penjualan

public function penjualan() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    $data['title'] = 'Transaksi Pembelian';
    $data['obat'] = $this->Admin_model->get_all_obat();
    $this->load->view('admin/penjualan/index', $data);
}

public function simpan_transaksi() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    $items_json = $this->input->post('items');
    $total_harga = $this->input->post('total_harga');
    $id_user = $this->session->userdata('id_user'); // pastikan user login

    if (empty($items_json) || empty($total_harga) || !$id_user) {
        $this->session->set_flashdata('error', 'Data tidak lengkap atau user tidak login.');
        redirect('admin');
    }

    $items = json_decode($items_json, true);

    $data_penjualan = [
        'tanggal' => date('Y-m-d H:i:s'),
        'total_harga' => $total_harga,
        'id_user' => $id_user
    ];

    $this->db->trans_start();
    $this->db->insert('penjualan', $data_penjualan);
    $id_penjualan = $this->db->insert_id();

    foreach ($items as $item) {
        $detail = [
            'id_penjualan' => $id_penjualan,
            'id_obat' => $item['id_obat'],
            'harga' => $item['harga'],
            'jumlah' => $item['jumlah'],
            'subtotal' => $item['subtotal']
        ];
        $this->db->insert('detail_penjualan', $detail);

        // Update stok
        $this->db->set('stok', 'stok - ' . (int) $item['jumlah'], FALSE);
        $this->db->where('id_obat', $item['id_obat']);
        $this->db->update('obat');
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
        $this->session->set_flashdata('error', 'Gagal menyimpan transaksi.');
    } else {
        $this->session->set_flashdata('message', 'Transaksi berhasil disimpan.');
    }

    redirect('admin/data_penjualan');
}
public function data_penjualan() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    $data['title'] = 'Data Penjualan';

    $config['base_url'] = site_url('admin/data_penjualan');
    $filters = [];

    // Filter tanggal
    if ($this->input->get('tanggal')) {
        $filters['tanggal'] = $this->input->get('tanggal');
    }

    // Filter kasir (user)
    if ($this->input->get('id_user')) {
        $filters['id_user'] = $this->input->get('id_user');
    }

    // Hitung total rows untuk pagination
    $all_penjualan = $this->Admin_model->get_all_penjualan($filters);
    $config['total_rows'] = count($all_penjualan);
    $config['per_page'] = 20;
    $config['uri_segment'] = 3;
    $this->pagination->initialize($config);

    // Ambil data sesuai halaman
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $penjualan_paginated = $this->Admin_model->get_all_penjualan($filters, $config['per_page'], $page);

    // Hitung total dari detail_penjualan
    foreach ($penjualan_paginated as &$p) {
        $p['total_hitung'] = $this->Admin_model->get_total_by_id_penjualan($p['id_penjualan']);
    }

    $data['penjualan'] = $penjualan_paginated;
    $data['pengguna'] = $this->Admin_model->get_all_users();

    log_message('debug', 'Penjualan data filters: ' . print_r($filters, TRUE));
    $this->load->view('admin/penjualan/data_penjualan', $data);
}


public function detail_penjualan($id_penjualan) {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    $data['title'] = 'Detail Penjualan';
    $data['penjualan'] = $this->Admin_model->get_penjualan_by_id($id_penjualan);
    $data['details'] = $this->Admin_model->get_penjualan_details($id_penjualan);

    if (!$data['penjualan']) {
        $this->session->set_flashdata('error', 'Penjualan tidak ditemukan.');
        redirect('admin/data_penjualan');
    }

    // Hitung total dari detail, bukan dari field total_harga
    $total = 0;
    foreach ($data['details'] as $detail) {
        $total += $detail['subtotal'];
    }
    $data['total_harga'] = $total;

    log_message('debug', 'Detail penjualan ID: ' . $id_penjualan . ' data: ' . print_r($data, TRUE));
    $this->load->view('admin/penjualan/detail_penjualan', $data);
}


// Laporan Penjualan

public function laporan_penjualan() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    $data['title'] = 'Laporan Penjualan';

    $data['dari'] = $this->input->post('dari') ? $this->input->post('dari') : date('Y-m-d', strtotime('-1 month'));
    $data['sampai'] = $this->input->post('sampai') ? $this->input->post('sampai') : date('Y-m-d');

    if ($this->input->post()) {
        $filters = [
            'dari' => $data['dari'],
            'sampai' => $data['sampai']
        ];
        $data['penjualan'] = $this->Admin_model->get_laporan_penjualan($filters);
    } else {
        $data['penjualan'] = [];
    }

    log_message('debug', 'Laporan penjualan filters: ' . print_r(isset($filters) ? $filters : array(), TRUE));
$this->load->view('admin/laporan/penjualan', $data);

}

 public function cetak_penjualan() {
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    // Validasi parameter
    if (empty($dari) || empty($sampai)) {
        show_404();
    }

    // Ambil data
    $filters = [
        'dari' => $dari,
        'sampai' => $sampai
    ];
    $data['penjualan'] = $this->Admin_model->get_laporan_penjualan($filters);
    $data['dari'] = $dari;
    $data['sampai'] = $sampai;

    // Load library PDF dan generate
    $this->load->library('pdf');
    $html = $this->load->view('admin/laporan/cetak_penjualan', $data, true);
    $this->pdf->create_pdf($html, 'Laporan_Penjualan_' . $dari . '_sampai_' . $sampai);
}

// Laporan Stok Obat
public function laporan_stok_obat() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    try {
        $data['title'] = 'Laporan Stok Obat';

        // Ambil data referensi dropdown
        $data['kategori'] = $this->Admin_model->get_all_kategori();
        $data['jenis']    = $this->Admin_model->get_all_jenis();

        // Ambil filter dari POST atau default kosong
        $kategori = $this->input->post('kategori');
        $jenis    = $this->input->post('jenis');

        // Simpan kembali ke data untuk set selected di view
        $data['kategori_selected'] = $kategori;
        $data['jenis_selected']    = $jenis;

        $filters = [];
        if (!empty($kategori)) {
            $filters['kategori'] = $kategori;
        }
        if (!empty($jenis)) {
            $filters['jenis'] = $jenis;
        }

        // Ambil data berdasarkan filter
        $data['obat'] = $this->Admin_model->get_laporan_stok_obat($filters);

        log_message('debug', 'Laporan stok obat filters: ' . print_r($filters, TRUE));
        $this->load->view('admin/laporan/stok_obat', $data);
    } catch (Exception $e) {
        log_message('error', 'Gagal memuat laporan: ' . $e->getMessage());
        show_error('Gagal memuat laporan: ' . $e->getMessage(), 500);
    }
}

public function cetak_stok_obat() {
    try {
        $filters = [];
        $kategori = $this->input->get('kategori');
        $jenis    = $this->input->get('jenis');

        if (!empty($kategori)) {
            $filters['kategori'] = $kategori;
        }
        if (!empty($jenis)) {
            $filters['jenis'] = $jenis;
        }

        $data['obat'] = $this->Admin_model->get_laporan_stok_obat($filters);
        log_message('debug', 'Cetak laporan stok obat filters: ' . print_r($filters, TRUE));

        if (empty($data['obat'])) {
            show_error('Tidak ada data untuk dicetak.', 404);
        }

        $this->load->library('dompdf_gen');
        $html = $this->load->view('admin/laporan/cetak_stok_obat', $data, true);

        $this->dompdf_gen->load_html($html);
        $this->dompdf_gen->set_paper('A4', 'portrait');
        $this->dompdf_gen->render();
        $this->dompdf_gen->stream('Laporan_Stok_Obat.pdf', array('Attachment' => 0));
    } catch (Exception $e) {
        log_message('error', 'Gagal cetak PDF: ' . $e->getMessage());
        show_error('Gagal menghasilkan PDF: ' . $e->getMessage(), 500);
    }
}


// Laporan Stok Menipis
public function laporan_stok_menipis() {
    $data['stok_menipis'] = $this->Admin_model->get_stok_menipis();
        $data['obat_menipis'] = $this->Admin_model->get_obat_menipis_list(); 
    try {
        $data['title'] = 'Laporan Stok Menipis';

        // Data dropdown kategori & jenis
        $data['kategori'] = $this->Admin_model->get_all_kategori();
        $data['jenis']    = $this->Admin_model->get_all_jenis();

        // Ambil filter dari POST
        $kategori = $this->input->post('kategori');
        $jenis    = $this->input->post('jenis');

        // Simpan untuk set selected di view
        $data['kategori_selected'] = $kategori;
        $data['jenis_selected']    = $jenis;

        $filters = [];
        if (!empty($kategori)) {
            $filters['kategori'] = $kategori;
        }
        if (!empty($jenis)) {
            $filters['jenis'] = $jenis;
        }

        // Ambil data berdasarkan filter
        $data['obat'] = $this->Admin_model->get_laporan_stok_menipis($filters);

        log_message('debug', 'Laporan stok menipis filters: ' . print_r($filters, TRUE));
        $this->load->view('admin/laporan/stok_menipis', $data);
    } catch (Exception $e) {
        log_message('error', 'Gagal memuat laporan stok menipis: ' . $e->getMessage());
        show_error('Gagal memuat laporan: ' . $e->getMessage(), 500);
    }
}


public function cetak_stok_menipis() {
    try {
        $filters = [];
        $kategori = $this->input->get('kategori');
        $jenis    = $this->input->get('jenis');

        if (!empty($kategori)) {
            $filters['kategori'] = $kategori;
        }
        if (!empty($jenis)) {
            $filters['jenis'] = $jenis;
        }

        $data['obat'] = $this->Admin_model->get_laporan_stok_menipis($filters);
        log_message('debug', 'Cetak laporan stok menipis filters: ' . print_r($filters, TRUE));

        if (empty($data['obat'])) {
            show_error('Tidak ada data stok menipis untuk dicetak.', 404);
        }

        $this->load->library('dompdf_gen');
        $html = $this->load->view('admin/laporan/cetak_stok_menipis', $data, true);

        $this->dompdf_gen->load_html($html);
        $this->dompdf_gen->set_paper('A4', 'portrait');
        $this->dompdf_gen->render();
        $this->dompdf_gen->stream('Laporan_Stok_Menipis.pdf', array('Attachment' => 0));
    } catch (Exception $e) {
        log_message('error', 'Gagal cetak PDF stok menipis: ' . $e->getMessage());
        show_error('Gagal menghasilkan PDF: ' . $e->getMessage(), 500);
    }
}

}