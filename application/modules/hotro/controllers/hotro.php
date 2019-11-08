<?php
class Hotro extends MX_Controller {
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        $this->lang->load('hotro', $language);
    }
 
    function index()
    {
        $data['title'] = $this->lang->line('lable_support');
        $data['description'] = $this->lang->line('lable_support');
        $data['template']='hotro';
        $this->load->view('default', $data);
    }
    
   
}