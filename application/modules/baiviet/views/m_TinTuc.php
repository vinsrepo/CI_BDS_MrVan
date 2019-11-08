<div class="news"> 
        <?
        include 'm_breakcum.php';
         $NoiDung=strip_tags(html_entity_decode($thongbao[0]['NoiDung']));
                  $NoiDung=''.substr($NoiDung,0,160).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$thongbao[0]['MenuCha']);
                  $links='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($thongbao[0]['TieuDe']).'-'.$thongbao[0]['IDBaiViet'].'.html';
                  ?>
        <div class="div_listpro">
            
                    <div class="div_proitem div_proitem-hl">
                        <a href="<? echo $links;?>" title="<? echo $thongbao[0]['TieuDe'];?>">
                            <h1><? echo $thongbao[0]['TieuDe'];?></h1>
                            <div class="padding">
                                <div class="div_itemimg">
                                    <img src="<? echo img_thumb_blog($thongbao[0]['NoiDung'],'250x200');?>" />
                                </div>
                                <span class="sapo"><? echo $NoiDung;?></span>
                                <span class="spandate"><? echo date('d/m/Y',strtotime($thongbao[0]['NgayGui']));unset($thongbao[0]);?></span>
                            </div>
                        </a>
                    </div>
                <?php 
            
                  if($thongbao){ 
                  foreach ($thongbao as $tintuc)
                  { 
                  $NoiDung=strip_tags(html_entity_decode($tintuc['NoiDung']));
                  $NoiDung=''.substr($NoiDung,0,120).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintuc['MenuCha']);
                  $link='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html';
                  echo '
                 <div class="div_proitem ">
                        <a href="'.$link.'" title="'.$tintuc['TieuDe'].'">
                            <h1>'.$tintuc['TieuDe'].'</h1>
                            <div class="padding">
                                <div class="div_itemimg">
                                    <img src="'.img_thumb_blog($tintuc['NoiDung'],'120x120').'" />
                                </div>
                                <span class="sapo">'.$NoiDung.'</span>
                                <span class="spandate">'.date('d/m/Y',strtotime($tintuc['NgayGui'])).'</span>
                            </div>
                        </a>
                    </div>
                  ';
                  }
                  }else{
                    echo '<div class="note note-warning" style="margin-top:20px;overflow:hidden;width:90%!important"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
                  }
                  ?>
                    
                
                     
                
        </div>
        <div style="text-align: center;">
        <?php echo $this->pagination->create_links();?> 
        </div>
    </div>