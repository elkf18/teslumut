<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->model('auth_model');
    }

    public function index() {
       
        redirect('auth/login');
    }

    public function login() {
       
        if ($this->session->userdata('logged_in')) {
            redirect('post/index');
        }

        // Validasi form login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login
            $this->load->view('auth/login');
        } else {
            // Proses login
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->auth_model->get_user($username);

            if ($user && password_verify($password, $user['password'])) {
                // Login berhasil, set session
                $user_data = array(
                    'username' => $user['username'],
                    'name' => $user['name'],
                    'role' => $user['role'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($user_data);

                redirect('post');
            } else {
                $data['error'] = 'Username atau password salah.';
                $this->load->view('auth/login', $data);
            }
        }
    }

    public function logout() {
        // Hapus session dan redirect ke halaman login
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();

        redirect('auth/login');
    }

}
?>
