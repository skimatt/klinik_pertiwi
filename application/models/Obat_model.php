<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {
    public function get_obat_list() {
        $this->db->select('obat.*, kategori.nama_kategori, jenis.nama_jenis');
        $this->db->from('obat');
        $this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori', 'left');
        $this->db->join('jenis', 'jenis.id_jenis = obat.id_jenis', 'left');
        return $this->db->get()->result();
    }

    public function get_obat_by_id($id) {
        return $this->db->get_where('obat', ['id_obat' => $id])->row();
    }

    public function get_kategori_list() {
        return $this->db->get('kategori')->result();
    }

    public function get_jenis_list() {
        return $this->db->get('jenis')->result();
    }

    public function insert_obat($data) {
        $this->db->insert('obat', $data);
        return $this->db->insert_id();
    }

    public function update_obat($id, $data) {
        $this->db->where('id_obat', $id);
        return $this->db->update('obat', $data);
    }

    public function delete_obat($id) {
        $this->db->where('id_obat', $id);
        return $this->db->delete('obat');
    }
}