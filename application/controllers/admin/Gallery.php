<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('loginstatus')!= 1 || $this->session->userdata('admin_id')=="" || $this->session->userdata('user_type') !="Admin") {
            $message = array('message'=>"Your Session has Been Expired.!!", 'class'=>'danger');
            $this->session->set_flashdata('flash_message',$message);
            redirect(base_url('admin/login'),'refresh');
        }
    }
	public function index() {
	    $page_data['page_name'] = "gallery";
        $page_data['page_title'] = "Gallery";
        $page_data['data'] = $this->db->get('gallery')->result_array();
        $this->load->view('admin/common',$page_data);
	}
		public function gallery_img() {
	    $page_data['page_name'] = "gallery_img";
        $page_data['page_title'] = "gallery img";
        
        $this->db->select('gallery_img.*,gallery.eng_title as gallery_id');
        $this->db->from('gallery_img');
        $this->db->join('gallery','gallery_img.gallery_id = gallery.id','left');
        $page_data['data'] = $this->db->get()->result_array();
        $page_data['pdf'] = $this->db->get('gallery')->result_array();
        $this->load->view('admin/common',$page_data);
	}
	public function create(){
	    $this->form_validation->set_rules('eng_year', 'English Year', 'trim|required');
	    $this->form_validation->set_rules('guj_year', 'Gujarati Year', 'trim|required');
        $this->form_validation->set_rules('eng_title', 'English Title', 'trim|required');
        $this->form_validation->set_rules('guj_title', 'Gujarati Title', 'trim|required');
        $this->form_validation->set_rules('eng_full_title', 'Full Title English', 'trim|required');
        $this->form_validation->set_rules('guj_full_title', 'Full Title Gujarati', 'trim|required');
        $this->form_validation->set_rules('pdf', 'PDF', 'trim');
    if($this->form_validation->run() == false){
        $message = array('message'=>(validation_errors()), 'class'=>'danger');
        redirect(site_url('admin/gallery'),'refresh');
    }else{
        $data['eng_year'] = $this->security->xss_clean($this->input->post('eng_year'));
        $data['guj_year'] = $this->security->xss_clean($this->input->post('guj_year'));
        $data['eng_title'] = $this->security->xss_clean($this->input->post('eng_title'));
        $data['guj_title'] = $this->security->xss_clean($this->input->post('guj_title'));
        $data['eng_full_title'] = $this->security->xss_clean($this->input->post('eng_full_title'));
        $data['guj_full_title'] = $this->security->xss_clean($this->input->post('guj_full_title'));
        if(!empty($_FILES['pdf']['name'])) {
            $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $rand = substr(md5(microtime()),rand(0,26),3);
            $file_name = date('Ymdhis').$rand.'.'.$file_ext;
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg';
            $config['file_name'] = $file_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('pdf');
            $data['pdf'] = $file_name;
        }
        $insert = $this->db->insert('gallery',$data);          
        if(isset($insert)){
            $message = array('message'=>"gallery Created Successfully", 'class'=>'success');
        }else{
            $message = array('message'=>"Failed to Create gallery", 'class'=>'danger');
        }
    }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/gallery'),'refresh');
	}
	public function edit($param=''){
        $param=$this->security->xss_clean($param);
        $page_data['page_title'] = 'gallery';
        $page_data['page_name'] = 'gallery';
        $page_data['row_data']  =   $this->db->get_where('gallery',array('id'=>$param))->row_array();
        $page_data['data'] = $this->db->get('gallery')->result_array();
        $this->load->view('admin/common', $page_data);
	}
	public function update($param=''){
	    
	    $param = $this->security->xss_clean($param);
	    $this->form_validation->set_rules('eng_year', 'English Year', 'trim|required');
	    $this->form_validation->set_rules('guj_year', 'Gujarati Year', 'trim|required');
        $this->form_validation->set_rules('eng_title', 'English Title', 'trim|required');
        $this->form_validation->set_rules('guj_title', 'Gujarati Title', 'trim|required');
        $this->form_validation->set_rules('eng_full_title', 'Full Title English', 'trim|required');
        $this->form_validation->set_rules('guj_full_title', 'Full Title Gujarati', 'trim|required');
        $this->form_validation->set_rules('pdf', 'PDF', 'trim');
        if($this->form_validation->run() == false){
            $message = array('message'=>(validation_errors()), 'class'=>'danger');
        }else{
            $data['eng_year'] = $this->security->xss_clean($this->input->post('eng_year'));
            $data['guj_year'] = $this->security->xss_clean($this->input->post('guj_year'));
            $data['eng_title'] = $this->security->xss_clean($this->input->post('eng_title'));
            $data['guj_title'] = $this->security->xss_clean($this->input->post('guj_title'));
            $data['eng_full_title'] = $this->security->xss_clean($this->input->post('eng_full_title'));
            $data['guj_full_title'] = $this->security->xss_clean($this->input->post('guj_full_title'));
            if(!empty($_FILES['pdf']['name'])) {
                 $row_data  =  $this->db->get_where('gallery',array('id'=>$param))->row('pdf');
        	    if(!empty($row_data)) {
        	        unlink("./upload/" . $row_data);
                }
                $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()),rand(0,26),3);
                $file_name = date('Ymdhis').$rand.'.'.$file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pdf');
                $data['pdf'] = $file_name;
            }
            $this->db->where('id',$param);
	        $update = $this->db->update('gallery',$data);
	        if(isset($update)){
                $message = array('message'=>"gallery Updated Successfully", 'class'=>'success');
            }else{
                $message = array('message'=>"Failed to Update gallery", 'class'=>'danger');
            }
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/gallery'),'refresh');
	}
    public function delete($param='')
	{
	     $row_data  =  $this->db->get_where('gallery',array('id'=>$param))->row('pdf');
	    if(!empty($row_data)) {
	        unlink("./upload/" . $row_data);
        }
        $delete = $this->db->where('id', $param)->delete('gallery');
        if(isset($delete)){
            $message = array('message'=>"gallery Delete Successfully", 'class'=>'success');
        }else{
            $message = array('message'=>"Failed to Delete gallery", 'class'=>'danger');
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/gallery'),'refresh');
	}
    public function insert(){
        
    $this->form_validation->set_rules('slider_id', 'slider_id', 'trim|required');
   
    if($this->form_validation->run() == false){
       
        $message = array('message'=>(validation_errors()), 'class'=>'danger');
        redirect(site_url('admin/gallery/gallery_img'),'refresh');
    }else{
        $data['gallery_id'] = $this->security->xss_clean($this->input->post('slider_id'));
        
        $count = count($_FILES['photo']['name']);
        for($i=0;$i<$count;$i++){
    
            if(!empty($_FILES['photo']['name'][$i])){
              $fileExt = pathinfo($_FILES["photo"]["name"][$i], PATHINFO_EXTENSION);
              $rand = substr(md5(microtime()),rand(0,26),3);
              $_FILES['file']['name'] =time().'_'.$rand.'_photo.'.$fileExt;  
              $_FILES['file']['type'] = $_FILES['photo']['type'][$i];
              $_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
              $_FILES['file']['error'] = $_FILES['photo']['error'][$i];
              $_FILES['file']['size'] = $_FILES['photo']['size'][$i];
      
              $config['upload_path'] = 'upload/'; 
              $config['allowed_types'] = 'jpg|jpeg|png';
              $config['max_size'] = '4000';
              $config['remove_spaces'] = FALSE;
              
       
              $this->load->library('upload'); 
              $this->upload->initialize($config);
              
               
               if(!$this->upload->do_upload('file')){
                              
                    }else{
                        $data_in = array('gallery_id'=>$data['gallery_id'],'photo'=>$_FILES['file']['name']);
                        $insert = $this->db->insert('gallery_img',$data_in);
                    }
            
            
                }
        }     


        if(isset($insert)){
            $message = array('message'=>"gallery Created Successfully", 'class'=>'success');
        }else{
            $message = array('message'=>"Failed to Create gallery", 'class'=>'danger');
        }
    }
        $this->session->set_flashdata('flash_message',$message);
        redirect(base_url('admin/gallery/gallery_img'),'refresh');
	}
		public function data_edit($param=''){
         $param=$this->security->xss_clean($param);
        $page_data['page_title'] = 'add img';
        $page_data['page_name'] = 'gallery_img';
        $page_data['row_data']  =   $this->db->get_where('gallery_img',array('id'=>$param))->row_array();
        $page_data['data'] = $this->db->get('gallery_img')->result_array();
        $page_data['pdf'] = $this->db->get('gallery')->result_array();
        $this->load->view('admin/common', $page_data);
	
	}
		public function data_update($param=''){
	    
	    $param = $this->security->xss_clean($param);
	   $this->form_validation->set_rules('slider_id', 'slider_id', 'trim|required');
        if($this->form_validation->run() == false){
            $message = array('message'=>(validation_errors()), 'class'=>'danger');
        }else{
          $data['gallery_id'] = $this->security->xss_clean($this->input->post('slider_id'));
            if(!empty($_FILES['photo']['name'])) {
                $row_data =  $this->db->get_where('gallery_img',array('id'=>$param))->row('photo');
        	    if(!empty($row_data)) {
        	        unlink("./upload/" . $row_data);
                }
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
            $this->db->where('id',$param);
	        $update = $this->db->update('gallery_img',$data);
	        if(isset($update)){
                $message = array('message'=>"gallery_img Updated Successfully", 'class'=>'success');
            }else{
                $message = array('message'=>"Failed to Update gallery_img", 'class'=>'danger');
            }
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/gallery/gallery_img'),'refresh');
	}
	 public function data_delete($param='')
	{
	    $row_data  =  $this->db->get_where('gallery_img',array('id'=>$param))->row('photo');
	    if(!empty($row_data)) {
	        unlink("./upload/" . $row_data);
        }
        $delete = $this->db->where('id', $param)->delete('gallery_img');
        
        if(isset($delete)){
            $message = array('message'=>"gallery_img Delete Successfully", 'class'=>'success');
        }else{
            $message = array('message'=>"Failed to Delete gallery_img", 'class'=>'danger');
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/gallery/gallery_img'),'refresh');
	}
	
	public function fetch_data() {
        // Define the main table name and controller name here
        $main_table = 'gallery'; // Main table
        $controller_name = "admin/Gallery"; // Controller name
        
        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term
    
        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", null, "$main_table.eng_year", "$main_table.guj_year","$main_table.eng_title", "$main_table.guj_title","$main_table.eng_full_title","$main_table.guj_full_title",null];
    
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
            $action_buttons = '<span class="text-nowrap"><a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $action_buttons .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a></span>';
            $row_data[] = $action_buttons;
    
            $row_data[] = $row['eng_year']; 
            $row_data[] = $row['guj_year'];
            $row_data[] = $row['eng_title']; 
            $row_data[] = $row['guj_title'];
            $row_data[] = $row['eng_full_title']; 
            $row_data[] = $row['guj_full_title'];
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
    
    public function get_data() {
        // Define the main table name and controller name here
        $main_table = 'gallery_img'; // Main table
        $controller_name = "admin/Gallery"; // Controller name
        
        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term
    
        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", null, null, null];
    
        // Ensure the column index is within bounds
        if (isset($orderable_columns[$order_column])) {
            $order_column_name = $orderable_columns[$order_column];
        } else {
            // Fallback in case of an invalid column index
            $order_column_name = "$main_table.id"; // Default ordering column
        }
    
        // Start the query with a LEFT JOIN on the language table
        $this->db->select("$main_table.*,gallery.eng_title as eng_title")
                 ->from($main_table)
                 ->join('gallery', "$main_table.gallery_id = gallery.id", 'left');
    
        // Apply the search filter if any
        if (!empty($search_value)) {
            // $this->db->group_start() // Start the grouping of LIKE clauses
                    //  ->like("$main_table.eng_title", $search_value)
                    //  ->or_like('documentary.guj_title', $search_value)
                    //  ->group_end(); // End grouping
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
            $edit_url = base_url($controller_name.'/data_edit/' . $row['id']);
            $delete_url = base_url($controller_name.'/data_delete/' . $row['id']);
            $action_buttons = '<span class="text-nowrap"><a href="' . $edit_url . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
            $action_buttons .= '<a href="' . $delete_url . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="fa fa-trash"></i></a></span>';
            $row_data[] = $action_buttons;

            $row_data[] = $row['eng_title'];
            $row_data[] = '<a href="' . base_url('upload/' . $row['photo']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Pdf
    
            $formatted_data[] = $row_data;
        }
    
        // Get total records and total filtered records
        $total_records = $this->db->count_all($main_table);
    
        $this->db->select("$main_table.id,gallery.eng_title as eng_title")
                 ->from($main_table)
                 ->join('gallery', "$main_table.gallery_id = gallery.id", 'left');
                 
        if (!empty($search_value)) {
            // $this->db->group_start()
            //          ->like("$main_table.eng_title", $search_value)
            //          ->or_like("$main_table.guj_title", $search_value)
            //          ->group_end();
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