<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Method untuk mengambil semua data account
    public function get_all_accounts() {
        $query = $this->db->get('account');
        return $query->result_array();
    }

    // Method untuk mengambil data account berdasarkan username
    public function get_account_by_username($username) {
        $query = $this->db->get_where('account', array('username' => $username));
        return $query->row_array();
    }

    // Method untuk menambahkan account baru
    public function add_account($data) {
        return $this->db->insert('account', $data);
    }

    // Method untuk mengedit account
    public function update_account($username, $data) {
        $this->db->where('username', $username);
        return $this->db->update('account', $data);
    }

    // Method untuk menghapus account
    public function delete_account($username) {
        return $this->db->delete('account', array('username' => $username));
    }

}
?>
