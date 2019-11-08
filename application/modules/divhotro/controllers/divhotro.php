<?php
class Divhotro extends MX_Controller {
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        $this->lang->load('divhotro', $language);
    }
 
    function index()
    {
        $data['email']=$this->default_model->getInfoID("cauhinh",array("Loai" => "email_smtp_user"));
        $data['info']=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        $this->load->view('divhotro', $data);
    }
    
   
}