<?php
class Uploads extends MX_Controller {
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        $this->lang->load('upload', $language);
       
    }
 
    function index()
    {
        $this->load->view('upload');
    }
    
    function images()
    {
        
        if(isset($_FILES['userfile']))
        {
        //config upload
        $TenFile=time();
        $config['upload_path'] = './upload/photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '200';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
        $config['file_name']  = $TenFile;
        $config['overwrite']  = TRUE;
        
        $this->load->library('upload', $config);
        
        //Loc XSS
        $this->load->helper('file');
		$file=read_file($_FILES['userfile']['tmp_name']);
        $filename = $this->security->xss_clean($file, TRUE);
        
        if(!$filename){
            $data['error']=$this->lang->line('error_xss');
        }else{
		if ( ! $this->upload->do_upload())
		{
		    $data['error']=str_replace('</p>','',str_replace('<p>','',$this->upload->display_errors()));
		}
		else
		{
		    $img = $this->upload->data();
            echo '<span style="-moz-user-select: none; position: static; display: inline;" id="1372505346.jpg" class="sortableitem"><img src="'.base_url().'upload/photo/'.$img['file_name'].'"> <a href="#" title="Xóa ?nh" onclick="return del_img(this)">x</a></span>';
		}
        }
        }
 
    }
}