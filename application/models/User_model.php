<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_user_list() {
        return $this->db->get('user')->result();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('user', ['id_user' => $id])->row();
    }

    public function insert_user($data) {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function update_user($id, $data) {
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function delete_user($id) {
        $this->db->where('id_user', $id);
        return $this->db->delete('user');
    }
}