<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('loginstatus')!= 1 || $this->session->userdata('admin_id')=="" || $this->session->userdata('user_type') !="Admin") {
            $message = array('message'=>"Your Session has Been Expired.!!", 'class'=>'danger');
            $this->session->set_flashdata('flash_message',$message);
            redirect(base_url('admin/login'),'refresh');
        }
    }
	public function index() {
	    $page_data['page_name'] = "dashboard";
        $page_data['page_title'] = "Dashboard";
        $this->load->view('admin/common',$page_data);
	}
}