<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Method untuk mengambil semua data post
    public function get_all_posts() {
        $query = $this->db->get('post');
        return $query->result_array();
    }

    // Method untuk mengambil data post berdasarkan idpost
    public function get_post_by_id($idpost) {
        $query = $this->db->get_where('post', array('idpost' => $idpost));
        return $query->row_array();
    }

    // Method untuk menambahkan post baru
    public function add_post($data) {
        return $this->db->insert('post', $data);
    }

    // Method untuk mengedit post
    public function update_post($idpost, $data) {
        $this->db->where('idpost', $idpost);
        return $this->db->update('post', $data);
    }

    // Method untuk menghapus post
    public function delete_post($idpost) {
        return $this->db->delete('post', array('idpost' => $idpost));
    }

}
?>
