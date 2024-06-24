<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load any database configuration and library if not loaded in autoload
    }

    public function get_user($username) {
        // Ambil data user dari tabel 'account'
        $query = $this->db->get_where('account', array('username' => $username));
        return $query->row_array();
    }

    // Other methods as needed
}
?>
