<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model'); // Load the common model
    }

    // Fetch data for DataTable (all logic is in the model)
    public function fetch_data_table() {
        // Call the model function and output the result
        echo $this->Common_model->get_datatable();
    }
}