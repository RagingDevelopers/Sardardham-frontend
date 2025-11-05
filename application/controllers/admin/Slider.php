<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loginstatus') != 1 || $this->session->userdata('admin_id') == "" || $this->session->userdata('user_type') != "Admin") {
            $message = array('message' => "Your Session has Been Expired.!!", 'class' => 'danger');
            $this->session->set_flashdata('flash_message', $message);
            redirect(base_url('admin/login'), 'refresh');
        }
    }
    public function index()
    {
        $languages = $this->Language_model->get_language();
        $page_data['page_name'] = "slider";
        $page_data['page_title'] = "Slider";
        $page_data['languages'] = $languages;
        $page_data['data'] = $this->db->select('slider.*, language.name as language_name')->from('slider')->join('language', 'slider.language_id = language.id', 'left')->get()->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function create()
    {

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('language', 'Language', 'required');
        $this->form_validation->set_rules('sub_title', 'sub_title');
        // $this->form_validation->set_rules('photo', 'photo');
        // $this->form_validation->set_rules('pdf', 'Pdf', 'trim');
        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['title'] = $this->security->xss_clean($this->input->post('title'));
            $data['language_id'] = $this->security->xss_clean($this->input->post('language'));
            $data['sub_title'] = $this->security->xss_clean($this->input->post('sub_title'));

            // --- Upload helper function ---
            $upload_path = './upload/';
            $this->load->library('upload');

            // Desktop image
            if (!empty($_FILES['photo_desktop']['name'])) {
                $data['photo_desktop'] = $this->_upload_image('photo_desktop', $upload_path);
            }

            // Tablet image
            if (!empty($_FILES['photo_tablet']['name'])) {
                $data['photo_tablet'] = $this->_upload_image('photo_tablet', $upload_path);
            }

            // Mobile image
            if (!empty($_FILES['photo_mobile']['name'])) {
                $data['photo_mobile'] = $this->_upload_image('photo_mobile', $upload_path);
            }

            // if (!empty($_FILES['photo']['name'])) {
            //     $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            //     $rand = substr(md5(microtime()), rand(0, 26), 3);
            //     $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
            //     $config['upload_path'] = './upload';
            //     $config['allowed_types'] = '*';
            //     $config['file_name'] = $file_name;
            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
            //     //  $this->upload->do_upload('photo');
            //     if (!$this->upload->do_upload('photo')) //important!
            //     {
            //         // something went really wrong show error page
            //         $message = array('message' => $this->upload->display_errors()); //associate view variable $error with upload errors

            //         $this->session->set_flashdata('flash_message', $message);
            //         redirect(site_url('admin/slider'), 'refresh');
            //     }
            //     $data['photo'] = $file_name;
            // }

            $insert = $this->db->insert('slider', $data);

            $message = $insert
                ? array('message' => "Slider Created Successfully", 'class' => 'success')
                : array('message' => "Failed to Create Slider", 'class' => 'danger');
        }

        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/slider'), 'refresh');
    }
    public function edit($param = '')
    {
        $param = $this->security->xss_clean($param);
        $languages = $this->Language_model->get_language();
        $page_data['languages'] = $languages;
        $page_data['page_title'] = 'Slider';
        $page_data['page_name'] = 'slider';
        $page_data['row_data'] = $this->db->get_where('slider', array('id' => $param))->row_array();
        $page_data['data'] = $this->db->select('slider.*, language.name as language_name')->from('slider')->join('language', 'slider.language_id = language.id', 'left')->get()->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function update($param = '')
    {
        $param = $this->security->xss_clean($param);
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('language', 'Language', 'required');
        $this->form_validation->set_rules('sub_title', 'sub_title');

        // $this->form_validation->set_rules('photo', 'photo');
        // $this->form_validation->set_rules('pdf', 'Pdf', 'trim');

        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['title'] = $this->security->xss_clean($this->input->post('title'));
            $data['language_id'] = $this->security->xss_clean($this->input->post('language'));
            $data['sub_title'] = $this->security->xss_clean($this->input->post('sub_title'));

            $upload_path = './upload/';
            $this->load->library('upload');

            // Handle desktop image
            if (!empty($_FILES['photo_desktop']['name'])) {
                $old = $this->db->get_where('slider', ['id' => $param])->row('photo_desktop');
                if (!empty($old) && file_exists($upload_path . $old))
                    unlink($upload_path . $old);
                $data['photo_desktop'] = $this->_upload_image('photo_desktop', $upload_path);
            }

            // Handle tablet image
            if (!empty($_FILES['photo_tablet']['name'])) {
                $old = $this->db->get_where('slider', ['id' => $param])->row('photo_tablet');
                if (!empty($old) && file_exists($upload_path . $old))
                    unlink($upload_path . $old);
                $data['photo_tablet'] = $this->_upload_image('photo_tablet', $upload_path);
            }

            // Handle mobile image
            if (!empty($_FILES['photo_mobile']['name'])) {
                $old = $this->db->get_where('slider', ['id' => $param])->row('photo_mobile');
                if (!empty($old) && file_exists($upload_path . $old))
                    unlink($upload_path . $old);
                $data['photo_mobile'] = $this->_upload_image('photo_mobile', $upload_path);
            }

            // if (!empty($_FILES['photo']['name'])) {
            //     $row_data = $this->db->get_where('slider', array('id' => $param))->row('photo');
            //     if (!empty($row_data)) {
            //         unlink("./upload/" . $row_data);
            //     }
            //     $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            //     $rand = substr(md5(microtime()), rand(0, 26), 3);
            //     $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
            //     $config['upload_path'] = './upload';
            //     $config['file_name'] = $file_name;
            //     $config['allowed_types'] = '*';
            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
            //     $this->upload->do_upload('photo');
            //     $data['photo'] = $file_name;
            // }
            // if (!empty($_FILES['pdf']['name'])) {
            //     $row_data = $this->db->get_where('slider', array('id' => $param))->row('pdf');
            //     if (!empty($row_data)) {
            //         unlink("./upload/" . $row_data);
            //     }
            //     $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            //     $rand = substr(md5(microtime()), rand(0, 26), 3);
            //     $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
            //     $config['upload_path'] = './upload';
            //     $config['allowed_types'] = "pdf";
            //     $config['file_name'] = $file_name;
            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
            //     $this->upload->do_upload('pdf');
            //     $data['pdf'] = $file_name;
            // }
            $this->db->where('id', $param);
            $update = $this->db->update('slider', $data);
            $message = $update
                ? array('message' => "Slider Updated Successfully", 'class' => 'success')
                : array('message' => "Failed to Update Slider", 'class' => 'danger');

        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/slider'), 'refresh');
    }

    private function _upload_image($field_name, $upload_path)
    {
        $file_ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);
        $rand = substr(md5(microtime()), rand(0, 26), 3);
        $file_name = date('YmdHis') . $rand . '.' . $file_ext;

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['file_name'] = $file_name;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field_name)) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('flash_message', ['message' => $error, 'class' => 'danger']);
            redirect(site_url('admin/slider'), 'refresh');
        }

        return $file_name;
    }

    public function delete($param = '')
    {
        $row_data = $this->db->get_where('slider', array('id' => $param))->row('photo');
        if (!empty($row_data)) {
            unlink("./upload/" . $row_data);
        }
        $delete = $this->db->where('id', $param)->delete('slider');

        if (isset($delete)) {
            $message = array('message' => "Slider Delete Successfully", 'class' => 'success');
        } else {
            $message = array('message' => "Failed to Delete Slider", 'class' => 'danger');
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/slider'), 'refresh');
    }

    public function fetch_data()
    {
        // Define the main table name and controller name here
        $main_table = 'slider'; // Main table
        $controller_name = "admin/Slider"; // Controller name

        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term
        $language_filter = $this->input->post('language'); // Language filter

        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", null, 'language.name', "$main_table.title", "$main_table.sub_title", null];

        // Ensure the column index is within bounds
        if (isset($orderable_columns[$order_column])) {
            $order_column_name = $orderable_columns[$order_column];
        } else {
            // Fallback in case of an invalid column index
            $order_column_name = "$main_table.id"; // Default ordering column
        }

        // Start the query with a LEFT JOIN on the language table
        $this->db->select("$main_table.*, language.name as language")
            ->from($main_table)
            ->join('language', "$main_table.language_id = language.id", 'left');

        // Apply the language filter if selected
        if (!empty($language_filter)) {
            $this->db->where('language.id', $language_filter);
        }

        // Apply the search filter if any
        if (!empty($search_value)) {
            $this->db->group_start() // Start the grouping of LIKE clauses
                ->like("$main_table.title", $search_value)
                ->or_like('language.name', $search_value)
                ->group_end(); // End grouping
        }

        // Apply ordering only if a valid column is provided
        if (!empty($order_column_name)) {
            $this->db->order_by($order_column_name, $order_dir);
        }

        // Apply pagination
        $this->db->limit($length, $start);

        // Get the data
        $query = $this->db->get();
        $data = $query->result_array();

        // Prepare the data with Serial Number and Action buttons
        $formatted_data = [];
        $serial_number = $start + 1;
        foreach ($data as $row) {
            $row_data = [];
            $row_data[] = $serial_number++; // Serial Number

            // Actions (Edit/Delete)
            $edit_url = base_url($controller_name . '/edit/' . $row['id']);
            $delete_url = base_url($controller_name . '/delete/' . $row['id']);

            $actions = '
            <span class="text-nowrap">
                <a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                <a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')">
                    <i class="fa fa-trash"></i>
                </a>
            </span>';

            $row_data[] = $actions;

            // $action_buttons = '<span class="text-nowrap"><a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            // $action_buttons .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a></span>';
            // $row_data[] = $action_buttons;

            $row_data[] = $row['language']; // Language
            $row_data[] = $row['title']; // Title
            $row_data[] = $row['sub_title'];
            // $row_data[] = '<a href="' . base_url('upload/' . $row['photo']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Photo

            // --- Multiple Image Icons ---
            $desktop_icon = !empty($row['photo_desktop'])
                ? '<a href="' . base_url('upload/' . $row['photo_desktop']) . '" target="_blank" title="Desktop"><i class="fa fa-desktop"></i></a>'
                : '<i class="fa fa-ban text-muted" title="No Desktop Image"></i>';

            $tablet_icon = !empty($row['photo_tablet'])
                ? '<a href="' . base_url('upload/' . $row['photo_tablet']) . '" target="_blank" title="Tablet"><i class="fa fa-tablet"></i></a>'
                : '<i class="fa fa-ban text-muted" title="No Tablet Image"></i>';

            $mobile_icon = !empty($row['photo_mobile'])
                ? '<a href="' . base_url('upload/' . $row['photo_mobile']) . '" target="_blank" title="Mobile"><i class="fa fa-mobile"></i></a>'
                : '<i class="fa fa-ban text-muted" title="No Mobile Image"></i>';

            $image_links = '<span class="d-flex gap-2" style="font-size:18px;">'
                . $desktop_icon . ' &nbsp; ' . $tablet_icon . ' &nbsp; ' . $mobile_icon .
                '</span>';

            $row_data[] = $image_links;

            $formatted_data[] = $row_data;
        }

        // Get total records and total filtered records
        $total_records = $this->db->count_all($main_table);

        $this->db->select("$main_table.id")
            ->from($main_table)
            ->join('language', "$main_table.language_id = language.id", 'left');

        if (!empty($language_filter)) {
            $this->db->where('language.id', $language_filter);
        }

        if (!empty($search_value)) {
            $this->db->group_start()
                ->like("$main_table.title", $search_value)
                ->or_like('language.name', $search_value)
                ->group_end();
        }
        $total_filtered = $this->db->count_all_results();

        // Return the result in JSON format
        $response = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_filtered,
            "data" => $formatted_data
        );

        echo json_encode($response);
    }
}