<div class="news-default <? if(isset($fl)){ echo $fl;}?>">
<? 
$parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$thongbao[0]['MenuCha']);
$links='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($thongbao[0]['TieuDe']).'-'.$thongbao[0]['IDBaiViet'].'.html';

if(isset($thongbao[0])){?>
    <div class="news-default-left">
        
        <a href="<? echo $links;?>" title="<? echo $thongbao[0]['TieuDe'];?>">
            <img src="<? echo img_thumb_blog($thongbao[0]['NoiDung'],'400x250');?>" alt="<? echo $thongbao[0]['TieuDe'];?>" />
        </a>
        <h2>
            <a href="<? echo $links;?>" title="<? echo $thongbao[0]['TieuDe'];?>"><? echo $thongbao[0]['TieuDe'];?></a>
        </h2>
        
    </div>
<? unset($thongbao[0]);} ?>
    <div class="news-default-right">
        <ul>
            <?php 
            
                  if($thongbao){$stt1=0; 
                  foreach ($thongbao as $tintuc)
                  { $stt1++;
                  
                  $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintuc['MenuCha']);
                   $link='/'.stripUnicode($parent['TieuDe']).'/'.($this->uri->segment(2)!=''?$this->uri->segment(2).'/':'').stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html';
                   $fir=$stt1==1?' class="first"':'';
                  echo '
                 <li '.$fir.'>
                        <h3>
                            <a href="'.$link.'" title="'.$tintuc['TieuDe'].'">
                                '.$tintuc['TieuDe'].'
                            </a>
                        </h3>
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