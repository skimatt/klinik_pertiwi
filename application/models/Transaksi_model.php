<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
    public function get_obat_list() {
        $this->db->select('obat.*, kategori.nama_kategori, jenis.nama_jenis, suplier.nama_suplier');
        $this->db->from('obat');
        $this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori', 'left');
        $this->db->join('jenis', 'jenis.id_jenis = obat.id_jenis', 'left');
        $this->db->join('suplier', 'suplier.id_suplier = obat.id_suplier', 'left');
        return $this->db->get()->result();
    }

    public function insert_penjualan($data) {
        $this->db->insert('penjualan', $data);
        return $this->db->insert_id();
    }

    public function insert_detail_penjualan($data) {
        return $this->db->insert('detail_penjualan', $data);
    }

    public function update_stok($id_obat, $jumlah) {
        $this->db->set('stok', 'stok - ' . $jumlah, FALSE);
        $this->db->where('id_obat', $id_obat);
        $this->db->update('obat');
    }
}