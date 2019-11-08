<?php
class Salon extends MX_Controller {
    
    private $_table = "salon",$_id="IDSalon";
    
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        $this->lang->load('salon', $language);
        $this->lang->load('lienhe/lienhe', $language);
        include_once(APPPATH . 'includes/doctien.php');
        include_once(APPPATH . 'includes/chuyendau.php');
		
    }
 
    function index()
    {
        $data['title'] = $this->lang->line('lable_support');
        $data['description'] = $this->lang->line('lable_support');
        $data['template']='hotro';
        $this->load->view('default', $data);
    }
    function taosalon($ID='')
    {
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //trinh soan thao
        include(APPPATH . 'includes/trinhsoanthao.php'); 
        if($this->form_validation->run('formCaiDatSalon')==FALSE)
        {
        }
        else
        {  
               
             $add = $this->input->post();
             
              
           //tao thong thanh cong
              if($ID==""||$ID==0){
                $this->default_model->addDuLieuMoi($this->_table,$add);
              }else{
                $this->default_model->updateDuLieu($this->_table,$add,array("$this->_id" => $ID)); 
              }
              
              $region=$this->input->get("region");
$exregion=explode('-',$region);
$exregion[end(array_keys($exregion))]=end($exregion)+1;
$exregion=implode('-',$exregion);
              redirect(base_url()."salon/quanlysalon/g/?region=".$exregion);
              exit();
        }
        $data['users']=$this->default_model->getInfoID($this->_table,array("$this->_id" => $ID)); 
        $data['template']='taosalon';
              
        $this->load->view('admin/admin',$data);
    }
    function caidatsalon($ID='')
    {
        if($ID!=''){
                 $NguoiTao=$ID;
              }else{
                $NguoiTao=$this->session->userdata('userid');
              }   
        if($this->session->userdata('permission')!=1){
            $check=$this->default_model->getInfoID($this->_table,array("NguoiTao" => $NguoiTao));
            if(!$check){
            redirect(base_url());
            exit();
            }
        }
        $data['title'] = $this->lang->line('lable_caidatsalon');
        $data['description'] = $this->lang->line('lable_caidatsalon');
        
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $error='';
        //Neu sua thong tin loi
        $Domain=$this->input->post("Domain");
        if($this->form_validation->run('formCaiDatSalon')==FALSE)
        {
        }
        else
        {
          if($this->default_model->getInfoID($this->_table,array("Domain" => $Domain,"NguoiTao !=" => $NguoiTao))!==FALSE)
          {
            $data['error']='Domain này dã có người sử dụng, bạn vui lòng chọn domain khác !';
          }else{
              $add = array(
                        "NguoiTao"   => $NguoiTao,
                        "TrangThai"   => $this->input->post("TrangThai"),
                        "TenSalon"  => $this->input->post("TenSalon"),
                        "Domain"  => $Domain,
                        "LoGo"  => $this->input->post("LoGo"),
                        "DienThoai" => $this->input->post("DienThoai"),
                        "DiaChi"    => $this->input->post("DiaChi"),
                        "Email"    => $this->input->post("Email"),
                        "TinhThanh" => $this->input->post("TinhThanh"),
                        "GioiThieu"  => $this->input->post("GioiThieu"),
                        "AlbumAnh"  => $this->input->post("AlbumAnh"),
                        "TrangThai"  => $this->input->post("TrangThai"),
                         );
              $check=$this->default_model->getInfoID($this->_table,array("NguoiTao" => $NguoiTao));
              if($check!='')
              {
                $user=$this->default_model->updateDuLieu($this->_table,$add,array("NguoiTao" => $NguoiTao));
              }
              else{
                //Sai mat khau cu
                $user=$this->default_model->addDuLieuMoi($this->_table,$add);
              }
              
              
              
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
        }
         
        $data['template']='caidatsalon';
        $data['data_salon']=$this->default_model->getInfoID($this->_table,array("NguoiTao" => $NguoiTao));
        $this->load->view('default', $data);
    }
    
    function header($title="",$description="")
    {
        $data['info']=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        if($this->session->userdata('userid')!=FALSE){
        $data['user_info']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
        }
         
        $data['title'] = $title;
        $data['description'] = $description;
        $this->load->view('header', $data);
    }
    
    function trangchusalon($Domain){
        
        $data['salon_info']=$this->default_model->getInfoID($this->_table,array("IDSalon" => $Domain));
        $data['title'] = $data['salon_info']['TenSalon'];
        $data['description'] = $data['salon_info']['Description'];
        $data['keyword'] = $data['salon_info']['Keyword'];
        
        $data['template']='trangchu';
        $this->load->view('default', $data);
    }
    
    function gioithieu($Domain){
        
        $data['salon_info']=$this->default_model->getInfoID($this->_table,array("Domain" => $Domain));
        $data['title'] = $this->lang->line('lable_gioithieu').' '.$data['salon_info']['TenSalon'];
        $data['description'] = $this->lang->line('lable_gioithieu').' '.$data['salon_info']['TenSalon'];
        $data['template']='gioithieu';
        $this->load->view('template_salon', $data);
    }
    
    function bando($Domain){
        
        $data['salon_info']=$this->default_model->getInfoID($this->_table,array("Domain" => $Domain));
        $data['title'] = $this->lang->line('lable_gioithieu').' '.$data['salon_info']['TenSalon'];
        $data['description'] = $this->lang->line('lable_gioithieu').' '.$data['salon_info']['TenSalon'];
        $data['template']='bando';
        $this->load->view('template_salon', $data);
    }
    
    function lienhe($Domain){
        
        $data['salon_info']=$this->default_model->getInfoID($this->_table,array("Domain" => $Domain));
        $data['title'] = $this->lang->line('lable_gioithieu').' '.$data['salon_info']['TenSalon'];
        $data['description'] = $this->lang->line('lable_gioithieu').' '.$data['salon_info']['TenSalon'];
        
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
                        "NguoiGui"   => $this->input->post("HoVaTen"),
                        "TieuDe"   => $this->input->post("Email"),
                        "Link"  => $this->input->post("DienThoai"),
                        "CapMenu"  => $this->input->post("DiaChi"),
                        "NoiDung"  => $this->input->post("NoiDung"),
                        "MenuCha"  => $this->input->post("Salon"),
                        "Loai"  => 'LienHeSalon'
                         );
                         
              $user=$this->default_model->addDuLieuMoi('baiviet',$add);
              
              
              
              //Dang nhap thanh cong
              if($user!=FALSE)
              {
                $data['sucess'] = $this->lang->line('lable_contact_success');
              }
              else{
                //Sai mat khau cu
                $data['error'] = $this->lang->line('error_default');
              }
              }
              
              
              
               
        } 
        $data['template']='lienhe';
        $this->load->view('template_salon', $data);
    }
    
    function quanlylienhe($page=1){
        $this->_table='baiviet';
        $this->_id='IDBaiViet';
        $config['uri_segment'] = 3;
        $dieukien=array("Loai" => "LienHeSalon");
        $url_phantrang=base_url().'quan-ly-salon-oto/lien-he';
        include(APPPATH . 'includes/phantrang.php');
        $data['lienhe']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,''.$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $data['title'] = $this->lang->line('lable_ql_lienhe');
        $data['description'] = $this->lang->line('lable_ql_lienhe');
         
        $data['template']='quanlylienhe';
        $this->load->view('default', $data);
    }
    
    function quanlysalon($sucess="",$page=1){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $noibang=array(
                      array("key" => "baiviet", "where" => "baiviet.IDBaiViet = $this->_table.Domain")
                      );
        $dieukien='';
        $url_phantrang=base_url().'salon/quanlysalon/'.$sucess;
        
        $bien_sapxep_hienthi=''.$this->_id.' desc';
        $user['template']='quanlysalon';
        $user['Loai']='quanlysalon';
        $config['uri_segment'] = 4;
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    
    function xedangban($Domain,$page=1){
        $config['uri_segment'] = 2;
        $data['salon_info']=$this->default_model->getInfoID($this->_table,array("Domain" => $Domain));
        $this->_table='tinban';
        $this->_id='IDMaTin';
        $dieukien=array("Loai" => "salon", "TrangThai" => '1', 'Salon' => $data['salon_info']['IDSalon']);
        $url_phantrang='http://'.$_SERVER['HTTP_HOST'].'/xe-dang-ban';
        $PhanTrang=5;
        include(APPPATH . 'includes/phantrang.php');
        $data['lienhe']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,'uptin desc, '.$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $this->load->view('xedangban', $data);
    }
    
    function danhsachxedangban($Domain){
        $data['salon_info']=$this->default_model->getInfoID($this->_table,array("Domain" => $Domain));
        
        $data['title'] = $this->lang->line('lable_xedangban');
        $data['description'] = $this->lang->line('lable_xedangban');
        $data['template']='danhsachxedangban';
        $this->load->view('template_salon', $data);
    }
    
    
    
    function salonoto($CAT='',$page=1,$tinhthanh='',$tinhtrang=''){
        $noibang='';$group_by='';$seletc='';$like='';
        $dieukien=array("salon.TrangThai" => '1');
        
        if($CAT==455){
            $CAT='';
        }
        
        $keyword=$this->input->post("TinhThanh");
        $danhmuc=$this->input->post("CatPJ");
        $huyen=$this->input->post("QuanHuyen");
        if($keyword!='')
        {
            $tinhthanh=$keyword;
        }
        if($huyen!='')
        {
             $dieukien['salon.QuanHuyen']=$huyen;
        }
        if($danhmuc!=''){
            $CAT=$danhmuc;
        }
        if($tinhthanh!=''){
            $dieukien['salon.TinhThanh']=$tinhthanh;
        }
        if($CAT!=''){
            $dieukien['salon.Domain']=$CAT;
            $menu_info=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$CAT);
            $data['title'] = $menu_info['Title']!=''?$menu_info['Title']:$menu_info['TieuDe'];
            $data['description'] = $menu_info['Description'];
            $data['keyword'] = $menu_info['Keyword'];
        }else{
            $menu_info=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',455);
            $data['title'] = $menu_info['Title']!=''?$menu_info['Title']:$menu_info['TieuDe'];
            $data['description'] = $menu_info['Description'];
            $data['keyword'] = $menu_info['Keyword'];
        }
         
        
        $url_phantrang= '/'.$this->uri->segment(1);
        $config['uri_segment'] = 2;
        include(APPPATH . 'includes/phantrang.php');
        $data['salon_data']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,''.$this->_id.' asc','',$this->_id,$noibang,$dieukien,$group_by,$seletc,$like);
        
        
        if($tinhthanh==''){ 
            
        }else{
            $data['TinhThanh']=$tinhthanh;
        
            $data['title'] = $this->lang->line('lable_salon').' tại '.$tinhthanh;
            $data['description'] = $this->lang->line('lable_salon').' tại '.$tinhthanh;
        }
        $data['menu_info']=$menu_info;
        $data['cat_info']=$menu_info;
        $data['template']='danhsachsalon';
        $this->load->view('default', $data);
    }
    
    
}