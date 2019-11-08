<?php
class Baiviet extends MX_Controller {

    private $_table = "baiviet",$_id="IDBaiViet";
    
    function __construct() {
        parent::__construct();
        include(APPPATH . 'includes/init.php');
        include_once(APPPATH . 'includes/chuyendau.php');
        //$this->lang->load('baiviet', $language);
        include_once(APPPATH . 'includes/curl.php');
		
		
    }

    function index(){
        
    }
    function update()
    {
        $Loai='KinhNghiem';
        $parent=416;
        if($this->input->get('Loai')!=''){
            //$Loai=$this->input->get('Loai');
        }
        if($this->input->get('parent')!=''){
            $parent=$this->input->get('parent');
        }
        $link=str_replace('baiviet/update/','',uri_string());
        
        //$arr_fills=array(413=>'tin-thi-truong/p2.htm',416=>'chinh-sach-quy-hoach/p2.htm',560=>'tin-du-an/p2.htm',561=>'bds-the-gioi/p2.htm');
        //$arr_fills=array(622=>'tu-van-thiet-ke/p2.htm',623=>'kien-thuc-xay-dung/p2.htm',624=>'the-gioi-kien-truc/p2.htm');
        //$arr_fills=array(670=>'noi-that/p2.htm',671=>'ngoai-that/p2.htm',672=>'mach-ban/p2.htm');
        $arr_fills=array(0=>'tu-van-luat/p2.htm');
        
        foreach($arr_fills as $parent=>$link){
            
         $base='http://dothi.net';$stt=0;
         $get=$base.'/'.$link; 
         $get_ketqua888 = getcontent($get); 
         $data=array('Loai'=>$Loai);
         preg_match_all('/<div class="liimg">(.*?)<\/div>/is', $get_ketqua888, $tit11);//print_r($tins); 
          
         foreach($tit11[1] as $key=>$new_val){$stt++;
              preg_match('/<a href="(.*?)" title="(.*?)">(.*?)<img src="(.*?)" alt="(.*?)" \/>(.*?)<\/a>/is', $new_val, $title); 
              $data['TieuDe']=trim($title[2]);
              $data['Title']=trim($title[2]);
              $check=$this->default_model->getInfoID("baiviet",array("TieuDe" => $data['b_name']));
              if(!$check){  
                  $retu=getcontent($base.$title[1]);
                  preg_match('/<meta name="description" content="(.*?)" \/>/is', $retu, $description);
                  preg_match('/<div class="nd-content">(.*?)<div class="nd-source">/is', $retu, $noidung);  
              $data['Description']=trim($description[1]);
              $data['NoiDung']=trim($noidung[1].'<div>');
              $data['MenuCha']='';
              $data['TrangThai']=1; 
              
              preg_match_all('/<img(.*?)src="(.*?)"(.*?)>/is', $data['NoiDung'], $images);
              
                  foreach($images[2] as $image){
                   // New file 
                   $exts=array('.png','.jpg','.gif','.bmp');
                   foreach($exts as $val){
                      if(strpos($image,$val)!=false){
                      $ext=$val;
                      }
                   }       
                  $new = APPPATH.'/../upload/images/'.stripUnicode($data['TieuDe']).'-'.md5(time().rand(0,1000));
 
                  file_put_contents($new.$ext, file_get_contents($image));
                  $data['NoiDung']=str_replace($image,str_replace(APPPATH.'/../','/',$new.$ext),$data['NoiDung']);
                 }
                 $this->default_model->addDuLieuMoi('baiviet',$data);
              }
              
              print_r($data);
              if($stt==1){
                //break;
              }
         }
         }
         
    }
    function baogia(){
        $data['title'] = 'Báo giá';
            $data['description'] = 'Báo giá';
            $data['template']='baogia';
            
            $this->load->view('default',$data);
    }
    
    function menu($Loai="",$cap="") {
        $dieukien=array("Loai" => $Loai, "TrangThai" => '1');
        if($cap!="")
        {
            $dieukien=array("Loai" => $Loai, "CapMenu" => $cap, "TrangThai" => '1');
             
        }
        
        include_once(APPPATH . 'includes/getMenu.php');
        $data['menu']=$this->default_model->getTableRows($this->_table,"","",'SapXep asc, '.$this->_id.' asc','',$this->_id,"",$dieukien);
        
        $this->load->view($Loai, $data);
    }
    
    function getDanhMucCap1() {
                
        $dieukien=array("Loai" => "DanhMuc", "CapMenu" => 1, "TrangThai" => '1');
        
        $data=$this->default_model->getTableRows($this->_table,"","",'SapXep asc, '.$this->_id.' asc','',$this->_id,"",$dieukien);
        
        return $data;
    }  
    
    function getDanhMucCon($ID) {
                
        $dieukien=array("Loai" => "DanhMuc", "MenuCha" => $ID, "TrangThai" => '1');
        
        $data=$this->default_model->getTableRows($this->_table,"","",'SapXep asc, '.$this->_id.' asc','',$this->_id,"",$dieukien);
        
        return $data;
    }          
    
    function getDanhMucCha($ID) {
                
        $data=$this->default_model->getInfoID($this->_table,array("$this->_id" => $ID));
        
        return $data;
    }
    function tinlienquan($Loai="TinTuc") {
                
                $dieukien=array("Loai" => $Loai, "TrangThai" => '1');
        
        $data=$this->default_model->getTableRows('baiviet',5,0,'RAND()','','IDBaiViet',"",$dieukien);
         
        return $data;
    }
    //tao thong bao cho admin
    function taobaiviet($ID="",$Loai=""){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        if($ID==0){
            $ID="";
        }
        $data['error']="";
        $data['Loai']=$Loai;
        //trinh soan thao
        include(APPPATH . 'includes/trinhsoanthao.php'); 
   
        if($this->form_validation->run('formTaoBaiViet')==FALSE)
        {
        }
        else
        {  
             $MenuCha=$this->input->post("MenuCha");
             if($MenuCha!=0){
                $menu=$this->default_model->getInfoID($this->_table,array("$this->_id" => $MenuCha));
                $capmenu=$menu['CapMenu']+1;
             }elseif($MenuCha==0){
                $capmenu=1;
             }elseif($MenuCha==""){
                $capmenu='';
             }
             
             $Loai=$this->input->post("Loai");
              
             $add = array(
                        "TieuDe"   => $this->input->post("TieuDe"),
                        "Loai"   => $Loai,
                        "Link"   => $this->input->post("Link"),
                        "Title"   => $this->input->post("Title"),
                        "H1"   => $this->input->post("H1"),
                        "H2"   => $this->input->post("H2"),
                        "Keyword" => $this->input->post("Keyword"),
                        "Description"   => $this->input->post("Description"),
                        "NoiBat"   => $this->input->post("NoiBat"),
                        "NoiDung"  => $this->input->post("NoiDung"),
                        "TrangThai"=> $this->input->post("TrangThai"),
                        "NguoiGui" => $this->session->userdata('userid'),
                        "MenuCha"  => $MenuCha,
                        "CapMenu"  => $capmenu
                         );
             if($Loai=='Banner'){
                $add['ViTri']=$this->input->post("ViTri");
             }
           //tao thong thanh cong
              if($ID==""){
                $this->default_model->addDuLieuMoi($this->_table,$add);
              }else{
                $this->default_model->updateDuLieu($this->_table,$add,array("$this->_id" => $ID));
              }
              
              //
              
              if($Loai=="MenuFooter"){
                $MenuFooters=$this->default_model->getTableRows($this->_table,1000,0,'','',$this->_id,"",array("Loai" => "MenuFooter"));
                $code='<?
                ';
                foreach($MenuFooters as $MenuFooter){ 
                    $code.="
                    \$route['".stripUnicode($MenuFooter['TieuDe'])."'] = 'baiviet/xembaiviet/".$MenuFooter['IDBaiViet']."/Xem_GioiThieu';
                    "; 
                }//print_r($code);
                //error_reporting(E_ALL);
                file_put_contents(APPPATH . 'config/blog_urls.php',$code);
              }
              if($Loai=="MenuHeader"){
                $MenuHeaders=$this->default_model->getTableRows($this->_table,1000,0,'','',$this->_id,"",array("Loai" => "MenuHeader"));
                $code='<?
                ';
                foreach($MenuHeaders as $MenuHeader){
                  if($MenuHeader['MenuCha']!=455&&$MenuHeader['IDBaiViet']!=455){
                    $menucha2=$this->default_model->getInfoID($this->_table,array("$this->_id" => $MenuHeader['MenuCha']));
                    include APPPATH . 'modules/baiviet/views/Loai.php';
                    $searchs=array_flip($searchs);
                    $code.="
                    \$route['".strtolower(isset($MenuHeader['Link'])&&$MenuHeader['Link']!=''?$MenuHeader['Link']:stripUnicode($MenuHeader['TieuDe']))."'] = 'baiviet/getdanhsachbaiviet/TinTuc/1//default/".$MenuHeader['IDBaiViet']."';
                    \$route['".strtolower(isset($MenuHeader['Link'])&&$MenuHeader['Link']!=''?$MenuHeader['Link']:stripUnicode($MenuHeader['TieuDe']))."/(:num)'] = 'baiviet/getdanhsachbaiviet/TinTuc/$1//default/".$MenuHeader['IDBaiViet']."';
                    \$route['".strtolower(isset($MenuHeader['Link'])&&$MenuHeader['Link']!=''?$MenuHeader['Link']:stripUnicode($MenuHeader['TieuDe']))."/(:any)-(:num)'] = 'baiviet/xembaiviet/$2/Xem_BaiViet//default/".$MenuHeader['IDBaiViet']."';
                    ";
                }
                if($MenuHeader['MenuCha']==455||$MenuHeader['IDBaiViet']==455){
                    $code.="
                    \$route['".strtolower(isset($MenuHeader['Link'])&&$MenuHeader['Link']!=''?$MenuHeader['Link']:stripUnicode($MenuHeader['TieuDe']))."'] = 'salon/salonoto/".$MenuHeader['IDBaiViet']."';
                    \$route['".strtolower(isset($MenuHeader['Link'])&&$MenuHeader['Link']!=''?$MenuHeader['Link']:stripUnicode($MenuHeader['TieuDe']))."/(:num)'] = 'salon/salonoto/".$MenuHeader['IDBaiViet']."/$1';
                    \$route['".strtolower(isset($MenuHeader['Link'])&&$MenuHeader['Link']!=''?$MenuHeader['Link']:stripUnicode($MenuHeader['TieuDe']))."/(:any)-(:num)'] = 'salon/salonoto/".$MenuHeader['IDBaiViet']."/$2';
                    ";
                }
                //print_r($code);
                //error_reporting(E_ALL);
                file_put_contents(APPPATH . 'config/sub_urls.php',$code);
                }
              }
              if($Loai=="DanhMuc"){
                $code='<?
                ';
                $menucat=$this->default_model->getTableRows($this->_table,4000,0,'','',$this->_id,"",array('Loai'=>'DanhMuc','CapMenu'=>1,'TrangThai'=>1));  
     foreach($menucat as $val){$stt++;
        $code.= "
        \$route['".strtolower(isset($val['Link'])&&$val['Link']!=''?$val['Link']:stripUnicode($val['TieuDe']))."/(:num)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/$1';
        \$route['".strtolower(isset($val['Link'])&&$val['Link']!=''?$val['Link']:stripUnicode($val['TieuDe']))."'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."';
        ";
        if($val['Link']!=''){
          $code.= " 
        \$route['".$val['Link']."/(:num)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/$1';
        \$route['".$val['Link']."'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."';;
        \$route['".$val['Link']."-([a-z0-9-]+)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/1/$1';
        \$route['".$val['Link']."-([a-z0-9-]+)/(:num)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/$2/$1';
        ";  
        }
     }
     
     $menucat=$this->default_model->getTableRows($this->_table,4000,0,'','',$this->_id,"",array('Loai'=>'DanhMuc','CapMenu'=>2,'TrangThai'=>1)); //print_r($menucat);
     foreach($menucat as $val){$stt++;
     $menucha=$this->default_model->getInfoID($this->_table,array('IDBaiViet'=>$val['MenuCha']));
        $code.= "
        \$route['".strtolower(isset($val['Link'])&&$val['Link']!=''?$val['Link']:stripUnicode($val['TieuDe']))."/(:num)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/$1';
        \$route['".strtolower(isset($val['Link'])&&$val['Link']!=''?$val['Link']:stripUnicode($val['TieuDe']))."'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."';
        \$route['".strtolower(isset($val['Link'])&&$val['Link']!=''?$val['Link']:stripUnicode($val['TieuDe']))."-([a-z0-9-]+)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/1/$1';
        \$route['".strtolower(isset($val['Link'])&&$val['Link']!=''?$val['Link']:stripUnicode($val['TieuDe']))."-([a-z0-9-]+)/(:num)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/$2/$1';
        ";
        if($val['Link']!=''){
          $code.= " 
        \$route['".$val['Link']."/(:num)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/$1';
        \$route['".$val['Link']."'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."';
        \$route['".$val['Link']."-([a-z0-9-]+)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/1/$1';
        \$route['".$val['Link']."-([a-z0-9-]+)/(:num)'] = 'dangtin/xemdanhmuc/HangXe/".$val['IDBaiViet']."/$2/$1';
        ";  
        }
     }
     include_once(APPPATH . 'includes/doctien.php');
     file_put_contents(APPPATH . 'config/ext_urls.php',$code); 
              }          
              //
              
              $region=$this->input->get("region");
$exregion=explode('-',$region);
$exregion[end(array_keys($exregion))]=end($exregion)+1;
$exregion=implode('-',$exregion);
              redirect(base_url()."baiviet/quanlybaiviet/g/$Loai?region=".$exregion);
              exit(); 
              
        }
        $data['users']=$this->default_model->getInfoID($this->_table,array("$this->_id" => $ID)); 
        if($data['users']==FALSE){
            $where=$Loai;
        }else{
            $where=$data['users']['Loai'];
            $Loai=$where;
        }
        if($where=='TinTuc'){
            $where=array("Loai" => "MenuHeader");
        }elseif($where=='TuVanXe'){
            $where=array("Loai" => "MenuHeader","MenuCha"=>25);
        }elseif($where=='DanhGiaXe'){
            $where=array("Loai" => "MenuHeader","MenuCha"=>27);
        }elseif($where=='KinhNghiem'){
            $where=array("Loai" => "MenuHeader","MenuCha"=>15);
        }elseif($where=='SoSanhXe'){
            $where=array("Loai" => "MenuHeader","MenuCha"=>42);
        }else{
            $where=array("Loai" => "$where");
        }
        $data['menu']=$this->default_model->getTableRows($this->_table,1000,0,'CapMenu asc, SapXep asc, '.$this->_id.' desc','',$this->_id,"",$where);
        $data['template']='taobaiviet';
        $data['title'] = $this->lang->line('lable_'.$Loai.'');
        $this->load->view('admin/admin',$data);
    }
    
    //quan ly thong bao cho admin
    function quanlybaiviet($sucess="",$phanloai="",$page=1){
        
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $noibang="";
        $dieukien=array("Loai" => "$phanloai");
        $url_phantrang=base_url().'baiviet/quanlybaiviet/action/'.$phanloai.'/';
        $sort='';
        if($page==1){
            $this->session->set_userdata(array('cha'=>''));
        }
        if($this->input->get('cha')!=''){
            $this->session->set_userdata(array('cha'=>$this->input->get('cha')));
        }
        if($this->session->userdata('cha')!=''){
                 $MenuChaID=$this->session->userdata('cha');
                 $set_dk=1;
                 include(APPPATH . 'modules/dangtin/controllers/HangXe.php');
                 $dieukien["MenuCha IN ($MenuChaID $addIN) and IDBaiViet !="]='';  
            } 
        $bien_sapxep_hienthi=$sort.'SapXep asc, '.$this->_id.' desc';
            $user['template']='quanlybaiviet';
            $user['Loai']=$phanloai;
            $user['title'] = $this->lang->line('lable_'.$phanloai.'');
            
        if($phanloai=='MenuHeader'||$phanloai=='MenuFooter'||$phanloai=='MenuHuongDan'||$phanloai=='DanhMuc'||$phanloai=='HuongDan'){
            $sort='CapMenu asc, ';
            include APPPATH . 'includes/timkiem_admin.php';
            $config['total_rows'] = $this->default_model->totalRows($this->_table,$loai,$this->_id,$dieukien,$noibang);
            $user['data']=$this->default_model->getTableRows($this->_table,'',0,$bien_sapxep_hienthi,$loai,$this->_id,$noibang,$dieukien);
            $user['totalrow']=$config['total_rows'];
            $this->load->view('admin/admin',$user);
        }else{ 
            $config['uri_segment'] = 5; 
            include(APPPATH . 'includes/phantrang_admin.php'); 
        }
        
    }
    //xem thong bao
    function xembaiviet($ID="",$Loai="",$Domain='',$Loai_template='default') {
        if($Domain!=''){
            $data['salon_info']=$this->default_model->getInfoID('salon',array("Domain" => $Domain));  
        }
        
        $data['users']=$this->default_model->getInfoID($this->_table,array("$this->_id" => $ID)); 
        $this->default_model->updateDuLieu($this->_table,array('LuotXem'=>$data['users']['LuotXem']+1),array("IDBaiViet" => $ID));
        if($data['users']!=FALSE){
            $data['title'] =  $data['users']['Title']!=''?$data['users']['Title']:$data['users']['TieuDe'];
            $data['description'] = $data['users']['Description'];
            $data['keyword'] = $data['users']['Keyword'];
            $data['cha_info']=$this->default_model->getInfoID('baiviet',array("IDBaiViet" => $data['users']['MenuCha'])); 
            if($Loai=="ThongBao"){
                $data['template']='Xem_ThongBao';
            }
            else{
                $data['template']=$Loai;
            }
            
            $this->load->view($Loai_template,$data);
        }else{
            show_404();
        }
		$this->output->cache(30) ;
    }
    
    function divtintuc() {
        $dieukien=array("Loai" => 'TinTuc', "TrangThai" => '1');
        
        $data['menu']=$this->default_model->getTableRows($this->_table,10,0,''.$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $this->load->view('divtintuc', $data);
		
		
    }
    
    function getdanhsachbaiviet($loai='',$page=1,$Domain='',$Loai_template='default',$cha='') {
        if($Domain!=''){
            $data['salon_info']=$this->default_model->getInfoID('salon',array("Domain" => $Domain));  
        }
                
        $template=$loai;
        $dieukien=array("Loai" => "TinTuc", "TrangThai" => '1');
            $u='tin-tuc';
            $template='TinTuc';
        if($cha!=''){
            $MenuChaID=$cha;
            $set_dk=1;
            include(APPPATH . 'modules/dangtin/controllers/HangXe.php');
            $dieukien["MenuCha IN ($MenuChaID $addIN) and IDBaiViet !="]='';
            $data['cha_info']=$this->default_model->getInfoID('baiviet',array("IDBaiViet" => $cha)); 
        } 
        $data['current_info']=$this->default_model->getInfoID('baiviet',array("Link" => $_SERVER['REQUEST_URI'])); 
        $url_phantrang='/'.$this->uri->segment(1);
        $data['u']=$u;
        $data['Loai']=$loai;
        $config['uri_segment'] = 2;
        include(APPPATH . 'includes/phantrang.php');
        $data['thongbao']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,'SapXep asc, '.$this->_id.' desc','',$this->_id,"",$dieukien); 
        
        $data['title'] = ($data['cha_info']['Title']!=''?$data['cha_info']['Title']:$data['cha_info']['TieuDe']);
        $data['description'] = ($data['cha_info']['Description']!=''?$data['cha_info']['Description']:$data['cha_info']['TieuDe']);
        if($data['cha_info']['Keyword']!=''){
            $data['keyword'] =$data['cha_info']['Keyword'];
        }
        $data['template']=$template;
        $data['page']=$page;
        
        $this->load->view($Loai_template, $data);
		$this->output->cache(30) ;
    }
    
    function huongdan() {
        $dieukien=array("Loai" => 'MenuHuongDan', "TrangThai" => '1');
        
        $data['menu']=$this->default_model->getTableRows($this->_table,10,0,''.$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $this->load->view('MenuHuongDan', $data);
    }
    
    function menufooter() {
        $dieukien=array("Loai" => 'MenuFooter', "TrangThai" => '1');
        
        $data['menu']=$this->default_model->getTableRows($this->_table,10,0,'SapXep asc, '.$this->_id.' asc','',$this->_id,"",$dieukien);
        
        $this->load->view('MenuFooter', $data);
    }
}
