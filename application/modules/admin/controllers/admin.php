<?php
class Admin extends MX_Controller {
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        include(APPPATH . 'includes/chuyendau.php');
        $this->lang->load('en', $language);        
        $this->lang->load('truycap/en', $language);
        $this->load->helper('language');
    }
 
    function trangchu()
    { 
        //--- Neu chua dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url()."admin/dangnhap");
            exit();
        }
        else
        {
          if($this->session->userdata('permission')!=1){
              redirect(base_url());
              exit();
          }
          $data['title'] = $this->lang->line('title_admincp');
          $data['template']='home';
          $data['user_admin']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
          $this->load->view('admin', $data);
        }
         
        
    }
    function index()
    {
      // var_dump($this->session->userdata('permission'));
        //--- Neu chua dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url()."admin/dangnhap");
            exit();
        }
        else
        {
          if($this->session->userdata('permission')!=1){
              redirect(base_url());
              exit();
          }
          $data['thongke']=$this->default_model->getTableRows("thanhvien","","",'NgayThamGia asc','','userid',"","",array("date"),"SUM(sum), date");
          $this->load->library('user_agent');
          $data['title'] = $this->lang->line('title_admincp');
          $data['template']='trangchu';
          $data['username']=$this->session->userdata('username');
          $this->load->view('admin', $data);
        }
         
        
    }
    //Dang nhap admin cp
    function dangnhap(){
        //--- Neu da dang nhap thi khong duoc dang nhap nua
        if($this->session->userdata('userid')==TRUE){
            redirect(base_url()."admin");
            exit();
        }
        $data['title'] = $this->lang->line('title_dangnhap_admincp');
        $data['error'] = '';
        $data['template']='dangnhap'; 
        $data['hidden_top']=true;
        $data['bodyClass']='login_page'; 
        $username=$this->security->xss_clean($this->input->post("username"));
        $password=$this->security->xss_clean($this->input->post("password"));
        //Neu dang nhap loi
        if($username||$password){      
            $user=$this->default_model->getInfoID("thanhvien",array("username" => $username, "password" => md5($password), "permission" => "1"));
        if($user==FALSE)
        {
              $data['error'] = $this->lang->line('error_kiemtra_dangnhap');              
        }
        else
        {
              
              $addSession = array(
                        "username"  => $user['username'],
                        "userid"    => $user['userid'],
                        "Avatar"    => $user['Avatar'],
                        "permission"=> $user['permission'],
                                 );
              $this->session->set_userdata($addSession);
              redirect(base_url()."admin");
              exit();
               
        }
        }        
        $this->load->view('admin', $data);
    }
    
    //tao tai khoan cho admin
    function taotaikhoan(){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['error']="";
        //Neu dang ky loi
        if($this->form_validation->run('formTaoTaiKhoan')==FALSE)
        {
        }
        else
        {  
           $username=$this->input->post("username");
           if($this->default_model->getInfoID("thanhvien",array("username" => $username))!=FALSE)
           {
            $data['error']=$this->lang->line('error_kiemtra_username');
           }
           else
           { 
              //Dang ky thanh cong
              $add = array(
                        "username"  => $username,
                        "password"  => md5($this->input->post("password")),
                        "permission"=> $this->input->post("ChucVu")
                        );
              if($this->default_model->addDuLieuMoi("thanhvien",$add))
              {
              redirect(base_url()."thanhvien/quanlythanhvien/1/g/");
              exit(); 
              }
           }
            
        }
        $data['template']='form_taotaikhoan'; 
        $this->load->view('admin/admin',$data); 
    }
    
    //dong / mo wwebsite
    function dongmowebsite(){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['sucess']='';
        $table="cauhinh";
        $Loai='DongMoWebsite';
        include(APPPATH . 'includes/trinhsoanthao.php'); 
        $TrangThai=$this->input->post("TrangThai");
        $TieuDe=$this->input->post("TieuDe");
        $ThongBao=$this->input->post("ThongBao");
        if(isset($TrangThai)&&$TrangThai!="")
        {
           if($TrangThai==1)
           {
            
               if($this->form_validation->run('formDongMoWebsite')==FALSE)
               {
                  $action=0;
               }
               else
               {
                  $action=1;
               }
           }
           else
           {
               $action=1;
           }
           
           if($action==1)
           {
             $this->default_model->updateDuLieu($table,array("TieuDe" => $TieuDe, "GiaTri" => $ThongBao, "TrangThai" => $TrangThai),array("Loai" => $Loai));
             $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
           } 
           
        }
        
        $data['site']=$this->default_model->getInfoID($table,array("Loai" => $Loai));
        $data['template']='dongmowebsite';
        $data['title']='Đóng mở website';
        $this->load->view('admin/admin',$data);
    }
    
    function suathongtin(){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['sucess']='';
        $table="cauhinh";
        $data['title']='CẤU HÌNH CHUNG';
        $Loai='CauHinhChung';
         
              if($this->form_validation->run('formCauHinhChung')==FALSE)
               {
                  $action=0;
               }
               else
               {
                  $action=1;
               }
           
           if($action==1)
           {
             $add=array(
                        "TenTrangWeb" => $this->input->post("TenTrangWeb"),
                        "TieuDe" => $this->input->post("TieuDe"),
                        "MoTa" => $this->input->post("MoTa"),
                        "PhanTrang" => $this->input->post("PhanTrang"),
                        "cache" => $this->input->post("cache"),
                        "Category_Header" => $this->input->post("Category_Header"),
                        "Category_Footer" => $this->input->post("Category_Footer"),
                        "HuongDan_Header" => $this->input->post("HuongDan_Header"),
                        "HuongDan_Footer" => $this->input->post("HuongDan_Footer"),
                        "Facebook" => $this->input->post("Facebook"),
                        "Twitter" => $this->input->post("Twitter"),
                        "Google" => $this->input->post("Google"),
                        "Youtube" => $this->input->post("Youtube"),
                        "TenCongTy" => $this->input->post("TenCongTy"),
                        "DiaChi" => $this->input->post("DiaChi"),
                        "DienThoai" => $this->input->post("DienThoai"),
                        "Fax" => $this->input->post("Fax"),
                        "Skype" => $this->input->post("Skype"),
                        "LinkedIn" => $this->input->post("LinkedIn"),
                        "ThoiGianLamViec" => $this->input->post("ThoiGianLamViec"),
                        "GiayPhep" => $this->input->post("GiayPhep"),
                        "GhiChu" => $this->input->post("GhiChu"),
                        "google_analytics" => $this->input->post("google_analytics"),
                        "webmaster_tool" => $this->input->post("webmaster_tool"),
                        "toado_x" => $this->input->post("toado_x"),
                        "toado_y" => $this->input->post("toado_y"),
                       );
             $this->default_model->updateDuLieu($table,array("GiaTri" => json_encode($add)),array("Loai" => $Loai));
             $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
           } 
     
        
        $data['info']=$this->default_model->getInfoID($table,array("Loai" => $Loai));
        $data['template']='cauhinhchung';
        $this->load->view('admin/admin',$data);
    }
    
    function suatemplate($Loai=""){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['sucess']='';
        $data['Loai']=$Loai;
        $table="cauhinh";
        $NoiDung=$this->input->post("NoiDung");
        include(APPPATH . 'includes/trinhsoanthao.php'); 
        if($NoiDung=="")
        {
           $action=0;
        }
        else
        {
           $action=1;
        }
           
           if($action==1)
           {
             $this->default_model->updateDuLieu($table,array("GiaTri" => $NoiDung),array("Loai" => $Loai));
             $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
           } 
     
        
        $data['info']=$this->default_model->getInfoID($table,array("Loai" => $Loai));
        $data['template']='suatemplate';
        $this->load->view('admin/admin',$data);
    }
    
    function change_user($loai=''){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $table="cauhinh";
        if($this->input->post("solandangtin")!=''||$this->input->post("solanuptin")!=''){
        $add=array(
                        "solandangtin" => $this->input->post("solandangtin"),
                        "solanuptin" => $this->input->post("solanuptin"),
                        "price" => $this->input->post("price"),
                       );
        $this->default_model->updateDuLieu($table,array("GiaTri" => json_encode($add)),array("Loai" => $loai));
        $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
        }
        
        $data['info']=$this->default_model->getInfoID($table,array("Loai" => $loai));
        $data['template']='free_user';
        $data['loai']=$loai;
        $data['title']=$this->lang->line('lable_'.$loai);
        $this->load->view('admin/admin',$data);
    }
    function years($loai=''){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        if($this->input->post("namsx")!=''){
        $namsx=$this->input->post("namsx");
        file_put_contents(APPPATH . 'includes/namsx.txt',$namsx);
        $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
        }
        $data['template']='years';
        $data['loai']=$loai;
        $this->load->view('admin/admin',$data);
    }
    
    function thanhtoan(){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['sucess']='';
        $table="cauhinh";
        $Loai='ThanhToan';
         
           if($this->form_validation->run('formThanhToan')==FALSE)
               {
                  $action=0;
               }
               else
               {
                  $action=1;
               }
           
           if($action==1)
           {
             $add=array(
                        "SoTaiKhoan" => $this->input->post("SoTaiKhoan"),
                        "ChiNhanh" => $this->input->post("ChiNhanh"),
                        "NguoiHuongLoi" => $this->input->post("NguoiHuongLoi"),
                        "SoTien" => $this->input->post("SoTien"),
                        "NoiDung" => $this->input->post("NoiDung"),
                        "LuuY" => $this->input->post("LuuY"),
                       );
             $this->default_model->updateDuLieu($table,array("GiaTri" => json_encode($add)),array("Loai" => $Loai));
             $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
           } 
     
        
        $data['info']=$this->default_model->getInfoID($table,array("Loai" => $Loai));
        $data['template']='thanhtoan';
        $data['title']='Cấu hình thông tin thanh toán';
        $this->load->view('admin/admin',$data);
    }
    function baogia(){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['sucess']='';
        $table="cauhinh";
        $Loai='BaoGia';
         include(APPPATH . 'includes/trinhsoanthao.php'); 
           if($this->form_validation->run('formBaoGia')==FALSE)
               {
                  $action=0;
               }
               else
               {
                  $action=1;
               }
           
           if($action==1)
           {
             $add=array(
                        "TinRao" => $this->input->post("TinRao"), 
                        "Banner" => $this->input->post("Banner"), 
                        "PR" => $this->input->post("PR"), 
                       );
             $this->default_model->updateDuLieu($table,array("GiaTri" => json_encode($add)),array("Loai" => $Loai));
             $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
           } 
     
        
        $data['info']=$this->default_model->getInfoID($table,array("Loai" => $Loai));
        $data['template']='baogia';
        $this->load->view('admin/admin',$data);
    }
    function naptien(){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['sucess']='';
        $table="cauhinh";
        $Loai='NapTien';
         
           if($this->form_validation->run('formNapTien')==FALSE)
               {
                  $action=0;
               }
               else
               {
                  $action=1;
               }
           
           if($action==1)
           {
             $add=array(
                        "merchant_id" => $this->input->post("merchant_id"),
                        "password" => $this->input->post("password"),
                        "merchant_account" => $this->input->post("merchant_account"),
                        "client_fullname" => $this->input->post("client_fullname"),
                        "client_email" => $this->input->post("client_email"),
                        "client_mobile" => $this->input->post("client_mobile"),
                       );
             $this->default_model->updateDuLieu($table,array("GiaTri" => json_encode($add)),array("Loai" => $Loai));
             $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
           } 
     
        
        $data['info']=$this->default_model->getInfoID($table,array("Loai" => $Loai));
        $data['template']='naptien';
        $data['title']='Cấu hình thông tin thanh toán qua ngân lượng';
        $this->load->view('admin/admin',$data);
    }
    
    function check_exist($ID,$start){
        $last=$ID.'-'.$start;
          if($this->default_model->getInfoID("tinhthanh",array("Link" => $last))){
              $key=$this->check_exist($ID,$start+1);
          }else{
              $key=$start;
          }
          return $key;
    }
    
    function update(){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $table="tinhthanh";
        $arr = file_get_contents(APPPATH . 'includes/exam.txt'); 
        foreach(json_decode($arr,true) as $key=>$val){
            if(!$this->default_model->getInfoID($table,array("Link" => stripUnicode($val['Text'])))){
                 //$this->default_model->addDuLieuMoi($table,array("Note" => $val['Id'],"Name" => $val['Text'],"Loai" => 'DoiXe','Link'=>stripUnicode($val['Text'])));         
            } 
            $getQuans=file_get_contents('http://batdongsan3mien.com/Handler/SearchHandler.ashx?module=GetDistrict&cityCode='.$val['Id'].'');
            foreach(json_decode($getQuans,true) as $key=>$quan){
                if(!$this->default_model->getInfoID($table,array("Link" => stripUnicode($quan['Text'])))){
                    $Link=stripUnicode($quan['Text']);
                }else{
                    $Link=stripUnicode($quan['Text']).'-'.$this->check_exist(stripUnicode($quan['Text']),1);
                } 
                //$this->default_model->addDuLieuMoi($table,array("Parent" => $val['Id'],"Note" => $quan['Id'],"Name" => $quan['Text'],"Loai" => 'NamSX','Link'=>$Link)); 
                $getPhuongs=file_get_contents('http://batdongsan3mien.com/Handler/SearchHandler.ashx?module=GetWard&distID='.$quan['Id'].'');
                foreach(json_decode($getPhuongs,true) as $key=>$phuong){
                    $checklink=stripUnicode($phuong['WardPrefix'].'-'.$phuong['Text']);
                    if(!$this->default_model->getInfoID($table,array("Link" => $checklink))){
                       $Link=$checklink;
                    }else{
                       $Link=$checklink.'-'.$this->check_exist($checklink,1);
                    } 
                    $this->default_model->addDuLieuMoi($table,array("Parent" => $quan['Id'],"Perfix" => $phuong['WardPrefix'],"Note" => $phuong['Id'],"Name" => $phuong['Text'],"Loai" => 'XuatXu','Link'=>$Link)); 
                }
                //
                $getDuongs=file_get_contents('http://batdongsan3mien.com/Handler/SearchHandler.ashx?module=GetStreet&distID='.$quan['Id'].'');
                foreach(json_decode($getDuongs,true) as $key=>$duong){
                    $checklink2=stripUnicode($duong['StreetPrefix'].'-'.$duong['Text']);
                    if(!$this->default_model->getInfoID($table,array("Link" => $checklink2))){
                       $Link=$checklink2;
                    }else{
                       $Link=$checklink2.'-'.$this->check_exist($checklink2,1);
                    } 
                    $this->default_model->addDuLieuMoi($table,array("Parent" => $quan['Id'],"Perfix" => $duong['StreetPrefix'],"Note" => $duong['Id'],"Name" => $duong['Text'],"Loai" => 'PhanHang','Link'=>$Link)); 
                }
            } 
        }  
        echo $arr;
    }
}