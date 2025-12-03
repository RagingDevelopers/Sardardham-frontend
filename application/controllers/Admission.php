<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $page_data['page_name'] = "admission";
        $page_data['page_title'] = lang('admission');
        $this->load->view('common', $page_data);
    }

    public function ahmedabad()
    {
        $page_data['page_name'] = "ahmedabad";
        $page_data['page_title'] = "Ahmedabad";
        $page_data['admission'] = queryLang()->get("admission_ahmedabad")->row();
        $this->load->view('common', $page_data);
    }
    public function bhuj_kutch()
    {
        $page_data['page_name'] = "bhuj_kutch";
        $page_data['page_title'] = "Kutch Bhuj";
        $page_data['admission'] = queryLang()->get("admission_bhuj_kutch")->row();
        $this->load->view('common', $page_data);
    }
    public function hostel_facilities()
    {
        $page_data['page_name'] = "hostel_facilities";
        $page_data['page_title'] = "Hostel Facilities";
        $page_data['admission'] = queryLang()->get("hostel_facilities")->row();
        $this->load->view('common', $page_data);
    }
}