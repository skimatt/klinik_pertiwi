<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
    }

public function login() {
    if ($this->session->userdata('logged_in')) {
        $role = $this->session->userdata('role');
        log_message('debug', 'Already logged in, role: ' . $role);
        redirect($role == 'admin' ? 'admin' : 'kasir');
    }

    $data['title'] = 'Login - Klinik Pertiwi';

    if ($this->input->post()) {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === TRUE) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            log_message('debug', 'Login attempt: Username: ' . $username . ', Password (MD5): ' . $password);

            $user = $this->Auth_model->get_user_by_username($username);
            log_message('debug', 'User data: ' . print_r($user, TRUE));

            if ($user && $user['password'] === $password && $user['status'] == 'aktif') {
                $session_data = [
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);
                log_message('debug', 'Session set: ' . print_r($session_data, TRUE));
                redirect($user['role'] == 'admin' ? 'admin' : 'kasir');
            } else {
                $data['error'] = 'Username, password, atau status akun tidak valid.';
                log_message('debug', 'Login failed: Invalid credentials or status');
            }
        } else {
            $data['error'] = validation_errors();
        }
    }

    $this->load->view('auth/login', $data);
}
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>