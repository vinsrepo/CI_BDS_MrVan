<?php
class Binhluan extends MX_Controller {

    private $_table = "binhluan",$_id="IDBinhLuan";
    
    function __construct() {
        parent::__construct();
        include(APPPATH . 'includes/init.php');
        include_once(APPPATH . 'includes/chuyendau.php');
        $this->lang->load('binhluan', $language);
    }

    function index() {
        
       $Loai=$this->security->xss_clean($this->input->post("Loai"));
       $ID=$this->security->xss_clean($this->input->post("ID"));
       $LastID=$this->security->xss_clean($this->input->post("LastID"));
       $Start=$this->security->xss_clean($this->input->post("Start"));
       $State=$this->security->xss_clean($this->input->post("State"));
       if($State==0){
        $Start=0;
       }elseif($State==1){
        $LastID=0;
       }
       $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiGui"),
                      );
       echo json_encode($this->default_model->getTableRows($this->_table,10,$Start,$this->_id.' desc','',$this->_id,$noibang,array("Loai" => "$Loai", "$this->_id >" => $LastID, "ID" => $ID)));
       
       
    }
    //tao thong bao cho admin
    function vietbinhluan($Loai="",$IDD=""){
        
        $ID=$this->input->post("ID");
        //neu nguoi dung gui binh luan
        if(isset($ID)&&$ID!="")
        {
           if($this->session->userdata('userid')==FALSE)
           {
            $response = array(
                            'ketqua' => 0,
                            'thongbao' => $this->lang->line('error_not_login')
                             );
           }
           else
           {
               //kiem tra ki tu dac biet
               include(APPPATH . 'includes/check_input.php');
               $NoiDung=$this->input->post("NoiDung");
               if($this->form_validation->run('formVietBinhLuan')==FALSE||check_input($NoiDung)==FALSE)
               {
                 $response = array(
                            'ketqua' => 0,
                            'thongbao' => $this->lang->line('error_value_default')
                             );
               }
               else
               { 
                 $time_session=$this->session->userdata('time_binhluan');
                 $time_binhluan=15;
                 //kiem tra time_binhluan sau $time_binhluan giay moi dc binh luan tiep
                    if($time_session>time()-$time_binhluan)
                    {
                        $response = array(
                            'ketqua' => 0,
                            'thongbao' => sprintf($this->lang->line('error_time_binhluan'),$time_binhluan-(time()-$time_session))
                             );
                    }
                    else
                    {
                        $add = array(
                        "ID"       => $ID,
                        "Loai"     => $this->input->post("Loai"),
                        "NoiDung_BinhLuan"  => $NoiDung,
                        "NguoiGui" => $this->session->userdata('userid')
                         );
                        //tao thanh cong
                        $this->default_model->addDuLieuMoi($this->_table,$add);
                        $this->session->set_userdata(array('time_binhluan' => time()));
                        $response = array(
                            'ketqua' => 1,
                            'thongbao' => 'true'
                             );
                    }
               }
            }
        }
        else
        {
            $data['Loai']=$Loai;
            $data['ID']=$IDD;
            $this->load->view('vietbinhluan',$data);
        }
        
        if(isset($response)){
            echo json_encode($response);
        }
    }
    
    //quan ly thong bao cho admin
    function quanlybinhluan($sucess="",$phanloai="",$page=1){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiGui"),
                      array("key" => "baiviet", "where" => "baiviet.IDBaiViet = $this->_table.ID")
                      );
        $dieukien=array("$this->_table.Loai" => "$phanloai");
        $url_phantrang=base_url().'binhluan/quanlybinhluan/action/'.$phanloai.'/';
        $bien_sapxep_hienthi=$this->_id.' desc';
        $user['template']='quanlybinhluan';
        $user['Loai']=$phanloai;
        $config['uri_segment'] = 5;
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    //sua binh luan
    function suabinhluan($ID="") {
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
               $data['error']="";
               if($this->form_validation->run('formVietBinhLuan')==FALSE)
               {
                 
               }
               else
               { 
                 $Loai=$this->input->post("Loai");
                 $add = array(
                        "ID"       => $this->input->post("ID"),
                        "NoiDung_BinhLuan"  => $this->input->post("NoiDung"),
                        "NguoiGui" => $this->input->post("NguoiGui"),
                        "Loai" => $Loai
                         );
                 $this->default_model->updateDuLieu($this->_table,$add,array("$this->_id" => $ID));
                 redirect(base_url()."binhluan/quanlybinhluan/g/$Loai/");
                 exit(); 
               }
        $data['users']=$this->default_model->getInfoID($this->_table,array("$this->_id" => $ID));
        $data['template']='suabinhluan';
        $this->load->view('admin/content',$data);
    }
}
