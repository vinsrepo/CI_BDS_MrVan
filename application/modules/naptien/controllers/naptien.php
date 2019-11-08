<?php
class Naptien extends MX_Controller {
     
    function __construct()
    {
        parent::__construct();
        $this->_table='naptien';
        $this->_id='ID';
        include(APPPATH . 'includes/init.php');
        $this->lang->load('naptien', $language);
    }
 
    function index()
    {
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url()."thanh-vien/dang-nhap.html");
            exit();
        }
        $data['title'] = $this->lang->line('lable_naptien');
        $data['description'] = $this->lang->line('lable_naptien');
        $data['user']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
        $this->form_validation->set_rules('loaithe', 'lang:lable_loaithe', 'trim|required');
        $this->form_validation->set_rules('sopin', 'lang:lable_sopin', 'trim|required');
        $this->form_validation->set_rules('soserial', 'lang:lable_soserial', 'trim|required');
        if($this->form_validation->run()==FALSE)
        {
            
        }
        else
        {
          //thanh toan  
               $cards=array('Viettel'=>'VIETTEL','Vinaphone'=>'VNP','Mobifone'=>'VMS','Gate'=>'GATE','VTC'=>'VCOIN');

               $seri = $this->input->post("soserial");
               $sopin = $this->input->post("sopin");
               //Loai the cao (VINA, MOBI, VIETEL, VTC, GATE) 
               $ten= $this->input->post("loaithe");
               $mang = $cards[$ten];
               $user=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
               include APPPATH.'modules/naptien/controllers/class/nganluong.php';
               
               //END 
     }
        $data['template']='naptien';
        $this->load->view('default', $data);
     }
    
    function dangkyvip($type=''){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url()."thanh-vien/dang-nhap.html");
            exit();
        }
        $data['title'] = $type=='vip_user'?$this->lang->line('lable_dangkyvip'):$this->lang->line('lable_dangkysieuvip');
        $data['description'] = $this->lang->line('lable_dangkyvip');
        
        if($this->input->post("loaithe")!='')
        {
          $month=$this->input->post("month");
          $configtype=$this->default_model->getInfoID("cauhinh",array('Loai'=>$type));
          $vip=json_decode($configtype['GiaTri'],true);
          $chose_money=$month*$vip['price'];
          
          $user=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
          if($user['money']<$chose_money){
            $data['error']='Tài khoản của bạn không đủ để '.$data['title'].'. Vui lòng nạp thêm tiền để sử dụng chức năng này !';
          }else{
          $this->default_model->updateDuLieu('thanhvien',array("level" => $type,'money'=>$user['money']-$chose_money,'date_vip'=>(time()+($month*60*60*24*30))),array("userid" => $this->session->userdata('userid')));
          $this->default_model->addDuLieuMoi("lichsu",array('NguoiTao'=>$this->session->userdata('userid'),'Loai'=>$data['title'],'ThoiHan'=>(($month<12)?$month.' tháng':($month/12).' năm'),'SoTien'=>$chose_money)); 
          $data['sucess']='Đăng ký thành công !';
          }
        }
        else
        {
            
        }
            $data['user']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
            if(($data['user']['level']!=''&&$data['user']['level']!='free_user')){
                $data['template']='dadangkyvip';
            }else{
                $data['template']='dangkyvip';
            }
            $data['type']=$type;
            $data['template']='dangkyvip';
            
        $this->load->view('default', $data);
    }
    function sodutaikhoan(){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url()."thanh-vien/dang-nhap.html");
            exit();
        }
        $data['title'] = $this->lang->line('lable_sodutaikhoan');
        $data['description'] = $this->lang->line('lable_sodutaikhoan');
        $data['user']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
        $data['template']='sodutaikhoan';
        $this->load->view('default', $data);
    }
    function chuyenkhoan(){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url()."thanh-vien/dang-nhap.html");
            exit();
        }
        $data['title'] = $this->lang->line('lable_chuyenkhoan');
        $data['description'] = $this->lang->line('lable_chuyenkhoan');
        $data['user']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
        $data['template']='chuyenkhoan';
        $this->load->view('default', $data);
    }
    function thutructiep(){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url()."thanh-vien/dang-nhap.html");
            exit();
        }
        $data['title'] = $this->lang->line('lable_thutructiep');
        $data['description'] = $this->lang->line('lable_thutructiep');
        $data['user']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
        $data['template']='thutructiep';
        $this->load->view('default', $data);
    }
    function taicongty(){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url()."thanh-vien/dang-nhap.html");
            exit();
        }
        $data['title'] = $this->lang->line('lable_taicongty');
        $data['description'] = $this->lang->line('lable_taicongty');
        $data['user']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
        $data['template']='taicongty';
        $this->load->view('default', $data);
    }
    
    function quanlythenap($sucess="",$page=1){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiNap")
                      );
        $dieukien='';
        $url_phantrang=base_url().'naptien/quanlythenap/'; 
        $bien_sapxep_hienthi=''.$this->_id.' desc';
        $user['template']='quanlythenap';
        $user['Loai']='quanlythenap';
        $config['uri_segment'] = 4;
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    
    function lichsugiaodich($sucess="",$page=1){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $this->_table='lichsu';
        //phan trang hien thi
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiTao")
                      );
        $dieukien='';
        $url_phantrang=base_url().'naptien/lichsugiaodich/'; 
        $bien_sapxep_hienthi=''.$this->_id.' desc';
        $user['template']='lichsugiaodich';
        $user['Loai']='lichsugiaodich';
        $config['uri_segment'] = 4;
        include(APPPATH . 'includes/phantrang_admin.php'); 
    }
    
    function home_quanlythenap($sucess="",$page=1){
        
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url().'thanh-vien/dang-nhap.html');
            exit();
        }
        $this->_table='naptien';
        $dieukien=array( "NguoiNap" => $this->session->userdata('userid'));
        $url_phantrang=base_url().'thanh-vien/quan-ly-tin-rao';
        $config['uri_segment'] = 2;
        include(APPPATH . 'includes/phantrang.php');
        $data['lienhe']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $data['title'] = 'Quản lý thẻ đã nạp'; 
         
        $data['template']='home_quanlythenap';
        $this->load->view('default', $data);
        
    }
    
    function home_lichsugiaodich($sucess="",$page=1){
        
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url().'thanh-vien/dang-nhap.html');
            exit();
        }
        $this->_table='lichsu';
        $dieukien=array( "NguoiTao" => $this->session->userdata('userid'));
        $url_phantrang=base_url().'thanh-vien/quan-ly-tin-rao';
        $config['uri_segment'] = 2;
        include(APPPATH . 'includes/phantrang.php');
        $data['lienhe']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $data['title'] = 'Lịch sử giao dịch'; 
         
        $data['template']='home_lichsugiaodich';
        $this->load->view('default', $data);
    }
}