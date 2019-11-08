<?php
if($_GET['redirectUrl']!=''){
    redirect(str_replace(base_url().'/',base_url(),base_url().$_GET['redirectUrl']));
}
Modules::run("thanhvien/kiemtratrangthai");
if(isset($username))
{
$data['username']=$username;   
}else{
$data['xxx']='';
}

//
$host=$_SERVER['HTTP_HOST'];
$name_site=preg_replace('/([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z]+)/', '$2.$3', $host);
$subdomain=str_replace(".".$name_site, '', $host);
if($subdomain=='m'){
    $sub='m_';
}else{
    $sub='';
}
//

$banners=Modules::run('trangchu/getList','baiviet',100,0,'SapXep asc, IDBaiViet desc','IDBaiViet',array('Loai'=>'Banner','TrangThai'=>1));
include_once(APPPATH . 'includes/chuyendau.php');
$banners=dataWidthKeyID($banners,array('IDBaiViet',array('Loai','Banner'),array('ViTri','')),'IDBaiViet');//print_r($data['banners']);
$data['banners']=$banners['ViTri'];
echo Modules::run("trangchu/".$sub."header",$title,$description,'',$data['banners']);

$this->load->view($sub.$template,$data);

echo Modules::run("trangchu/".$sub."footer");
Modules::run("truycap");