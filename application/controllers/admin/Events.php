<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
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
        $page_data['page_name'] = "events";
        $page_data['page_title'] = "Events";
        $page_data['languages'] = $languages;
        $page_data['data'] = $this->db->select('events.*, language.name as language_name')->from('events')->join('language', 'events.language_id = language.id', 'left')->order_by('id', 'desc')->get()->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('language', 'Language', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('photo', 'photo');
        $this->form_validation->set_rules('description', 'description');
        $this->form_validation->set_rules('event_date', 'event_date', 'trim|required');
        $this->form_validation->set_rules('redirect_url', 'Redirect Url', 'trim');
        $this->form_validation->set_rules('type', 'Type', 'trim|required');
        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['title'] = $this->security->xss_clean($this->input->post('title'));
            $data['slug'] = generate_slug($data['title']);

            $slug_exists = $this->db->get_where('events', ['slug' => $data['slug']])->num_rows();
            if ($slug_exists) {
                $message = array('message' => "Title Already Exists", 'class' => 'success');
                $this->session->set_flashdata('flash_message', $message);
                redirect(site_url('admin/events'), 'refresh');
                exit;
            }

            // $data['status'] = $this->security->xss_clean($this->input->post('status'));
            $data['language_id'] = $this->security->xss_clean($this->input->post('language'));
            $data['description'] = $this->security->xss_clean($this->input->post('description'));
            $data['event_date'] = $this->security->xss_clean($this->input->post('event_date'));
            $data['redirect_url'] = $this->security->xss_clean($this->input->post('redirect_url'));
            $data['type'] = $this->security->xss_clean($this->input->post('type'));
            $data['button_title'] = $this->security->xss_clean($this->input->post('button_title'));
            $data['redirect_url_title'] = $this->security->xss_clean($this->input->post('redirect_url_title'));
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
            if (!empty($_FILES['pdf']['name'])) {
                $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()), rand(0, 26), 3);
                $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = 'pdf|jpg';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pdf');
                $data['pdf'] = $file_name;
            }
            $insert = $this->db->insert('events', $data);
            if (isset($insert)) {
                $message = array('message' => "Events Created Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Create Events", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/events'), 'refresh');
    }
    public function edit($param = '')
    {
        $param = $this->security->xss_clean($param);
        $languages = $this->Language_model->get_language();
        $page_data['page_title'] = 'Events';
        $page_data['page_name'] = 'events';
        $page_data['languages'] = $languages;
        $page_data['row_data'] = $this->db->get_where('events', array('id' => $param))->row_array();
        $page_data['data'] = $this->db->order_by('id', 'desc')->get('events')->result_array();
        $this->load->view('admin/common', $page_data);
    }
    public function update($param = '')
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('language', 'Language', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('photo', 'photo');
        $this->form_validation->set_rules('description', 'description');
        $this->form_validation->set_rules('event_date', 'event_date', 'trim|required');
        $this->form_validation->set_rules('redirect_url', 'Redirect Url', 'trim');
        $this->form_validation->set_rules('type', 'Type', 'trim|required');

        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['title'] = $this->security->xss_clean($this->input->post('title'));
            $data['slug'] = generate_slug($data['title']);
            // $data['status'] = $this->security->xss_clean($this->input->post('status'));
            $data['language_id'] = $this->security->xss_clean($this->input->post('language'));
            $data['description'] = $this->security->xss_clean($this->input->post('description'));
            $data['event_date'] = $this->security->xss_clean($this->input->post('event_date'));
            $data['redirect_url'] = $this->security->xss_clean($this->input->post('redirect_url'));
            $data['type'] = $this->security->xss_clean($this->input->post('type'));
            $data['button_title'] = $this->security->xss_clean($this->input->post('button_title'));
            $data['redirect_url_title'] = $this->security->xss_clean($this->input->post('redirect_url_title'));
            if (!empty($_FILES['photo']['name'])) {
                $row_data = $this->db->get_where('events', array('id' => $param))->row('photo');
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
            if (!empty($_FILES['pdf']['name'])) {
                $row_data = $this->db->get_where('events', array('id' => $param))->row('pdf');
                if (!empty($row_data)) {
                    unlink("./upload/" . $row_data);
                }
                $file_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
                $rand = substr(md5(microtime()), rand(0, 26), 3);
                $file_name = date('Ymdhis') . $rand . '.' . $file_ext;
                $config['upload_path'] = './upload';
                $config['allowed_types'] = 'pdf|jpg';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pdf');
                $data['pdf'] = $file_name;
            }
            $this->db->where('id', $param);
            $update = $this->db->update('events', $data);
            if (isset($update)) {
                $message = array('message' => "Events Updated Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Update Events", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/events'), 'refresh');
    }
    public function delete($param = '')
    {
        $row_data = $this->db->get_where('events', array('id' => $param))->row('photo');
        if (!empty($row_data)) {
            unlink("./upload/" . $row_data);
        }

        $row_data = $this->db->get_where('events', array('id' => $param))->row('pdf');
        if (!empty($row_data)) {
            unlink("./upload/" . $row_data);
        }

        $delete = $this->db->where('id', $param)->delete('events');

        if (isset($delete)) {
            $message = array('message' => "Events Delete Successfully", 'class' => 'success');
        } else {
            $message = array('message' => "Failed to Delete Events", 'class' => 'danger');
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('admin/events'), 'refresh');
    }

    public function fetch_data()
    {
        // Define the main table name and controller name here
        $main_table = 'events'; // Main table
        $controller_name = "admin/Events"; // Controller name

        // Pagination, sorting, search, and language filter input from DataTables
        $start = $this->input->post('start'); // Pagination starting point
        $length = $this->input->post('length'); // Number of records to fetch
        $order_column = $this->input->post('order')[0]['column']; // Order column index
        $order_dir = $this->input->post('order')[0]['dir']; // Order direction (asc/desc)
        $search_value = $this->input->post('search')['value']; // Search term
        $language_filter = $this->input->post('language'); // Language filter

        // Define the columns for ordering (use the same order as the DataTable columns)
        // Use 'null' for non-sortable columns (e.g., Serial Number and Actions)
        $orderable_columns = ["$main_table.id", null, null, 'language.name', "$main_table.title", null, null, null, "$main_table.event_date"];

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
                ->or_like("$main_table.type", $search_value)
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

            $switch_checked = ($row['status'] == "ACTIVE") ? 'checked' : '';
            $switch_html = '<div class="form-check form-switch">
                  <input class="form-check-input changeStatus" data-id="' . $row['id'] . '" type="checkbox" role="switch" ' . $switch_checked . '>
                </div>';
            $row_data[] = $switch_html;

            $row_data[] = $row['language']; // Language
            $row_data[] = $row['title']; // Title
            $row_data[] = '<a href="' . base_url('upload/' . $row['photo']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Photo
            $row_data[] = '<a href="' . base_url('upload/' . $row['pdf']) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; // Pdf
            // $row_data[] = $row['button_title']; // Button Title
            $row_data[] = $row['description']; // Description
            $row_data[] = $row['event_date']; // Event_date
            $row_data[] = $row['type']; // Type
            $row_data[] = $row['redirect_url']; // Redirect_url
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
                ->or_like("$main_table.type", $search_value)
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

    public function change_status()
    {

        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $data = ['status' => $status];

        $this->db->where('id', $id);

        $update = $this->db->update('events', $data);
        if ($update) {
            echo json_encode(['status' => 'success', 'message' => 'Status updated']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
        }
    }

    public function updateData()
    {
        // $data =  $this->db->select('events.*')
        //                 ->from('events')
        //                 ->get()->result_array();
        //  foreach ($data as &$row) {
        //      unset($row['id']);
        //      $row['language_id'] = 2;

        //  }

        $array = [
            [
                'language_id' => 2,
                'title' => 'વિદેશી કેન્દ્ર',
                'photo' => '20220712042356a63.png',
                'pdf' => '2022071204130818e.pdf',
                'description' => '',
                'event_date' => '2022-06-14',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'પ્રવેશ',
                'photo' => '20220711011047f93.webp',
                'pdf' => '20220712041359d5e.pdf',
                'description' => '',
                'event_date' => '2022-06-08',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'વ્યવસાય કેન્દ્ર',
                'photo' => '2022071101115806b.webp',
                'pdf' => '20220712041438b76.pdf',
                'description' => '',
                'event_date' => '2022-06-15',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સર્વ સમાજ સમરસ મીટ',
                'photo' => '202207200831202cf.jpg',
                'pdf' => '20220716092433ec1.pdf',
                'description' => '',
                'event_date' => '2022-07-28',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સુરત ટ્રસ્ટી મીટ',
                'photo' => '20220725095207d53.png',
                'pdf' => '20220725095207b9e.pdf',
                'description' => '',
                'event_date' => '2022-07-22',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'ગગજી સુટારિયા લાઈવ',
                'photo' => '20220729125136b8c.png',
                'pdf' => '202207290210536fe.pdf',
                'description' => '',
                'event_date' => '2022-07-29',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'યુવા સંવાદ',
                'photo' => '2022082201542904b.png',
                'pdf' => '20220730053617a7e.pdf',
                'description' => '',
                'event_date' => '2022-07-30',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'SD ફેઝ-2 ટેન્ડર',
                'photo' => '20220825052009f77.jpg',
                'pdf' => '202208250520097c7.pdf',
                'description' => '',
                'event_date' => '2022-08-25',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'યુવા સંવાદ-4-5',
                'photo' => '20220908123304a91.png',
                'pdf' => '202209081233047f6.pdf',
                'description' => '',
                'event_date' => '2022-09-08',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સમર્પિત 100 યુવાઓની જરૂર છે. અરજી કરવા અહીં ક્લિક કરો',
                'photo' => '20230116055215bb9.PNG',
                'pdf' => '20230116055215d0d.pdf',
                'description' => 'સમર્પિત 100 યુવાઓની જરૂર છે. અરજી કરવા અહીં ક્લિક કરો',
                'event_date' => '2023-01-17',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સરદારધામ સ્કિલ ડેવલપ્મેન્ટ કોર્સ પ્રિ-રજીસ્ટ્રેશન',
                'photo' => '202304220246360ae.jpeg',
                'pdf' => '20230422024948806.pdf',
                'description' => 'નમસ્કાર મિત્રો સરદારધામ તેમજ ગુજરાત સરકારની કૌશલ્ય સ્કિલ યુનિવર્સિટીના સંયુક્ત ઉપક્રમે સ્કિલ ડેવલપ્મેન્ટ કોર્સ શરૂ થવા જઇ રહ્યા છે. રજીસ્ટ્રેશન કરો.',
                'event_date' => '2023-05-31',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'રેવન્યુ માર્ગદર્શન કેન્દ્ર',
                'photo' => '20230606033455c7a.jpeg',
                'pdf' => '20230606033455530.pdf',
                'description' => 'રેવન્યુ માર્ગદર્શન કેન્દ્ર જાહેરાત',
                'event_date' => '2023-06-06',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'ભરતી',
                'photo' => '20230624064140be3.jpg',
                'pdf' => '202306240603014d3.jpg',
                'description' => 'ભરતી માટેની જાહેરાત',
                'event_date' => '2023-06-24',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'ભરતી બોયઝ રેકટર',
                'photo' => '20230624060432537.jpg',
                'pdf' => '20230624060432baf.jpg',
                'description' => 'ભરતી બોયઝ હોસ્ટેલ રેક્ટર',
                'event_date' => '2023-06-24',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સરદારધામ સ્કિલ ડેવલપ્મેન્ટ નવી બેચ પ્રિ રજીસ્ટ્રેશન',
                'photo' => '202308170758084a3.jpeg',
                'pdf' => '20230817075808fa2.jpeg',
                'description' => '',
                'event_date' => '2023-08-17',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સર્વે ફોર્મ',
                'photo' => '20231216101741f6c.jpeg',
                'pdf' => '20231216101741318.jpeg',
                'description' => '',
                'event_date' => '2023-12-16',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'પ્રેરણાત્મક કાર્યક્રમ',
                'photo' => '202312161211422cf.jpg',
                'pdf' => '20231216121142fcc.jpg',
                'description' => '',
                'event_date' => '2023-12-17',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'પાટીદાર ઉદ્યોગ રત્ન એવોર્ડ માટે અરજી ફોર્મ',
                'photo' => '202312210541146e6.jpeg',
                'pdf' => '20231221054114eed.pdf',
                'description' => 'પાટીદાર ઉદ્યોગ રત્ન એવોર્ડ માટે અરજી ફોર્મ',
                'event_date' => '2023-12-21',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'ભૂમિપૂજન સમારોહ - સુરત',
                'photo' => '20231222011449189.jpeg',
                'pdf' => '20231222011449073.jpeg',
                'description' => '',
                'event_date' => '2024-02-04',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'GPBS-2024',
                'photo' => '2023122502552178a.jpeg',
                'pdf' => '202312250255211be.jpeg',
                'description' => '',
                'event_date' => '2024-01-07',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'નવું બેચ પ્રિ રજીસ્ટ્રેશન (PGD GST અને PGD IT)',
                'photo' => '202312260620305a3.jpeg',
                'pdf' => '202312260620300ae.jpeg',
                'description' => 'નવું બેચ પ્રિ રજીસ્ટ્રેશન (PGD GST અને PGD IT)',
                'event_date' => '2023-12-26',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સરદારધામ આયોજીત અધિકારી સન્માન સમારોહ - 2024',
                'photo' => '202402161121002b0.jpeg',
                'pdf' => '202402161121002ac.jpeg',
                'description' => 'ટેસ્ટ',
                'event_date' => '2024-02-24',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સરદારધામ મેડીકલ સેન્ટર ઉદ્ઘાટન સમારોહ',
                'photo' => '202402221134417b5.jpeg',
                'pdf' => '20240222113441aa9.jpeg',
                'description' => 'સરદારધામ મેડીકલ સેન્ટર ઉદ્ઘાટન સમારોહ',
                'event_date' => '2024-02-24',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'યુવા સંવાદ',
                'photo' => '2024022703455863a.jpeg',
                'pdf' => '20240227034558711.jpeg',
                'description' => 'યુવા સંવાદ',
                'event_date' => '2024-02-29',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'યુવા સંવાદ - હળવદ',
                'photo' => '20240326123725544.jpeg',
                'pdf' => '20240326123725012.jpeg',
                'description' => 'યુવા સંવાદ - હળવદ',
                'event_date' => '2024-03-31',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સન્માન સમારોહ',
                'photo' => '20240420020033d49.jpeg',
                'pdf' => '2024042002003345e.jpeg',
                'description' => 'સન્માન સમારોહ',
                'event_date' => '2024-04-28',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'ભરતી બોયઝ રેકટર',
                'photo' => '20240502024831115.jpeg',
                'pdf' => '20240502024831100.jpeg',
                'description' => 'ભરતી બોયઝ હોસ્ટેલ રેક્ટર',
                'event_date' => '2024-05-10',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'ભરતી સિવિલ એન્જિનિયર',
                'photo' => '20240506034601c2a.jpeg',
                'pdf' => '20240506034601e8b.jpeg',
                'description' => 'ભરતી ડિપ્લોમા સિવિલ એન્જિનિયર',
                'event_date' => '2024-05-20',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'યુવા સંવાદ - નડિયાદ',
                'photo' => '20240506034825502.jpeg',
                'pdf' => '202405060348254f2.jpeg',
                'description' => 'યુવા સંવાદ - નડિયાદ',
                'event_date' => '2024-06-01',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સ્કિલ કોર્સ (AWS, PYTHON,SALES...)',
                'photo' => '20240508075316f11.jpeg',
                'pdf' => '202405080753162e0.jpeg',
                'description' => 'સ્કિલ કોર્સ (AWS, PYTHON,SALES...)',
                'event_date' => '2024-05-08',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'પ્રવેશ જાહેરાત',
                'photo' => '2024051503074034a.jpg',
                'pdf' => '20240515030741ce8.jpg',
                'description' => 'સરદારધામ પ્રવેશ જાહેરાત',
                'event_date' => '2024-06-01',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'BS.c જ્વેલરી ડિઝાઇન અને મેન્યુફેક્ચરિંગમાં',
                'photo' => '20240523102316fbc.jpeg',
                'pdf' => '202405220528499eb.jpeg',
                'description' => 'BS.c જ્વેલરી ડિઝાઇન અને મેન્યુફેક્ચરિંગ',
                'event_date' => '2024-05-22',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'GPBS-2025 લૉન્ચિંગ ઇવેન્ટ',
                'photo' => '20240629044300f7c.jpg',
                'pdf' => '202406290444441f4.pdf',
                'description' => 'GPBS-2025 લૉન્ચિંગ ઇવેન્ટ',
                'event_date' => '2024-07-05',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'ભરતી',
                'photo' => '20240722095823b1e.jpeg',
                'pdf' => '202407220316356ec.jpeg',
                'description' => 'ભરતી',
                'event_date' => '2024-04-10',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'ભરતી બોયઝ રેકટર',
                'photo' => '20240724041508f46.jpeg',
                'pdf' => '20240724041508263.jpeg',
                'description' => 'ભરતી બોયઝ રેક્ટર',
                'event_date' => '2024-08-03',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'અધિકારી સ્નેહમિલન સમારોહ - 2024',
                'photo' => '20240731100001d92.jpeg',
                'pdf' => '2024073110000157a.jpeg',
                'description' => 'સ્નેહ મિલન સમારોહ',
                'event_date' => '2024-08-10',
                'status' => 'ACTIVE',
            ],
            [
                'language_id' => 2,
                'title' => 'સ્કોલરશિપ અરજી',
                'photo' => '202408010217572d2.jpeg',
                'pdf' => '20240801021757ed1.jpeg',
                'description' => 'https://csc.sardardham.org/home/scholarship',
                'event_date' => '2024-08-20',
                'status' => 'ACTIVE',
            ],
        ];


        //  $this->db->insert_batch("events",$array);


    }










}