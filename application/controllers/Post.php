<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('post_model'); 
    }

    public function index() {
        // Ambil semua post dari database
        $data['posts'] = $this->post_model->get_all_posts();

        // Load view untuk menampilkan daftar post
        $this->load->view('templates/header');
        $this->load->view('post/index', $data);
    }

    public function create() {
        // Jika ada input dari form tambah post
        if ($this->input->post()) {
            // Validasi form
            $this->form_validation->set_rules('title', 'Judul', 'required');
            $this->form_validation->set_rules('content', 'Konten', 'required');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('post/create');
            } else {
                // Simpan data ke dalam database
                $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'date' => date('Y-m-d H:i:s'),
                    'username' => $this->session->userdata('username') // Ambil username dari session
                );

                $this->post_model->add_post($data);

                // Redirect ke halaman daftar post
                redirect('post/index');
            }
        } else {
            // Load view untuk form tambah post
            $this->load->view('post/create');
        }
    }

    public function edit($idpost) {
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Judul', 'required');
            $this->form_validation->set_rules('content', 'Konten', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika validasi gagal, tampilkan kembali form
                $data['post'] = $this->post_model->get_post_by_id($idpost);
                $this->load->view('post/edit', $data);
            } else {
                $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                );

                $this->post_model->update_post($idpost, $data);

                redirect('post/index');
            }
        } else {
            $data['post'] = $this->post_model->get_post_by_id($idpost);
            $this->load->view('post/edit', $data);
        }
    }

    public function delete($idpost) {
        $this->post_model->delete_post($idpost);

        redirect('post/index');
    }

}
?>
