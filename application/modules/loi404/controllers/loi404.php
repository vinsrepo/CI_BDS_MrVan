<?php
class Loi404 extends MX_Controller {
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        $this->lang->load('loi404', $language);
    }
 
    function index()
    {
        $data['title'] = $this->lang->line('error_not_found');
        $data['description'] = $this->lang->line('error_not_found');
        $data['template']='error';
        $this->load->view('default', $data);
    }
    
   
}