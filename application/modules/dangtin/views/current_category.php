<? 
if(isset($CatID)&&!isset($HangXe)){
        $HangXe=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$CatID);
    }
if(isset($xemtinban['NamSX'])||isset($quan)){
    if(isset($xemtinban['NamSX'])){
        $quan=$xemtinban['NamSX'];
    }
    
    if($this->session->userdata('DoiXe')){
        $DoiXe=$this->session->userdata('DoiXe');
    }else{
        $DoiXe=$xemtinban['DoiXe'];
    }
    if($HangXe['IDBaiViet']==449){
        $HangXe['TieuDe']='NHÀ ĐẤT BÁN';
    }
    if($HangXe['IDBaiViet']==451){
        $HangXe['TieuDe']='NHÀ ĐẤT CHO THUÊ';
    }
    $city=Modules::run('trangchu/getInfo','tinhthanh','Name',$DoiXe);
    $cityId=$city['Note']; 
     
    $dist=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$quan,'Parent'=>$cityId));; 
?>
<div class="product-count">
    <div class="pc-title">
        
        <h3>
            <?
            $results=Modules::run('trangchu/getList','tinhthanh',4000,0,'Name asc','ID',array('Loai'=>'XuatXu','Parent'=>$dist[0]['Note']));
             echo $HangXe['TieuDe'];?>  <? if($results[0]['Perfix']!=''){echo 'theo '.$results[0]['Perfix'];} ?> tại <? echo $quan;?></h3>
    </div>
    <div class="pc-content"> 
        

        
                <ul id="ulProductCount">
                <?
                
                $MenuChaID=$HangXe['IDBaiViet'];
                include APPPATH.'modules/dangtin/controllers/HangXe.php'; 
foreach($results as $key=>$val){ 
    $total=Modules::run('trangchu/totalRows','tinban',array_merge(array('XuatXu'=>$val['Name'],'NamSX'=>$quan,'TrangThai'=>1),$dieukien));
    if($total){
        $show_total='<b>('.$total.')</b>';
    }else{
        $show_total='';
    }
    echo '
                <li>
                    <h3><a href="/'.strtolower(isset($HangXe['Link'])&&$HangXe['Link']!=''?$HangXe['Link']:stripUnicode($HangXe['TieuDe'])).'-'.$val['Link'].'">
                        '.(is_numeric($val['Name'])?$val['Perfix'].' '.$val['Name']:$val['Name']).' '.$show_total.' </a></h3>
                </li>     ';
}
?> 
            
                </ul>
             <div class="pc-extra" id="showProductCount" style="display: block;">
            <a id="showAdd">
                <img src="/style/images/xemthem.png">
            </a>
        </div>
    </div>
</div>
<?}else{
    if($HangXe['IDBaiViet']==449){
        $HangXe['TieuDe']='NHÀ ĐẤT BÁN';
    }
    if($HangXe['IDBaiViet']==451){
        $HangXe['TieuDe']='NHÀ ĐẤT CHO THUÊ';
    }
    
    if($this->session->userdata('DoiXe')!=''){
        $DoiXe=$this->session->userdata('DoiXe');
    
    $city=Modules::run('trangchu/getInfo','tinhthanh','Name',$DoiXe);
    $cityId=$city['Note'];
    
    $results=Modules::run('trangchu/getList','tinhthanh',4000,0,'Name asc','ID',array('Loai'=>'NamSX','Parent'=>$cityId));
 ?>

<div class="product-count">
    <div class="pc-title">
        
        <h3>
            <? echo $HangXe['TieuDe'];?> tại <? echo $DoiXe;?> </h3>
    </div>
    <div class="pc-content"> 
        
                <ul id="ulProductCount">
                <?
                $MenuChaID=$HangXe['IDBaiViet'];
                include APPPATH.'modules/dangtin/controllers/HangXe.php'; 
                foreach($results as $key=>$val){
                    $total=Modules::run('trangchu/totalRows','tinban',array_merge(array('DoiXe'=>$DoiXe,'NamSX'=>$val['Name'],'TrangThai'=>1),$dieukien));
    if($total){
        $show_total='<b>('.$total.')</b>';
    }else{
        $show_total='';
    }
                    echo '
                <li>
                    <h3>
                        <a href="/'.strtolower(isset($HangXe['Link'])&&$HangXe['Link']!=''?$HangXe['Link']:stripUnicode($HangXe['TieuDe'])).'-'.$val['Link'].'">
                            '.$val['Name'].' '.$show_total.' </a>
                    </h3>
                </li>     ';
      }

     
?>
                
            
                </ul>
             <div class="pc-extra" id="showProductCount" style="display: block;">
            <a id="showAdd" href="javascript:showProductCount(2);">
                <img src="/style/images/xemthem.png">
            </a>
        </div>
    </div>
</div>

<?
}else{?>


<div class="product-count">
    <div class="pc-title">
        
        <h3>
            <? echo $HangXe['TieuDe'];?></h3>
    </div>
    <div class="pc-content"> 
        
                <ul id="ulProductCount">
                <?
                $MenuChaID=$HangXe['IDBaiViet'];
                include APPPATH.'modules/dangtin/controllers/HangXe.php'; 
$arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
foreach(json_decode($arr,true) as $key=>$val){ 
    $total=Modules::run('trangchu/totalRows','tinban',array_merge(array('DoiXe'=>$val['Text'],'TrangThai'=>1),$dieukien));
    if($total){
        $show_total='<b>('.$total.')</b>';
    }else{
        $show_total='';
    }
    echo '
    <li>
                    <h3>
                        <a href="/'.strtolower(isset($HangXe['Link'])&&$HangXe['Link']!=''?$HangXe['Link']:stripUnicode($HangXe['TieuDe'])).'-'.stripUnicode($val['Text']).'">
                            '.$val['Text'].' '.$show_total.' </a>
                    </h3>
                </li>     ';
}
?>
                
            
                </ul>
             <div class="pc-extra" id="showProductCount" style="display: block;">
            <a id="showAdd" href="javascript:showProductCount(2);">
                <img src="/style/images/xemthem.png">
            </a>
        </div>
    </div>
</div> 
<?} 
    ?>
<?}?>