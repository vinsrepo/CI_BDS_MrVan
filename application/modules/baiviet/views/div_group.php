<? 
$arr_tops=array(0,1);
foreach($arr_tops as $arr_top){
$tintucs=Modules::run('trangchu/getList','baiviet',6,0,'NgayGui desc','IDBaiViet',array('MenuCha'=>$datacats[$arr_top]['IDBaiViet'],'TrangThai'=>1));
$parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintucs[$arr_top]['MenuCha']);
$links='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($tintucs[$arr_top]['TieuDe']).'-'.$tintucs[$arr_top]['IDBaiViet'].'.html';
?>
    
<div class="articlegroup">
    <div class="titlebox">
        <h3><a href="/<? echo stripUnicode($datacats[$arr_top]['TieuDe']);?>" title="<? echo $datacats[$arr_top]['TieuDe'];?>"><? echo $datacats[$arr_top]['TieuDe'];?></a></h3>
    </div>
    <div class="list_news">
        <? if(isset($tintucs[$arr_top])){?>
    <div class="news-hot">
            <a href="<? echo $links;?>" title="<? echo $tintucs[$arr_top]['TieuDe'];?>">
                <img src="<? echo img_thumb_blog($tintucs[$arr_top]['NoiDung'],'400x250');?>" alt="<? echo $tintucs[$arr_top]['TieuDe'];?>">
            </a>
            <h4>
                <a href="<? echo $links;?>" title="<? echo $tintucs[$arr_top]['TieuDe'];?>"><? echo $tintucs[$arr_top]['TieuDe'];?></a>
            </h4>
        </div>
<? unset($tintucs[$arr_top]);} ?> 
        
        <div class="list_top">
            <ul>
                <?php 
            
                  if($tintucs){$stt1=0; 
                  foreach ($tintucs as $tintuc)
                  { $stt1++;
                  $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintuc['MenuCha']);
                   $link='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html';
                   $fir=$stt1==1?' class="first"':'';
                  echo '
                 <li>
                            <a href="'.$link.'" title="'.$tintuc['TieuDe'].'">'.$tintuc['TieuDe'].'</a>
                        </li>
                  ';
                  if($stt1==5){
                    break;
                  }
                  }
                  } 
                  ?> 
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
   <?  unset($datacats[$arr_top]);
   }?>  
    
    
    <?  $sttt=0;
foreach($datacats as $arr_top){$sttt++;
$tintucs=Modules::run('trangchu/getList','baiviet',6,0,'NgayGui desc','IDBaiViet',array('MenuCha'=>$arr_top['IDBaiViet'],'TrangThai'=>1));
$parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintucs[0]['MenuCha']);
$links='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($tintucs[0]['TieuDe']).'-'.$tintucs[0]['IDBaiViet'].'.html';
if($sttt%2==0){
    echo '<div class="articlebottom"><div>';
}else{
    echo '<div style="margin-right:18px;float:left"><div class="articlebottom">';
}
?>
    

    <div class="titlebox">
        <h3><a href="/<? echo stripUnicode($arr_top['TieuDe']);?>" title="<? echo $arr_top['TieuDe'];?>"><? echo $arr_top['TieuDe'];?></a></h3>
    </div>
    <div class="list_news">
        <? if(isset($tintucs[0])){?>
    <div class="news-hot">
            <a href="<? echo $links;?>" title="<? echo $tintucs[0]['TieuDe'];?>">
                <img src="<? echo img_thumb_blog($tintucs[0]['NoiDung'],'400x250');?>" alt="<? echo $tintucs[0]['TieuDe'];?>">
            </a>
            <h4>
                <a href="<? echo $links;?>" title="<? echo $tintucs[0]['TieuDe'];?>"><? echo $tintucs[0]['TieuDe'];?></a>
            </h4>
        </div>
<? unset($tintucs[0]);} ?> 
        
        <div class="list_top">
            <ul>
                <?php 
            
                  if($tintucs){$stt1=0; 
                  foreach ($tintucs as $tintuc)
                  { $stt1++;
                  $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintuc['MenuCha']);
                   $link='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html';
                   $fir=$stt1==1?' class="first"':'';
                  echo '
                 <li>
                            <a href="'.$link.'" title="'.$tintuc['TieuDe'].'">'.$tintuc['TieuDe'].'</a>
                        </li>
                  ';
                  if($stt1==5){
                    break;
                  }
                  }
                  } 
                  ?> 
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div></div>
   <? }?>  