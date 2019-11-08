<?php
class Truycap extends MX_Controller {

    private $_table = "truycap",$_id="IDTruyCap";
    
    function __construct() {
        parent::__construct();
        include(APPPATH . 'includes/init.php');
        include_once(APPPATH . 'includes/chuyendau.php');
        $this->lang->load('en', $language);
        
        
    }

    function index() {
        
        if($this->session->userdata('userid')==FALSE){
              $ThanhVien=1;
        }else{
              $ThanhVien=$this->session->userdata('userid');
        }
        $last_time=time()-600;
        $IP=$this->input->server('REMOTE_ADDR');
        $query=$this->default_model->getInfoID($this->_table,array("ThanhVien" => $ThanhVien, "IP" => $IP, "Times >" => $last_time)); 
        
        //Them ban ghi truy cap vao csdl
              $this->load->library('user_agent');
              if ($this->agent->is_browser())
              {
              $agent = $this->agent->browser().' '.$this->agent->version();
              }
              elseif ($this->agent->is_robot())
               {
              $agent = $this->agent->robot();
               }
              elseif ($this->agent->is_mobile())
              {
              $agent = $this->agent->mobile();
              }
              else
              {
              $agent = $this->lang->line('lable_unknow');
              }

              $add = array(
                        "ThanhVien"  => $ThanhVien,
                        "Hits"  => $query["Hits"]+1,
                        "IP"=> $IP,
                        "URL"  => $this->input->server('REQUEST_URI'),
                        "Referrer"  => $this->agent->referrer(),
                        "TrinhDuyet"  => $agent,
                        "HeDieuHanh"  => $this->agent->platform(),
                        "Times"  => time()
                        );
              $update_add = array(
                        "Hits"  => $query["Hits"]+1,
                        "URL"  => $this->input->server('REQUEST_URI'),
                        "Times"  => time()
                        );  
        if($query==FALSE){
              $this->default_model->addDuLieuMoi($this->_table,$add);
        }else{
              $this->default_model->updateDuLieu($this->_table,$update_add,array("$this->_id" => $query["$this->_id"]));
        }
    }
    //quan ly thong bao cho admin
    function dangonline($page=1,$sucess=""){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $last_time=time()-600;
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.ThanhVien")
                      );
        $dieukien=array("Times >" => $last_time);
        $user['Loai']='dangonline';
        $url_phantrang=base_url().'truycap/quanlytruycap/';
        $bien_sapxep_hienthi=''.$this->_id.' desc';
        $user['template']='quanlytruycap';
        $user['title']='Thống kê truy cập';
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    //quan ly truy cap cho admin
    function quanlytruycap($page=1,$sucess=""){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.ThanhVien")
                      );
        $dieukien="";
        $user['Loai']='quanlytruycap';
        $url_phantrang=base_url().'truycap/quanlytruycap/';
        $bien_sapxep_hienthi=''.$this->_id.' desc';
        $user['template']='quanlytruycap';
        $user['title']='Thống kê truy cập';
        include(APPPATH . 'includes/phantrang_admin.php');
        if($this->db->count_all($this->_table)>2000){
            $this->default_model->XoaDuLieu("","","","DELETE FROM $this->_table ORDER BY $this->_id ASC LIMIT 1000");
        }
    }
}