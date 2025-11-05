<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Main function to fetch the data for DataTable
    public function get_datatable() {
        $table = $this->input->post('table'); // Main table (e.g., 'documentary')
        $columns = $this->input->post('columns'); // Column list from frontend
        $column_types = $this->input->post('column_types'); // Column types (image, text)
        $controller_path = $this->input->post('controller_path'); // Controller for edit/delete actions

        // Fetch other DataTable parameters
        $start = $this->input->post('start'); // Pagination start
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column_index = $this->input->post('order')[0]['column']; // Column index for sorting
        $order_by_column = $columns[$order_column_index]; // Column name for sorting
        $order_by_direction = $this->input->post('order')[0]['dir']; // Sorting direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search value
        $language_filter = $this->input->post('language'); // Optional language filter

        // Check if the language column is included in the report
        $join_language_table = in_array('language_name', $columns);

        // Fetch filtered data with JOIN if needed
        $data = $this->get_filtered_data($table, $columns, $column_types, $start, $length, $order_by_column, $order_by_direction, $search_value, $language_filter, $join_language_table);
        
        // Get total records (before filtering)
        $total_records = $this->get_total_records($table, $join_language_table);

        // Get filtered records count
        $filtered_records = $this->get_total_records($table, $join_language_table, $search_value, $language_filter);

        // Prepare data for DataTables (with serial numbers and action buttons)
        $datatable_data = $this->prepare_datatable_data($data, $columns, $column_types, $controller_path, $start);

        // Return JSON data
        return json_encode([
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $filtered_records,
            "data" => $datatable_data
        ]);
    }

    // Fetch data from the database with optional JOIN on `language`
    private function get_filtered_data($table, $columns, $column_types, $start, $length, $order_by_column, $order_by_direction, $search_value = '', $language_filter = '', $join_language_table = false) {
        $this->db->select($columns);  // Select columns from main table

        // Main table
        $this->db->from($table);

        // Join the `language` table if necessary
        if ($join_language_table) {
            $this->db->join('language', "$table.language_id = language.id", 'left');  // Adjust table and join condition
            $this->db->select('language.name as language_name');  // Select `language.name` as `language_name`
        }

        // Apply search filter
        if (!empty($search_value)) {
            foreach ($columns as $column) {
                $this->db->or_like($column, $search_value);
            }
        }

        // Apply language filter (if any)
        if (!empty($language_filter)) {
            $this->db->where('language_column', $language_filter); 
        }

        // Apply ordering
        $this->db->order_by($order_by_column, $order_by_direction);

        // Apply pagination
        $this->db->limit($length, $start);

        $query = $this->db->get();
        return $query->result_array();
    }

    // Get total record count
    private function get_total_records($table, $join_language_table = false, $search_value = '', $language_filter = '') {
        $this->db->from($table);

        // Join the `language` table if needed
        if ($join_language_table) {
            $this->db->join('language', "$table.language_id = language.id", 'left');
        }

        // Apply search filter
        if (!empty($search_value)) {
            foreach ($this->input->post('columns') as $column) {
                $this->db->or_like($column, $search_value);
            }
        }

        // Apply language filter
        if (!empty($language_filter)) {
            $this->db->where('language_column', $language_filter);
        }

        return $this->db->count_all_results();
    }

    // Prepare DataTable data with serial number and action buttons
    private function prepare_datatable_data($data, $columns, $column_types, $controller_path, $start) {
        $datatable_data = [];
        $serial_number = $start + 1;  // Initialize serial number

        foreach ($data as $row) {
            $temp = [];
            $temp[] = $serial_number++;  // Add serial number

            foreach ($columns as $key => $column) {
                if ($column_types[$key] == 'image') {
                    $temp[] = '<a href="' . base_url($row[$column]) . '" target="_blank"><i class="fa fa-eye"></i></a>';
                } else {
                    $temp[] = $row[$column];
                }
            }

            // Add action buttons (edit and delete)
            $edit_url = base_url($controller_path . "/edit/" . $row['id']);
            $delete_url = base_url($controller_path . "/delete/" . $row['id']);

            $action_buttons = '<a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $action_buttons .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';

            // Append action buttons
            $temp[] = $action_buttons;

            $datatable_data[] = $temp;
        }
        return $datatable_data;
    }
}
