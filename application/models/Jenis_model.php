<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {
    public function get_jenis_list() {
        return $this->db->get('jenis')->result();
    }

    public function get_jenis_by_id($id) {
        return $this->db->get_where('jenis', ['id_jenis' => $id])->row();
    }

    public function insert_jenis($data) {
        $this->db->insert('jenis', $data);
        return $this->db->insert_id();
    }

    public function update_jenis($id, $data) {
        $this->db->where('id_jenis', $id);
        return $this->db->update('jenis', $data);
    }

    public function delete_jenis($id) {
        $this->db->where('id_jenis', $id);
        return $this->db->delete('jenis');
    }
}