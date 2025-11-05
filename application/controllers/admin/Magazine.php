<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('loginstatus')!= 1 || $this->session->userdata('admin_id')=="" || $this->session->userdata('user_type') !="Admin") {
            $message = array('message'=>"Your Session has Been Expired.!!", 'class'=>'danger');
            $this->session->set_flashdata('flash_message',$message);
            redirect(base_url('admin/login'),'refresh');
        }
    }
	public function index() {
	    $page_data['page_name'] = "magazine";
        $page_data['page_title'] = "Magazine";
        $page_data['data'] = $this->db->order_by('id','desc')->get('magazine')->result_array();
        $this->load->view('admin/common',$page_data);
	}
	public function create(){
	    $this->form_validation->set_rules('eng_title', 'English Title', 'trim|required');
	    $this->form_validation->set_rules('guj_title', 'Gujarati Title', 'trim|required');
	    $this->form_validation->set_rules('eng_year', 'English Year', 'trim|required');
	    $this->form_validation->set_rules('guj_year', 'Gujarati Year', 'trim|required');
	    
        if($this->form_validation->run() == false){
            $message = array('message'=>(validation_errors()), 'class'=>'danger');
            redirect(site_url('admin/magazine'),'refresh');
        }else{
            $data['eng_title'] = $this->security->xss_clean($this->input->post('eng_title'));
            $data['guj_title'] = $this->security->xss_clean($this->input->post('guj_title'));
            $data['eng_year'] = $this->security->xss_clean($this->input->post('eng_year'));
            $data['guj_year'] = $this->security->xss_clean($this->input->post('guj_year'));
        if(!empty($_FILES['photo']['name'])) {
            $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $rand = substr(md5(microtime()),rand(0,26),3);
            $file_name = date('Ymdhis').$rand.'.'.$file_ext;
            $config['upload_path'] = './upload';
            $config['allowed_types'] = '*';
            $config['file_name'] = $file_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('photo');
            $data['photo'] = $file_name;
        }
         if(!empty($_FILES['pdf']['name'])) {
            $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $rand = substr(md5(microtime()),rand(0,26),3);
            $file_name = date('Ymdhis').$rand.'.'.$file_ext;
            $config['upload_path'] = './upload';
            $config['allowed_types'] = "pdf";
             $config['max_size'] = 1024 *100; 
            $config['file_name'] = $file_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('pdf');
            $data['pdf'] = $file_name;
        }
            $insert = $this->db->insert('magazine',$data);          
            if(isset($insert)){
                $message = array('message'=>"Magazine Created Successfully", 'class'=>'success');
            }else{
                $message = array('message'=>"Failed to Create Magazine", 'class'=>'danger');
            }
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/magazine'),'refresh');
	}
	public function edit($param=''){
        $param=$this->security->xss_clean($param);
        $page_data['page_title'] = 'Magazine';
        $page_data['page_name'] = 'magazine';
        $page_data['row_data']  =   $this->db->get_where('magazine',array('id'=>$param))->row_array();
        $page_data['data'] = $this->db->order_by('id','desc')->get('magazine')->result_array();
        $this->load->view('admin/common', $page_data);
	}
	public function update($param=''){
	    
	    $param = $this->security->xss_clean($param);
	    $this->form_validation->set_rules('eng_title', 'English Title', 'trim|required');
	    $this->form_validation->set_rules('guj_title', 'Gujarati Title', 'trim|required');
	    $this->form_validation->set_rules('eng_year', 'English Year', 'trim|required');
	    $this->form_validation->set_rules('guj_year', 'Gujarati Year', 'trim|required');
	    $this->form_validation->set_rules('photo', 'photo');
	    $this->form_validation->set_rules('pdf', 'Pdf', 'trim');
	    
        if($this->form_validation->run() == false){
            $message = array('message'=>(validation_errors()), 'class'=>'danger');
        }else{
            $data['eng_title'] = $this->security->xss_clean($this->input->post('eng_title'));
            $data['guj_title'] = $this->security->xss_clean($this->input->post('guj_title'));
            $data['eng_year'] = $this->security->xss_clean($this->input->post('eng_year'));
            $data['guj_year'] = $this->security->xss_clean($this->input->post('guj_year'));
            if(!empty($_FILES['photo']['name'])) {
                $row_data  =  $this->db->get_where('magazine',array('id'=>$param))->row('photo');
        	    if(!empty($row_data)) {
        	        unlink("./upload/" . $row_data);
                }
                $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()),rand(0,26),3);
                $file_name = date('Ymdhis').$rand.'.'.$file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = '*';
                // $config['max_size'] = 1024 * 30; 
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('photo');
                $data['photo'] = $file_name;
            }
            if(!empty($_FILES['pdf']['name'])) {
                $row_data  =  $this->db->get_where('magazine',array('id'=>$param))->row('pdf');
        	    if(!empty($row_data)) {
        	        unlink("./upload/" . $row_data);
                }
                $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()),rand(0,26),3);
                $file_name = date('Ymdhis').$rand.'.'.$file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = "pdf";
                 $config['max_size'] = 1024 *100; 
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pdf');
                $data['pdf'] = $file_name;
            }
            $this->db->where('id',$param);
	        $update = $this->db->update('magazine',$data);
	        if(isset($update)){
                $message = array('message'=>"Magazine Updated Successfully", 'class'=>'success');
            }else{
                $message = array('message'=>"Failed to Update Magazine", 'class'=>'danger');
            }
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/magazine'),'refresh');
	}
    public function delete($param='')
	{
	    $row_data  =  $this->db->get_where('magazine',array('id'=>$param))->row('image');
	    if(!empty($row_data)) {
	        unlink("./upload/" . $row_data);
        }
        $delete = $this->db->where('id', $param)->delete('magazine');
        
        if(isset($delete)){
            $message = array('message'=>"Magazine Delete Successfully", 'class'=>'success');
        }else{
            $message = array('message'=>"Failed to Delete Magazine", 'class'=>'danger');
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/magazine'),'refresh');
	}
	
	public function fetch_data() {
        // Define the main table name and controller name here
        $main_table = 'magazine'; // Main table
        $controller_name = "admin/Magazine"; // Controller name
        
        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term
    
        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", null, "$main_table.eng_title", "$main_table.guj_title","$main_table.eng_year", "$main_table.guj_year",null,null];
    
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
            $edit_url = base_url($controller_name.'/edit/' . $row['id']);
            $delete_url = base_url($controller_name.'/delete/' . $row['id']);
            $action_buttons = '<a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $action_buttons .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a>';
            $row_data[] = $action_buttons;
    
            $row_data[] = $row['eng_title']; 
            $row_data[] = $row['guj_title'];
            $row_data[] = $row['eng_year']; 
            $row_data[] = $row['guj_year'];
            $row_data[] = '<a href="' . base_url('upload/' . $row['photo']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Photo
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
}