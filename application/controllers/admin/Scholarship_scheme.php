<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scholarship_scheme extends CI_Controller
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
        $page_data['page_name'] = "scholarship_scheme";
        $page_data['page_title'] = "Scholarship Scheme";
        $page_data['languages'] = $languages;
        $this->load->view('admin/common', $page_data);
    }
    public function create()
    {
        $this->form_validation->set_rules('language_id', 'Language', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        // $this->form_validation->set_rules('photo', 'Photo', 'required');

        if ($this->form_validation->run() == false) {
            // print_r($this->input->post());exit;
            $message = array('message' => (validation_errors()), 'class' => 'danger');
            redirect(site_url('admin/Scholarship_scheme'), 'refresh');
        } else {
            $data['language_id'] = $this->security->xss_clean($this->input->post('language_id'));
            $data['description'] = $this->security->xss_clean($this->input->post('description'));

            $insert = $this->db->insert('scholarship_scheme', $data);
            if (isset($insert)) {
                $message = array('message' => "Scholarship Scheme Created Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Create Scholarship Scheme", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/Scholarship_scheme'), 'refresh');
    }
    public function edit($param = '')
    {
        $param = $this->security->xss_clean($param);
        $languages = $this->Language_model->get_language();
        $page_data['page_title'] = 'Scholarship Scheme';
        $page_data['page_name'] = 'scholarship_scheme';
        $page_data['languages'] = $languages;
        $page_data['row_data'] = $this->db->get_where('scholarship_scheme', array('id' => $param))->row_array();
        $this->load->view('admin/common', $page_data);
    }
    public function update($param = '')
    {

        $param = $this->security->xss_clean($param);
        $this->form_validation->set_rules('language_id', 'Language', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['language_id'] = $this->security->xss_clean($this->input->post('language_id'));
            $data['description'] = $this->security->xss_clean($this->input->post('description'));

            $this->db->where('id', $param);
            $update = $this->db->update('scholarship_scheme', $data);
            if (isset($update)) {
                $message = array('message' => "Scholarship Scheme Updated Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Update Scholarship Scheme", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/Scholarship_scheme'), 'refresh');
    }
    public function delete($param = '')
    {

        $delete = $this->db->where('id', $param)->delete('scholarship_scheme');

        if (isset($delete)) {
            $message = array('message' => "Scholoarship Scheme Delete Successfully", 'class' => 'success');
        } else {
            $message = array('message' => "Failed to Delete Scholoarship Scheme", 'class' => 'danger');
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/Scholarship_scheme'), 'refresh');
    }

    public function fetch_data()
    {
        // Define the main table name and controller name here
        $main_table = 'scholarship_scheme'; // Main table
        $controller_name = "admin/Scholarship_scheme"; // Controller name

        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term
        $language_filter = $this->input->post('language');

        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", null, "language.name", "$main_table.description"];

        // Ensure the column index is within bounds
        if (isset($orderable_columns[$order_column])) {
            $order_column_name = $orderable_columns[$order_column];
        } else {
            // Fallback in case of an invalid column index
            $order_column_name = "$main_table.id"; // Default ordering column
        }

        // Start the query with a LEFT JOIN on the language table
        $this->db->select("$main_table.*,language.name as language")
            ->from($main_table)
            ->join('language', "$main_table.language_id = language.id", 'left');

        if (!empty($language_filter)) {
            $this->db->where('language.id', $language_filter);
        }

        // Apply the search filter if any
        if (!empty($search_value)) {
            $this->db->group_start() // Start the grouping of LIKE clauses
                ->like("$main_table.description", $search_value)
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
            $action_buttons = '<span class="text-nowrap"><a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $action_buttons .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a></span>';
            $row_data[] = $action_buttons;

            $row_data[] = $row['language'];
            $row_data[] = $row['description'];

            $formatted_data[] = $row_data;
        }

        // Get total records and total filtered records
        $total_records = $this->db->count_all($main_table);

        $this->db->select("$main_table.id,language.name as language")
            ->from($main_table)
            ->join('language', "$main_table.language_id = language.id", 'left');

        if (!empty($language_filter)) {
            $this->db->where('language.id', $language_filter);
        }

        if (!empty($search_value)) {
            $this->db->group_start()
                ->like("$main_table.description", $search_value)
                ->or_like("language.name", $search_value)
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