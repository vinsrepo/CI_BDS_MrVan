<?php
class Trangchu extends MX_Controller {
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
        include_once(APPPATH . 'includes/chuyendau.php');
        $this->lang->load('trangchu', $language);
        $this->lang->load('lienhe/lienhe', $language);
        include_once(APPPATH . 'includes/doctien.php');
        include_once(APPPATH . 'includes/curl.php');
        $this->load->library('pagination');
        $this->load->helper('text');
    }
 
    function index()
    {
        $info=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        $dulieu=json_decode($info['GiaTri']);
        $data['title'] = $dulieu->{'TenTrangWeb'};
        $data['description'] = $dulieu->{'TieuDe'};
        $data['template']='trangchu';
        $this->load->view('default', $data);				
    }
    function trangchumap(){
        $info=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        $dulieu=json_decode($info['GiaTri']);
        $data['data'] = [
            'toado_x'=> $dulieu->{'toado_x'},
            'toado_y' => $dulieu->{'toado_y'}
            ];
        $this->load->view('trangchumap',$data);
    }
    
    function getInfo($table,$var,$val){
        $data=$this->default_model->getInfoID($table,array($var => $val));
        return $data;
    }
    function getTotalInfo($table,$var,$val){
        $data=$this->default_model->geTotalIDLike($table,$var,$val);
        return $data;
    }
    function totalRows($table,$val){
        $data=$this->default_model->totalRows($table,'','',$val);
        return $data;
    }
    function getTotalGroup($table,$group_by){
        $data=$this->default_model->totalGroupBy($table,$group_by);
        return $data;
    }
    function getList($table,$limit,$start,$order,$ID,$dieukien,$group_by="",$select=''){
        $data=$this->default_model->getTableRows($table,$limit,$start,$order,'',$ID,'',$dieukien,$group_by,$select);
        return $data;
    }
    function header($title="",$description="",$ccc='',$banner='',$keyword='')
    {
        if($ccc==''){
            $data['site']=$this->default_model->getInfoID("cauhinh",array("Loai" => "DongMoWebsite"));
            if($data['site']['TrangThai']==1){
            $data['title'] = $data['site']['TieuDe'];
            $data['description'] = $data['site']['TieuDe'];
            $data['template'] = 'dongcua';
            $this->load->view('dongcua', $data);
            exit();
            }
        }
        $data['info']=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        if($this->session->userdata('userid')!=FALSE){
            $data['user_info']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
        }
        $data['title'] = $title;
        $data['description'] = $description;
        $data['keyword'] = $keyword;
        if($banner!=''){
            $data['banners'] = $banner;
        }
        $this->load->view('header', $data);
        
    }
    
    function footer()
    {
        
        $data['email']=$this->default_model->getInfoID("cauhinh",array("Loai" => "email_smtp_user"));
        $info=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        $data['data']=json_decode($info['GiaTri']);
        $this->load->view('footer',$data);
        
    }
    
    function m_header($title="",$description="",$ccc='',$banner='')
    {
        if($ccc==''){
        $data['site']=$this->default_model->getInfoID("cauhinh",array("Loai" => "DongMoWebsite"));
        if($data['site']['TrangThai']==1){
        $data['title'] = $data['site']['TieuDe'];
        $data['description'] = $data['site']['TieuDe'];
        $data['template'] = 'dongcua';
         
         $this->load->view('dongcua', $data);
         exit();
		
        }
		
        }
        $data['info']=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        if($this->session->userdata('userid')!=FALSE){
        $data['user_info']=$this->default_model->getInfoID("thanhvien",array("userid" => $this->session->userdata('userid')));
		
        }
        $data['title'] = $title;
        $data['description'] = $description;
        if($banner!=''){
            $data['banners'] = $banner;
        }
        $this->load->view('m_header', $data);       
    }
    
    function m_footer()
    {
        
        $data['email']=$this->default_model->getInfoID("cauhinh",array("Loai" => "email_smtp_user"));
        $info=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        $data['data']=json_decode($info['GiaTri']);
        $this->load->view('m_footer',$data);       
    }
    
    function tinvip()
    {
        
        $dieukien=array("thanhvien.level !=" => "free_user", "thanhvien.level !=" => "", "tinban.TrangThai" => '1');
        $noibang=array(
                      array("key" => "thanhvien", "where" => "thanhvien.userid = tinban.NguoiDang")
                      );
        $data['vip']=$this->default_model->getTableRows('tinban',30,0,'uptin desc, IDMaTin desc','','IDMaTin',$noibang,$dieukien);
        
        $this->load->view('tinvip',$data);
        
    }
    
    function tinbanxemoi()
    {
        // $config['per_page'] = 6;
        $dieukien=array("tinban.TrangThai" => '1','AlbumAnh !='=>'','tinban.is_block'=>1);
        $noibang=array(
                        array("key" => "thanhvien", "where" => "thanhvien.userid = tinban.NguoiDang")
                    );
        // thay 6 =30
        $data['vip']=$this->default_model->getTableRows('tinban',$config['per_page'],0,'level = \'xsieuvip_user\' desc, level = \'vip_user\' desc, uptin desc, IDMaTin desc','','IDMaTin',$noibang,$dieukien);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('tinbanxemoi',$data);       
    }
    function m_tinbanmoi()
    {
        $config['per_page'] = 6;
        $dieukien=array("tinban.TrangThai" => '1','AlbumAnh !='=>'','tinban.is_block'=>1);
        $noibang=array(
                        array("key" => "thanhvien", "where" => "thanhvien.userid = tinban.NguoiDang")
                    );
        // thay 6 =30
        $data['vip']=$this->default_model->getTableRows('tinban',9,0,'level = \'xsieuvip_user\' desc, level = \'vip_user\' desc, uptin desc, IDMaTin desc','','IDMaTin',$noibang,$dieukien);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('m_tinbanmoi',$data);       
    }
    
    function vipsalon()
    {
        
        $dieukien=array("TrangThai" => '1');
        $data['vip']=$this->default_model->getTableRows('salon',12,0,'IDSalon desc','','IDSalon','',$dieukien);
        
        $this->load->view('vipsalon',$data);
		
		
        
    }
    function dichvu($cat,$page=1)
    {        
        $get=getcontent(base_url().$cat.'/p'.$page.'.htm'); 
        preg_match('/<div class="content-left">(.*?)<div class="content-right">/is', $get, $noidung); 
        $content=$noidung[1]; 
        $content=str_replace('href="','href="/du-an',$content); 
        $content=str_replace('href=\'','href=\'/du-an',$content); 
        $content=str_replace('style-pager-row-selected','style-pager-row-selected2',$content); 
        $content=str_replace('/Scripts','/style/js',$content);
        $content=str_replace('/Images/','/style/images/',$content);  
        $content=str_replace('ctl00$ContentPlaceHolder1$ProjectBoxSearch1$','',$content);                 
        $content = preg_replace('/p([0-9]+).htm/', '$1', $content);
         preg_match('/<title>(.*?)<\/title>/is', $get, $title);
         preg_match('/id="hddcboCatePj" value="(.*?)"/is', $get, $IDCAT);
         preg_match('/id="hddcboDistPj" value="(.*?)"/is', $get, $distID);
         preg_match('/id="hddcboCity" value="(.*?)"/is', $get, $cityCode);
         preg_match('/id="hddcboProject" value="(.*?)"/is', $get, $projectID);
         preg_match('/<h1>(.*?)<\/h1>/is', $get, $projectName);  
         preg_match('/"Id":'.$IDCAT[1].',"Text":"(.*?)"/is', $get, $cattype);
         $tit=str_replace(' | dothi.net','',trim($title[1]));
            $data['title'] = $tit;
            $data['description'] = $tit;
            $data['template']='dichvu';  
            $data['noidung'] = $content; 
            $data['cattype'] = $cattype[1]; 
            $data['cityCode'] = $cityCode[1];  
            $data['distID'] = $distID[1];
            if($data['distID']){
                $resultLists=file_get_contents(base_url().'/Handler/SearchHandler.ashx?module=GetDistrict&cityCode='.$cityCode[1]); 
                preg_match('/"Id":"'.$data['distID'].'","Text":"(.*?)"/is', $resultLists, $distID);
                $data['distID'] = $distID[1];
            }
            $data['projectID'] = $projectID[1];   
            $data['projectName'] = trim($projectName[1]);  //print_r($data['projectID'].'|'.$data['projectName']);    
            $data['cha_info']=$this->default_model->getInfoID('baiviet',array("IDBaiViet" => 455)); 
        $this->load->view('default', $data);
    }
    // function phongthuy($uri='')
    // {
    //     if($uri!=''){
    //         $link=uri_string();
    //     }else{
    //         $link='van-ban-nganh-xay-dung.htm';
    //     }
        
    //     if($this->input->post('EVENTTARGET')==1){
    //         $POST=array('__EVENTTARGET'=>'');
    //         foreach($this->input->post() as $key=>$apost){
    //           if($key!='EVENTTARGET'){
    //             $POST['ctl00$ContentPlaceHolder1$'.$key]=$apost;
    //           }
    //         }
    //         $get=getcontent('http://dothi.net/'.$link,$POST);
    //         $get=str_replace('http://dothi.net/','/',$get);
    //         echo "<script>window.location='$get'</script>";
    //     }else{
    //         $get=getcontent('http://dothi.net/'.$link);
    //     }
    //     //print_r($uri);
    //     preg_match('/<div class="content-left">(.*?)<div class="content-right">/is', $get, $noidung); 
    //     //preg_match_all('/<div class="content-newsdetail">([^`]*?)<div class="right-newslist">/', $get, $show_content);// print_r($show_content); 
    //     $noidung=str_replace('http://file3.batdongsan.com.vn/FileUpload/','/tai-ve/',$noidung[1]);  
    //     $noidung=str_replace('style-pager-row-selected','style-pager-row-selected2',$noidung); 
    //     $noidung=str_replace('ctl00$ContentPlaceHolder1$','',$noidung);       
    //     $data['title'] = 'Văn bản ngành xây dựng';
    //     $data['description'] = 'Văn bản ngành xây dựng';
    //     $data['template']='phongthuy';
    //     $data['show_content']=$noidung;
    //     $this->load->view('default', $data);
    // }
    function sitemap()
    {
        $info=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        $dulieu=json_decode($info['GiaTri']);
        $data['title'] = 'Sitemap';
        $data['description'] = $dulieu->{'MoTa'};
        $data['template']='sitemap';
        $this->load->view('default', $data);
    }
    function xemdichvu($Domain='',$Loai='default')
    {
        if($Domain!=''){
            $data['salon_info']=$this->default_model->getInfoID('salon',array("Domain" => $Domain));  
        }
        $get=file_get_contents('http://banxehoi.com/'.uri_string());//print_r($show_content);
        preg_match('/<title>(.*?)<\/title>/', $get, $title);
        preg_match_all('/<div class="center">([^`]*?)<div class="newfooter">/', $get, $show_content);// print_r($show_content);
        $info=$this->default_model->getInfoID("cauhinh",array("Loai" => "CauHinhChung"));
        $dulieu=json_decode($info['GiaTri']);
        $data['title'] = str_replace('banxehoi.com',$_SERVER['HTTP_HOST'],$title[1]);
        $data['description'] = $dulieu->{'MoTa'};
        $data['template']='xemdichvu';
        $data['show_content']=$show_content[1][0];
        $this->load->view($Loai, $data);
    }
    function nganhang()
    {
        $this->load->view('nganhang');
         
        
    }
    function chiphi($mobile='')
    {
        if($mobile==''){
            $this->load->view('chiphi'); 
        }else{ 
            $data['title'] = 'Phong thủy theo tuổi';
            $data['description'] = 'Phong thủy theo tuổi';
            $data['template']='phongthuy';
            $this->load->view('default', $data);
        } 
    }
    function dichvusearch($mobile='')
    {
        if($mobile==''){
            $this->load->view('dichvusearch'); 
        }else{ 
            $data['title'] = 'Đăng ký nhận tin rao';
            $data['description'] = 'Đăng ký nhận tin rao';
            $data['template']='dangkynhantin';
            $this->load->view('default', $data);
        } 
    }
    function letter()
    {
        if($this->input->post('txtEmailRegister')!=''){
            $check=$this->default_model->getInfoID("dangky",array("txtEmailRegister" => $this->input->post('txtEmailRegister')));
            if(!$check){
                if($this->default_model->addDuLieuMoi('dangky',$this->input->post()))
                {
                   echo 1;
                }else{
                   echo '0';
                }
            }else{
                echo 2;
            }
        }
        exit();
    }
    function contactform()
    {
        // $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if($this->input->post('hddEEmail')!='' && $this->input->post('hddEPhone')!='' && $this->input->post('hddEName')!=''){
            $check=$this->form_validation->set_rules('hddEEmail', 'Email', 'required|email');
            $check=$this->default_model->getInfoID("contact",array(
                "hddEName" => $this->input->post('hddEName'),
                "hddEPhone" => $this->input->post('hddEPhone'),
                "hddEEmail" => $this->input->post('hddEEmail'),
                "hddETime" => date('Y-m-d H:i:s',time()),
            ));
            if(!$check){
                if($this->default_model->addDuLieuMoi('contact',$this->input->post()))
                {
                   echo 1;
                }else{
                   echo 0;
                }
            }else{
                echo 2;
            }
        }
        exit();
    }
    function xoaContact($id){
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        // $table = 'contact';
        $this->default_model->delContact($id);
        echo '<meta charset="utf-8" /><script>alert("Xoá thành công");</script>
                <script>location.href = document.referrer;</script>';
    }
    function quanlytuvan($sucess="",$page=1){
        //--- Neu chua dang nhap thi bat dang nhap
        if($this->session->userdata('permission')!=1){
            redirect(base_url());
            exit();
        }
        $this->_table='contact';          
        $bien_sapxep_hienthi='IDContact desc';     
        $noibang='';
        $dieukien='';
        // $this->default_model->getTableRows($this->_table,$config['per_page'],$start,$this->_id.' desc','',$this->_id,"",$dieukien);
        // $var_search='IDContact|hddEName|hddEEmail|hddEPhone|TieuDe|hddECity';
        // $input=explode('|',$var_search);
        // foreach($input as $key){
        //     if($page==1){
        //         $this->session->set_userdata(array($key=>''));
        //     }
        //     if($this->input->server('REQUEST_METHOD') == 'POST'){    
        //         if($this->input->post($key)!=''){
        //             $this->session->set_userdata(array($key=>$this->input->post($key)));
        //         }else{
        //             $this->session->set_userdata(array($key=>''));
        //       }
        //     }
        //     if($this->session->userdata($key)!=''){
        //         $dieukien[$key]=$this->session->userdata($key);
        //     } 
        //     // var_dump($dieukien[$key]);die;
        // }

        $this->default_model->getTableRows($this->_table,$config['per_page'],$start,$bien_sapxep_hienthi,'',$this->_id,$noibang,$dieukien);
        $config = array('uri_segment'=>4);
        $bien_phanbiet=$this->_id;
        $url_phantrang=base_url()."trangchu/quanlytuvan/".$sucess;        
        
        $user['template']='quanlytuvan';
        $user['title'] ='Quản lý tư vấn'; 
        include(APPPATH . 'includes/phantrang_admin.php');
    }
    function quanlydangky($sucess="",$page=1){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $this->_table='dangky';
        $bien_phanbiet=$this->_id;
        $noibang='';
        $dieukien='';
        $this->default_model->updateDuLieu('dangky',array('viewed'=>1),array('viewed'=>0));
        $url_phantrang=base_url().'dangtin/quanlydangky';
        $bien_sapxep_hienthi='ID desc';
        $user['template']='quanlydangky';
        $user['title']='Quản lý email đăng ký';
        include(APPPATH . 'includes/phantrang_admin.php');
        
    }
    function xemdangky($id){
        if($this->session->userdata('userid')==FALSE){
            redirect(base_url());
            exit();
        }
        //phan trang hien thi
        $data['info']=Modules::run('trangchu/getInfo','dangky','ID',$id);
        $data['template']='xemdangky'; 
        $this->load->view('admin/admin', $data);
        
    }
    function gopy()
    {
        $this->load->view('gopy'); 
    }
    function guitin()
    {
        $this->load->view('guitin'); 
    } 
    function calculator()
    {
        $this->load->view('calculator'); 
    }
    // function bank()
    // {
    //     $newListIds=array();
    //     $ListIds=$this->input->post('productIds');
    //     $ListIds=explode(',',$ListIds);
    //     foreach($ListIds as $ListId){
    //         if($ListId!=''){
    //             $newListIds[]=$ListId;
    //         }
    //     }
    //     $newListIds=implode(',',$newListIds);
    //     $products=$this->default_model->getTableRows('tinban',30,0,'','','IDMaTin','',array("IDMaTin IN ($newListIds) and IDMaTin !="=>"")); 
    //     var_dump($products);die;     
    //     $this->load->view('bank',array('products'=>$products)); 
    // } 
    // function addpr()
    // {
    //     $id=$this->input->get('id');
    //     $get=getcontent('http://dothi.net/khu-can-ho-quan-2/de-capella-pj'.$id.'.htm');  
    //      preg_match('/id="ContentPlaceHolder1_ProjectDetail1_imgAvatar"(.*?)src="(.*?)"(.*?)/is', $get, $img);
    //      preg_match('/<span>Địa chỉ: <\/span>(.*?)<p>(.*?)<\/p>/is', $get, $addName);  
    //      preg_match('/\| Dự án (.*?) \|/is', $get, $cattype);
    //      preg_match('/<h1>(.*?)<\/h1>/is', $get, $projectName); 
    //         $data['projectName'] = trim($projectName[1]);   
    //         $data['addName'] = trim($addName[2]);
    //         $quan=explode(',',$data['addName']);
    //         $key=count($quan)-1;
    //         $quan=$quan[$key-1];
    //         $IMG_RAW = $img[2];
    //         $IMG_MEDIUM = $img[2];
    //         $IMG_SMALL = preg_replace('/crop_([0-9]+)_([0-9]+)/is','crop_104_69',$img[2]);
            
    //         $name=stripUnicode($data['projectName']); 
    //         $exts=array('.png','.jpg','.gif','.bmp');
    //                foreach($exts as $val){
    //                   if(strpos($IMG_RAW,$val)!=false){
    //                   $ext=$val;
    //                   }
    //                } 
    //                  file_put_contents(APPPATH.'/../upload/images/duan/'.$name.$ext, file_get_contents($IMG_RAW));
    //                  file_put_contents(APPPATH.'/../upload/_thumbs/Images/duan/400x250/'.$name.$ext, file_get_contents($IMG_MEDIUM));
    //                  file_put_contents(APPPATH.'/../upload/_thumbs/Images/duan/'.$name.$ext, file_get_contents($IMG_SMALL));
    //         $data['IMG'] = '/upload/images/duan/'.$name.$ext;        
    //         $data['Link'] = '/du-an/'.stripUnicode(trim($cattype[1])).'-'.stripUnicode($quan).'/'.stripUnicode($data['projectName']).'-pj'.$id.'.htm';
    //           print_r(json_encode($data));
    //         $this->load->view('addpr'); 
    // }
    function getall()
    {
        $this->load->view('getall'); 
    }
    function getterm()
    {
        $this->load->view('getterm'); 
    }
    function getinterest()
    {
        $this->load->view('getinterest'); 
    }
    function getrepaymentschedule($name)
    {
        $this->layout->name=$name;
        $data['name']=$name;
        $this->load->view('getrepaymentschedule',$data); 
    }
    function mauxe()
    {
        $this->load->view('mauxe'); 
    }
    function hotnews() {
        $dieukien=array("Loai" => 'TinTuc', "TrangThai" => '1');
        
        $data['news']=$this->default_model->getTableRows('baiviet',5,0,'IDBaiViet desc','','IDBaiViet',"",$dieukien);
        $dieukien1=array("Loai" => 'ThongBao', "TrangThai" => '1');
        
        $data['thongbao']=$this->default_model->getTableRows('baiviet',5,0,'IDBaiViet desc','','IDBaiViet',"",$dieukien1);
        
        return $data;
		
		$this->output->cache(30) ;
    }
}