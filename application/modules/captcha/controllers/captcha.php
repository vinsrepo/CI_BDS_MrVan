<?php
class Captcha extends MX_Controller {
        
    function __construct()
    {
        parent::__construct();
                
        include(APPPATH . 'includes/init.php');
        $this->load->helper(array("captcha"));
         
        
    }
 
    function index()
    {
        $dataCaptcha=array(
                               'img_path' => './captcha/',
                               'img_url' => base_url().'captcha/',
                               'img_width' => 150,
                               'img_height' => 30,
                               'expiration' => 100,
                               'word' => strtolower(substr(md5(time()),0,4))
                          );
        $cap = create_captcha($dataCaptcha);
        $this->session->set_userdata(array('captcha' => $cap['word']));
        $this->load->view('form_captcha',array("imageCaptcha"=>$cap['time']));
    }      
}