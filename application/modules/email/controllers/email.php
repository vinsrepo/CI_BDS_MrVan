<?php
class Email extends MX_Controller {

    private $_table = "cauhinh",$_id="IDCauHinh";
    
    function __construct() {
        parent::__construct();
        include(APPPATH . 'includes/init.php');
        $this->lang->load('email', $language);
		
        
    }

    function index() {
     redirect(base_url());   
    }
    //send email
    function sendemail($to_list,$tieude,$noidung){
       // chu y bien $to dau vao la 1 mang
        $protocol=$this->default_model->getInfoID($this->_table,array("Loai" => "email_protocol"));
        $smtp_host=$this->default_model->getInfoID($this->_table,array("Loai" => "email_smtp_host"));
        $smtp_port=$this->default_model->getInfoID($this->_table,array("Loai" => "email_smtp_port"));
        $smtp_user=$this->default_model->getInfoID($this->_table,array("Loai" => "email_smtp_user"));
        $smtp_pass=$this->default_model->getInfoID($this->_table,array("Loai" => "email_smtp_pass"));
        $email_from=$this->default_model->getInfoID($this->_table,array("Loai" => "email_from"));
        $email_name=$this->default_model->getInfoID($this->_table,array("Loai" => "email_name"));
        
       $config = array(
                'protocol' => $protocol['GiaTri'],
                'smtp_host' => $smtp_host['GiaTri'],
                'smtp_port' => $smtp_port['GiaTri'],
                'smtp_user' => $smtp_user['GiaTri'],
                'smtp_pass' => base64_decode(base64_decode($smtp_pass['GiaTri'])),
                'newline'   => "\r\n"
                 );
       $this->load->library('email',$config);
             
       $this->email->from($email_from['GiaTri'], $email_name['GiaTri']);
       $this->email->to($to_list);
       $this->email->reply_to($email_from['GiaTri'], $email_name['GiaTri']);
       $this->email->subject($tieude);
       $this->email->message($noidung);

       $this->email->send();
    }
    
    //au hinh email cho admin
    function cauhinhemail(){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $protocol=$this->input->post("protocol");
        $data['sucess']='';
        if(isset($protocol)&&$protocol!="")
        {
           $this->default_model->updateDuLieu($this->_table,array("GiaTri" => $protocol),array("Loai" => "email_protocol"));
           $this->default_model->updateDuLieu($this->_table,array("GiaTri" => $this->input->post("email_from")),array("Loai" => "email_from"));
           $this->default_model->updateDuLieu($this->_table,array("GiaTri" => $this->input->post("email_name")),array("Loai" => "email_name")); 
           $this->default_model->updateDuLieu($this->_table,array("GiaTri" => $this->input->post("email_path")),array("Loai" => "email_path"));
           $this->default_model->updateDuLieu($this->_table,array("GiaTri" => $this->input->post("smtp_host")),array("Loai" => "email_smtp_host"));
           $this->default_model->updateDuLieu($this->_table,array("GiaTri" => $this->input->post("smtp_port")),array("Loai" => "email_smtp_port"));
           $this->default_model->updateDuLieu($this->_table,array("GiaTri" => $this->input->post("smtp_user")),array("Loai" => "email_smtp_user"));
           $this->default_model->updateDuLieu($this->_table,array("GiaTri" => base64_encode(base64_encode($this->input->post("smtp_pass")))),array("Loai" => "email_smtp_pass"));
           $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
        }
        $data['email']=array(
                          "protocol" => $this->default_model->getInfoID($this->_table,array("Loai" => "email_protocol")),
                          "smtp_host" => $this->default_model->getInfoID($this->_table,array("Loai" => "email_smtp_host")),
                          "smtp_port" => $this->default_model->getInfoID($this->_table,array("Loai" => "email_smtp_port")),
                          "smtp_user" => $this->default_model->getInfoID($this->_table,array("Loai" => "email_smtp_user")),
                          "smtp_pass" => $this->default_model->getInfoID($this->_table,array("Loai" => "email_smtp_pass")),
                          "email_from" => $this->default_model->getInfoID($this->_table,array("Loai" => "email_from")),
                          "email_path" => $this->default_model->getInfoID($this->_table,array("Loai" => "email_path")),
                          "email_name" => $this->default_model->getInfoID($this->_table,array("Loai" => "email_name"))
                          );
        $data['template']='cauhinhemail';
        $this->load->view('admin/admin',$data);
    }
    //gui email cho admin
    function guiemail($type=''){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['sucess']='';
        $data['error']='';
        $token=$this->input->post("token");
        $email=$this->input->post("Email");
        $data['title']='Gửi email';
        if($type=='repmail'){
            $CheDo=2;
        }
        $action=0;
        $addmail='';
        if($this->input->get("addmail")!=''){
            $addmail=$this->input->get("addmail");
            $data['addmail']=$addmail;
        }
        if(isset($token)&&$token==1)
        {
            $user=$this->default_model->getInfoID("thanhvien",array("username" => $email));
                   if($user!=FALSE)
                   {
                     $to_list=$user['Email'];
                     $action=1;
                   }
                   else
                   { 
                     if($addmail!=''){
                      $email=$addmail;
                      
                   }
                   $this->load->helper('email');
                   
                   if (valid_email($email))
                   {
                     $to_list=$email;
                     $action=1;
                   }
                   else
                   {
                     $action=0;
                     $error=$this->lang->line('error_email');
                   }
                   }
                
                   
                   
                
            if($email==''){
                $mail_list=$this->default_model->getTableRows('thanhvien',1000,0,'userid desc','','userid',"","");
                foreach ($mail_list as $member)
                {
                 $list[]=$member['Email'];
                }
                $to_list=$list;
                $action=1;
            } 
            
            if($action==1){
                
                $NoiDung=$this->input->post("NoiDung");
                $TieuDe=$this->input->post("TieuDe");
                
                if($TieuDe==""){
                    $data['error']=$this->lang->line('error_not_value')." ".$this->lang->line('lable_TieuDe');
                }elseif($NoiDung==""){
                    $data['error']=$this->lang->line('error_not_value')." ".$this->lang->line('lable_NoiDung');
                }else{
                    Modules::run('email/sendemail',$to_list,$TieuDe,$NoiDung);
                    $data['sucess']=$this->lang->line('sucses_sendmail');
                }
                
            }
            else
            {
                $data['error']=$error;
            }
            
            
        }
        
        $data['template']='guiemail';
        $this->load->view('admin/admin',$data);
    }
    // thiet lap mau email cho admin
    //gui email cho admin
    function thietlapmauemail($Loai=""){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $data['sucess']='';
        $data['Loai']=$Loai;
        $NoiDung=$this->input->post("NoiDung");
        $data['title']='Thiết lập mẫu email';
        include(APPPATH . 'includes/trinhsoanthao.php'); 
        if(isset($NoiDung)&&$NoiDung!="")
        {
           $this->default_model->updateDuLieu($this->_table,array("TieuDe" => $this->input->post("TieuDe"),"GiaTri" => $NoiDung, "TrangThai" => $this->input->post("TrangThai")),array("Loai" => $Loai));
           $data['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
        }
        
        $data['email']=$this->default_model->getInfoID($this->_table,array("Loai" => $Loai));
        $data['template']='thietlapmauemail';
        $this->load->view('admin/admin',$data);
    }
     
}
