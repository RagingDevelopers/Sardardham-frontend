<?php
defined('BASEPATH') or exit('No direct script access allowed');

class New_philanthropist extends CI_Controller
{
    private $t_philanthropists = 'philanthropist'; // main table
    private $t_city = 'city';
    private $t_category = 'category';
    private $t_zone = 'zone';
    private $t_media = 'add_img';
    private $image_col = 'image';
    private $media_file_col = 'photo';
    private $upload_dir = 'upload';
    private $allowed_images = 'jpg|jpeg|png|webp|gif';

    public function __construct()
    {
        parent::__construct();
        if (
            $this->session->userdata('loginstatus') != 1 ||
            $this->session->userdata('admin_id') == "" ||
            $this->session->userdata('user_type') != "Admin"
        ) {
            $message = array( 'message' => "Your Session has Been Expired.!!", 'class' => 'danger' );
            $this->session->set_flashdata('flash_message', $message);
            redirect(base_url('admin/login'), 'refresh');
        }
    }

    public function index()
    {
        $page_data['cities']     = $this->db->get($this->t_city)->result_array();
        $page_data['categories'] = $this->db->get($this->t_category)->result_array();
        $page_data['zones']      = $this->db->get($this->t_zone)->result_array();

        $page_data['page_name']  = "new_philanthropist";
        $page_data['page_title'] = "Philanthropist";
        $this->load->view('admin/common', $page_data);
    }

    public function create()
    {
        $this->form_validation->set_rules('eng_name', 'English Name', 'trim|required');
        $this->form_validation->set_rules('guj_name', 'Gujarati Name', 'trim|required');
        $this->form_validation->set_rules('eng_company', 'English Company', 'trim|required');
        $this->form_validation->set_rules('guj_company', 'Gujarati Company', 'trim|required');
        $this->form_validation->set_rules('city_id', 'Select City', 'trim|required|integer');
        $this->form_validation->set_rules('category_id', 'Select Category', 'trim|required|integer');
        $this->form_validation->set_rules('zone_id', 'Select Zone', 'trim|required|integer');

        if ($this->form_validation->run() === false) {
            $message = array( 'message' => validation_errors(), 'class' => 'danger' );
            $this->session->set_flashdata('flash_message', $message);
            return redirect(site_url('admin/New_philanthropist'), 'refresh');
        }

        $data = array(
            'eng_name'    => $this->security->xss_clean($this->input->post('eng_name')),
            'guj_name'    => $this->security->xss_clean($this->input->post('guj_name')),
            'eng_company' => $this->security->xss_clean($this->input->post('eng_company')),
            'guj_company' => $this->security->xss_clean($this->input->post('guj_company')),
            'city_id'     => (int) $this->security->xss_clean($this->input->post('city_id')),
            'category_id' => (int) $this->security->xss_clean($this->input->post('category_id')),
            'zone_id'     => (int) $this->security->xss_clean($this->input->post('zone_id')),
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        );

        if (!empty($_FILES['photo']['name'])) {
            
            $slug = strtolower(url_title($data['eng_name'], '-', TRUE));
            $newName = "philanthropist-" . $slug ;
            
            $upload = $this->_upload_image('photo',null,$newName);
            if ($upload['status'] === false) {
                $message = array( 'message' => $upload['error'], 'class' => 'danger' );
                $this->session->set_flashdata('flash_message', $message);
                return redirect(site_url('admin/New_philanthropist'), 'refresh');
            }
            $data[$this->image_col] = $upload['file_name'];
        }

        $ok = $this->db->insert($this->t_philanthropists, $data);

        $message = $ok
            ? array( 'message' => "Philanthropist Created Successfully", 'class' => 'success' )
            : array( 'message' => "Failed to Create Philanthropist", 'class' => 'danger' );

        $this->session->set_flashdata('flash_message', $message);
        return redirect(site_url('admin/New_philanthropist'), 'refresh');
    }

    public function edit($id = '')
    {
        $id = (int) $this->security->xss_clean($id);

        $page_data['cities']     = $this->db->get($this->t_city)->result_array();
        $page_data['categories'] = $this->db->get($this->t_category)->result_array();
        $page_data['zones']      = $this->db->get($this->t_zone)->result_array();

        $page_data['page_name']  = "new_philanthropist";
        $page_data['page_title'] = "Philanthropist";
        $page_data['row_data']   = $this->db->get_where($this->t_philanthropists, array( 'id' => $id ))->row_array();
        $this->load->view('admin/common', $page_data);
    }

    public function update($id = '')
    {
        $id = (int) $this->security->xss_clean($id);
        if (!$id) {
            $this->session->set_flashdata('flash_message', array( 'message' => 'Invalid ID', 'class' => 'danger' ));
            return redirect(site_url('admin/New_philanthropist'), 'refresh');
        }

        $this->form_validation->set_rules('eng_name', 'English Name', 'trim|required');
        $this->form_validation->set_rules('guj_name', 'Gujarati Name', 'trim|required');
        $this->form_validation->set_rules('eng_company', 'English Company', 'trim|required');
        $this->form_validation->set_rules('guj_company', 'Gujarati Company', 'trim|required');
        $this->form_validation->set_rules('city_id', 'Select City', 'trim|required|integer');
        $this->form_validation->set_rules('category_id', 'Select Category', 'trim|required|integer');
        $this->form_validation->set_rules('zone_id', 'Select Zone', 'trim|required|integer');

        if ($this->form_validation->run() === false) {
            $message = array( 'message' => validation_errors(), 'class' => 'danger' );
            $this->session->set_flashdata('flash_message', $message);
            return redirect(site_url('admin/New_philanthropist/edit/' . $id), 'refresh');
        }

        $existing = $this->db->get_where($this->t_philanthropists, array( 'id' => $id ))->row_array();
        if (!$existing) {
            $this->session->set_flashdata('flash_message', array( 'message' => 'Record not found', 'class' => 'danger' ));
            return redirect(site_url('admin/New_philanthropist'), 'refresh');
        }

        $data = array(
            'eng_name'    => $this->security->xss_clean($this->input->post('eng_name')),
            'guj_name'    => $this->security->xss_clean($this->input->post('guj_name')),
            'eng_company' => $this->security->xss_clean($this->input->post('eng_company')),
            'guj_company' => $this->security->xss_clean($this->input->post('guj_company')),
            'city_id'     => (int) $this->security->xss_clean($this->input->post('city_id')),
            'category_id' => (int) $this->security->xss_clean($this->input->post('category_id')),
            'zone_id'     => (int) $this->security->xss_clean($this->input->post('zone_id')),
            'updated_at'  => date('Y-m-d H:i:s'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $old_file = !empty($existing[$this->image_col]) ? $existing[$this->image_col] : null;

            $slug = strtolower(url_title($data['eng_name'], '-', TRUE));
            $newName = "philanthropist-{$slug}";

            $upload   = $this->_upload_image('photo', $old_file,$newName);
            if ($upload['status'] === false) {
                $message = array( 'message' => $upload['error'], 'class' => 'danger' );
                $this->session->set_flashdata('flash_message', $message);
                return redirect(site_url('admin/New_philanthropist/edit/' . $id), 'refresh');
            }
            $data[$this->image_col] = $upload['file_name'];
        }

        $this->db->where('id', $id);
        $ok = $this->db->update($this->t_philanthropists, $data);

        $message = $ok
            ? array( 'message' => "Philanthropist Updated Successfully", 'class' => 'success' )
            : array( 'message' => "Failed to Update Philanthropist", 'class' => 'danger' );

        $this->session->set_flashdata('flash_message', $message);
        return redirect(site_url('admin/New_philanthropist'), 'refresh');
    }

    public function delete($id = '')
    {
        $id = (int) $this->security->xss_clean($id);
        if (!$id) {
            $this->session->set_flashdata('flash_message', array( 'message' => 'Invalid ID', 'class' => 'danger' ));
            return redirect(site_url('admin/New_philanthropist'), 'refresh');
        }

        $row = $this->db->get_where($this->t_philanthropists, array( 'id' => $id ))->row_array();
        if ($row && !empty($row[$this->image_col])) {
            $this->_try_unlink($row[$this->image_col]);
        }

        $media_rows = $this->db->get_where($this->t_media, array( 'title_id' => $id ))->result_array();
        foreach ( $media_rows as $m ) {
            if (!empty($m[$this->media_file_col])) {
                $this->_try_unlink($m[$this->media_file_col]);
            }
        }
        $this->db->where('title_id', $id)->delete($this->t_media);

        $ok = $this->db->where('id', $id)->delete($this->t_philanthropists);

        $message = $ok
            ? array( 'message' => "Philanthropist Deleted Successfully", 'class' => 'success' )
            : array( 'message' => "Failed to Delete Philanthropist", 'class' => 'danger' );

        $this->session->set_flashdata('flash_message', $message);
        return redirect(site_url('admin/New_philanthropist'), 'refresh');
    }

    public function add_img()
    {
        $page_data['page_name']  = "add_img";
        $page_data['page_title'] = "Add Image";

        $this->db->select($this->t_media . '.*, p.eng_name as philanthropist_name');
        $this->db->from($this->t_media);
        $this->db->join($this->t_philanthropists . ' as p', $this->t_media . '.title_id = p.id', 'left');

        $page_data['data']            = $this->db->get()->result_array();
        $page_data['philanthropists'] = $this->db->get($this->t_philanthropists)->result_array();

        $this->load->view('admin/common', $page_data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('sequence', 'sequence', 'trim|required|integer');

        if ($this->form_validation->run() === false) {
            $message = array( 'message' => validation_errors(), 'class' => 'danger' );
            $this->session->set_flashdata('flash_message', $message);
            return redirect(site_url('admin/New_philanthropist/add_img'), 'refresh');
        }

        $data['title_id'] = (int) $this->security->xss_clean($this->input->post('slider_id'));
        $data['sequence'] = (int) $this->security->xss_clean($this->input->post('sequence'));

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_upload_image('photo');
            if ($upload['status'] === false) {
                $message = array( 'message' => $upload['error'], 'class' => 'danger' );
                $this->session->set_flashdata('flash_message', $message);
                return redirect(site_url('admin/New_philanthropist/add_img'), 'refresh');
            }
            $data[$this->media_file_col] = $upload['file_name'];
        }

        $ok      = $this->db->insert($this->t_media, $data);
        $message = $ok
            ? array( 'message' => "Image Created Successfully", 'class' => 'success' )
            : array( 'message' => "Failed to Create Image", 'class' => 'danger' );

        $this->session->set_flashdata('flash_message', $message);
        return redirect(site_url('admin/New_philanthropist/add_img'), 'refresh');
    }

    public function data_edit($id = '')
    {
        $id = (int) $this->security->xss_clean($id);

        $page_data['page_title']      = 'Add Image';
        $page_data['page_name']       = 'add_img';
        $page_data['row_data']        = $this->db->get_where($this->t_media, array( 'id' => $id ))->row_array();
        $page_data['data']            = $this->db->get($this->t_media)->result_array();
        $page_data['philanthropists'] = $this->db->get($this->t_philanthropists)->result_array();

        $this->load->view('admin/common', $page_data);
    }

    public function data_update($id = '')
    {
        $id = (int) $this->security->xss_clean($id);

        $this->form_validation->set_rules('sequence', 'sequence', 'trim|required|integer');

        if ($this->form_validation->run() === false) {
            $message = array( 'message' => validation_errors(), 'class' => 'danger' );
            $this->session->set_flashdata('flash_message', $message);
            return redirect(site_url('admin/New_philanthropist/data_edit/' . $id), 'refresh');
        }

        $data['title_id'] = (int) $this->security->xss_clean($this->input->post('slider_id'));
        $data['sequence'] = (int) $this->security->xss_clean($this->input->post('sequence'));

        if (!empty($_FILES['photo']['name'])) {
            $old = $this->db->get_where($this->t_media, array( 'id' => $id ))->row($this->media_file_col);
            if (!empty($old)) {
                $this->_try_unlink($old);
            }
            $upload = $this->_upload_image('photo');
            if ($upload['status'] === false) {
                $message = array( 'message' => $upload['error'], 'class' => 'danger' );
                $this->session->set_flashdata('flash_message', $message);
                return redirect(site_url('admin/New_philanthropist/data_edit/' . (int) $id), 'refresh');
            }
            $data[$this->media_file_col] = $upload['file_name'];
        }

        $this->db->where('id', $id);
        $ok = $this->db->update($this->t_media, $data);

        $message = $ok
            ? array( 'message' => "Image Updated Successfully", 'class' => 'success' )
            : array( 'message' => "Failed to Update Image", 'class' => 'danger' );

        $this->session->set_flashdata('flash_message', $message);
        return redirect(site_url('admin/New_philanthropist/add_img'), 'refresh');
    }

    public function data_delete($id = '')
    {
        $id = (int) $this->security->xss_clean($id);

        $row = $this->db->get_where($this->t_media, array( 'id' => $id ))->row_array();
        if ($row && !empty($row[$this->media_file_col])) {
            $this->_try_unlink($row[$this->media_file_col]);
        }

        $ok = $this->db->where('id', $id)->delete($this->t_media);

        $message = $ok
            ? array( 'message' => "Image Deleted Successfully", 'class' => 'success' )
            : array( 'message' => "Failed to Delete Image", 'class' => 'danger' );

        $this->session->set_flashdata('flash_message', $message);
        return redirect(site_url('admin/New_philanthropist/add_img'), 'refresh');
    }

    public function fetch_data()
    {
        $main_table      = $this->t_philanthropists;
        $controller_name = 'admin/New_philanthropist';

        $start         = (int) ($this->input->post('start') ?? 0);
        $length        = (int) ($this->input->post('length') ?? 10);
        $order         = $this->input->post('order') ?? [];
        $order_idx     = isset($order[0]['column']) ? (int) $order[0]['column'] : 0;
        $order_dir_raw = strtolower($order[0]['dir'] ?? 'asc');
        $order_dir     = $order_dir_raw === 'desc' ? 'DESC' : 'ASC';
        $search_value  = trim($this->input->post('search')['value'] ?? '');

        $orderable_columns = [
            'p.id',          // 0 ID (unused in output)
            null,            // 1 Serial
            null,            // 2 Actions
            null,            // 3 Image (not displayed)
            'p.eng_name',    // 4
            'p.guj_name',    // 5
            'p.eng_company', // 6
            'p.guj_company', // 7
            'c.eng_name',    // 8
            'c.guj_name',    // 9
            'cat.eng_name',  // 10
            'cat.guj_name',  // 11
            'z.eng_name',    // 12
            'z.guj_name',    // 13
            'p.created_at',  // 14
            'p.updated_at',  // 15
        ];
        $order_column_name = $orderable_columns[$order_idx] ?? 'p.id';

        $this->db->from("$main_table as p")
            ->select("
                p.*,
                c.eng_name   as city_eng_name,  c.guj_name   as city_guj_name,
                cat.eng_name as category_eng_name, cat.guj_name as category_guj_name,
                z.eng_name   as zone_eng_name,  z.guj_name   as zone_guj_name
            ")
            ->join($this->t_city . ' as c', 'c.id  = p.city_id', 'left')
            ->join($this->t_category . ' as cat', 'cat.id = p.category_id', 'left')
            ->join($this->t_zone . ' as z', 'z.id  = p.zone_id', 'left');

        if ($search_value !== '') {
            $this->db->group_start()
                ->like('p.eng_name', $search_value)
                ->or_like('p.guj_name', $search_value)
                ->or_like('p.eng_company', $search_value)
                ->or_like('p.guj_company', $search_value)
                ->or_like('c.eng_name', $search_value)
                ->or_like('c.guj_name', $search_value)
                ->or_like('cat.eng_name', $search_value)
                ->or_like('cat.guj_name', $search_value)
                ->or_like('z.eng_name', $search_value)
                ->or_like('z.guj_name', $search_value)
                ->group_end();
        }

        if (!empty($order_column_name)) {
            $this->db->order_by($order_column_name, $order_dir);
        }
        if ($length !== -1) {
            $this->db->limit($length, $start);
        }

        $rows = $this->db->get()->result_array();

        $data   = [];
        $serial = $start + 1;
        foreach ( $rows as $row ) {
            $edit_url   = base_url($controller_name . '/edit/' . $row['id']);
            $delete_url = base_url($controller_name . '/delete/' . $row['id']);

            $actions  = '<a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $actions .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a>';

            $company  = $row['eng_company'] ? $row['eng_company'] . ' (' . $row['guj_company'] . ')' : '';
            $city     = $row['city_eng_name'] ? $row['city_eng_name'] . ' (' . $row['city_guj_name'] . ')' : '';
            $category = $row['category_eng_name'] ? $row['category_eng_name'] . ' (' . $row['category_guj_name'] . ')' : '';
            $zone     = $row['zone_eng_name'] ? $row['zone_eng_name'] . ' (' . $row['zone_guj_name'] . ')' : '';

            $image = '<a href="' . base_url('/upload/' . $row['image']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';

            $data[] = [
                $serial++,
                $actions,
                $row['eng_name'],
                $row['guj_name'],
                $company,
                $city,
                $category,
                $zone,
                $image,
            ];
        }

        $recordsTotal = $this->db->count_all($main_table);

        $this->db->from("$main_table as p")
            ->join($this->t_city . ' as c', 'c.id = p.city_id', 'left')
            ->join($this->t_category . ' as cat', 'cat.id = p.category_id', 'left')
            ->join($this->t_zone . ' as z', 'z.id = p.zone_id', 'left');

        if ($search_value !== '') {
            $this->db->group_start()
                ->like('p.eng_name', $search_value)
                ->or_like('p.guj_name', $search_value)
                ->or_like('p.eng_company', $search_value)
                ->or_like('p.guj_company', $search_value)
                ->or_like('c.eng_name', $search_value)
                ->or_like('c.guj_name', $search_value)
                ->or_like('cat.eng_name', $search_value)
                ->or_like('cat.guj_name', $search_value)
                ->or_like('z.eng_name', $search_value)
                ->or_like('z.guj_name', $search_value)
                ->group_end();
        }
        $recordsFiltered = $this->db->count_all_results();

        $response = [
            'draw'            => (int) ($this->input->post('draw') ?? 0),
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $data,
        ];

        echo json_encode($response);
    }

    public function get_data()
    {
        $main_table      = $this->t_media;
        $controller_name = 'admin/New_philanthropist';

        $start        = (int) ($this->input->post('start') ?? 0);
        $length       = (int) ($this->input->post('length') ?? 10);
        $order_column = (int) ($this->input->post('order')[0]['column'] ?? 0);
        $order_dir    = ($this->input->post('order')[0]['dir'] ?? 'asc');
        $search_value = trim($this->input->post('search')['value'] ?? '');

        $orderable_columns = [
            "$main_table.id",       // 0 (not shown)
            null,                   // 1 serial
            "p.eng_name",           // 2 philanthropist
            "$main_table.sequence", // 3 sequence
            null,                   // 4 view
        ];
        $order_column_name = $orderable_columns[$order_column] ?? "$main_table.id";

        $this->db->select("$main_table.*, p.eng_name as philanthropist_name")
            ->from($main_table)
            ->join($this->t_philanthropists . ' as p', "$main_table.title_id = p.id", 'left');

        if ($search_value !== '') {
            $this->db->group_start()
                ->like("$main_table.sequence", $search_value)
                ->or_like("p.eng_name", $search_value)
                ->group_end();
        }

        if (!empty($order_column_name)) {
            $this->db->order_by($order_column_name, ($order_dir === 'desc' ? 'DESC' : 'ASC'));
        }

        $this->db->limit($length, $start);
        $rows = $this->db->get()->result_array();

        $formatted = [];
        $serial    = $start + 1;
        foreach ( $rows as $row ) {
            $edit_url    = base_url($controller_name . '/data_edit/' . $row['id']);
            $delete_url  = base_url($controller_name . '/data_delete/' . $row['id']);
            $actions     = '<a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $actions    .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a>';

            $view = '';
            if (!empty($row[$this->media_file_col])) {
                $view = '<a href="' . base_url($this->upload_dir . '/' . $row[$this->media_file_col]) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
            }

            $formatted[] = [
                $serial++,
                $actions,
                $row['philanthropist_name'],
                $row['sequence'],
                $view,
            ];
        }

        $total_records = $this->db->count_all($main_table);

        $this->db->select("$main_table.id")
            ->from($main_table)
            ->join($this->t_philanthropists . ' as p', "$main_table.title_id = p.id", 'left');

        if ($search_value !== '') {
            $this->db->group_start()
                ->like("$main_table.sequence", $search_value)
                ->or_like("p.eng_name", $search_value)
                ->group_end();
        }
        $total_filtered = $this->db->count_all_results();

        $response = array(
            "draw"            => (int) ($this->input->post('draw') ?? 0),
            "recordsTotal"    => $total_records,
            "recordsFiltered" => $total_filtered,
            "data"            => $formatted
        );

        echo json_encode($response);
    }

    private function _upload_image($field_name, $old_file = null, $custom_name = null)
    {
        $upload_path = FCPATH . $this->upload_dir;
        if (!is_dir($upload_path)) {
            @mkdir($upload_path, 0755, true);
        }


        if (!empty($old_file)) {
            $this->_try_unlink($old_file);
        }

        $ext  = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);
        $rand = substr(md5(microtime(true)), mt_rand(0, 26), 3);
        if ($custom_name !== null) {
            $new_name = $custom_name . '.' . strtolower($ext);
        } else {
            $new_name = date('YmdHis') . $rand . '.' . strtolower($ext);
        }

        $config = array(
            'upload_path'   => $upload_path,
            'allowed_types' => $this->allowed_images,
            'max_size'      => 30 * 1024, // 30 MB (KB)
            'file_name'     => $new_name,
        );

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field_name)) {
            return array( 'status' => false, 'error' => $this->upload->display_errors('', '') );
        }

        $saved = $this->upload->data('file_name');

        return array( 'status' => true, 'file_name' => $saved );
    }

    private function _try_unlink($filename)
    {
        $path = rtrim(FCPATH . $this->upload_dir, '/\\') . DIRECTORY_SEPARATOR . $filename;
        if (is_file($path)) {
            @unlink($path);
        }
    }

    // public function upload_csv()
    // {
    //     $file_path = FCPATH . 'assets/philanthropist.csv'; // csv file path

    //     if (!file_exists($file_path)) {
    //         echo "File not found!";
    //         return;
    //     }

    //     if (($handle = fopen($file_path, "r")) !== FALSE) {
    //         fgetcsv($handle);

    //         while (($row = fgetcsv($handle)) !== FALSE) {
    //             $name_guj = $row[1];
    //             $name_eng = $row[2];
    //             $company_guj = $row[3];
    //             $company_eng = $row[4];
    //             $city_guj = $row[5];
    //             $city_eng = $row[6];
    //             $category_guj = $row[7];
    //             $category_eng = $row[8];
    //             $zone_guj = $row[9];
    //             $zone_eng = $row[10];

    //             if ($this->check_philanthropist_exists($name_guj, $name_eng, $company_guj, $company_eng, $city_guj, $category_guj)) {
    //             }

    //             $city_id = $this->get_or_insert_city($city_guj, $city_eng);
    //             $category_id = $this->get_or_insert_category($category_guj, $category_eng);
    //             $zone_id = $this->get_or_insert_zone($zone_guj, $zone_eng);

    //             $philanthropist_data = [
    //                 'guj_name' => $name_guj,
    //                 'eng_name' => $name_eng,
    //                 'guj_company' => $company_guj,
    //                 'eng_company' => $company_eng,
    //                 'city_id' => $city_id,
    //                 'category_id' => $category_id,
    //                 'zone_id' => $zone_id,
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'updated_at' => date('Y-m-d H:i:s')
    //             ];

    //             $this->db->insert('philanthropist', $philanthropist_data);
    //         }

    //         fclose($handle);

    //         redirect(site_url('admin/New_philanthropist'), 'refresh');
    //     } else {
    //         echo "Error opening the file!";
    //     }
    // }

    // private function get_or_insert_city($guj_name, $eng_name)
    // {
    //     $query = $this->db->get_where('city', ['guj_name' => $guj_name, 'eng_name' => $eng_name]);
    //     if ($query->num_rows() > 0) {
    //         return $query->row()->id;
    //     } else {
    //         $this->db->insert('city', [
    //             'guj_name' => $guj_name,
    //             'eng_name' => $eng_name,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s')
    //         ]);
    //         return $this->db->insert_id();
    //     }
    // }

    // private function get_or_insert_category($guj_name, $eng_name)
    // {
    //     $query = $this->db->get_where('category', ['guj_name' => $guj_name, 'eng_name' => $eng_name]);
    //     if ($query->num_rows() > 0) {
    //         return $query->row()->id;
    //     } else {
    //         $this->db->insert('category', [
    //             'guj_name' => $guj_name,
    //             'eng_name' => $eng_name,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s')
    //         ]);
    //         return $this->db->insert_id();
    //     }
    // }

    // private function get_or_insert_zone($guj_name, $eng_name)
    // {
    //     $query = $this->db->get_where('zone', ['guj_name' => $guj_name]);
    //     if ($query->num_rows() > 0) {
    //         return $query->row()->id;
    //     } else {
    //         $this->db->insert('zone', [
    //             'guj_name' => $guj_name,
    //             'eng_name' => $eng_name
    //         ]);
    //         return $this->db->insert_id();
    //     }
    // }

    // private function check_philanthropist_exists($name_guj, $name_eng, $company_guj, $company_eng, $city_guj, $category_guj)
    // {
    //     $this->db->select('id');
    //     $this->db->from('philanthropist');
    //     $this->db->where('guj_name', $name_guj);
    //     $this->db->where('eng_name', $name_eng);
    //     $this->db->where('guj_company', $company_guj);
    //     $this->db->where('eng_company', $company_eng);
    //     $this->db->where('city_id', $city_guj);
    //     $this->db->where('category_id', $category_guj);
    //     $query = $this->db->get();

    //     return $query->num_rows() > 0;
    // }
}
