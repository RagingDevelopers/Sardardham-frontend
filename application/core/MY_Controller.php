<?php
// common controller to load the language in all controller just extends this class to enabled the language .
// don't change the code 
class MY_Controller  extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $language = $this->session->userdata('site_language') ?? 'english';
        $this->language_id = $this->session->userdata('language_id') ?? 1;
        $this->lang->load('app', $language);
        // VISITOR COUNT;
        $this->count_visitor();
    }
    
    public function count_visitor() {
        $this->load->helper('cookie');
        $cookie_name = 'sardardham_visitor';  
        $cookie_value = $this->input->cookie($cookie_name, TRUE);
        if (!$cookie_value) {
            $cookie_value = uniqid('visitor_', true);
            $cookie = array(
                'name'   => $cookie_name,
                'value'  => $cookie_value,
                'expire' => 3600, // 1 hour (3600 seconds)
                'secure' => false
            );
            set_cookie($cookie);
            increment_visitor_counter();
        }
    }
}
?>