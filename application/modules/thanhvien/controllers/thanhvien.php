<?php
class Thanhvien extends MX_Controller {
    
    private $_table = "thanhvien",$_id="userid";
    
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        $this->lang->load('thanhvien', $language);
        $this->lang->load('admin/en', $language);
		
        
    }
 
    function index()
    {
        //--- Neu chua dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        else
        {
          if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
            if($this->default_model->getInfoID($this->_table,array($_COOKIE['username'], $_COOKIE['password'])))
              $this->session->set_userdata(array('username'=>$username));
              $data['title'] = $this->lang->line('title_thongtinthanhvien');
              $data['description'] = $this->lang->line('title_thongtinthanhvien');
              $data['template']='thongtinthanhvien';
              $data['username']=$this->session->userdata('username');
              $this->load->view('default', $data);
          }else 
            redirect(base_url());
            exit();
        }
         
        
    }
    function profile(){
      //--- Neu chua dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        else
        {
        $data['title'] = $this->lang->line('title_thongtinthanhvien');
        $data['description'] = $this->lang->line('title_thongtinthanhvien');
        $data['template']='thongtinthanhvien';
        $data['username']=$this->session->userdata('username');
        $this->load->view('default', $data);
        }
    }
    //Dang ky thanh vien
    function dangkythanhvien()
    {
        //--- Neu da dang nhap thi khong duoc dang ki
        if($this->session->userdata('userid')==TRUE){
            redirect(base_url()."thanh-vien/");
            exit();
        }
        
              $data['title'] = $this->lang->line('title_dangkythanhvien');
              $data['description'] = $this->lang->line('title_dangkythanhvien');
              $data['error'] = '';
              $data['template']='form_dangkythanhvien'; 
              
        //Neu dang ky loi
        if($this->form_validation->run('formDangKy')==FALSE)
        {
                   
        }
        else
        {     
              //Dang ky thanh cong
              $username=$this->input->post("username");
              $Email=$this->input->post("Email");
              $phoneNumber = $this->input->post("DienThoai");
              if(Modules::run('trangchu/getInfo',$this->_table,'username',$username)!=''){
                $data['error']="Tên đăng nhập đã được sử dụng, vui lòng chọn tên khác.";
              }elseif(Modules::run('trangchu/getInfo',$this->_table,'DienThoai',$phoneNumber)!=''){
                $data['error']=sprintf($this->lang->line('error_kiemtra_phone'),$phoneNumber);    
              }elseif($this->input->post("MaXacNhan")!=$this->session->userdata('captcha')){
                $data['error']=$this->lang->line('error_kiemtra_MaXacNhan');
              }
              // else{
              //   $this->load->library("TwoFactorAPI"); 
              //   $twoFA = new TwoFactorAPI("koUYJ5vqaPazLtG-8BEZ2KLHXv4NleuH");
              //   $appId = 'G-rcOzKuHYdsYm5h08PQeYCgwbBA1UaK';
              //   $content = "{pin_code}";
              //   $response = $twoFA->pinCreate($phoneNumber, 'Ma OTP la: '. $content, $appId);
              //   if(!$response['status']['error']){
              //     $TrangThai=2;
              //     $MaKichHoat = $response['data']['pin_code'];
              //   }else
              //   {
              //     $MaKichHoat=0;
              //     $TrangThai=2;
              //   }
                           
              // $EmailKichHoat=$this->default_model->getInfoID('cauhinh',array("Loai" => "EmailKichHoat", "TrangThai" => '1'));
              // if($EmailKichHoat!=FALSE)
              // {
              //   $MaKichHoat=md5(time()-600);
              //   $NoiDung=str_replace('{USERNAME}', $username, $EmailKichHoat['GiaTri']);
              //   $NoiDung=str_replace('{LINK}', base_url().'thanh-vien/kich-hoat-tai-khoan/'.$MaKichHoat.'.html', $NoiDung);

              //   Modules::run("email/sendemail",$Email,$EmailKichHoat['TieuDe'],$NoiDung);
              //   $TrangThai=2;
              // }
              // else
              // {
              //   $MaKichHoat=0;
              //   $TrangThai=0;
              // }
              
              $add = array(
                        "username"  => $username,
                        "password"  => md5($this->input->post("repassword")),
                        "Email"     => $Email,
                        "HoVaTen"   => $this->input->post("HoVaTen"),
                        "GioiTinh"  => $this->input->post("GioiTinh"),
                        "DienThoai" => $phoneNumber,
                        "DiaChi"    => $this->input->post("DiaChi"),
                        "TinhThanh" => $this->input->post("TinhThanh"),
                        "TrangThai" => 0,
                        "level"     => 'free_user',
                        "LoiNhan" => '',
                        "date" => date("d-m-Y",time()),
                         );
              if($this->default_model->addDuLieuMoi($this->_table,$add))
              {
              $data['title'] = $this->lang->line('title_dangkythanhcong');
              $data['template']='trangchu'; 
              $user=$this->default_model->getInfoID($this->_table,array("username" => $username));                
               if($user!=FALSE)
               {
                  $data['userid']=$user['userid'];
                  $data['username']=$username;
                  $data['permission']=$user['permission'];
                  if($data['permission'] != 1){
                    $this->session->set_userdata(array('username' => $username,'userid' => $user['userid'])); 
                  }                                     
                  $EmailChaoMung=$this->default_model->getInfoID('cauhinh',array("Loai" => "EmailChaoMung", "TrangThai" => '1'));
                
                  if($EmailChaoMung!=FALSE && $Email !='')
                    {
                      Modules::run("email/sendemail",$Email,$EmailChaoMung['TieuDe'], str_replace('{USERNAME}', $username, $EmailChaoMung['GiaTri']));
                    }  
                  redirect(base_url());
                  exit();
                 }
              }
            // }
        }
        $this->load->view('default',$data); 
    }
    function dangkythanhvienJson()
    {
        //--- Neu da dang nhap thi khong duoc dang ki
        if($this->session->userdata('userid')==TRUE){
            redirect(base_url()."thanh-vien/");
            exit();
        }
        
        $data['title'] = $this->lang->line('title_dangkythanhvien');
        $data['description'] = $this->lang->line('title_dangkythanhvien');
        $data['error'] = '';
        $data['template']='form_dangkythanhvien'; 
              
        //Neu dang ky loi
        if($this->form_validation->run('formDangKy')==FALSE)
        {
          $data['status'] = false;
          $data['message'] = validation_errors();        
        }
        else 
        {                   
              //Dang ky thanh cong
              $username=$this->input->post("username");
              $Email=$this->input->post("Email");
              $phoneNumber = $this->input->post("DienThoai");
              if(Modules::run('trangchu/getInfo',$this->_table,'username',$username)!=''){
                $data['message']="Tên đăng nhập đã được sử dụng, vui lòng chọn tên khác.";
              }elseif(Modules::run('trangchu/getInfo',$this->_table,'DienThoai',$phoneNumber)!=''){
                $data['message']=sprintf($this->lang->line('error_kiemtra_phone'),$phoneNumber);  
              }elseif($this->input->post("MaXacNhan")!=$this->session->userdata('captcha')){
                $data['message']=$this->lang->line('error_kiemtra_MaXacNhan');
              }
              // else{
              //   $this->load->library("TwoFactorAPI"); 
              //   $twoFA = new TwoFactorAPI("koUYJ5vqaPazLtG-8BEZ2KLHXv4NleuH");
              //   $appId = 'G-rcOzKuHYdsYm5h08PQeYCgwbBA1UaK';
              //   $content = "{pin_code}";
              //   $response = $twoFA->pinCreate($phoneNumber, 'Ma OTP la: '. $content, $appId);
              //   if(!$response['status']['error']){
              //     $TrangThai=2;
              //     $MaKichHoat = $response['data']['pin_code'];
              //   }else
              //   {
              //     $MaKichHoat=0;
              //     $TrangThai=2;
              //   }

              // $EmailKichHoat=$this->default_model->getInfoID('cauhinh',array("Loai" => "EmailKichHoat", "TrangThai" => '1'));
              // if($EmailKichHoat!=FALSE)
              // {
              //   $MaKichHoat=md5(time()-600);
              //   $NoiDung=str_replace('{USERNAME}', $username, $EmailKichHoat['GiaTri']);
              //   $NoiDung=str_replace('{LINK}', base_url().'thanh-vien/kich-hoat-tai-khoan/'.$MaKichHoat.'.html', $NoiDung);
              //   Modules::run("email/sendemail",$Email,$EmailKichHoat['TieuDe'],$NoiDung);
              //   $TrangThai=2;
              // }
              // else
              // {
              //   $MaKichHoat=0;
              //   $TrangThai=0;
              // }              
              $add = array(
                        "username"  => $username,
                        "password"  => md5($this->input->post("repassword")),
                        "Email"     => $Email,
                        "HoVaTen"   => $this->input->post("HoVaTen"),
                        "GioiTinh"  => $this->input->post("GioiTinh"),
                        "DienThoai" => $phoneNumber,
                        "DiaChi"    => $this->input->post("DiaChi"),
                        "TinhThanh" => $this->input->post("TinhThanh"),
                        "TrangThai" => 0,
                        "level"     => 'free_user',
                        "LoiNhan" => '',
                        "date" => date("d-m-Y",time()),
                         );
              if($this->default_model->addDuLieuMoi($this->_table,$add))
              {
                $data['title'] = $this->lang->line('title_dangkythanhcong');
                $data['template']='trangchu'; 
                $user=$this->default_model->getInfoID($this->_table,array("username" => $username));                
                 if($user!=FALSE)
                 {
                    $data['userid']=$user['userid'];
                    $data['username']=$username;
                    $data['permission']=$user['permission'];
                    if($data['permission'] != 1){
                      $this->session->set_userdata(array('username' => $username,'userid' => $user['userid'])); 
                    }
                    $EmailChaoMung=$this->default_model->getInfoID('cauhinh',array("Loai" => "EmailChaoMung", "TrangThai" => '1'));
                  
                    if($EmailChaoMung!=FALSE && $Email !='')
                      {
                        Modules::run("email/sendemail",$Email,$EmailChaoMung['TieuDe'], str_replace('{USERNAME}', $username, $EmailChaoMung['GiaTri']));
                      }
              $data['status'] = true;
              $data['message'] = base_url();
            // exit();
                 }
              }
            // }
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        $string = $this->output->get_output();
        echo $string;
        exit();
        // echo json_encode($data);
        // $this->load->view('default',$data); 
    }
    //kiem tra trang thai tai khoan bi khoa va chua kich hoat
    function kiemtratrangthai(){
        if($this->session->userdata('userid')!=FALSE)
        {
            $user=$this->default_model->getInfoID($this->_table,array("userid" => $this->session->userdata('userid')));
            if($user['TrangThai']==1){
                $redirect='thanh-vien/tai-khoan-da-bi-khoa.html';
                if($this->input->server('REQUEST_URI')!="/".$redirect){
                redirect(base_url().$redirect);
                }
                 
            }
            // if($user['TrangThai']==2){
            //     $redirect='thanh-vien/xac-thuc.html';
            //     if($this->input->server('REQUEST_URI')!="/".$redirect){
            //     redirect(base_url().$redirect);
            //     }
                 
            // }
        }
    }
    //thong bao tai khoan bi khoa
    function taikhoanbikhoa(){
        if($this->session->userdata('userid')!=FALSE)
        {
        $user=$this->default_model->getInfoID($this->_table,array("userid" => $this->session->userdata('userid')));
            if($user['TrangThai']==1){
        $data['ThongBao']=sprintf($this->lang->line('thongbao_taikhoanbikhoa'), $this->session->userdata('username'));
        $data['title'] = $this->lang->line('title_taikhoanbikhoa');
        $data['description'] = $this->lang->line('title_taikhoanbikhoa');
        $data['template']='div_kichhoat'; 
        $data['LoiNhan']=$user['LoiNhan']; 
        $this->load->view('default',$data); 
            }else{
                redirect(base_url());
            }
        }
        else
        {
            redirect(base_url());
        }
    }
    // function xacthuc(){
    //     if($this->session->userdata('userid')!=FALSE)
    //     {
    //         $user=$this->default_model->getInfoID($this->_table,array("userid" => $this->session->userdata('userid')));

    //         if($user['TrangThai']==2){
    //           if($this->form_validation->run('formXacthuc')==FALSE)
    //           {
    //             $data['status'] = false;
    //             $data['message'] = validation_errors();        
    //           }else{
    //             $this->load->library("TwoFactorAPI");
    //             $pinCode = $this->input->post("MaXacThuc");
    //             $twoFA = new TwoFactorAPI("koUYJ5vqaPazLtG-8BEZ2KLHXv4NleuH");
    //             $appId = 'G-rcOzKuHYdsYm5h08PQeYCgwbBA1UaK';
    //             $phone = $user['DienThoai'];
    //             $response = $twoFA->pinVerify($phone, $pinCode, $appId);
    //             if($response['data']['verified'] != FALSE){
    //               $this->default_model->updateDuLieu($this->_table,array("TrangThai" => 0, "LoiNhan" => ''),array("userid" => $this->session->userdata('userid')));
    //               redirect(base_url());
    //             }else{
    //               $data['ThongBao'] = '<div class="alert alert-danger">
    //                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                         Đã có lỗi xảy ra, vui lòng thử lại!
    //                     </div>';
    //             }
    //           }
    //           $data['SDT'] = $user['DienThoai'];
    //           $data['template']='xacthuc'; 
    //           $this->load->view('default',$data); 
    //         }else{
    //             redirect(base_url());
    //         }
    //     }
    //     else
    //     {
    //         redirect(base_url());
    //     }
    // }


    //thong bao tai khoan chua kich hoat
    // function taikhoanchuakichhoat(){
    //     if($this->session->userdata('userid')!=FALSE)
    //     {
    //         $user=$this->default_model->getInfoID($this->_table,array("userid" => $this->session->userdata('userid')));
    //         if($user['TrangThai']==2){
    //         $data['ThongBao']=sprintf($this->lang->line('thongbao_taikhoanchuakichhoat'), $user['username'], $user['Email']);
    //         $data['title'] = $this->lang->line('title_taikhoanchuakichhoat');
    //         $data['description'] = $this->lang->line('title_taikhoanchuakichhoat');
    //         $data['template']='div_kichhoat'; 
    //         $this->load->view('default',$data); 
    //         }else{
    //             redirect(base_url());
    //         }
    //     }
    //     else
    //     {
    //         redirect(base_url());
    //     }
    // }
    //kich hoat tai khoan
    // function kichhoattaikhoan($MaKicHoat){
    //     if($MaKicHoat)
    //     {
    //     $data['users']=$this->default_model->getInfoID($this->_table,array("userid" => $this->session->userdata('userid'), "LoiNhan" => $MaKicHoat));
    //       if($data['users']!=FALSE)
    //         {
    //           $this->default_model->updateDuLieu($this->_table,array("TrangThai" => 0, "LoiNhan" => ''),array("userid" => $this->session->userdata('userid')));
    //           $data['ThongBao']=sprintf($this->lang->line('lable_actived'), $this->session->userdata('username'));
    //         }
    //        else
    //         {
    //          $data['ThongBao']='<b style="color:red">'.$this->lang->line('error_actived').'</b>';
    //         }
    //       }
    //       else
    //       {
    //         $data['ThongBao']='<b style="color:red">'.$this->lang->line('error_actived').'</b>';
    //     }
    //     $data['title'] = $this->lang->line('title_active');
    //     $data['description'] = $this->lang->line('title_active');
    //     $data['template']='div_kichhoat';
    //     $this->load->view('default',$data); 
    // }
    //quen mat khau cho thanh vien
    function quenmatkhau(){
        if($this->session->userdata('userid')==TRUE){
            redirect(base_url()."thanh-vien/");
            exit();
        }
        $Email=$this->input->post("Email");
        $data['error']='';
        $data['sucess']='';       
        if(isset($Email)&&$Email!="")
        {
          $this->load->helper('email');
                   
           if (valid_email($Email))
           {
                 $user=$this->default_model->getInfoID($this->_table,array("Email" => $Email));
                 if($user!=FALSE)
                 {
                  $Mail=$this->default_model->getInfoID('cauhinh',array("Loai" => "EmailQuenMatKhau", "TrangThai" => '1'));
                  $MaKichHoat=md5(time()-600);
                  $this->default_model->updateDuLieu($this->_table,array("code" => $MaKichHoat),array("userid" => $user['userid']));
                  $NoiDung=str_replace('{USERNAME}', $user['username'], $Mail['GiaTri']);
                  $NoiDung=str_replace('{LINK}', base_url().'thanh-vien/lay-lai-mat-khau/'.$MaKichHoat.'.html', $NoiDung);                             Modules::run("email/sendemail",$Email,$Mail['TieuDe'], $NoiDung);
                   $data['sucess']=$this->lang->line('sucess_lostpass');
                 }
                 else
                 {
                 $data['error']=$this->lang->line('error_no_email');
                 }
           }
           else
           {
             $data['error']=$this->lang->line('error_no_email');
           }
        }
        $data['title'] = $this->lang->line('title_lostpass');
        $data['description'] = $this->lang->line('title_lostpass');
        $data['template']='quenmatkhau';
        $this->load->view('default',$data); 
    }
    //dat lai mat khau moi
    function datmatkhaumoi($MaXacNhan){
        if($this->session->userdata('userid')==TRUE){
            redirect(base_url()."thanh-vien/");
            exit();
        }
        
        $data['error']='';
        $data['sucess']='';
        
        $user=$this->default_model->getInfoID($this->_table,array("code" => $MaXacNhan));
        if($user!=FALSE)
        {
            $Pass=$this->input->post("password");
            $Repass=$this->input->post("repassword");
            if(isset($Pass)&&$Pass!=""&&$Repass!="")
            {
                if($Pass==$Repass)
                {
                    $this->default_model->updateDuLieu($this->_table,array("code" => '', "password" => md5($Pass)),array("userid" => $user['userid']));
                    $data['sucess']=$this->lang->line('thongbao_doi_matkhau_thanhcong');
                }
                else
                {
                    $data['error']=$this->lang->line('error_repass');
                }
            }
            else
            {
                $data['error']=$this->lang->line('error_not_value_all');
            }
        }
        else
        {
            $data['error']=$this->lang->line('error_actived');
        }
        $data['title'] = $this->lang->line('title_lostpass');
        $data['description'] = $this->lang->line('title_lostpass');
        $data['template']='laylaimatkhau';
        $this->load->view('default',$data); 
    }
    //Dang nhap
    function dangnhap(){                
      //--- Neu da dang nhap thi khong duoc dang nhap nua
      if($this->session->userdata('userid')==TRUE){
          redirect(base_url()."trang-ca-nhan");
          exit();
      }
            $data['title'] = $this->lang->line('title_dangnhap');
            $data['description'] = $this->lang->line('title_dangnhap');
            $data['error'] = '';
            $data['template']='form_dangnhap'; 
            
      //Neu dang nhap loi
      if($this->form_validation->run('formDangNhap')==FALSE)
      {
            $this->load->view('default',$data);              
      }
      else
      {
        $username=$this->input->post("username");
        $password=$this->input->post("password");
        
        $user=$this->default_model->getInfoID($this->_table,array("username" => $username, "password" => md5($password)));
        //Dang nhap thanh cong
        if($user!=FALSE)
        {
        $addSession = array(
                  "username"  => $user['username'],
                  "userid"    => $user['userid'],
                  "permission"=> $user['permission'],
                           );
        $this->session->set_userdata($addSession);
        $date_vip=$user['date_vip'];
        if($date_vip<time()){
          $this->default_model->updateDuLieu('thanhvien',array("level" => 'free_user','date_vip'=>''),array("userid" => $this->session->userdata('userid')));
        }
        
        $this->load->library('user_agent');
        if ($this->agent->is_referral()&&$this->agent->referrer()!=base_url()."thanh-vien/dang-nhap.html")
        {
          $referer=$this->agent->referrer();
        }else{
          $referer=base_url();
        }
        redirect($referer);
        exit();
        }
        else{
          //Sai ten dang nhap or mat khau
          $data['error'] = $this->lang->line('error_kiemtra_dangnhap');
          $this->load->view('default',$data); 
        } 
      }
    }
    function dangnhapJson(){                     
        //--- Neu da dang nhap thi khong duoc dang nhap nua
        if($this->session->userdata('userid')==TRUE){
            redirect(base_url()."thanh-vien/sua-thong-tin-ca-nhan.html");
            exit();
        }
              $data['title'] = $this->lang->line('title_dangnhap');
              $data['description'] = $this->lang->line('title_dangnhap');
              $data['error'] = '';
              $data['template']='form_dangkythanhvien'; 
              
        //Neu dang nhap loi
        if($this->form_validation->run('formDangNhap')==FALSE)
        {
            $data['status'] = false;
            $data['message'] = validation_errors();              
        }
        else
        {
          $username=$this->input->post("username");
          $password=$this->input->post("password");
          $remember=$this->input->post("chkRemember");
          
          $user=$this->default_model->getInfoID($this->_table,array("username" => $username, "password" => md5($password)));
          //Dang nhap thanh cong
          if($user!=FALSE)
          {
            $addSession = array(
              "username"  => $user['username'],
              "userid"    => $user['userid'],
              "permission"=> $user['permission'],
                       );
            $this->session->set_userdata($addSession);
            if($remember != NULL) {
              setcookie('username', $username, time() + (86400 * 30), "");
              setcookie('password', $password, time() + (86400 * 30), "");
            }
            // $date_vip=$user['date_vip'];
            // if($date_vip<time()){
            //   $this->default_model->updateDuLieu('thanhvien',array("level" => 'free_user','date_vip'=>''),array("userid" => $this->session->userdata('userid')));
            //  }
    
            $this->load->library('user_agent');
            if ($this->agent->is_referral()&&$this->agent->referrer()!=base_url()."thanh-vien/dang-nhap.html")
            {
              $referer=$this->agent->referrer();
            }else{
              $referer=base_url();
            }
          $data['status'] = true;
          $data['message'] = base_url();        
          // redirect($referer);
          // exit();
          }
          else{
            //Sai ten dang nhap or mat khau
            $data['status'] = false;
            $data['message'] = $this->lang->line('error_kiemtra_dangnhap');
            // $this->load->view('default',$data);                
          }              
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        $string = $this->output->get_output();
        echo $string;
        exit();
    }  
    //Doi Avatar
    function doiavatar()
    {
        //--- Neu chua dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        else
        {
        $data['title'] = $this->lang->line('title_doiavatar');
        $data['description'] = $this->lang->line('title_doiavatar');
        $data['template']='form_doi_avatar';
        $data['error']='';
        
        if(isset($_FILES['userfile']))
        {
        //config upload
        $TenFile=md5(time());
        $config['upload_path'] = './upload/images/avatar/';
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
        //$filename = $this->security->xss_clean($file, TRUE);
        
        if(!$file){
            $data['error']=$this->lang->line('error_xss');
        }else{
		if ( ! $this->upload->do_upload())
		{
		    $data['error']=str_replace('</p>','',str_replace('<p>','',$this->upload->display_errors()));
		}
		else
		{
		  $img = $this->upload->data();
            $this->load->library('image_lib');
            
            //$resize
            $image_sizes = array(
              'thumb' => array(150, 150),
              'medium' => array(400, 250), 
            );

    foreach ($image_sizes as $resize) {

        $config2 = array(
            'source_image' => './upload/images/avatar/'.$img['file_name'],
            'new_image' => "./upload/images/avatar/$resize[0]x$resize[1]/".$img['file_name'],
            'maintain_ration' => true,
            'width' => $resize[0],
            'height' => $resize[1]
        );

        $this->image_lib->initialize($config2);
        $this->image_lib->resize();
        
}
        
		    $data['sucess']=$this->lang->line('thongbao_doi_avatar_thanhcong');
            
            $Avatar=array("Avatar" => 'upload/images/avatar/'.$img['file_name'].'');
            $this->default_model->updateDuLieu($this->_table,$Avatar,array("userid" => $this->session->userdata('userid')));
			
		}
        }
        }
        $get=$this->default_model->getInfoID($this->_table,array("userid" => $this->session->userdata('userid')));
        $data['LinkAvatar']=$get['Avatar'];
        $this->load->view('default', $data);
        }
         
        
    }
    
    //Doi mat khau
    function doimatkhau(){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
              $data['title'] = $this->lang->line('title_doimatkhau');
              $data['description'] = $this->lang->line('title_doimatkhau');
              $data['error'] = '';
              $data['template']='form_doimatkhau'; 
              
        //Neu dang nhap loi
        if($this->form_validation->run('formDoiMatKhau')==FALSE)
        {
              $this->load->view('default',$data);              
        }
        else
        {
              $MatKhauCu=$this->input->post("MatKhauCu");
              $MatKhauMoi=$this->input->post("MatKhauMoi");
              
              $user=$this->default_model->getInfoID($this->_table,array("userid" => $this->session->userdata('userid'), "password" => md5($MatKhauCu)));
              //Dang nhap thanh cong
              if($user!=FALSE)
              {
                if($this->default_model->updateDuLieu($this->_table,array("password" => md5($MatKhauMoi)),array("userid" => $this->session->userdata('userid'))))
                $data['sucess'] = $this->lang->line('thongbao_doi_matkhau_thanhcong');
              }
              else{
                //Sai mat khau cu
                $data['error'] = $this->lang->line('error_kiemtra_MatKhauCu');
              }
              $this->load->view('default',$data); 
        }
    }
    
    //Doi thong tin ca nhan
    function suathongtincanhan(){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $error='';
        //Neu sua thong tin loi
        if($this->form_validation->run('formSuaThongTinCaNhan')==FALSE)
        {
        }
        else
        {
              $add = array(
                        "HoVaTen"   => $this->input->post("HoVaTen"),
                        "Email"   => $this->input->post("Email"),
                        "GioiTinh"  => $this->input->post("GioiTinh"),
                        "DienThoai" => $this->input->post("DienThoai"),
                        "DiaChi"    => $this->input->post("DiaChi"),
                        "TinhThanh" => $this->input->post("TinhThanh"),
                         );
              
              $user=$this->default_model->updateDuLieu($this->_table,$add,array("userid" => $this->session->userdata('userid')));
              
              
              //Dang nhap thanh cong
              if($user!=FALSE)
              {
                $data['sucess'] = $this->lang->line('thongbao_doi_thongtin_thanhcong');
              }
              else{
                //Sai mat khau cu
                $data['error'] = $this->lang->line('error_default');
              }
               
        }
              //Lay thong tin ca nhan
               
              $data['title'] = $this->lang->line('title_suathongtincanhan');
              $data['description'] = $this->lang->line('title_suathongtincanhan');
              $data['template']='form_suathongtincanhan';
              $data['data_thanhvien']=$this->default_model->getInfoID($this->_table,array("userid" => $this->session->userdata('userid')));
              $this->load->view('default',$data);
    }
    
    //quan ly thanh vien cho admin
    function quanlythanhvien($page=1,$sucess=""){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $bien_phanbiet='userid';
        $noibang="";
        $dieukien="";
        $this->default_model->updateDuLieu('thanhvien',array('viewed'=>1),array('viewed'=>0));
        $url_phantrang=base_url().'thanhvien/quanlythanhvien/';
        $bien_sapxep_hienthi='userid desc';
        $user['template']='admin/quanlythanhvien';
        $user['title']='Quản lý thành viên';
        include(APPPATH . 'includes/phantrang_admin.php');
    }
    
    //Trang ca nhan
    function trangcanhan($UserID,$Username=""){
            if(isset($UserID)){
               $data['info_user']=$this->default_model->getInfoID($this->_table,array("userid" => $UserID)); 
               $data['title'] = $Username;
               $data['description'] = $Username;
               $data['template'] = 'thongtinthanhvien';
               $this->load->view('default',$data);
            }else{
               redirect(base_url());
               exit(); 
            }
    }
    function xemthanhvien($UserID,$Username=""){
            if(isset($UserID)){
               $data['info_user']=$this->default_model->getInfoID($this->_table,array("userid" => $UserID)); 
               $data['title'] = $data['info_user']['username'];
               $data['description'] = $Username;
               $data['template'] = 'admin/xemthanhvien';
               $this->load->view('admin/admin',$data);
            }else{
               redirect(base_url());
               exit(); 
            }
    }
    function danhsachthanhvien($page=1){
        redirect(base_url().'thanh-vien/sua-thong-tin-ca-nhan');
            exit();
               $dieukien=array("TrangThai" => "0");
               $url_phantrang=base_url().'thanh-vien/trang';
               include(APPPATH . 'includes/phantrang.php');
               $data['data_user']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,$this->_id.' desc','',$this->_id,"",$dieukien);
               $data['title'] = $this->lang->line('lable_memberlist');
               $data['description'] = $this->lang->line('lable_memberlist');
               $data['template'] = 'danhsachthanhvien';
               $this->load->view('default',$data);
    }
    
    //sua thong tin thanh vien cho admin
    function suathanhvien($UserID=""){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $error='';
        // sua thong tin thanh vien cho admin
        if($this->form_validation->run('formSuaThanhVien')==FALSE)
        {
        }
        else
        {
              $data1=$this->default_model->getInfoID($this->_table,array("userid" => $UserID)); 
              if($UserID!=""){
                if($this->input->post("password")!=""){
                    $password=md5($this->input->post("password"));
                }else{
                    $password=$data1['password'];
                }
                
              }else{
                $password=md5($this->input->post("password"));
              }
              $add = array(
                        "username"  => $this->input->post("username"),
                        "password"  => $password,
                        "Email"     => $this->input->post("Email"),
                        "HoVaTen"   => $this->input->post("HoVaTen"),
                        "DienThoai" => $this->input->post("DienThoai"),
                        "DiaChi"    => $this->input->post("DiaChi"),
                        "GioiTinh"  => $this->input->post("GioiTinh"),
                        "TinhThanh" => $this->input->post("TinhThanh"),
                         );
              
              $user=$this->default_model->updateDuLieu($this->_table,$add,array("userid" => $UserID));
              
              
              //Dang nhap thanh cong
              if($user!=FALSE)
              {
                redirect(base_url()."thanhvien/quanlythanhvien/1/g/");
                exit(); 
                $error = $this->lang->line('thongbao_doi_thongtin_thanhcong');
              }
              else{
                //Sai mat khau cu
                $error = $this->lang->line('error_default');
              }
               
        }
              //Lay thong tin ca nhan
              $data['users']=$this->default_model->getInfoID($this->_table,array("userid" => $UserID)); 
              $data['template']='form_suathanhvien';
              $data['error']=$error;
              $this->load->view('admin/admin',$data);
    }
    
    //thiet lap chuc vu cho admin
    function chucvu($UserID){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
              $data=$this->default_model->getInfoID($this->_table,array("userid" => $UserID));
              $data['ChucVu']=$data['level'];
              $data['template']='admin/form_chucvu'; 
              $per=$this->input->post("ChucVu");
        //Neu dang nhap loi
        if($per=="")
        {
        }
        else
        {
              $cdata=array("level" => $per);
              $this->default_model->updateDuLieu($this->_table,$cdata,array("userid" => $UserID));
              redirect(base_url()."thanhvien/quanlythanhvien/1/g/");
              exit(); 
        }
        $this->load->view('admin/admin',$data); 
    }
    function thietlap($UserID){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
              $data=$this->default_model->getInfoID($this->_table,array("userid" => $UserID));
              $data['permission']=$data['permission'];
              $data['template']='admin/form_thietlap'; 
              $per=$this->input->post("permission");
        //Neu dang nhap loi
        if($per=="")
        {
        }
        else
        {
              $cdata=array("permission" => $per);
              $this->default_model->updateDuLieu($this->_table,$cdata,array("userid" => $UserID));
              redirect(base_url()."thanhvien/quanlythanhvien/1/g/");
              exit(); 
        }
        $this->load->view('admin/admin',$data); 
    }
    //thiet lap chuc vu cho admin
    function money($UserID){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
              $data=$this->default_model->getInfoID($this->_table,array("userid" => $UserID));
              $data['money']=$data['money'];
              $data['template']='admin/form_money'; 
              $per=$this->input->post("money");
        //Neu dang nhap loi
        if($per=="")
        {
        }
        else
        {
              $cdata=array("money" => $per);
              $this->default_model->updateDuLieu($this->_table,$cdata,array("userid" => $UserID));
              redirect(base_url()."thanhvien/quanlythanhvien/1/g/");
              exit(); 
        }
        $this->load->view('admin/admin',$data); 
    }
    //thiet lap khoa/mo khoa admin
    function khoanick($UserID){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
              $data=$this->default_model->getInfoID($this->_table,array("userid" => $UserID));
              $data['template']='admin/form_khoanick'; 
              $TrangThai=$this->input->post("TrangThai");
        //Neu dang nhap loi
        if($TrangThai=="")
        {
        }
        else
        {
              $cdata=array("TrangThai" => $TrangThai, "LoiNhan" => $this->input->post("LoiNhan"));
              $this->default_model->updateDuLieu($this->_table,$cdata,array("userid" => $UserID));
              redirect(base_url()."thanhvien/quanlythanhvien/1/g/");
              exit(); 
        }
        $this->load->view('admin/admin',$data); 
    }
    
    //Thoat
    function thoat(){
            $this->session->sess_destroy();
            setcookie('username', '', 0 ,"/");
            setcookie('password', '', 0 ,"/");
            redirect(base_url());
            exit();
    }
    //Kiem tra da ton tai username hay chua
    function kiemtra_username($username)
    {
        if($this->default_model->getInfoID($this->_table,array("username" => $username))!=TRUE){ //ko ton tai username
            return TRUE;
        }
        else{
            $this->form_validation->set_message("kiemtra_username",sprintf($this->lang->line('error_kiemtra_username'),$username));
            return FALSE;
        }
    }
    
    //Kiem tra da ton tai username hay chua
    function kiemtra_email($email)
    {
        if($this->default_model->getInfoID($this->_table,array("Email" => $email))!=TRUE){ // ko ton tai $email
            return TRUE;
        }
        else{
            $this->form_validation->set_message("kiemtra_email",sprintf($this->lang->line('error_kiemtra_email'),$email));
            return FALSE;
        }
    }
    
    //Kiem tra ma xac nhan
    function kiemtra_MaXacNhan($MaXacNhan)
    {
        $captcha=$this->session->userdata('captcha');
                
        if($MaXacNhan==$captcha){ // Dung $MaXacNhan
            $this->session->unset_userdata(array('captcha' => ''));
            return TRUE;
        }
        else{
            $this->form_validation->set_message("kiemtra_MaXacNhan",$this->lang->line('error_kiemtra_MaXacNhan'));
            return FALSE;
        }
    }
    
    
    
}