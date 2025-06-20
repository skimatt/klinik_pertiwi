<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    public function get_kategori_list() {
        return $this->db->get('kategori')->result();
    }

    public function get_kategori_by_id($id) {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row();
    }

    public function insert_kategori($data) {
        $this->db->insert('kategori', $data);
        return $this->db->insert_id();
    }

    public function update_kategori($id, $data) {
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori', $data);
    }

    public function delete_kategori($id) {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori');
    }
}