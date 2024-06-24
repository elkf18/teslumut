<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('account_model'); 
        $this->load->library("form_validation");
    }

    public function index() {
       
        $data['accounts'] = $this->account_model->get_all_accounts();
        $this->load->view('templates/header');

        $this->load->view('account/index', $data);
        
    }

    public function create() {
       
        if ($this->input->post()) {
           
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('name', 'Nama', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('account/create');
            } else {
                
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'name' => $this->input->post('name'),
                    'role' => $this->input->post('role')
                );

                $this->account_model->add_account($data);

               
                redirect('account/index');
            }
        } else {
            
            $this->load->view('account/create');
        }
    }

    public function edit($username) {
        
        if ($this->input->post()) {
            
            $this->form_validation->set_rules('name', 'Nama', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE) {
                
                $data['account'] = $this->account_model->get_account_by_username($username);
                $this->load->view('account/edit', $data);
            } else {
                // Simpan perubahan ke dalam database
                $data = array(
                    'name' => $this->input->post('name'),
                    'role' => $this->input->post('role')
                );

                $this->account_model->update_account($username, $data);

                
                redirect('account/index');
            }
        } else {
        
            $data['account'] = $this->account_model->get_account_by_username($username);
            $this->load->view('account/edit', $data);
        }
    }

    public function delete($username) {
        // Hapus account dari database
        $this->account_model->delete_account($username);

        // Redirect ke halaman daftar account
        redirect('account/index');
    }

}
?>
