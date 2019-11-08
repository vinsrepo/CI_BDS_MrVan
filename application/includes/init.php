<?php
$language='vietnamese';
$this->load->helper(array("url"));
$this->load->library(array("form_validation","session"));
$this->lang->load('default', $language);
$this->load->database();
$this->load->model('default_model');
if($this->session->userdata('KieuHienThi')==FALSE){
    $this->session->set_userdata(array('KieuHienThi'=>'list'));
}
if($this->input->get('style')!=''){
    $this->session->set_userdata(array('KieuHienThi'=>$this->input->get('style')));
}
if($this->input->get('inbox')=='all'){
    $this->default_model->updateDuLieu('tinnhan',array('viewed'=>1),array('viewed'=>0));
    $this->default_model->updateDuLieu('baiviet',array('viewed'=>1),array('viewed'=>0,'Loai'=>'LienHe'));
}
if($this->input->get('viewed')=='all'){
    $this->default_model->updateDuLieu('tinban',array('viewed'=>1),array('viewed'=>0));
    $this->default_model->updateDuLieu('dangky',array('viewed'=>1),array('viewed'=>0));
    $this->default_model->updateDuLieu('thanhvien',array('viewed'=>1),array('viewed'=>0));
}

$m="m.".str_replace('/','',str_replace('http://','',base_url()));

$this->load->library('user_agent');

if($this->input->get('IsMobile')=='true'){
    $this->session->set_userdata(array('desktop'=>true));
} 
if ($this->agent->is_mobile()&&$_SERVER['HTTP_HOST']!=$m&&$this->session->userdata('desktop')==FALSE)
{
	$m=str_replace('http://','',$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(explode('.', $uri)[0] !== 'm'){
		$m = 'm.'.$m;
    	echo "<script>window.location='http://$m'</script>";
	}
}