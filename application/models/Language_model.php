<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model {

    // Constructor to load the database
    public function __construct() {
        parent::__construct();
        // $this->load->database(); // Load the database
    }

    // Function to get all language records
    public function get_language() {
        $query = $this->db->get('language'); // 'languages' is the table name
        return $query->result_array(); // Return the result as an array
    }
}