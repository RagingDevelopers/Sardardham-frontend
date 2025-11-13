<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['page_name']         = "home";
        $page_data['page_title']        = "Home";
        $page_data['slider']            = queryLang()->get('slider')->result_array();
        $page_data['magazines']         = $this->db->select([ langSelect("title"), langSelect("year"), "pdf", "photo" ])->limit(4)->order_by('id', 'desc')->get('magazine')->result_array();
        $page_data['events']            = queryLang()->limit(5)->where([ 'status' => "ACTIVE" ])->order_by('id', 'desc')->get('events')->result_array();
        $page_data['documentary']       = $this->db->select([ "*", langSelect("title") ])->where([ 'status' => "ACTIVE" ])->order_by('id', 'desc')->get('documentary')->result_array();
        $page_data['ideology']          = queryLang()->get("ideology")->row();
        $page_data['president_message'] = queryLang()->get("president_message")->row();
        $page_data['yuva_sangathan']    = queryLang()->get("yuva_sangathan")->row();
        $page_data['goals']             = queryLang()->get("goals")->result();
        $page_data['announcements']     = queryLang()->get("announcement")->result();

        $this->load->view('common', $page_data);
    }

    public function switch_language($language = "")
    {
        $this->session->set_userdata('site_language', $language);

        if ($language == "english") {
            $this->session->set_userdata('language_id', 1);
        } else if ($language == "gujarati") {
            $this->session->set_userdata('language_id', 2);
        }

        // redirect($_SERVER['HTTP_REFERER'] ?? "/");
        redirect("/");
    }

    public function goals($goal_slug = '')
    {
        $page_data['page_name']  = "goal";
        $page_data['page_title'] = "Home";



        $goal = queryLang()->where([ "slug" => urldecode($goal_slug), 'active' => 1 ])->get("goals")->row();
        if (empty($goal)) {
            redirect(($_SERVER['HTTP_REFERER'] ?? "/"));
        }

        $page_data['goal'] = $goal;
        $this->load->view('common', $page_data);
    }

    public function buildingProject()
    {
        $page_data['page_name']  = "goals/building_project";
        $page_data['page_title'] = "Sardardham Building Projects (Hostels & Institutes)";
        $this->load->view('common', $page_data);
    }
    public function civilServiceCentre()
    {
        $page_data['page_name']  = "goals/civil_service_centre";
        $page_data['page_title'] = "Civil Service Center";
        $this->load->view('common', $page_data);
    }
}