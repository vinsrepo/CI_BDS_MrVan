<?php
class Dangtin extends MX_Controller {

    private $_table = "tinban",$_id="IDMaTin";
    
    function __construct() {
        parent::__construct();
        include(APPPATH . 'includes/init.php');
        include_once(APPPATH . 'includes/chuyendau.php');
        include_once(APPPATH . 'includes/doctien.php');
        include_once(APPPATH . 'includes/curl.php');
        $this->lang->load('dangtin', $language);
    }

    function index() {     
    }
    function gopy(){ 
        $this->form_validation->set_rules('reportOption', 'lang:lable_NoiDung', 'trim|required|xss_clean');
        $this->form_validation->set_rules('content', 'lang:lable_muctien', 'trim|required|xss_clean');
        $this->form_validation->set_rules('capcha', 'lang:lable_TieuDe', 'trim|required|xss_clean');
        $this->form_validation->set_rules('link', 'lang:lable_NoiDung', 'trim|required|xss_clean');
        if($this->form_validation->run()==FALSE)
        {
            $data['error']='Lỗi: vui lòng nhập đúng các thông tin yêu cầu';
            
        }
        else
        {
              $MaXacNhan=$this->input->post("capcha");
               
              if($MaXacNhan!=$this->session->userdata('captcha'))
              {
                $data['error']=$this->lang->line('error_kiemtra_MaXacNhan');
              }
              else
              {
                $add = array( 
                        "reportOption"   => $this->input->post("reportOption"),
                        "content"  => $this->input->post("content"),
                        "HoVaTen"  => $this->input->post("HoVaTen"),
                        "SDT"  => $this->input->post("SDT"),
                        "Email"  => $this->input->post("Email"),
                        "link"  => $this->input->post("link"), 
                        );
                          
              $user=$this->default_model->addDuLieuMoi('gopy',$add); 
              
              //Dang nhap thanh cong
              if($user!=FALSE)
              {
                if($ID!=''){
                 $lang_succes=$this->lang->line('lab_editthanhcong');
                }else{
                    $lang_succes=$this->lang->line('lab_thanhcong');
                }
                $data['sucess'] = $lang_succes; 
                
              }
              else{
                //Sai mat khau cu
                $data['error'] = $this->lang->line('error_default');
              }
              } 
        }
        echo json_encode($data);
        exit();
    }  
    
    function guitin(){ 
        $this->form_validation->set_rules('fullname', 'lang:lable_NoiDung', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'lang:lable_muctien', 'trim|required|xss_clean');
        $this->form_validation->set_rules('capcha', 'lang:lable_TieuDe', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mobile', 'lang:lable_NoiDung', 'trim|required|xss_clean');
        if($this->form_validation->run()==FALSE)
        {
            $data['error']='Lỗi: vui lòng nhập đúng các thông tin yêu cầu';
            
        }
        else
        {
              $MaXacNhan=$this->input->post("capcha");
               
              if($MaXacNhan!=$this->session->userdata('captcha'))
              {
                $data['error']=$this->lang->line('error_kiemtra_MaXacNhan');
              }
              else
              {
                $add = array( 
                        "fullname"   => $this->input->post("fullname"),
                        "email"  => $this->input->post("email"),
                        "mobile"  => $this->input->post("mobile"), 
                        "content"  => $this->input->post("content"), 
                        );
                          
              $user=$this->default_model->addDuLieuMoi('tinnhan',$add); 
              
              //Dang nhap thanh cong
              if($user!=FALSE)
              {
                if($ID!=''){
                 $lang_succes=$this->lang->line('lab_editthanhcong');
                }else{
                    $lang_succes=$this->lang->line('lab_thanhcong');
                }
                $data['sucess'] = $lang_succes; 
                
              }
              else{
                //Sai mat khau cu
                $data['error'] = $this->lang->line('error_default');
              }
              } 
        }
        echo json_encode($data);
        exit();
    }  


    //tao thong bao cho admin
    function dangtinbanxe($Loai=''){
       //--- Neu chua dang nhap thi bat dang nhap
        $data['tinban']='';
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        if(isset($_FILES['userfile'])&&$_FILES['userfile']['size']>0)
        {
        //config upload
        $TenFile=time();
        $config['upload_path'] = './upload/photo/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		    $config['max_size']	= '10000';
		    $config['file_name']  = $TenFile;
        
        $this->load->library('upload', $config);
        
     
		if ( ! $this->upload->do_upload())
		{
		    $data['error']=str_replace('</p>','',str_replace('<p>','',$this->upload->display_errors()));
		}
		else
		{
		    $img = $this->upload->data();
        // var_dump($img);
            //Settings to create watermark overlay
            $this->load->library('image_lib');
            
            
            $config['source_image'] = './upload/photo/'.$img['file_name'];
            $config['wm_overlay_path'] = './style/images/logo_wt.png';
            $config['wm_type'] = 'overlay';
            $config['wm_vrt_alignment'] = 'bottom';
            $config['wm_hor_alignment'] = 'left';
            
            if($Loai!='logo'){  
            $this->image_lib->initialize($config);

            $this->image_lib->watermark();
            }  
            //$resize
            $image_sizes = array(
              'thumb' => array(170, 115),
              'medium' => array(624, 476), 
            );

    foreach ($image_sizes as $resize) {

        $config2 = array(
            'source_image' => $config['source_image'],
            'new_image' => "./upload/photo/$resize[0]x$resize[1]/".$img['file_name'],
            'maintain_ration' => true,
            'width' => $resize[0],
            'height' => $resize[1]
        );

        $this->image_lib->initialize($config2);
        $this->image_lib->resize();
    }
            //
            if($Loai!='logo'){  
            echo '<div class="sortableitem"><a href="'.show_img($img['file_name']).'" title="" rel="prettyPhoto[gallery1]"><img src="'.show_img($img['file_name'],'170x115').'"></a> <a class="del" href="javascript:void(0)" title="Xóa ảnh" id="'.$img['file_name'].'" onclick="return del_img(this)"><i class="mpx-close"></i></a></div><input type="hidden" id="imgID" value="'.$img['file_name'].'"/>';
            }else{
                echo '<img src="'.show_img($img['file_name'],'170x115').'"><input type="hidden" id="imgID" value="'.$img['file_name'].'"/>';
            }
		}
       
        }else{
            if($this->session->userdata('userid')){
        $user=Modules::run('trangchu/getInfo','thanhvien','userid',$this->session->userdata('userid'));
        $type=Modules::run('trangchu/getInfo','cauhinh','Loai',$user['level']);
        // $vip=json_decode($type['GiaTri']);
        $luotdang = 15;
        $sotinban=Modules::run('trangchu/getTotalInfo','tinban',"NguoiDang = ".$this->session->userdata('userid')." and NgayDang LIKE '".date('Y-m-d',time())."%'");
        if($luotdang-$sotinban<=0)
        {
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
            echo '<script>alert("Mỗi ngày bạn chỉ có tối đa 15 lượt đăng tin. Bạn đã sử dụng hết số lần đăng tin hôm nay !");</script>';
             
            exit();
        }   
        }    
        $data['title'] = $this->lang->line('title_dangtinbanxe');
        $data['description'] = $this->lang->line('title_dangtinbanxe');
        if($this->session->userdata('permission')=='1'){
                $truyvan=array($this->_id => $Loai);
              }else{
                $truyvan=array($this->_id => $Loai,'NguoiDang'=>$this->session->userdata('userid'));
              }
        foreach ($this->lang->language as $key => $val) 
        {
               $value=str_replace('lable_thongso_batbuoc_','',$key);
               $value=str_replace('lable_thongso_khongbatbuoc_','',$value);
              if(strpos($key,'lable_thongso_batbuoc_')!==false){
                $this->form_validation->set_rules($value, 'lang:'.$key, 'trim|required|xss_clean');
              }
              if(strpos($key,'lable_thongso_khongbatbuoc_')!==false){
                $this->form_validation->set_rules($value, 'lang:'.$key, 'trim|xss_clean');
              } 
        }
        
         $data['tinban']=$this->default_model->getInfoID($this->_table,$truyvan);
         
        if($this->form_validation->run()==FALSE)
        {
               
        }
        else
        {
              $MaXacNhan=$this->input->post("MaXacNhan");
              if($Loai!=''&&$Loai!='salon'){
                 $MaXacNhan=$this->session->userdata('captcha');
                }
              if($MaXacNhan!=$this->session->userdata('captcha'))
              {
                $data['error']=$this->lang->line('error_kiemtra_MaXacNhan');
              }
              else
              {  
                
            foreach ($this->lang->language as $key => $val) 
            {
              if(strpos($key,'lable_thongso_')!==false){
                $value=str_replace('lable_thongso_batbuoc_','',$key);
                $value=str_replace('lable_thongso_khongbatbuoc_','',$value);
                $add[$value] = $this->input->post($value);              
              } 
            } 
              $add['NguoiDang'] = ($this->session->userdata('userid')?$this->session->userdata('userid'):1);  
              
              $add['uptin'] = date('Y-m-d H:i:s',time());              
              if($this->input->post('AlbumAnh')==''){
                $add['AlbumAnh']='';
              }else{
                $add['AlbumAnh']=$this->input->post('AlbumAnh');
              }
              if($this->input->post('emb_vid')==''){
                $add['emb_vid']='';
              }else{
                $add['emb_vid']=$this->input->post('emb_vid');
              }

              $data_info=$this->input->post('contact');
              
              $countinute=1;
              if($this->session->userdata('userid')==FALSE||$data['tinban']['NguoiDang']==1){
                 if($data_info==''){
                   $add['contact']='';
                   $data['error']='Vui lòng nhập đầy đủ Họ tên & Điện thoại';
                   $countinute=0;
                 }else{
                   $add['contact']=json_encode($data_info);
                   $countinute=1;
                 }
              } 
              if($countinute=1){
              
            //tao thanh cong
              if($Loai!=''&&$Loai!='salon'){
                  if($this->input->post('TrangThai')!=''){
                      $add['TrangThai'] = $this->input->post('TrangThai');
                  } 
                  unset($add['NguoiDang']);
                  $this->default_model->updateDuLieu($this->_table,$add,$truyvan);
                   
                  echo '<script>alert("'.$this->lang->line('lab_editthanhcong').'");</script>
                       <script>window.location.href="/thanh-vien/quan-ly-tin-rao"</script>';
                  
              }else{
                  $add['TrangThai'] = 0;
                  $this->default_model->addDuLieuMoi($this->_table,$add);
                  
                  if($this->session->userdata('userid')==FALSE){
                      $last=$this->default_model->getTableRows('tinban',1,0,'IDMaTin desc','','IDMaTin',"",'');
                      $location='/dangtin/xemtinban/'.$last[0]['IDMaTin'];
                  }else{
                      $location='/thanh-vien/quan-ly-tin-rao';
                  }
                  echo '<script>alert("'.$this->lang->line('lab_thanhcong').'");</script>
                        <script>window.location.href="'.$location.'"</script>';
              }
            }                                 
          }            
        }
        $add['Loai'] = 'tinban';  
        $data['Loai']=array("Loai" => $add['Loai']);
        $data['template']='dangtinbanxe';
        $this->load->view('default', $data);
            
        }
    }
    
    function getDoiXe($HangXe){
        if($HangXe!=0&&$HangXe!=""){
        $dieukien=array("Loai" => "DanhMuc", "MenuCha" => $HangXe, "TrangThai" => '1');
        
        $data=$this->default_model->getTableRows('baiviet',"","",'SapXep asc, IDBaiViet asc','','IDBaiViet',"",$dieukien);
        foreach($data as $danhmuc){
                echo "
                <option value='".$danhmuc['IDBaiViet']."'>".$danhmuc['TieuDe']."</option>
                ";
          } 
        }
		
    }
    
    function xemtinban($ID){
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiDang")
                      );
        $dk=array("IDMaTin" => $ID); 
        $data['xemtinban']=$this->default_model->getInfoID($this->_table,$dk,$noibang);
        $data['HangXe']=Modules::run('baiviet/getDanhMucCha',$data['xemtinban']['HangXe']);
        $data['DoiXe']=Modules::run('baiviet/getDanhMucCha',$data['xemtinban']['DoiXe']);
        $data['title'] = $data['xemtinban']['TieuDe'];
        $NoiDung=''.substr($data['xemtinban']['ThongTinMota'],0,200).'';
        $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
        $data['description'] = $NoiDung;
        $this->default_model->updateDuLieu($this->_table,array('LuotXem'=>$data['xemtinban']['LuotXem']+1),array("IDMaTin" => $ID));
        $data['template']='xemtinban';
        $data['ava']=Modules::run('trangchu/getInfo','thanhvien','userid',$data['xemtinban']['NguoiDang']);
        //
        //$this->session->set_userdata(array('NamSX'=>$data['xemtinban']['NamSX']));
        //$this->session->set_userdata(array('XuatXu'=>$data['xemtinban']['XuatXu']));
        //$this->session->set_userdata(array('TinhTrang'=>$data['xemtinban']['TinhTrang']));
        //$this->session->set_userdata(array('DongXe'=>$data['xemtinban']['DongXe']));
        //$this->session->set_userdata(array('TinhThanh'=>$data['ava']['TinhThanh']));
        //
        
        $dieukien=array("HangXe" => $data['xemtinban']['HangXe'],"DoiXe" => $data['xemtinban']['DoiXe']);
        $data['xecungloai']=$this->default_model->getTableRows($this->_table,6,0,'uptin desc, '.$this->_id.' desc','',$this->_id,$noibang,$dieukien);
        
        $opition_nam_price='
                            <option value="1-2">Từ 1 đến 2</option>
                            <option value="2-3">Từ 2 đến 3</option>
                            <option value="3-5">Từ 3 đến 5</option>
                            <option value="5-7">Từ 5 đến 7</option>
                            <option value="7-10">Từ 7 đến 10</option>
                            <option value="10-20">Từ 10 đến 20</option>
                            <option value="20-30">Từ 20 đến 30</option>
                            <option value=">30">Lớn hơn 30</option>
                            <option value="<500">Nhỏ hơn 500</option>
                            <option value="500-800">Từ 500 đến 800</option>
                            <option value="800-1000">Từ 800 đến 1000</option>
                                    ';
                                    $dieukien2=array("SoKM" => $data['xemtinban']['SoKM']);
                                    preg_match_all("/<option value=\"(.*?)\">(.*?)<\/option>/is", $opition_nam_price, $matches);
                                    $check=0;
                                    foreach($matches[2] as $key => $val){ 
                                        $value_from=setval($matches[1],$key);
                                        $value_to=setval($matches[1],$key+1);
                                        if(isset($data['xemtinban']['GiaTien'])){
                                            if($check==0&&strpos($value_from,'>')!==false&&$data['xemtinban']['GiaTien']>str_replace('>','',$value_from)){
                                                $select_ed=" selected='selected'"; $check=1; $khoanggia=array($value_from);
                                                $dieukien2['GiaTien >']=str_replace('>','',$value_from);
                                            }else
                                            if($check==0&&strpos($value_from,'<')!==false&&$data['xemtinban']['GiaTien']<str_replace('<','',$value_from)){
                                                $select_ed=" selected='selected'"; $check=1;  $khoanggia=array($value_from);
        $dieukien2['GiaTien <']=str_replace('<','',$value_from);
                                            }else
                                            if($check==0&&$data['xemtinban']['GiaTien']>=$value_from&&$data['xemtinban']['GiaTien']<=str_replace($value_from.'-','',$matches[1][$key])){
                                                $select_ed=" selected='selected'"; $check=1;  $khoanggia=array($value_from,str_replace($value_from.'-','',$matches[1][$key]));
                                                $dieukien2['GiaTien >=']=$khoanggia[0];
        $dieukien2['GiaTien <=']=$khoanggia[1];
                                            }
                                        } 
        }
        
        
        $data['khoanggia']=$khoanggia;
        $data['xecungkhoanggia']=$this->default_model->getTableRows($this->_table,6,0,'uptin desc, '.$this->_id.' desc','',$this->_id,$noibang,$dieukien2);
        $this->load->view('default', $data);
		  $this->output->cache(30) ;
    }
    
    function xemxeban($Domain,$ID){
        $data['salon_info']=$this->default_model->getInfoID('salon',array("Domain" => $Domain));
        
        $data['xemtinban']=$this->default_model->getInfoID($this->_table,array("IDMaTin" => $ID));
        $data['HangXe']=Modules::run('baiviet/getDanhMucCha',$data['xemtinban']['HangXe']);
        $data['DoiXe']=Modules::run('baiviet/getDanhMucCha',$data['xemtinban']['DoiXe']);
        $data['title'] = ''.$data['HangXe']['TieuDe'].' '.$data['DoiXe']['TieuDe'].' '.$data['xemtinban']['PhanHang'].' '.$data['xemtinban']['NamSX'].'';
        $data['description'] = $data['title'];
        $this->default_model->updateDuLieu($this->_table,array('LuotXem'=>$data['xemtinban']['LuotXem']+1),array("IDMaTin" => $ID));
        $data['xecungloai']=$this->default_model->getTableRows($this->_table,3,0,'rand()','',$this->_id,"",array("Loai" => "salon", "TrangThai" => '1', 'Salon' => $data['salon_info']['IDSalon']));
        $data['template']='xemxeban';
        $this->load->view('template_salon', $data);
		
    }
    //sua binh luan
    function get_Parents($ID,$curentRegion){
       $Loais=array('PhanHang'=>'NamSX','XuatXu'=>'NamSX','NamSX'=>'DoiXe');
       $return=array();
         if($cha=$this->default_model->getInfoID('tinhthanh',array("Note" => $ID,"Loai"=>$Loais[$curentRegion['Loai']]))){ 
             $return[$cha['Loai']]=$cha['Name'];
             $return=array_merge($return,$this->get_Parents($cha['Parent'],$cha));
         }
         return $return;
		
    }
    
    function xemdanhmuc($Loai='',$ID='',$page=1,$tinhthanh='') { 
        
        if($tinhthanh!=''){ 
                 $curentRegion=$this->default_model->getInfoID('tinhthanh',array("Link" => $tinhthanh));
                 $set=array_merge(array($curentRegion['Loai']=>$curentRegion['Name']),$this->get_Parents($curentRegion['Parent'],$curentRegion));
        } 
            
        $var_search='HangXe|DoiXe|NamSX|XuatXu|TinhTrang|HeThongNapNhienLieu|GiaTien|SoKM|NgoaiThat|NoiThat|PhanHang';
        $input=explode('|',$var_search);
        
        if($Loai=='All'||$Loai=='All1'){
            $data['current_info']=$this->default_model->getInfoID('baiviet',array("Link" => $_SERVER['REQUEST_URI'])); 
			
        }
        //print_r($this->input->post());
        $dieukien=array('tinban.TrangThai'=>1,'tinban.is_block'=>1);
         
        if($this->input->post('TieuDe')!=''){
            $dieukien["IDMaTin != '' and MATCH (TieuDe) AGAINST ('*".$this->input->post('TieuDe')."*' IN BOOLEAN MODE) and IDMaTin !="]='';
         }        
         if($this->input->get('img')!=''){
            $this->session->set_userdata(array('XeCoAnh'=>$this->input->get('img')));
         }
         if($this->input->get('img')=='off'){
            $this->session->set_userdata(array('XeCoAnh'=>''));
         }
         
         if($this->input->get('order')!=''){
            $this->session->set_userdata(array('order'=>$this->input->get('order')));
         }  
         
         if($this->input->get('order')=='off'){
            $this->session->set_userdata(array('order'=>''));
         }
         
          if($Loai=='All'||$Loai=='All1'||$Loai=='HangXe'||$Loai=='DoiXe'){
            
            if(!isset($dieukien)){$dieukien='';}
             
            foreach($input as $key){
            
              if($this->input->get($key)=='off'||($Loai!='All'&&$Loai!='All1')){
                if($page==1){
                $this->session->set_userdata(array($key=>''));
                }
              }
              
              if($this->input->get('price')!=''){
            $this->session->set_userdata(array('GiaTien'=>$this->input->get('price')));
          }
          if($this->input->get('type')!=''){
            $this->session->set_userdata(array('SoKM'=>$this->input->get('type')));
          } 
              
            if($this->input->server('REQUEST_METHOD') == 'POST'){    
              if($this->input->post($key)!=''){
                $this->session->set_userdata(array($key=>$this->input->post($key)));
              }else{
                if($page==1){
                $this->session->set_userdata(array($key=>''));
                }
              }
            }  
            if(isset($set)&&array_key_exists($key,$set)){
                $this->session->set_userdata(array($key=>$set[$key]));
            }
        
              if($this->session->userdata($key)!=''){
                if($key=='GiaTien'||$key=='NgoaiThat'){
                    $giatri=$this->session->userdata($key);
                    include 'khoang.php';
                }elseif($key=='HangXe'){
                    $MenuChaID=$this->session->userdata('HangXe');
                    include 'HangXe.php';
                }else{
                    $dieukien[$key]=$this->session->userdata($key);
                } 
              }
            }  
            if($Loai=='HangXe'){  
                 $MenuChaID=$ID;
                 include 'HangXe.php';
            }  
            if($this->session->userdata('XeCoAnh')!=''){
                    $dieukien['AlbumAnh NOT IN (\'noimage.gif\',\'|undefined\',\'|undefined|undefined\',\'undefined\',\'\') and IDMaTin !=']='';
            }           
            if($this->uri->segment(2)!=''&&$this->uri->segment(2)!='All'&&$this->uri->segment(2)!='All1'){
                $url_phantrang=base_url().'oto/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/trang';
            }else{
                $url_phantrang=base_url().'o-to/All/All/trang';
            }
            
        }else{
            $this->session->set_userdata(array('XeCoAnh'=>''));
            $dieukien=array("$Loai" => "$ID");
            $url_phantrang=base_url().'oto/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/trang';
             foreach($input as $key){
                if($page==1){
                $this->session->set_userdata(array($key=>''));
                }
             }
             
        }

        if($this->uri->segment(2)!=''&&!is_numeric($this->uri->segment(2))){
            $U2='/'.$this->uri->segment(3);
            $config['uri_segment'] = 3;
        }else{
            $U2='';
            $config['uri_segment'] = 2;
        }
        $url_phantrang="/".$this->uri->segment(1).$U2;
        if($this->session->userdata('order')!=''){
                 $order=str_replace('-',' ',$this->session->userdata('order')).' ,';
        }else{
            $order='';
        }                      
        $data['HangXe']=Modules::run('baiviet/getDanhMucCha',($this->session->userdata('HangXe')!=''?$this->session->userdata('HangXe'):$ID));
        $HangXe=Modules::run('baiviet/getDanhMucCha',$data[$Loai]['MenuCha']);
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiDang")
                      );
        include(APPPATH . 'includes/phantrang.php');
        $data['dulieu']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start, $order.'uptin desc, IDMaTin desc','',$this->_id,$noibang,$dieukien);
        if ($data['dulieu']) {
            foreach ($data['dulieu'] as $key => $value) {
              $xe_view='pr';
              $c_HangXe=Modules::run('baiviet/getDanhMucCha',$value['HangXe']);
              $link='/'.stripUnicode($c_HangXe['TieuDe']).'-'.stripUnicode($value['NamSX']).'-'.stripUnicode($value['DoiXe']).'/'.stripUnicode($value['TieuDe']).'-'.$xe_view.$value['IDMaTin'].'.html';
              $data['map'][] = [
                'DisplayText'=>$value['TieuDe'],
                'Address'=>$value['DongXe'],
                'DienTich'=>$value['NgoaiThat'].'m²',
                'Phong'=>$value['HeThongNapNhienLieu'],
                'PhongTam'=>$value['MucTieuThu'],
                'Huong'=>$value['NoiThat'],
                'GiaTien'=>$value['GiaTien'].$value['SoKM'],
                'LatitudeLongitude'=>$value['SoCua'].','.$value['SoChoNgoi'],
                'id'=>$key,
                'Link' => $link,
                'Image' =>base_url().get_first_img($value['AlbumAnh'],'170x115'),
                'BigImage' =>base_url().get_first_img($value['AlbumAnh'],'624x476'),
                'icon' => base_url().get_first_img($value['AlbumAnh'],'170x115'),
                'icon_home' => base_url().'style/images/markerhover.png',
                'icon_1' => base_url().'style/images/marker.png',
                'icon_red' => base_url().'style/images/red_marker.png',
              ];
            }         
        }           
        $data['sotin']=$this->default_model->totalRows($this->_table,'','',$dieukien,$noibang);               
        $data['title'] = ($data['HangXe']['Title']!=''?$data['HangXe']['Title']:$data['HangXe']['TieuDe']);
        $data['description'] = $data['HangXe']['Description'];
        $data['keyword'] = $data['HangXe']['Keyword'];
        $data['CatID'] = $ID;
        $data['template']='xemdanhmuc';	    
        $this->load->view('default', $data);
		    $this->output->cache(0.1);
    }
    
    function dangtinmuaxe($ID=''){
        
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        if($this->session->userdata('permission')=='1'){
                $truyvan=array("IDMaTin" => $ID);
              }else{
                $truyvan=array("IDMaTin" => $ID,'NguoiDang'=>$this->session->userdata('userid'));
              }
        $this->form_validation->set_rules('GiaTien', 'lang:lable_muctien', 'trim|required|xss_clean');
        $this->form_validation->set_rules('TieuDe', 'lang:lable_TieuDe', 'trim|required|xss_clean');
        $this->form_validation->set_rules('NoiDung', 'lang:lable_NoiDung', 'trim|required|xss_clean');
        if($this->form_validation->run()==FALSE)
        {
        }
        else
        {
              $MaXacNhan=$this->input->post("MaXacNhan");
              if($ID!=''){
                 $MaXacNhan=$this->session->userdata('captcha');
                }
              if($MaXacNhan!=$this->session->userdata('captcha'))
              {
                $data['error']=$this->lang->line('error_kiemtra_MaXacNhan');
              }
              else
              {
                $add = array(
                        "NguoiDang"   => $this->session->userdata('userid'),
                        "TieuDe"   => $this->input->post("TieuDe"),
                        "NoiDung"  => $this->input->post("NoiDung"),
                        "GiaTien"  => $this->input->post("GiaTien"),
                        "TrangThai"  => 1,
                        );
                         
              
              if($ID!=''){
                 $user=$this->default_model->updateDuLieu('tinmua',$add,$truyvan);
                }else{
                    $user=$this->default_model->addDuLieuMoi('tinmua',$add);
                }
              
              
              //Dang nhap thanh cong
              if($user!=FALSE)
              {
                if($ID!=''){
                 $lang_succes=$this->lang->line('lab_editthanhcong');
                }else{
                    $lang_succes=$this->lang->line('lab_thanhcong');
                }
                $data['sucess'] = $lang_succes;
                echo '<script>alert("'.$lang_succes.'");</script>
                <script>window.location.href="'.base_url().'quan-ly-tin-mua-xe"</script>';
                
              }
              else{
                //Sai mat khau cu
                $data['error'] = $this->lang->line('error_default');
              }
              }
        } 
        if($ID!=''){
            $data['tinmua']=$this->default_model->getInfoID('tinmua',$truyvan);
        }
        else{
          $data['tinmua']='';  
        }
        $data['title'] = $this->lang->line('title_dangmuabanxe');
        $data['description'] = $this->lang->line('title_dangmuabanxe');
        $data['template']='dangtinmuaxe';
        $this->load->view('default', $data);
    }
    
    function quanlytinmua($page=1){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $this->_table='tinmua';
        $dieukien=array("TrangThai" => "1", "NguoiDang" => $this->session->userdata('userid'));
        $url_phantrang=base_url().'quan-ly-tin-mua-xe';
        $config['uri_segment'] = 2;
        include(APPPATH . 'includes/phantrang.php');
        $data['lienhe']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,''.$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $data['title'] = $this->lang->line('title_ql_tinmuaxe');
        $data['description'] = $this->lang->line('title_ql_tinmuaxe');
         
        $data['template']='quanlytinmua';
        $this->load->view('default', $data);
    }
    
    function quanlytinban($page=1){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $dieukien=array("NguoiDang" => $this->session->userdata('userid'));
        $url_phantrang=base_url().'thanh-vien/quan-ly-tin-rao';
        $config['uri_segment'] = 3;
        include(APPPATH . 'includes/phantrang.php');
        $data['lienhe']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,'uptin desc, '.$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $data['title'] = $this->lang->line('title_ql_tinbanxe');
        $data['description'] = $this->lang->line('title_ql_tinbanxe');
         
        $data['template']='quanlytinban';
        $this->load->view('default', $data);
    }
    
    function quanlytinluu($page=1,$active=1){ 
        $data['title'] = 'Quản lý tin đã lưu';
        $data['description'] = $this->lang->line('title_ql_tinbanxe');
         
        $data['template']='quanlytinluu';
        $this->load->view('default', $data);
    }
    
    function quanlytinbansalon($page=1){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $dieukien=array("TrangThai" => "1", "Loai" => 'salon', "NguoiDang" => $this->session->userdata('userid'));
        $url_phantrang=base_url().'quan-ly-tin-rao';
        $config['uri_segment'] = 2;
        include(APPPATH . 'includes/phantrang.php');
        $data['lienhe']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,''.$this->_id.' desc','',$this->_id,"",$dieukien);
        
        $data['title'] = $this->lang->line('title_ql_tinbanxe');
        $data['description'] = $this->lang->line('title_ql_tinbanxe');
         
        $data['template']='quanlytinban';
        $this->load->view('default', $data);
    }
    
    function divtinmuaxe() {
        $this->_table='tinmua';
        $dieukien=array("$this->_table.TrangThai" => '1');
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiDang")
                      );
        $data['menu']=$this->default_model->getTableRows($this->_table,4,0,''.$this->_id.' desc','',$this->_id,$noibang,$dieukien);
        
        $this->load->view('divtinmuaxe', $data);
    }
    
    function tinmuaxe($page=1,$tinhthanh='',$giatien=''){
        $this->_table='tinmua';
        
        if($tinhthanh=='Toàn quốc'||$tinhthanh==''){
            $this->session->set_userdata(array('city'=>'Toàn quốc'));
        }
        if($giatien=='Toàn quốc'||$giatien==''){
            $this->session->set_userdata(array('money'=>'Toàn quốc'));
        }
        
        if($tinhthanh!=''){
            $this->session->set_userdata(array('city'=>$tinhthanh));
        }
        if($giatien!=''){
            $this->session->set_userdata(array('money'=>$giatien));
        }
        
        $TinhThanh=$this->session->userdata('city');
        $GiaTien=$this->session->userdata('money');
        
        if($TinhThanh=='Toàn quốc'||$TinhThanh==''){
            $stt1=' !=';
        }else{
            $stt1='';
            
        }
        if($GiaTien=='Toàn quốc'||$GiaTien==''){
            $stt2=' !=';
        }else{
            $stt2='';
            $this->session->set_userdata(array('money'=>$GiaTien));
        }
        
              
        $dieukien=array("GiaTien$stt2" => "$GiaTien", "TinhThanh$stt1" => "$TinhThanh", "$this->_table.TrangThai" => '1');
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiDang")
                      );
        $url_phantrang=base_url().'mua-xe/';
        $config['uri_segment'] = 2;
        include(APPPATH . 'includes/phantrang.php');                      
        $data['salon_data']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,''.$this->_id.' desc','',$this->_id,$noibang,$dieukien);
        $data['TinhThanh']=$TinhThanh;
        $data['GiaTien']=$GiaTien;
        $data['title'] = $this->lang->line('title_tinmuaxe').' '.$TinhThanh.' '.$GiaTien;
        $data['description'] = $this->lang->line('title_tinmuaxe').' '.$TinhThanh.' '.$GiaTien;
        if(($tinhthanh==''&&$giatien=='')||($tinhthanh=='Toàn quốc'&&$giatien=='')){
            $menu_info=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',25);
            $data['title'] = $menu_info['Title'];
            $data['description'] = $menu_info['Description'];
            $data['keyword'] = $menu_info['Keyword'];
        }
        $data['template']='tinmuaxe';
        $this->load->view('default', $data);
    }
    
    function xemtinmua($ID) {
        $data['tinmua']=$this->default_model->getInfoID('tinmua',array("IDMaTin" => $ID));
        
        $data['title'] = $data['tinmua']['TieuDe'];
        $data['description'] = $data['tinmua']['TieuDe'];
        $data['template']='xemtinmua';
        $this->load->view('default', $data);
    }
    
    function uptin($ID) {
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $truyvan=array($this->_id => $ID,'NguoiDang'=>$this->session->userdata('userid'));
        $user=Modules::run('trangchu/getInfo','thanhvien','userid',$this->session->userdata('userid'));
        $type=Modules::run('trangchu/getInfo','cauhinh','Loai',$user['level']);
        $vip=json_decode($type['GiaTri']);
        $sotinup=Modules::run('trangchu/getTotalInfo','tinban',"NguoiDang = ".$this->session->userdata('userid')." and uptin LIKE '".date('Y-m-d',time())."%'");
        if($vip->{'solanuptin'}-$sotinup<=0)
        {
            echo '<script>alert("Mỗi ngày có 6 lần làm mới tin.Bạn đã hết số lượt làm mới tin hôm nay !");window.location="/thanh-vien/quan-ly-tin-rao";</script>';
             
            exit();
        }
        
         
        $xx=$this->default_model->updateDuLieu($this->_table,array('uptin'=>date('Y-m-d H:i:s',time())),$truyvan);
       	if($xx){echo '<script>alert("Bạn đã làm mới tin thành công !");window.location="/thanh-vien/quan-ly-tin-rao";</script>'; }
    }

    function antin($id) {
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $truyvan=array($this->_id => $id,'NguoiDang'=>$this->session->userdata('userid'));
        $result=$this->default_model->updateDuLieu('tinban',array('is_block'=>0),$truyvan);
        if($result){echo '<script>alert("Bạn đã ẩn tin thành công !");window.location="/thanh-vien/quan-ly-tin-rao";</script>'; }
    }
    
    function hientin($id) {
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $truyvan=array($this->_id => $id,'NguoiDang'=>$this->session->userdata('userid'));
        $result=$this->default_model->updateDuLieu('tinban',array('is_block'=>1),$truyvan);
        if($result){echo '<script>alert("Bạn hiển thị tin thành công !");window.location="/thanh-vien/quan-ly-tin-rao";</script>'; }
    }

    function quanlytinmua_admin($sucess="",$page=1){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $this->_table='tinmua';
        $bien_phanbiet=$this->_id;
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiDang")
                      );
        $dieukien='';
        $url_phantrang=base_url().'dangtin/quanlytinmua_admin';
        $bien_sapxep_hienthi=$this->_id.' desc';
        $user['template']='admin_quanlytinmua';
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    
    function quanlygopy($sucess="",$page=1){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url().'thanh-vien/dang-nhap.html');
            exit();
        }
        //phan trang hien thi
        $this->_table='gopy';
        $bien_phanbiet=$this->_id;
        $noibang='';
        $dieukien='';
        $url_phantrang=base_url().'dangtin/quanlygopy';
        $bien_sapxep_hienthi=$this->_id.' desc';
        $user['template']='quanlygopy';
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    
    function xemgopy($id){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $data['info']=Modules::run('trangchu/getInfo','gopy','IDMaTin',$id);
        $data['template']='xemgopy'; 
        $this->load->view('admin/content', $data);
        
    }
    
    function quanlytinnhan($sucess="",$page=1){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $this->_table='tinnhan';
        $bien_phanbiet=$this->_id;
        $noibang='';
        $dieukien='';
        $url_phantrang=base_url().'dangtin/quanlytinnhan';
        $bien_sapxep_hienthi=$this->_id.' desc';
        $user['template']='quanlytinnhan';
        $user['title']='Quản lý tin nhắn';
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    
    function xemtinnhan($id){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $this->default_model->updateDuLieu('tinnhan',array('viewed'=>1),array('IDMaTin'=>$id));
        $data['info']=Modules::run('trangchu/getInfo','tinnhan','IDMaTin',$id);
        $data['template']='xemtinnhan'; 
        $this->load->view('admin/admin', $data);
        
    }
    
    function quanlytinban_admin($sucess="",$page=1,$active=1,$type=''){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $dieukien=array($this->_table.'.TrangThai'=>$active);
        if($active==0){
            $this->default_model->updateDuLieu('tinban',array('viewed'=>1),array('viewed'=>0));
            $user['act_link'] = 'duyet-tin/';
            $user['label'] = ' Duyệt';
            $user['icon'] = '<i class="fa fa-upload"></i>';
        }else{
          $user['act_link'] = 'sua-tin-rao/';
          $user['label'] = ' Sửa';
          $user['icon'] = '<i class="fa fa-edit"></i>';
        }
        
        $bien_sapxep_hienthi=$this->_id.' desc';
        if($type=='vip_user'){
            $where="and thanhvien.level='vip_user'";
        }
        if($type=='xsieuvip_user'){
            $where="and thanhvien.level='xsieuvip_user'";
        }
        if($type=='free_user'){
            $where="and thanhvien.level IN('free_user','')";
        }
        if($type=='hot'){
            $bien_sapxep_hienthi='LuotXem desc, '.$this->_id.' desc';
        }
        
        $var_search='DoiXe|NamSX|XuatXu|TinhTrang|PhanHang';
        $input=explode('|',$var_search);
        foreach($input as $key){
            if($page==1){
                $this->session->set_userdata(array($key=>''));
            }
            if($this->input->server('REQUEST_METHOD') == 'POST'){    
              if($this->input->post($key)!=''){
                $this->session->set_userdata(array($key=>$this->input->post($key)));
              }else{
                $this->session->set_userdata(array($key=>''));
              }
            }
            if($this->session->userdata($key)!=''){
                $dieukien[$key]=$this->session->userdata($key);
            } 
        }
        //phan trang hien thi
        $config = array('uri_segment'=>4);
        $bien_phanbiet=$this->_id;
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = $this->_table.NguoiDang $where")
                      );
        
        $url_phantrang=base_url()."dangtin/quanlytinban_admin/".$sucess;
        
        $user['template']='admin_quanlytinban';
        $user['title']='QUẢN LÝ TIN RAO';
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    function duyettin($id) {
      if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
      $this->default_model->updateDuLieu('tinban',array('TrangThai'=>1),array('IDMaTin'=>$id));
      echo '<meta charset="utf-8" /><script>alert("Duyệt tin thành công");</script>
          <script>location.href = document.referrer;</script>';
    }
    
    function xoatin($loai,$id){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        $this->default_model->XoaDuLieu(array(0 => $id),str_replace('-','',$loai),$this->_id);
        echo '<meta charset="utf-8" /><script>alert("'.$this->lang->line('thongbao_xoa_thanhcong').'");</script>
                <script>window.location.href="/thanh-vien/quan-ly-tin-rao"</script>';
    }
    
    function update()
    {
        $parent=457; 
        if($this->input->get('parent')!=''){
            $parent=$this->input->get('parent');
        }
        $link=str_replace('dangtin/update/','',uri_string());
        
        $arr_fills=array(553=>'ban-nha-biet-thu-lien-ke.htm',554=>'ban-nha-mat-pho.htm',555=>'ban-dat-nen-du-an.htm',556=>'ban-dat.htm',557=>'ban-trang-trai-khu-nghi-duong.htm',558=>'ban-kho-nha-xuong.htm',559=>'ban-loai-bat-dong-san-khac.htm');
        
        foreach($arr_fills as $parent=>$link){
        
         $base=base_url();$stt=0;
         $get=$base.'/'.$link; 
         $get_ketqua888 = getcontent($get);  
          
         preg_match_all('/<a id="ContentPlaceHolder1_ProductSearchResult1_rpProductList_(.*?)" href="(.*?)">(.*?)<img id="(.*?)" title="(.*?)" src="(.*?)" alt="(.*?)"(.*?)>(.*?)<\/a>/is', $get_ketqua888, $tit11); 
         
         if(isset($tit11[7])){
            
          foreach($tit11[7] as $key=>$valdata){
            
            $u=$this->default_model->getInfoID('thanhvien',array('HoVaTen != '=>'','DienThoai != '=>'','DiaChi != '=>''),'','userid'); 
          $data=array('HangXe'=>$parent); 
          $data['NguoiDang']=$u['userid'];
          $data['TrangThai']=1; 
          $data['TieuDe']=trim($tit11[7][$key]);
          $check=$this->default_model->getInfoID("tinban",array("TieuDe" => $data['TieuDe']));
          if(!$check){ 
               $retu=getcontent($base.$tit11[2][$key]); 
               //
               preg_match('/<div class="pd-desc-content">(.*?)<\/div>/is', $retu, $description);      
               $data['ThongTinMota']=trim($description[1]);
               //
               preg_match('/<span class="spanprice">(.*?)<\/span>/is', $retu, $gia);
               $gia=explode(' ',trim($gia[1]));      
               $data['GiaTien']=trim($gia[0]);
               $data['SoKM']=trim($gia[1]); 
               //
               preg_match('/<span class="spanprice">(.*?)<\/span>(.*?)<span>(.*?)<\/span>/is', $retu, $dientich);
               $dientich=explode(' ',trim($dientich[3]));    
               $data['NgoaiThat']=str_replace('&nbsp;m&#178;','',$dientich[0]);
               //
               preg_match('/<tr>(.*?)<td><b>Hướng nhà<\/b><\/td>(.*?)<td>(.*?)<\/td>(.*?)<\/tr>/is', $retu, $huongnha);  
               $data['NoiThat']=trim($huongnha[3]);
               //
               preg_match('/<tr>(.*?)<td><b>Số phòng<\/b><\/td>(.*?)<td>(.*?)<\/td>(.*?)<\/tr>/is', $retu, $huongnha);  
               $data['HeThongNapNhienLieu']=trim($huongnha[3]); 
               //
               preg_match('/<tr>(.*?)<td><b>Đường vào<\/b><\/td>(.*?)<td>(.*?)<\/td>(.*?)<\/tr>/is', $retu, $huongnha);  
               $data['DanDong']=trim(str_replace(' m','',$huongnha[3])); 
               //
               preg_match('/<tr>(.*?)<td><b>Mặt tiền<\/b><\/td>(.*?)<td>(.*?)<\/td>(.*?)<\/tr>/is', $retu, $huongnha);  
               $data['HopSo']=trim(str_replace(' m','',$huongnha[3]));
               //
               preg_match('/<tr>(.*?)<td><b>Số tầng<\/b><\/td>(.*?)<td>(.*?)<\/td>(.*?)<\/tr>/is', $retu, $huongnha);  
               $data['NhienLieu']=trim($huongnha[3]); 
               //
               preg_match('/<tr>(.*?)<td><b>Số toilet<\/b><\/td>(.*?)<td>(.*?)<\/td>(.*?)<\/tr>/is', $retu, $huongnha);  
               $data['MucTieuThu']=trim($huongnha[3]);
               //
               preg_match('/id="hddDiadiem" value="(.*?)"/is', $retu, $huongnha);  
               $data['DongXe']=trim($huongnha[1]);
               //
               preg_match('/id="txtPositionX" value="(.*?)"/is', $retu, $huongnha);  
               $data['SoCua']=trim($huongnha[1]);
               //
               preg_match('/id="txtPositionY" value="(.*?)"/is', $retu, $huongnha);  
               $data['SoChoNgoi']=trim($huongnha[1]); 
               //
               preg_match('/id="hddLatitude" value="(.*?)"/is', $retu, $huongnha);  
               $data['hddLatitude']=trim($huongnha[1]); 
               //
               preg_match('/id="hddLongtitude" value="(.*?)"/is', $retu, $huongnha);  
               $data['hddLongtitude']=trim($huongnha[1]); 
               //
               $arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
               $getcity=base_url().'/Handler/SearchHandler.ashx?module=';
               preg_match('/id="hddcboCity" value="(.*?)"/is', $retu, $area);
               preg_match('/id="hddcboDist" value="(.*?)"/is', $retu, $hddcboDist);  
               preg_match('/id="hddcboWard" value="(.*?)"/is', $retu, $hddcboWard);  
               preg_match('/id="hddcboStreet" value="(.*?)"/is', $retu, $hddcboStreet);
               preg_match('/id="hddcboProject" value="(.*?)"/is', $retu, $hddcboProject);  
                 
               $disds=file_get_contents($getcity.'GetDistrict&cityCode='.trim($area[1]));
               preg_match('/"Id":"'.$hddcboDist[1].'","Text":"(.*?)"/is', $disds, $listDists);  
               $data['NamSX']=trim($listDists[1]); 
               
               preg_match('/"Id":"'.trim($area[1]).'","Text":"(.*?)"/is', $arr, $city);   
               $data['DoiXe']=trim($city[1]);  
               
               $disds=file_get_contents($getcity.'GetWard&distId='.trim($hddcboDist[1]));
               preg_match('/"Id":"'.$hddcboWard[1].'","Text":"(.*?)"/is', $disds, $listWards);  
               $data['XuatXu']=trim($listWards[1]); 
               
               $disds=file_get_contents($getcity.'GetStreet&distId='.trim($hddcboDist[1]));
               preg_match('/"Id":"'.$hddcboStreet[1].'","Text":"(.*?)"/is', $disds, $listStreets);  
               $data['PhanHang']=trim($listStreets[1]); 
               
               if($hddcboProject[1]!=0){
               $disds=file_get_contents($getcity.'GetProject&distId='.trim($hddcboDist[1]));
               preg_match('/"Id":"'.$hddcboProject[1].'","Text":"(.*?)"/is', $disds, $listProjects);  
               $data['TinhTrang']=trim($listProjects[1]).'|'.$hddcboProject[1]; 
               }
               
               $mmLink=base_url().'/crop/624x476/';
               preg_match_all('/<img src="'.str_replace('/','\/',$mmLink).'(.*?)"/is', $retu, $images);
               
               $AlbumAnh='';
               $stt1=0;
                  foreach($images[1] as $image){$stt1++;
                    if($image!=''){
                    $image=$mmLink.trim($image);
                   // New file 
                   $exts=array('.png','.jpg','.gif','.bmp');
                   foreach($exts as $val){
                      if(strpos($image,$val)!=false){
                      $ext=$val;
                      }
                   }       
                    $name=md5(time().rand(0,1000));
                    $new = APPPATH.'/../upload/photo/'.$name;
                    
                    $raw=str_replace('crop/624x476/','',$image);
                    $thumb_medium=$image;
                    $thumb_small=str_replace('crop/624x476/','crop/170x115/',$image);
 
                    file_put_contents($new.$ext, file_get_contents($raw));
                    file_put_contents(APPPATH.'/../upload/photo/624x476/'.$name.$ext, file_get_contents($thumb_medium));
                    file_put_contents(APPPATH.'/../upload/photo/170x115/'.$name.$ext, file_get_contents($thumb_small));
                    
                    $vvv=count($images[1])!=$stt1?'|':'';
                    $AlbumAnh.=str_replace(APPPATH.'/../','/',$name.$ext).$vvv;
                   }
                 }
                 $data['AlbumAnh']=$AlbumAnh;
                 
                  $this->default_model->addDuLieuMoi('tinban',$data); 
            }
          }
          }
          }
    }
}
