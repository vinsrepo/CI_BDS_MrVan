<div class="nl-breakcum">
    <ul>
    <?
    $active2='';
    if(isset($users)){
        $cha=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$users['MenuCha']); 
        $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$cha['MenuCha']);
        
        $where=array('Loai'=>'MenuHeader','MenuCha'=>$cha['MenuCha']);
    }else{
        //$cha=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$users['MenuCha']); 
        if(isset($cha_info)&&$cha_info['MenuCha']!=0){
            $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$cha_info['MenuCha']); 
            $where=array('Loai'=>'MenuHeader','MenuCha'=>$cha_info['MenuCha']);
        }else{
            //$parent=Modules::run('trangchu/getInfo','baiviet','Link',$u); 
            $parent=$cha_info;
            $where=array('Loai'=>'MenuHeader','MenuCha'=>$cha_info['IDBaiViet']);
            $active2='active';
        }
    }
     echo '<li class="'.$active2.'"><h2><a href="/'.stripUnicode($parent['TieuDe']).'"  >'.$parent['TieuDe'].'</a></h2></li>';
     
                $datacats=Modules::run('trangchu/getList','baiviet',4000,0,'SapXep asc, NgayGui asc','IDBaiViet',$where);
                foreach($datacats as $submenu1){
                    $active=$submenu1['IDBaiViet']==$users['MenuCha']||$cha_info['IDBaiViet']==$submenu1['IDBaiViet']?'active':'';
                    echo '<li class="'.$active.'"><h2><a href="/'.stripUnicode($submenu1['TieuDe']).'"  >'.$submenu1['TieuDe'].'</a></h2></li>';
                }
                ?>
    </ul>
    <div class="clear"></div>
</div>