<?php
class Rss extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        include(APPPATH . 'includes/init.php');
         
    }
    function index()
    {
        
    }
    function indexc()
    {
        $rss_data=array();
        $dieukien=array("Loai" => 'TinTuc', "TrangThai" => '1');
        $tinban=$this->default_model->getTableRows('tinban',20,0,'IDMaTin desc','','IDMaTin',"",'');
          foreach($tinban as $rss)
          {
            $HangXe=Modules::run('baiviet/getDanhMucCha',$rss['HangXe']);
            $DoiXe=Modules::run('baiviet/getDanhMucCha',$rss['DoiXe']);
            $rss_data[] = array('ID' => $rss['IDMaTin']
                               ,'date' => $rss['NgayDang']
                               ,'title' => $HangXe['TieuDe'].' '.$DoiXe['TieuDe'].' '.$rss['PhanHang'].' '.$rss['NamSX']
                               ,'link' => base_url().'xe-'.$rss['IDMaTin'].'/'.$HangXe['TieuDe'].'-'.$DoiXe['TieuDe'].'.html'
                               ,'content' => $rss['ThongTinMota']);
          }
        $tinmua=$this->default_model->getTableRows('tinmua',20,0,'IDMaTin desc','','IDMaTin',"",'');
        foreach($tinmua as $rss)
          {
            $rss_data[] = array('ID' => $rss['IDMaTin']
                               ,'date' => $rss['NgayDang']
                               ,'title' => $rss['TieuDe']
                               ,'link' => base_url().'can-mua/'.$rss['IDMaTin'].'/'.stripUnicode($rss['TieuDe']).'.html'
                               ,'content' => $rss['NoiDung']);
          }
        $tintuc=$this->default_model->getTableRows('baiviet',20,0,'IDBaiViet desc','','IDBaiViet',"",'');
        foreach($tintuc as $rss)
          {
            $rss_data[] = array('ID' => $rss['IDBaiViet']
                               ,'date' => $rss['NgayGui']
                               ,'title' => $rss['TieuDe']
                               ,'link' => base_url().'tin-tuc/'.$rss['IDBaiViet'].'/'.stripUnicode($rss['TieuDe']).'.html'
                               ,'content' => $rss['NoiDung']);
          }
        function orderBy($data, $field) { 
        $code = "return strnatcmp(\$a['$field'], \$b['$field']);"; 
        usort($data, create_function('$b,$a', $code)); 
        return $data; 
        }  
         
        $data['rss'] = orderBy($rss_data, 'date');
        $this->load->view('rss', $data);
    }
      
}