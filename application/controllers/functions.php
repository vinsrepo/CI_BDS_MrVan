<?php
class Functions extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array("url"));
        $this->load->database();
        $this->load->model('default_model');
       
     
    }

    function index($Loai="") {
       
    }
    // get menu da cap
    function getMenuDaCap($MenuCha,$table,$id,$where) {
    
     $category=$this->default_model->getTableRows($table,"","",'SapXep asc, '.$id.' asc','',$id,"",array("$where" => "$MenuCha"));
     if($category!=FALSE){
     $str="<ul>\n";
     
     foreach ($category as $menu)
     {
        $str.='<li><a href="'.base_url().'thong-bao/'.$menu['IDBaiViet'].'/'.stripUnicode($menu['TieuDe']).'.html">'.$menu['TieuDe'].'</a></li>'.Modules::run("functions/getMenuDaCap",$menu["MenuCha"],$table,$id,"MenuCha");
     }
     
     $str.="</ul>\n";
     
     return $str;
     }
     }

}