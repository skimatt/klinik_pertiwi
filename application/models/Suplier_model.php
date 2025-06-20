<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier_model extends CI_Model {
    public function get_suplier_list() {
        return $this->db->get('suplier')->result();
    }

    public function get_suplier_by_id($id) {
        return $this->db->get_where('suplier', ['id_suplier' => $id])->row();
    }

    public function insert_suplier($data) {
        $this->db->insert('suplier', $data);
        return $this->db->insert_id();
    }

    public function update_suplier($id, $data) {
        $this->db->where('id_suplier', $id);
        return $this->db->update('suplier', $data);
    }

    public function delete_suplier($id) {
        $this->db->where('id_suplier', $id);
        return $this->db->delete('suplier');
    }
}