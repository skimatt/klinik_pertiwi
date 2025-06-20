<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    
    private function log_aktivitas($aktivitas) {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'aktivitas' => $aktivitas,
            'waktu' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('log_aktivitas', $data);
        log_message('debug', 'Log aktivitas: ' . $aktivitas);
    }

    
    
    public function get_total_stok() {
        $this->db->select('SUM(stok) as total');
        $query = $this->db->get('obat');
        return $query->row()->total ?: 0;
    }

    public function get_penjualan_hari_ini() {
        $this->db->select('SUM(total_harga) as total');
        $this->db->where('DATE(tanggal)', date('Y-m-d'));
        $query = $this->db->get('penjualan');
        return $query->row()->total ?: 0;
    }

    public function get_stok_menipis() {
        $this->db->select('COUNT(*) as total');
        $this->db->where('stok <=', 10);
        $query = $this->db->get('obat');
        return $query->row()->total ?: 0;
    }

    
public function get_all_obat($keyword = '') {
    $this->db->select('id_obat, nama_obat, harga, stok');
    $this->db->from('obat');
    if (!empty($keyword)) {
        $this->db->like('nama_obat', $keyword);
    }
    $this->db->order_by('nama_obat', 'ASC');
    $query = $this->db->get();
    log_message('debug', 'Query get_all_obat: ' . $this->db->last_query());
    return $query->result_array();
}
    public function get_all_obat_admin() {
        $this->db->select('obat.*, kategori.nama_kategori, jenis.nama_jenis, suplier.nama_suplier');
        $this->db->from('obat');
        $this->db->join('kategori', 'obat.id_kategori = kategori.id_kategori');
        $this->db->join('jenis', 'obat.id_jenis = jenis.id_jenis');
        $this->db->join('suplier', 'obat.id_suplier = suplier.id_suplier');
        $result = $this->db->get()->result_array();
        log_message('debug', 'All obat admin data: ' . print_r($result, TRUE));
        return $result;
    }

    public function get_obat_by_id($id) {
        $this->db->select('obat.id_obat, obat.nama_obat, obat.stok, obat.harga, obat.tanggal_kadaluarsa');
        $this->db->from('obat');
        $this->db->where('obat.id_obat', $id);
        $result = $this->db->get()->row_array();
        log_message('debug', 'Obat data for ID ' . $id . ': ' . print_r($result, TRUE));
        return $result;
    }

    public function get_obat_by_id_admin($id) {
        $this->db->select('obat.*, kategori.nama_kategori, jenis.nama_jenis, suplier.nama_suplier');
        $this->db->from('obat');
        $this->db->join('kategori', 'obat.id_kategori = kategori.id_kategori');
        $this->db->join('jenis', 'obat.id_jenis = jenis.id_jenis');
        $this->db->join('suplier', 'obat.id_suplier = suplier.id_suplier');
        $this->db->where('obat.id_obat', $id);
        $result = $this->db->get()->row_array();
        log_message('debug', 'Obat admin data for ID ' . $id . ': ' . print_r($result, TRUE));
        return $result;
    }

    public function insert_obat($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('obat', $data);
        if ($result) {
            $this->log_aktivitas('Menambahkan obat: ' . $data['nama_obat']);
        }
        return $result;
    }

    public function update_obat($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id_obat', $id);
        $result = $this->db->update('obat', $data);
        if ($result) {
            $this->log_aktivitas('Mengedit obat ID: ' . $id);
        }
        return $result;
    }

    public function delete_obat($id) {
        $obat = $this->get_obat_by_id_admin($id);
        $this->db->where('id_obat', $id);
        $result = $this->db->delete('obat');
        if ($result) {
            $this->log_aktivitas('Menghapus obat: ' . $obat['nama_obat']);
        }
        return $result;
    }

    
    public function get_all_kategori() {
        return $this->db->get('kategori')->result_array();
    }

    public function get_kategori_by_id($id) {
        $this->db->where('id_kategori', $id);
        return $this->db->get('kategori')->row_array();
    }

    public function insert_kategori($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('kategori', $data);
        if ($result) {
            $this->log_aktivitas('Menambahkan kategori: ' . $data['nama_kategori']);
        }
        return $result;
    }

    public function update_kategori($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id_kategori', $id);
        $result = $this->db->update('kategori', $data);
        if ($result) {
            $this->log_aktivitas('Mengedit kategori ID: ' . $id);
        }
        return $result;
    }

    public function delete_kategori($id) {
        $kategori = $this->get_kategori_by_id($id);
        $this->db->where('id_kategori', $id);
        $result = $this->db->delete('kategori');
        if ($result) {
            $this->log_aktivitas('Menghapus kategori: ' . $kategori['nama_kategori']);
        }
        return $result;
    }

    
    public function get_all_jenis() {
        return $this->db->get('jenis')->result_array();
    }

    public function get_jenis_by_id($id) {
        $this->db->where('id_jenis', $id);
        return $this->db->get('jenis')->row_array();
    }

    public function insert_jenis($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('jenis', $data);
        if ($result) {
            $this->log_aktivitas('Menambahkan jenis: ' . $data['nama_jenis']);
        }
        return $result;
    }

    public function update_jenis($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id_jenis', $id);
        $result = $this->db->update('jenis', $data);
        if ($result) {
            $this->log_aktivitas('Mengedit jenis ID: ' . $id);
        }
        return $result;
    }

    public function delete_jenis($id) {
        $jenis = $this->get_jenis_by_id($id);
        $this->db->where('id_jenis', $id);
        $result = $this->db->delete('jenis');
        if ($result) {
            $this->log_aktivitas('Menghapus jenis: ' . $jenis['nama_jenis']);
        }
        return $result;
    }

    
    public function get_all_suplier() {
        return $this->db->get('suplier')->result_array();
    }

    public function get_suplier_by_id($id) {
        $this->db->where('id_suplier', $id);
        return $this->db->get('suplier')->row_array();
    }

    public function insert_suplier($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('suplier', $data);
        if ($result) {
            $this->log_aktivitas('Menambahkan suplier: ' . $data['nama_suplier']);
        }
        return $result;
    }

    public function update_suplier($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id_suplier', $id);
        $result = $this->db->update('suplier', $data);
        if ($result) {
            $this->log_aktivitas('Mengedit suplier ID: ' . $id);
        }
        return $result;
    }

    public function delete_suplier($id) {
        $suplier = $this->get_suplier_by_id($id);
        $this->db->where('id_suplier', $id);
        $result = $this->db->delete('suplier');
        if ($result) {
            $this->log_aktivitas('Menghapus suplier: ' . $suplier['nama_suplier']);
        }
        return $result;
    }

    
    public function get_all_users($filters = []) {
        $this->db->from('user');
        if (!empty($filters['role'])) {
            $this->db->where('role', $filters['role']);
        }
        return $this->db->get()->result_array();
    }

    public function get_user_by_id($id) {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row_array();
    }

    public function insert_user($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('user', $data);
        if ($result) {
            $this->log_aktivitas('Menambahkan pengguna: ' . $data['nama']);
        }
        return $result;
    }

    public function update_user($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id_user', $id);
        $result = $this->db->update('user', $data);
        if ($result) {
            $this->log_aktivitas('Mengedit pengguna ID: ' . $id);
        }
        return $result;
    }

    public function delete_user($id) {
        $user = $this->get_user_by_id($id);
        $this->db->where('id_user', $id);
        $result = $this->db->delete('user');
        if ($result) {
            $this->log_aktivitas('Menghapus pengguna: ' . $user['nama']);
        }
        return $result;
    }

    
    public function get_all_log_aktivitas($filters = [], $limit = 20, $offset = 0) {
        $this->db->select('log_aktivitas.*, user.nama');
        $this->db->from('log_aktivitas');
        $this->db->join('user', 'log_aktivitas.id_user = user.id_user', 'left');
        if (!empty($filters['id_user'])) {
            $this->db->where('log_aktivitas.id_user', $filters['id_user']);
        }
        if (!empty($filters['dari'])) {
            $this->db->where('log_aktivitas.waktu >=', $filters['dari'] . ' 00:00:00');
        }
        if (!empty($filters['sampai'])) {
            $this->db->where('log_aktivitas.waktu <=', $filters['sampai'] . ' 23:59:59');
        }
        $this->db->order_by('log_aktivitas.waktu', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    public function count_log_aktivitas($filters = []) {
        $this->db->from('log_aktivitas');
        if (!empty($filters['id_user'])) {
            $this->db->where('id_user', $filters['id_user']);
        }
        if (!empty($filters['dari'])) {
            $this->db->where('waktu >=', $filters['dari'] . ' 00:00:00');
        }
        if (!empty($filters['sampai'])) {
            $this->db->where('waktu <=', $filters['sampai'] . ' 23:59:59');
        }
        return $this->db->count_all_results();
    }

    
    public function get_all_penjualan($filters = []) {
        $this->db->select('penjualan.id_penjualan, penjualan.tanggal, penjualan.total_harga, user.nama as nama_user');
        $this->db->from('penjualan');
        $this->db->join('user', 'penjualan.id_user = user.id_user', 'left');
        if (!empty($filters['tanggal'])) {
            $this->db->where('DATE(penjualan.tanggal)', $filters['tanggal']);
        }
        if (!empty($filters['id_user'])) {
            $this->db->where('penjualan.id_user', $filters['id_user']);
        }
        $this->db->order_by('penjualan.tanggal', 'DESC');
        $result = $this->db->get()->result_array();
        log_message('debug', 'All penjualan data: ' . print_r($result, TRUE));
        return $result;
    }

    public function get_penjualan_by_id($id_penjualan) {
        $this->db->select('penjualan.id_penjualan, penjualan.id_user, penjualan.tanggal, penjualan.total_harga, user.nama as nama_user');
        $this->db->from('penjualan');
        $this->db->join('user', 'penjualan.id_user = user.id_user', 'left');
        $this->db->where('penjualan.id_penjualan', $id_penjualan);
        $result = $this->db->get()->row_array();
        log_message('debug', 'Penjualan by ID ' . $id_penjualan . ': ' . print_r($result, TRUE));
        return $result;
    }

    public function get_penjualan_details($id_penjualan) {
        $this->db->select('detail_penjualan.jumlah, detail_penjualan.subtotal, obat.nama_obat, obat.harga');
        $this->db->from('detail_penjualan');
        $this->db->join('obat', 'detail_penjualan.id_obat = obat.id_obat');
        $this->db->where('detail_penjualan.id_penjualan', $id_penjualan);
        $result = $this->db->get()->result_array();
        log_message('debug', 'Penjualan details for ID ' . $id_penjualan . ': ' . print_r($result, TRUE));
        return $result;
    }

    public function insert_penjualan($penjualan, $details) {
        $this->db->trans_start();

        
        $penjualan['created_at'] = date('Y-m-d H:i:s');
        $penjualan['updated_at'] = date('Y-m-d H:i:s');
        $this->db->insert('penjualan', $penjualan);
        $id_penjualan = $this->db->insert_id();

        
        foreach ($details as $detail) {
            $detail['id_penjualan'] = $id_penjualan;
            $this->db->insert('detail_penjualan', $detail);
            $this->db->set('stok', 'stok - ' . $detail['jumlah'], FALSE);
            $this->db->where('id_obat', $detail['id_obat']);
            $this->db->update('obat');
        }

        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            $this->log_aktivitas('Menyimpan penjualan ID: ' . $id_penjualan);
        }
        return $this->db->trans_status() ? $id_penjualan : FALSE;
    }

    
    public function get_laporan_penjualan($filters) {
        $this->db->select('penjualan.id_penjualan, penjualan.tanggal, penjualan.total_harga, user.nama as nama_user');
        $this->db->from('penjualan');
        $this->db->join('user', 'penjualan.id_user = user.id_user', 'left');
        if (!empty($filters['dari']) && !empty($filters['sampai'])) {
            $this->db->where('penjualan.tanggal >=', $filters['dari'] . ' 00:00:00');
            $this->db->where('penjualan.tanggal <=', $filters['sampai'] . ' 23:59:59');
        }
        if (!empty($filters['id_user'])) {
            $this->db->where('penjualan.id_user', $filters['id_user']);
        }
        $this->db->order_by('penjualan.tanggal', 'DESC');
        $result = $this->db->get()->result_array();
        log_message('debug', 'Laporan penjualan: ' . print_r($result, TRUE));
        return $result;
    }

    public function get_laporan_penjualan_kasir($filters) {
        $this->db->select('penjualan.id_penjualan, penjualan.tanggal, penjualan.total_harga, user.nama');
        $this->db->from('penjualan');
        $this->db->join('user', 'penjualan.id_user = user.id_user', 'left');
        $this->db->where('penjualan.id_user', $filters['id_user']);
        $this->db->where('penjualan.tanggal >=', $filters['dari'] . ' 00:00:00');
        $this->db->where('penjualan.tanggal <=', $filters['sampai'] . ' 23:59:59');
        $this->db->order_by('penjualan.tanggal', 'DESC');
        $result = $this->db->get()->result_array();
        log_message('debug', 'Laporan penjualan kasir: ' . print_r($result, TRUE));
        return $result;
    }

    
    public function get_laporan_stok_obat($filters = []) {
        $this->db->select('obat.*, kategori.nama_kategori, jenis.nama_jenis');
        $this->db->from('obat');
        $this->db->join('kategori', 'obat.id_kategori = kategori.id_kategori');
        $this->db->join('jenis', 'obat.id_jenis = jenis.id_jenis');
        if (!empty($filters['kategori'])) {
            $this->db->where('obat.id_kategori', $filters['kategori']);
        }
        if (!empty($filters['jenis'])) {
            $this->db->where('obat.id_jenis', $filters['jenis']);
        }
        return $this->db->get()->result_array();
    }

    
    public function get_laporan_stok_menipis($filters = []) {
        $this->db->select('obat.*, kategori.nama_kategori, jenis.nama_jenis');
        $this->db->from('obat');
        $this->db->join('kategori', 'obat.id_kategori = kategori.id_kategori');
        $this->db->join('jenis', 'obat.id_jenis = jenis.id_jenis');
        $this->db->where('obat.stok <=', 10);
        if (!empty($filters['kategori'])) {
            $this->db->where('obat.id_kategori', $filters['kategori']);
        }
        if (!empty($filters['jenis'])) {
            $this->db->where('obat.id_jenis', $filters['jenis']);
        }
        return $this->db->get()->result_array();
    }

    
    public function get_penjualan_hari_ini_kasir($id_user) {
        $this->db->select('SUM(total_harga) as total');
        $this->db->where('DATE(tanggal)', date('Y-m-d'));
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('penjualan');
        return $query->row()->total ?: 0;
    }

    public function get_total_by_id_penjualan($id_penjualan) {
    $this->db->select_sum('subtotal');
    $this->db->where('id_penjualan', $id_penjualan);
    $query = $this->db->get('detail_penjualan');
    return $query->row()->subtotal ?: 0;
}

public function get_pengguna_filtered($filters = []) {
    $this->db->from('user');

    if (!empty($filters['role'])) {
        $this->db->where('role', $filters['role']);
    }

    return $this->db->get()->result_array();
}


public function get_obat_menipis_list()
{
    return $this->db
        ->select('obat.nama_obat, obat.stok, kategori.nama_kategori AS kategori')
        ->from('obat')
        ->join('kategori', 'kategori.id_kategori = obat.id_kategori', 'left')
        ->where('obat.stok <', 10) // angka 10 = ambang batas stok menipis
        ->order_by('obat.stok', 'asc')
        ->get()
        ->result_array();
}



public function get_all_logs_ordered() {
  $this->db->select('log_aktivitas.*, user.nama');
  $this->db->from('log_aktivitas');
  $this->db->join('user', 'user.id_user = log_aktivitas.id_user', 'left');
  $this->db->order_by('waktu', 'DESC');
  return $this->db->get()->result_array();
}

public function count_all_obat() {
    return $this->db->count_all('obat');
}

public function count_all_kategori() {
    return $this->db->count_all('kategori');
}

public function count_all_jenis() {
    return $this->db->count_all('jenis');
}

public function count_all_suplier() {
    return $this->db->count_all('suplier');
}

public function count_all_pengguna() {
    return $this->db->count_all('user');
}

public function count_all_penjualan() {
    return $this->db->count_all('penjualan');
}
public function get_log_aktivitas_terbaru($limit = 5) {
    $this->db->select('log_aktivitas.*, user.nama as nama_user');
    $this->db->from('log_aktivitas');
    $this->db->join('user', 'user.id_user = log_aktivitas.id_user', 'left'); 
    $this->db->order_by('waktu', 'DESC');
    $this->db->limit($limit);
    return $this->db->get()->result(); 
}
public function count_penjualan_by_user($id_user) {
    return $this->db->where('id_user', $id_user)->count_all_results('penjualan');
}

public function count_transaksi_hari_ini_by_user($id_user) {
    $today = date('Y-m-d');
    $this->db->where('id_user', $id_user);
    $this->db->where('DATE(tanggal)', $today);
    return $this->db->count_all_results('penjualan');
}

public function count_transaksi_bulan_ini_by_user($id_user) {
    $this->db->where('id_user', $id_user);
    $this->db->where('MONTH(tanggal)', date('m'));
    $this->db->where('YEAR(tanggal)', date('Y'));
    return $this->db->count_all_results('penjualan');
}

public function get_log_aktivitas_kasir($id_user, $limit = 5) {
    $this->db->select('log_aktivitas.*, user.nama as nama_user');
    $this->db->from('log_aktivitas');
    $this->db->join('user', 'user.id_user = log_aktivitas.id_user', 'left');
    $this->db->where('log_aktivitas.id_user', $id_user);
    $this->db->order_by('waktu', 'DESC');
    $this->db->limit($limit);
    return $this->db->get()->result();
}


}
?>