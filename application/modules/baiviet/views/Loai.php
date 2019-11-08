<?
$searchs=array('TinTuc'=>'tin-tuc','TuVanXe'=>'thiet-ke-kien-truc','SoSanhXe'=>'phong-thuy','DanhGiaXe'=>'khong-gian-song','KinhNghiem'=>'tu-van-luat');//print_r(array_reverse($searchs));
if(isset($tintuc)){
foreach($searchs as $type=>$link){
    if($tintuc['Loai']==$type){
            $u=$link; 
        } 
}
 }