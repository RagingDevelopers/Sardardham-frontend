<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loginstatus') != 1 || $this->session->userdata('admin_id') == "" || $this->session->userdata('user_type') != "Admin") {
            $message = array('message' => "Your Session has Been Expired.!!", 'class' => 'danger');
            $this->session->set_flashdata('flash_message', $message);
            redirect(base_url('admin/login'), 'refresh');
        }
    }

    public function content()
    {
        $languages = $this->Language_model->get_language();
        $page_data['page_name'] = "donation_content";
        $page_data['page_title'] = "Donation Content";
        $page_data['languages'] = $languages;
        $this->load->view('admin/common', $page_data);
    }

}
