<? 
$showtype='';
$code='';
$types=array("cityCode","distId");
foreach($types as $type){
    if(isset($_GET[$type])&&$_GET[$type]!=''){
        $showtype=$type;
        $code=$_GET[$type];
    }
} 
if($_GET['module']=='GetDistrict'){
   $results=Modules::run('trangchu/getList','tinhthanh',5000,0,'Name asc','ID',array('Parent'=>$code,'Loai'=>'NamSX'));
}
if($_GET['module']=='GetWard'){
   $results=Modules::run('trangchu/getList','tinhthanh',5000,0,'Name asc','ID',array('Parent'=>$code,'Loai'=>'XuatXu'));
}
if($_GET['module']=='GetStreet'){
   $results=Modules::run('trangchu/getList','tinhthanh',5000,0,'Name asc','ID',array('Parent'=>$code,'Loai'=>'PhanHang'));
}
if($_GET['module']=='GetProject'){
    
    $dist=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Note'=>$code,'Loai'=>'NamSX'));
    $city=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Note'=>$dist[0]['Parent'],'Loai'=>'DoiXe'));
    //print_r($city);
   $results=Modules::run('trangchu/getList','salon',50000,0,'TenSalon asc','IDSalon',array('TinhThanh'=>$city[0]['Name'],'QuanHuyen'=>$dist[0]['Name']));
}
//$results=file_get_contents('http://dothi.net/Handler/SearchHandler.ashx?module='.$_GET['module'].'&'.$showtype.'='.$code.'');
if(isset($_GET['json'])&&$_GET['json']!=''){
    echo $results;
}else{
$wardprefix='';$streetprefix='';$WardId='';$StreetId='';
foreach($results as $key=>$val){
    if($val['Perfix']!=''&&$val['Loai']=='XuatXu'){
        $wardprefix='wardprefix="'.$val['Perfix'].'"';
    }
    if($val['Perfix']!=''&&$val['Loai']=='PhanHang'){
        $streetprefix='streetprefix="'.$val['Perfix'].'"';
    }
    if($val['ID']!=''&&$val['Loai']=='XuatXu'){
        $WardId='wardId="'.$val['ID'].'"';
    }
    if($val['ID']!=''&&$val['Loai']=='PhanHang'){
        $StreetId='streetId="'.$val['ID'].'"';
    }
    if($_GET['module']=='GetProject'){
        $setval=$val['TenSalon'].'|'.$val['IDSalon'];
        $val['Name']=$val['TenSalon'];
    }else{
        $setval=$val['Name'];
    }
    echo '
    <option value="'.$setval.'" data-key="'.$val['Note'].'" '.$WardId.' '.$StreetId.' '.$wardprefix.' '.$streetprefix.'>'.$val['Name'].'</option>    ';
}
}