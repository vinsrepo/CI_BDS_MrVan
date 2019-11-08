<? 
$user_info='';
if($this->session->userdata('userid')){ 
    $user_info=Modules::run('trangchu/getInfo','thanhvien','userid',$this->session->userdata('userid'));
}
$tieude['title']=$title;
$tieude['user_info']=$user_info;
$this->load->view("top", $tieude);?>
<? $this->load->view("left");?>
<? $this->load->view($template);?>
<? $this->load->view("bottom");?>