<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('loginstatus')!= 1 || $this->session->userdata('admin_id')=="" || $this->session->userdata('user_type') !="Admin") {
            $message = array('message'=>"Your Session has Been Expired.!!", 'class'=>'danger');
            $this->session->set_flashdata('flash_message',$message);
            redirect(base_url('admin/login'),'refresh');
        }
    }
	public function index() {
	    $page_data['page_name'] = "contact";
        $page_data['page_title'] = "Contact";
    
        $this->load->view('admin/common',$page_data);
	}
	
	public function fetch_data() {
        // Define the main table name and controller name here
        $main_table = 'contact'; // Main table
        $controller_name = "admin/contact"; // Controller name
        
        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term
    
        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", "$main_table.name", "$main_table.email", "$main_table.mobile","$main_table.subject","$main_table.message","department.eng_name"];
    
        // Ensure the column index is within bounds
        if (isset($orderable_columns[$order_column])) {
            $order_column_name = $orderable_columns[$order_column];
        } else {
            // Fallback in case of an invalid column index
            $order_column_name = "$main_table.id"; // Default ordering column
        }
    
        // Start the query with a LEFT JOIN on the language table
        $this->db->select("$main_table.*,department.eng_name as eng_name")
                 ->from($main_table)
                 ->join('department', "$main_table.department_id = department.id", 'left');
    
        // Apply the search filter if any
        if (!empty($search_value)) {
            $this->db->group_start() // Start the grouping of LIKE clauses
                     ->like("$main_table.name", $search_value)
                     ->or_like('department.eng_name', $search_value)
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
            $row_data[] = $row['name']; 
            $row_data[] = $row['email'];
            $row_data[] = $row['mobile'];
            $row_data[] = $row['subject'];
            $row_data[] = $row['message'];
            $row_data[] = $row['eng_name'];
            $formatted_data[] = $row_data;
        }
    
        // Get total records and total filtered records
        $total_records = $this->db->count_all($main_table);
    
        $this->db->select("$main_table.id")
                 ->from($main_table)
                 ->join('department', "$main_table.department_id = department.id", 'left');
                 
        if (!empty($search_value)) {
            $this->db->group_start()
                     ->like("$main_table.name", $search_value)
                     ->or_like("$main_table.email", $search_value)
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