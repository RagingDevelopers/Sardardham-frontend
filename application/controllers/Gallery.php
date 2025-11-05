<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['page_name'] = "gallery";
        $page_data['page_title'] = "Gallery";
        $page_data['year'] = $this->db->from('gallery')
            ->select([langSelect('year')])
            ->group_by(langColumn('year'))
            ->order_by(langColumn("year"), "desc")
            ->get()
            ->result_array();

        $this->load->view('common', $page_data);
    }
    public function gallery()
    {
        $id = implode(',', $this->security->xss_clean($this->input->get()));
        $this->db->select([langSelect("full_title"), "pdf"]);
        $this->db->from('gallery');
        $this->db->where('id', $id);
        $json = $this->db->get()->row_array();
        echo json_encode($json);
    }


    public function getGalleryImagesByYear()
    {

        $year = $this->input->get('year');

        if (!$this->input->is_ajax_request()) {
            exit("Access not allowed");
        }


        $magazines = $this->db->select(['*', langSelect('year'), langSelect('title')])
            ->from('gallery')
            ->where(langColumn('year'), $year)
            ->get()
            ->result_array();


        $gallery_images = $this->db->select('*')
            ->from('gallery_img')
            ->join('gallery', 'gallery.id = gallery_img.gallery_id')
            ->where('gallery.' . langColumn('year'), $year)
            ->get()
            ->result_array();

        $html = $this->load->view('gallery_images', ['gallery_img' => $gallery_images, "magazines" => $magazines, "year" => $year], TRUE);

        echo $html;
    }

    public function video_gallery()
    {
        $page_data['year'] = $this->db->from('documentary_category')
            ->select([langSelect('year')])
            ->group_by(langColumn('year'))
            ->order_by(langColumn("year"), "desc")
            ->get()
            ->result_array();
        $page_data['page_name'] = "video_gallery";
        $page_data['page_title'] = "Video Gallery";
        $page_data['documentary'] = $this->db->select(["*", langSelect("title")])->where(['status' => "ACTIVE"])->order_by('id', 'desc')->get('documentary')->result_array();
        $this->load->view('common', $page_data);
    }

    public function get_categories_by_year()
    {
        $year = $this->input->post('year');
        $result = $this->db->select(['id', langSelect('year'), langSelect('name')])->where(langColumn("year"), $year)->get('documentary_category')->result_array();
        echo json_encode($result);
    }

    public function get_documentaries_by_category()
    {
        $category_id = $this->input->post('category_id');

        $data['documentary'] = $this->db
            ->select(["*", langSelect("title")])
            ->where(
                [
                    'status' => 'ACTIVE',
                    'documentary_category_id' => $category_id
                ]
            )
            ->order_by('id', 'desc')
            ->get('documentary')
            ->result_array();

        $html = $this->load->view("documentary_list", $data, TRUE);
        echo $html;
    }
}