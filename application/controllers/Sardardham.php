<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sardardham extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['page_name'] = "a_thought";
        $page_data['page_title'] = lang('a_thought');
        $page_data['thought'] = queryLang()->get("thought")->row();
        $this->load->view('common', $page_data);
    }
    public function mission()
    {
        $page_data['page_name'] = "mission";
        $page_data['page_title'] = lang('mission_vision_goals');
        $data = queryLang()->get("mission_vision")->result_array();

        $desired_order = ['Vision', 'Mission', 'Goals'];
        $grouped_data = array_fill_keys($desired_order, []);
        $grouped_data = array_reduce($data, function ($carry, $item) use ($desired_order) {
            $type = $item['type'];
            if (in_array($type, $desired_order)) {
                $carry[$type][] = $item;
            }
            return $carry;
        }, $grouped_data);
        $page_data['data'] = $grouped_data;

        $this->load->view('common', $page_data);
    }
    public function team()
    {
        $page_data['page_name'] = "team";
        $page_data['page_title'] = lang('team_sardardham');
        $page_data['team'] = $this->db->select(["*", langSelect('name'), langSelect("designation"), langSelect("sub_designation")])->order_by("sequence", "ASC")->get('team')->result_array();
        $this->load->view('common', $page_data);
    }

    public function new_team()
    {
        $page_data['page_name'] = "new_team";
        $page_data['page_title'] = lang('new_team_sardardham');
        $page_data['team'] = $this->db->select(["*", langSelect('name'), langSelect("designation")])->order_by("sequence", "ASC")->get('team')->result_array();
        $this->load->view('common', $page_data);
    }

    public function datak_yojna()
    {
        $page_data['page_name'] = "datak_yojna";
        $page_data['page_title'] = lang('dikri_datak_yojna_sardardham');
        $page_data['dikri_yojna'] = queryLang()->get("dikri_dattak_yojna")->row();
        $this->load->view('common', $page_data);
    }

    public function higher_education_assistance_scheme()
    {
        $page_data['page_name'] = "higher_education_assistance";
        $page_data['page_title'] = lang('higher_education_sardardham');
        // $page_data['dikri_yojna'] = queryLang()->get("higher_education")->row();
        $this->load->view('common', $page_data);
    }

    public function medical_centre()
    {
        $page_data['page_name'] = "medical_centre";
        $page_data['page_title'] = lang('medical_centre');
        $page_data['medical_centre'] = queryLang()->get("medical_centre")->row();
        $this->load->view('common', $page_data);
    }

    public function hospitality_center()
    {
        $page_data['page_name'] = "hospitality_center";
        $page_data['page_title'] = lang('hospitality_center');
        // $page_data['hospitality_center'] = queryLang()->get("hospitality_center")->row();
        $this->load->view('common', $page_data);
    }

    public function skill_development()
    {
        $page_data['page_name'] = "skill_development";
        $page_data['page_title'] = lang('skill_development');
        $page_data['skill_development'] = queryLang()->get("skill_development")->row();
        $this->load->view('common', $page_data);
    }

    public function scholarship_scheme()
    {
        $page_data['page_name'] = "scholarship_scheme";
        $page_data['page_title'] = lang('dr_chittaranjanbhai');
        $page_data['scholarship_scheme'] = queryLang()->get("scholarship_scheme")->row();
        $this->load->view('common', $page_data);
    }

    public function revenue_guidance_centre()
    {
        $page_data['page_name'] = "revenue_guidance_centre";
        $page_data['page_title'] = lang('revenue_guidance_centre');
        $page_data['revenue_guidance_centre'] = queryLang()->get("revenue_guidance_centre")->row();
        $this->load->view('common', $page_data);
    }

    public function business_development_center()
    {
        $page_data['page_name'] = "business_development_center";
        $page_data['page_title'] = lang('business_development_center');
        $page_data['business_development_center'] = queryLang()->get("business_development_center")->row();
        $this->load->view('common', $page_data);
    }

    public function trustee_guest_house()
    {
        $page_data['page_name'] = "trustee_guest_house";
        $page_data['page_title'] = lang('trustee_guest_house');
        $page_data['trustee_guest_house'] = queryLang()->get("trustee_guest_house")->row();
        $this->load->view('common', $page_data);
    }

    public function spibo()
    {
        $page_data['page_name'] = "spibo";
        $page_data['page_title'] = lang('spibo');
        $page_data['spibo'] = queryLang()->get("spibo")->row();
        $this->load->view('common', $page_data);
    }

    public function donation()
    {
        $page_data['page_name'] = "donation";
        $page_data['page_title'] = lang('donation');
        $page_data['donation_description'] = queryLang()->get("donation_description")->row();
        $page_data['donation_type'] = queryLang()->get("donation_type")->result_array();
        $this->load->view('common', $page_data);
    }

    public function donation_details()
    {
        $page_data['count'] = $this->input->post('count');
        $page_data['total'] = $this->input->post('total');
        $page_data['name'] = $this->input->post('name');

        $page_data['page_name'] = "donation_details";
        $page_data['page_title'] = lang('donation');
        $this->load->view('common', $page_data);
    }

    public function add_donor()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required')
            ->set_rules('address', 'Address', 'trim|required')
            ->set_rules('whats_app_no', 'WhatsApp Number', 'trim|required|exact_length[10]')
            ->set_rules('pan_no', 'PAN Number', 'trim|required')
            ->set_rules('aadhaar_no', 'Adhaar Number', 'trim|required');

        if ($this->form_validation->run() == false) {
            $message = array('message' => (validation_errors()), 'class' => 'danger');
        } else {
            $data['name'] = $this->security->xss_clean($this->input->post('name'));
            $data['address'] = $this->security->xss_clean($this->input->post('address'));
            $data['whats_app_no'] = $this->security->xss_clean($this->input->post('whats_app_no'));
            $data['pan_no'] = $this->security->xss_clean($this->input->post('pan_no'));
            $data['aadhaar_no'] = $this->security->xss_clean($this->input->post('aadhaar_no'));
            $data['no_of_people'] = $this->security->xss_clean($this->input->post('no_of_people'));
            $data['amount'] = $this->security->xss_clean($this->input->post('amount'));

            $insert = $this->db->insert('donor_list', $data);
            if (isset($insert)) {

                // $this->load->library('PHPMailer_Lib');

                // // PHPMailer object
                // $mail = $this->phpmailer_lib->load();

                // // SMTP configuration
                // $mail->isSMTP();
                // $mail->Host = 'smtp.gmail.com';
                // $mail->SMTPAuth = true;
                // $mail->Username = 'cscsardardhammail@gmail.com';
                // $mail->Password = 'qlsqpzewuwxugoet';
                // $mail->SMTPSecure = 'tls';
                // $mail->Port = 587;

                // $mail->setFrom('cscsardardhammail@gmail.com', 'SARDARDHAM CIVIL SERVICE CENTER');
                // $mail->addReplyTo('cscsardardhammail@gmail.com', 'SARDARDHAM CIVIL SERVICE CENTER');

                // // Add a recipient
                // $mail->addAddress('gogarimanan12@gmail.com');

                // // Add cc or bcc 


                // // Email subject
                // $mail->Subject = 'New Contact Inquiry from ';

                // // Set email format to HTML
                // $mail->isHTML(true);

                // // Email body content

                // $mail->Body = "<h1>Contact Inquiry Details</h1>"
                //     . "<p><strong>Name:</strong> Testing Name</p>"
                //     . "<p><strong>Email:</strong> test@gmail.com</p>"
                //     . "<p><strong>Mobile:</strong> 1234567890</p>"
                //     . "<p><strong>Subject:</strong> Test</p>"
                //     . "<p><strong>Message:</strong> Test1234</p>"
                //     . "<p><strong>Department:</strong> Testing Department</p>";
                // $mail->send();

                $message = array('message' => "Donor Added Successfully", 'class' => 'success');
            } else {
                $message = array('message' => "Failed to Add Donor", 'class' => 'danger');
            }
        }
        $this->session->set_flashdata('flash_message', $message);
        redirect(site_url('Sardardham/donation'), 'refresh');

    }
}