<?php
class Lienhe extends MX_Controller {
    
    private $_table = "baiviet",$_id="IDBaiViet";
    
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        $this->lang->load('lienhe', $language);
    }
 
    function index()
    {
        $data['title'] ='Góp ý';
        $data['description'] = $this->lang->line('lable_contact');
        if($this->form_validation->run('formLienHe')==FALSE)
        {
            
        }
        else
        {
            $MaXacNhan=$this->input->post("MaXacNhan");
              
              if($MaXacNhan!=$this->session->userdata('captcha'))
              {
                $data['error']=$this->lang->line('error_kiemtra_MaXacNhan');
              }
              else
              {
            $add = array(
                        "NguoiGui"   => $this->input->post("name"),
                        "TieuDe"  => $this->input->post("email"),
                        "NoiDung" => $this->input->post("message"),
                        "CapMenu"  => $this->input->post("DiaChi"),
                        "Link" => $this->input->post("DienThoai"),
                        "Loai" => 'LienHe',
                        );
              if($this->default_model->addDuLieuMoi($this->_table,$add))
              {
                echo '<script>alert("'.$this->lang->line('lable_contact_success').'");</script>  ';
              }
              }
        }
        $data['email']=$this->default_model->getInfoID("cauhinh",array("Loai" => "email_smtp_user"));
        $data['info']=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        $data['template']='lienhe';
        $this->load->view('default', $data);
    }
    
    function quanlylienhe($sucess="",$page=1){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $bien_phanbiet=$this->_id;
        $noibang="";
        $dieukien=array("$this->_table.Loai" => "LienHe");
        $url_phantrang=base_url().'lienhe/quanlylienhe/';
        $bien_sapxep_hienthi=$this->_id.' desc';
        $user['template']='quanlylienhe';$user['title']='Khách hàng liên hệ';
        include(APPPATH . 'includes/phantrang_admin.php');
        
        $this->default_model->updateDuLieu($this->_table,array("TrangThai" => '1'),array("TrangThai" => '0', "Loai" => 'LienHe'));
    }
    
    function xemlienhe($id){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url().'thanh-vien/dang-nhap.html');
            exit();
        }
        //phan trang hien thi
        $this->default_model->updateDuLieu('baiviet',array('viewed'=>1),array('IDBaiViet'=>$id));
        $data['info']=Modules::run('trangchu/getInfo',$this->_table,'IDBaiViet',$id);
        $data['template']='xemlienhe'; 
        $this->load->view('admin/admin', $data);
        
    }
    
   
}