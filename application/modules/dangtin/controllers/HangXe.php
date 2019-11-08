<?
if(!isset($childs)||$addIN==1){
    $childs=$this->default_model->getTableRows('baiviet',1000,0,'IDBaiViet asc','','IDBaiViet','',array('MenuCha'=>$MenuChaID));
}
$newchilds=array();
foreach ($childs as $child){
    $newchilds[]=$child['IDBaiViet'];
}
if(!empty($newchilds)){
    $addIN=",".implode(',',$newchilds);
}else{
    $addIN='';
}
if(!isset($set_dk)){
    $dieukien["HangXe IN ($MenuChaID $addIN) and IDMaTin !="]='';
}
                 