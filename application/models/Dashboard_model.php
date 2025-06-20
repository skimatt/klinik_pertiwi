<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    public function get_total_stok() {
        return $this->db->select_sum('stok')->get('obat')->row()->stok;
    }

    public function get_penjualan_hari_ini() {
        $today = date('Y-m-d');
        return $this->db->select_sum('total')
                        ->where("DATE(tanggal_penjualan) = '$today'")
                        ->get('penjualan')
                        ->row()->total;
    }

    public function get_penjualan_hari_ini_kasir($id_user) {
        $today = date('Y-m-d');
        return $this->db->select_sum('total')
                        ->where("DATE(tanggal_penjualan) = '$today'")
                        ->where('id_user', $id_user)
                        ->get('penjualan')
                        ->row()->total;
    }

    public function get_stok_menipis() {
        return $this->db->get('stok_menipis')->result();
    }
}
?>