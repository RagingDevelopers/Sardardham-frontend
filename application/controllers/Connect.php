<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Connect extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $page_data['page_name'] = "connect";
    $page_data['page_title'] = lang('connect_with_us');
    $this->load->view('common', $page_data);
  }
  public function insert()
  {
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|exact_length[10]');
    $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
    $this->form_validation->set_rules('message', 'Message', 'trim|required');
    $this->form_validation->set_rules('department', 'department', 'trim|required');
    if ($this->form_validation->run() == false) {
      $message = array('message' => (validation_errors()), 'class' => 'danger');
    } else {

      $check = $this->db->get_where('department', array('id' => $this->security->xss_clean($this->input->post('department'))))->row_array();

      if (!empty($check)) {

        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['email'] = $this->security->xss_clean($this->input->post('email'));
        $data['mobile'] = $this->security->xss_clean($this->input->post('mobile'));
        $data['subject'] = $this->security->xss_clean($this->input->post('subject'));
        $data['message'] = $this->security->xss_clean($this->input->post('message'));
        $data['department_id'] = $this->security->xss_clean($this->input->post('department'));

        $insert = $this->db->insert('contact', $data);
        if (isset($insert)) {

          $this->load->library('PHPMailer_Lib');

          // PHPMailer object
          $mail = $this->phpmailer_lib->load();

          // SMTP configuration
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'cscsardardhammail@gmail.com';
          $mail->Password = 'qlsqpzewuwxugoet';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;

          $mail->setFrom('cscsardardhammail@gmail.com', 'SARDARDHAM CIVIL SERVICE CENTER');
          $mail->addReplyTo('cscsardardhammail@gmail.com', 'SARDARDHAM CIVIL SERVICE CENTER');

          // Add a recipient
          $mail->addAddress($check['email']);

          // Add cc or bcc 


          // Email subject
          $mail->Subject = 'New Contact Inquiry from ';

          // Set email format to HTML
          $mail->isHTML(true);

          // Email body content

          $mail->Body = "<h1>Contact Inquiry Details</h1>"
            . "<p><strong>Name:</strong> {$data['name']}</p>"
            . "<p><strong>Email:</strong> {$data['email']}</p>"
            . "<p><strong>Mobile:</strong> {$data['mobile']}</p>"
            . "<p><strong>Subject:</strong> {$data['subject']}</p>"
            . "<p><strong>Message:</strong> {$data['message']}</p>"
            . "<p><strong>Department:</strong> {$check['name']}</p>";
          $mail->send();

          $message = array('message' => '<h4 class="text-success m-0">Thank you for your inquiry</h4><p class="text-success m-0"> Your contact information and message was successfully submitted.</p>', 'class' => 'success');
        } else {
          $message = array('message' => "Failed to Create Events", 'class' => 'danger');
        }
      } else {
        $message = array('message' => "Invalid department", 'class' => 'danger');
      }
    }

    $this->session->set_flashdata('flash_message', $message);
    redirect(site_url('Connect'), 'refresh');
  }
}