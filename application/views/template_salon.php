<?php
Modules::run("thanhvien/kiemtratrangthai");
if(isset($username))
{
$data['username']=$username;   
}else{
$data['xxx']='';
}
echo Modules::run("salon/header",$title,$description);
$this->load->view($template,$data);
echo Modules::run("trangchu/footer");
Modules::run("truycap");