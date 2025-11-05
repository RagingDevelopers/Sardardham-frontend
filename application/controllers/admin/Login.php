<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['page_name'] = "login";
        $page_data['page_title'] = "Log in";
        $this->load->view('admin/login', $page_data);

    }
    public function validateLogin()
    {
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $message = array('message' => validation_errors(), 'class' => 'danger');
            $this->session->set_flashdata('flash_message', $message);

            redirect(base_url("admin/login"), 'refresh');
        } else {
            $mobile_no = $this->security->xss_clean($this->input->post('mobile_no'));
            $password = sha1($this->security->xss_clean($this->input->post('password')));
            $validate = $this->db->query("select * from admin where password ='$password' AND mobile_no=$mobile_no");

            if ($validate->num_rows() == 1) {
                $data = $validate->row_array();
                //   print_r($data);exit;
                $this->session->set_userdata('loginstatus', '1');
                $this->session->set_userdata('admin_id', $data['id']);
                $this->session->set_userdata('user_type', $data['user_type']);

                $setting = $this->db->get_where('setting', array('id' => 1))->row_array();
                if (empty($setting)) {
                    $this->db->insert('setting', array('last_updated' => date('Y-m-d')));
                } else {
                    $this->db->where('id', 1)->update('setting', array('last_updated' => date('Y-m-d')));
                }

                $message = array('message' => "Login Successfully", 'class' => 'success');
                $this->session->set_flashdata('flash_message', $message);

                redirect(base_url("admin/dashboard"), 'refresh');

            } else {

                $message = array('message' => "Invalid Username or Password", 'class' => 'danger');
                $this->session->set_flashdata('flash_message', $message);
                redirect(base_url("admin/login"), 'refresh');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('loginstatus');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('mobile_no');
        $this->session->unset_userdata('user_type');
        // $this->session->unset_userdata('admin_name');
        $message = array('message' => "Logout Successfully", 'class' => 'success');
        $this->session->set_flashdata('flash_message', $message);
        redirect(base_url('admin/login'), 'refresh');
    }
}