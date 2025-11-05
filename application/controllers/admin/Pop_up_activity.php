<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pop_up_activity extends CI_Controller
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
        // $languages = $this->Language_model->get_language();
        $page_data['page_name'] = "pop_up_activity";
        $page_data['page_title'] = "Pop Up Activity";
        // $page_data['languages'] = $languages;
        // $page_data['data'] = $this->db->select('pop_up_activity.*, language.name as language_name')->from('pop_up_activity')->join('language', 'pop_up_activity.language_id = language.id', 'left')->order_by('id','desc')->get()->result_array();
        $page_data['data'] = $this->db->select('pop_up_activity.*')->from('pop_up_activity')->order_by('id', 'desc')->get()->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        // $this->form_validation->set_rules('language', 'Language', 'required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('link', 'Link', 'trim|required');
        $this->form_validation->set_rules('schedule_date', 'Schedule Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('photo', 'photo');
        $this->form_validation->set_rules('description', 'description');
        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['title'] = $this->security->xss_clean($this->input->post('title'));
            $data['status'] = $this->security->xss_clean($this->input->post('status'));
            $data['link'] = $this->security->xss_clean($this->input->post('link'));
            $data['schedule_date'] = $this->security->xss_clean($this->input->post('schedule_date'));
            $data['end_date'] = $this->security->xss_clean($this->input->post('end_date'));

            // $data['language_id'] = $this->security->xss_clean($this->input->post('language'));
            $data['description'] = $this->security->xss_clean($this->input->post('description'));
            if (!empty($_FILES['photo']['name'])) {
                $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()), rand(0, 26), 3);
                $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('photo');
                $data['photo'] = $file_name;
            }
            // if (!empty($_FILES['pdf']['name'])) {
            //     $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            //     $rand = substr(md5(microtime()), rand(0, 26), 3);
            //     $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
            //     $config['upload_path'] = './upload';
            //     $config['allowed_types'] = 'pdf';
            //     $config['file_name'] = $file_name;
            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
            //     $this->upload->do_upload('pdf');
            //     $data['pdf'] = $file_name;
            // }
            $insert = $this->db->insert('pop_up_activity', $data);
            if (isset($insert)) {
                $message = array('message' => "Pop Up Activity Created Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Create Pop Up Activity", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/pop_up_activity'), 'refresh');
    }
    public function edit($param = '')
    {
        $param = $this->security->xss_clean($param);
        // $languages = $this->Language_model->get_language();
        $page_data['page_title'] = 'Pop Up Activity';
        $page_data['page_name'] = 'pop_up_activity';
        // $page_data['languages'] = $languages;
        $page_data['row_data'] = $this->db->get_where('pop_up_activity', array('id' => $param))->row_array();
        $page_data['data'] = $this->db->order_by('id', 'desc')->get('pop_up_activity')->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function update($param = '')
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        //    $this->form_validation->set_rules('language', 'Language', 'required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('link', 'Link', 'trim|required');
        $this->form_validation->set_rules('schedule_date', 'Schedule Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('photo', 'photo');
        $this->form_validation->set_rules('description', 'description');

        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['title'] = $this->security->xss_clean($this->input->post('title'));
            $data['status'] = $this->security->xss_clean($this->input->post('status'));
            // $data['language_id'] = $this->security->xss_clean($this->input->post('language'));
            $data['description'] = $this->security->xss_clean($this->input->post('description'));
            $data['link'] = $this->security->xss_clean($this->input->post('link'));
            $data['schedule_date'] = $this->security->xss_clean($this->input->post('schedule_date'));
            $data['end_date'] = $this->security->xss_clean($this->input->post('end_date'));

            if (!empty($_FILES['photo']['name'])) {
                $row_data = $this->db->get_where('pop_up_activity', array('id' => $param))->row('photo');
                if (!empty($row_data)) {
                    unlink("./upload/" . $row_data);
                }
                $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()), rand(0, 26), 3);
                $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('photo');
                $data['photo'] = $file_name;
            }
            // if (!empty($_FILES['pdf']['name'])) {
            //     $row_data = $this->db->get_where('pop_up_activity', array('id' => $param))->row('pdf');
            //     if (!empty($row_data)) {
            //         unlink("./upload/" . $row_data);
            //     }
            //     $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            //     $rand = substr(md5(microtime()), rand(0, 26), 3);
            //     $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
            //     $config['upload_path'] = './upload';
            //     $config['allowed_types'] = 'pdf';
            //     $config['file_name'] = $file_name;
            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
            //     $this->upload->do_upload('pdf');
            //     $data['pdf'] = $file_name;
            // }
            $this->db->where('id', $param);
            $update = $this->db->update('pop_up_activity', $data);
            if (isset($update)) {
                $message = array('message' => "Pop Up Activity Updated Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Update Pop Up Activity", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/pop_up_activity'), 'refresh');
    }
    public function delete($param = '')
    {
        $row_data = $this->db->get_where('pop_up_activity', array('id' => $param))->row('photo');
        if (!empty($row_data)) {
            unlink("./upload/" . $row_data);
        }

        // $row_data = $this->db->get_where('pop_up_activity', array('id' => $param))->row('pdf');
        // if (!empty($row_data)) {
        //     unlink("./upload/" . $row_data);
        // }

        $delete = $this->db->where('id', $param)->delete('pop_up_activity');

        if (isset($delete)) {
            $message = array('message' => "Pop Up Activity Delete Successfully", 'class' => 'success');
        } else {
            $message = array('message' => "Failed to Delete Pop Up Activity", 'class' => 'danger');
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/pop_up_activity'), 'refresh');
    }

    public function fetch_data()
    {
        // Define the main table name and controller name here
        $main_table = 'pop_up_activity'; // Main table
        $controller_name = "admin/Pop_up_activity"; // Controller name

        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term
        // $language_filter = $this->input->post('language'); // Language filter

        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        // $orderable_columns = ["$main_table.id", null, null, "$main_table.title", null, null, null];
        $orderable_columns = ["$main_table.id", null, null, "$main_table.title", null, "$main_table.schedule_date", "$main_table.end_date", null, null];

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

        // Apply the language filter if selected
        // if (!empty($language_filter)) {
        //     $this->db->where('language.id', $language_filter);
        // }

        // Apply the search filter if any
        if (!empty($search_value)) {
            $this->db->group_start() // Start the grouping of LIKE clauses
                ->like("$main_table.title", $search_value)
                //  ->or_like('language.name', $search_value)
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

            $switch_checked = ($row['status'] == "ACTIVE") ? 'checked' : '';
            $switch_html = '<div class="form-check form-switch">
                  <input class="form-check-input changeStatus" data-id="' . $row['id'] . '" type="checkbox" role="switch" ' . $switch_checked . '>
                </div>';
            $row_data[] = $switch_html;

            // $row_data[] = $row['language']; // Language
            $row_data[] = $row['title']; // Title
            $row_data[] = '<a href="' . base_url('upload/' . $row['photo']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Photo
            // $row_data[] = '<a href="' . base_url('upload/' . $row['pdf']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Pdf

            // Format Schedule Date and End Date as d-m-Y
            $schedule_date = !empty($row['schedule_date']) ? date('d-m-Y', strtotime($row['schedule_date'])) : '-';
            $end_date = !empty($row['end_date']) ? date('d-m-Y', strtotime($row['end_date'])) : '-';

            $row_data[] = $schedule_date; // Schedule Date
            $row_data[] = $end_date; // End Date

            // Link (eye icon)
            $link_icon = '';
            if (!empty($row['link'])) {
                $link_icon = '<a href="' . $row['link'] . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
            }
            $row_data[] = $link_icon;

            $row_data[] = $row['description']; // Description
            $formatted_data[] = $row_data;
        }

        // Get total records and total filtered records
        $total_records = $this->db->count_all($main_table);

        $this->db->select("$main_table.id")
            ->from($main_table);

        // if (!empty($language_filter)) {
        //     $this->db->where('language.id', $language_filter);
        // }

        if (!empty($search_value)) {
            $this->db->group_start()
                ->like("$main_table.title", $search_value)
                //  ->or_like('language.name', $search_value)
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

    public function change_status()
    {

        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $data = ['status' => $status];

        $this->db->where('id', $id);

        $update = $this->db->update('pop_up_activity', $data);
        if ($update) {
            echo json_encode(['status' => 'success', 'message' => 'Status updated']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
        }
    }

}