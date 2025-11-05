<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Philanthropist extends CI_Controller
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
        $page_data['page_name'] = "manage_pdf";
        $page_data['page_title'] = "Philanthropist";
        $page_data['data'] = $this->db->get('manage_pdf')->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function create()
    {
        $this->form_validation->set_rules('eng_title', 'English Title', 'trim|required');
        $this->form_validation->set_rules('guj_title', 'Gujarati Title', 'trim|required');
        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
            redirect(site_url('admin/philanthropist'), 'refresh');
        } else {
            $data['eng_title'] = $this->security->xss_clean($this->input->post('eng_title'));
            $data['guj_title'] = $this->security->xss_clean($this->input->post('guj_title'));
            if (!empty($_FILES['pdf']['name'])) {
                $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()), rand(0, 26), 3);
                $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = "pdf";
                $config['max_size'] = 1024 * 30;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pdf');
                $data['pdf'] = $file_name;
            }
            $insert = $this->db->insert('manage_pdf', $data);
            if (isset($insert)) {
                $message = array('message' => "Philanthropist Created Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Create Philanthropist", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/philanthropist'), 'refresh');
    }
    public function edit($param = '')
    {
        $param = $this->security->xss_clean($param);
        $page_data['page_title'] = 'manage_pdf';
        $page_data['page_name'] = 'manage_pdf';
        $page_data['row_data'] = $this->db->get_where('manage_pdf', array('id' => $param))->row_array();
        $page_data['data'] = $this->db->get('manage_pdf')->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function update($param = '')
    {

        $param = $this->security->xss_clean($param);
        $this->form_validation->set_rules('eng_title', 'English Title', 'trim|required');
        $this->form_validation->set_rules('guj_title', 'Gujarati Title', 'trim|required');
        $this->form_validation->set_rules('pdf', 'Pdf', 'trim');

        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['eng_title'] = $this->security->xss_clean($this->input->post('eng_title'));
            $data['guj_title'] = $this->security->xss_clean($this->input->post('guj_title'));
            if (!empty($_FILES['pdf']['name'])) {
                $row_data = $this->db->get_where('manage_pdf', array('id' => $param))->row('pdf');
                if (!empty($row_data)) {
                    unlink("./upload/" . $row_data);
                }
                $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()), rand(0, 26), 3);
                $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = "pdf";
                $config['max_size'] = 1024 * 30;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pdf');
                $data['pdf'] = $file_name;
            }
            $this->db->where('id', $param);
            $update = $this->db->update('manage_pdf', $data);
            if (isset($update)) {
                $message = array('message' => "manage_pdf Updated Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Update manage_pdf", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/philanthropist'), 'refresh');
    }
    public function delete($param = '')
    {
        $row_data = $this->db->get_where('manage_pdf', array('id' => $param))->row('pdf');
        if (!empty($row_data)) {
            unlink("./upload/" . $row_data);
        }
        $delete = $this->db->where('id', $param)->delete('manage_pdf');

        if (isset($delete)) {
            $message = array('message' => "manage_pdf Delete Successfully", 'class' => 'success');
        } else {
            $message = array('message' => "Failed to Delete manage_pdf", 'class' => 'danger');
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/philanthropist'), 'refresh');
    }
    public function add_img()
    {
        $page_data['page_name'] = "add_img";
        $page_data['page_title'] = "add img";

        $this->db->select('add_img.*,manage_pdf.eng_title as title_id');
        $this->db->from('add_img');
        $this->db->join('manage_pdf', 'add_img.title_id = manage_pdf.id', 'left');
        $page_data['data'] = $this->db->get()->result_array();
        $page_data['pdf'] = $this->db->get('manage_pdf')->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function insert()
    {

        $this->form_validation->set_rules('sequence', 'sequence', 'trim|required');

        if ($this->form_validation->run() == false) {

            $message = array('message' => (validation_errors()), 'class' => 'danger');
            redirect(site_url('admin/philanthropist/add_img'), 'refresh');
        } else {
            $data['title_id'] = $this->security->xss_clean($this->input->post('slider_id'));
            $data['sequence'] = $this->security->xss_clean($this->input->post('sequence'));
            if (!empty($_FILES['photo']['name'])) {
                $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()), rand(0, 26), 3);
                $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = '*';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('photo');
                $data['photo'] = $file_name;
            }
            $insert = $this->db->insert('add_img', $data);
            if (isset($insert)) {
                $message = array('message' => "Philanthropist Created Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Create Philanthropist", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/philanthropist/add_img'), 'refresh');
    }
    public function data_edit($param = '')
    {
        $param = $this->security->xss_clean($param);
        $page_data['page_title'] = 'add img';
        $page_data['page_name'] = 'add_img';
        $page_data['row_data'] = $this->db->get_where('add_img', array('id' => $param))->row_array();
        $page_data['data'] = $this->db->get('add_img')->result_array();
        $page_data['pdf'] = $this->db->get('manage_pdf')->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function data_update($param = '')
    {

        $param = $this->security->xss_clean($param);
        $this->form_validation->set_rules('sequence', 'sequence', 'trim|required');

        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['title_id'] = $this->security->xss_clean($this->input->post('slider_id'));
            $data['sequence'] = $this->security->xss_clean($this->input->post('sequence'));
            if (!empty($_FILES['photo']['name'])) {
                $row_data = $this->db->get_where('add_img', array('id' => $param))->row('photo');
                if (!empty($row_data)) {
                    unlink("./upload/" . $row_data);
                }
                $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()), rand(0, 26), 3);
                $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = '*';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('photo');
                $data['photo'] = $file_name;
            }
            $this->db->where('id', $param);
            $update = $this->db->update('add_img', $data);
            if (isset($update)) {
                $message = array('message' => "add_img Updated Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Update add_img", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/philanthropist/add_img'), 'refresh');
    }
    public function data_delete($param = '')
    {
        $row_data = $this->db->get_where('add_img', array('id' => $param))->row('photo');
        if (!empty($row_data)) {
            unlink("./upload/" . $row_data);
        }
        $delete = $this->db->where('id', $param)->delete('add_img');

        if (isset($delete)) {
            $message = array('message' => "add_img Delete Successfully", 'class' => 'success');
        } else {
            $message = array('message' => "Failed to Delete add_img", 'class' => 'danger');
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/philanthropist/add_img'), 'refresh');
    }

    public function fetch_data()
    {
        // Define the main table name and controller name here
        $main_table = 'manage_pdf'; // Main table
        $controller_name = "admin/Philanthropist"; // Controller name

        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term

        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", null, "$main_table.eng_title", "$main_table.guj_title", null];

        // Ensure the column index is within bounds
        if (isset($orderable_columns[$order_column])) {
            $order_column_name = $orderable_columns[$order_column];
        } else {
            // Fallback in case of an invalid column index
            $order_column_name = "$main_table.id"; // Default ordering column
        }

        // Start the query with a LEFT JOIN on the language table
        $this->db->select("$main_table.*")
            ->from($main_table);

        // Apply the search filter if any
        if (!empty($search_value)) {
            $this->db->group_start() // Start the grouping of LIKE clauses
                ->like("$main_table.eng_title", $search_value)
                ->or_like('documentary.guj_title', $search_value)
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
            $action_buttons = '<a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $action_buttons .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a>';
            $row_data[] = $action_buttons;

            $row_data[] = $row['eng_title'];
            $row_data[] = $row['guj_title'];
            $row_data[] = '<a href="' . base_url('upload/' . $row['pdf']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Pdf

            $formatted_data[] = $row_data;
        }

        // Get total records and total filtered records
        $total_records = $this->db->count_all($main_table);

        $this->db->select("$main_table.id")
            ->from($main_table);

        if (!empty($search_value)) {
            $this->db->group_start()
                ->like("$main_table.eng_title", $search_value)
                ->or_like("$main_table.guj_title", $search_value)
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

    public function get_data()
    {
        // Define the main table name and controller name here
        $main_table = 'add_img'; // Main table
        $controller_name = "admin/Philanthropist"; // Controller name

        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term

        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", null, "$main_table.eng_title", "$main_table.sequence", null];

        // Ensure the column index is within bounds
        if (isset($orderable_columns[$order_column])) {
            $order_column_name = $orderable_columns[$order_column];
        } else {
            // Fallback in case of an invalid column index
            $order_column_name = "$main_table.id"; // Default ordering column
        }

        // Start the query with a LEFT JOIN on the language table
        $this->db->select("$main_table.*,manage_pdf.eng_title as eng_title")
            ->from($main_table)
            ->join('manage_pdf', "$main_table.title_id = manage_pdf.id", 'left');

        // Apply the search filter if any
        if (!empty($search_value)) {
            $this->db->group_start() // Start the grouping of LIKE clauses
                ->like("$main_table.sequence", $search_value)
                ->or_like('manage_pdf.eng_title', $search_value)
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
            $edit_url = base_url($controller_name . '/data_edit/' . $row['id']);
            $delete_url = base_url($controller_name . '/data_delete/' . $row['id']);
            $action_buttons = '<a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $action_buttons .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a>';
            $row_data[] = $action_buttons;

            $row_data[] = $row['eng_title'];
            $row_data[] = $row['sequence'];
            $row_data[] = '<a href="' . base_url('upload/' . $row['photo']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Pdf

            $formatted_data[] = $row_data;
        }

        // Get total records and total filtered records
        $total_records = $this->db->count_all($main_table);

        $this->db->select("$main_table.id,manage_pdf.eng_title as eng_title")
            ->from($main_table)
            ->join('manage_pdf', "$main_table.title_id = manage_pdf.id", 'left');

        if (!empty($search_value)) {
            $this->db->group_start()
                ->like("$main_table.sequence", $search_value)
                ->or_like("manage_pdf.eng_title", $search_value)
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