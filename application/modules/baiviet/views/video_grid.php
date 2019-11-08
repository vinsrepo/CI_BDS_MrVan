<?php 
            $stt=0;//
                  if($thongbao){ 
                  foreach ($thongbao as $tintuc)
                  { $stt++;
                    $last=$stt%(isset($grid)?$grid:5)==0?'last':'';
                     $IDYou=getIDYoutube($tintuc['NoiDung']);
                  
                  echo '
                 <div class="item '.$last.'">
                        <div class="avatar">
                            <a href="/'.$u.'/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html" title="'.$tintuc['TieuDe'].'">
                                <img src="http://img.youtube.com/vi/'.$IDYou.'/0.jpg" '.(isset($size)?$size:'width="189" height="107"').'>
                            </a>
                            <div class="time">'.getTimeYoutube($IDYou).'</div>
                            <a class="playicon" href="/'.$u.'/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html" title="'.$tintuc['TieuDe'].'"></a>
                        </div>
                        <div class="name opensanssmall" style="height: 54px;">
                            <h2><a href="/'.$u.'/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html" title="'.$tintuc['TieuDe'].'">'.$tintuc['TieuDe'].'</a></h2>
                        </div>
                    </div>
                  '; 
                  }
                  }else{
                    echo '<div class="note note-warning" style="margin-top:20px;overflow:hidden"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
                  }
                  ?>