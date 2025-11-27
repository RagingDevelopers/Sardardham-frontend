<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['page_name'] = "magazine";
        $page_data['page_title'] = lang('ek_vichar_magazine');
        //  $page_data['magazine'] = $this->db->get('magazine')->result_array();
        // $page_data['magazine_content'] = queryLang()->get("magazine_content")->row();
        $page_data['year'] = $this->db->order_by(langColumn("year"), "desc")->from('magazine')->select([langSelect('year')])->group_by(langColumn('year'))->get()->result_array();
        $this->load->view('common', $page_data);
    }
/*************  ✨ Windsurf Command ⭐  *************/
/**
 * Display news page with current/future or past news
 *
 * @param string $filter if 'archive', display past news, else display current/future news
 */
/*******  eb209ba4-76e2-490b-9583-aac1384cc072  *******/    public function news()
    {
        $filter = $this->input->get('filter');
        $page_data['page_name'] = "news";
        $page_data['page_title'] = "News";

        $query = queryLang()->order_by("id", "desc")->where([
            // 'status' => "ACTIVE",
            "type" => "news"
        ]);

        if ($filter === 'archive') {
            $query->where("event_date <", date("Y-m-d")); // past news
        } else {
            $query->where("event_date >=", date("Y-m-d")); // current/future news
        }

        $page_data['filter'] = $filter;
        $page_data['events'] = $query->get('events')->result_array();
        $this->load->view('common', $page_data);
    }


    public function news_details($slug = null)
    {

        if (!$slug) {
            show_404();
        }
        $slug = rawurldecode($slug);  

        $event =$this->db->get_where('events', ['slug' => $slug,])->row_array();

        if (!$event) {
            show_404();
        }

        $other_news =$this->db
            ->where('id !=', $event['id'])
            // ->where('status', 'ACTIVE')
            ->order_by('created_at', 'DESC')
            ->limit(6)
            ->get('events')
            ->result_array();

        $page_data = [
            'event'       => $event,
            'other_news'  => $other_news,
            'page_title'  => $event['title'],
        ];
        $page_data['page_name'] = "news_details";
        $page_data['page_title'] = "News Details";
        
        $this->load->view('common', $page_data);
    }

    public function download()
    {
        $page_data['page_name'] = "download";
        $page_data['page_title'] = "Download";
        $page_data['download_category'] = $this->db->select(["id", langSelect('title')])->get('download_category')->result_array();
        $page_data['download'] = $this->db->select(["*", langSelect('title')])->get('download')->result_array();
        $this->load->view('common', $page_data);
    }
    public function documentary()
    {
        $page_data['page_name'] = "documentary";
        $page_data['page_title'] = "Documentary";
        $page_data['documentary_category'] = $this->db->select(["*", langSelect('name')])->get('documentary_category')->result_array();
        $this->load->view('common', $page_data);
    }

    public function getDocumentaryByCategory()
    {
        $category = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            exit("Access not allowed");
        }
        $html = $this->load->view('documentary-ajax', ["category" => $category], TRUE);
        echo $html;
    }
    public function getMagazinesByYear()
    {
        $year = $this->input->get('year');
        if (!$this->input->is_ajax_request()) {
            exit("Access not allowed");
        }
        $html = $this->load->view('magazine-ajax', ["year" => $year], TRUE);
        echo $html;
    }

    public function event()
    {
        $filter = $this->input->get('filter');
        $page_data['page_name'] = "event";
        $page_data['page_title'] = "Event";
        // $page_data['events'] = queryLang()->order_by("id", "desc")
        //     ->where([
        //         'status' => "ACTIVE",
        //         "event_date >=" => date("Y-m-d"),
        //         "type" => "event"
        //     ])
        //     ->get('events')
        //     ->result_array();
        $query = queryLang()->order_by("id", "desc")->where([
            'status' => "ACTIVE",
            "type" => "event"
        ]);

        if ($filter === 'archive') {
            $query->where("event_date <", date("Y-m-d"));
        } else {
            $query->where("event_date >=", date("Y-m-d"));
        }

        $page_data['filter'] = $filter;
        $page_data['events'] = $query->get('events')->result_array();
        $this->load->view('common', $page_data);
    }
}