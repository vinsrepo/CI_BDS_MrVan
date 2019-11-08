<?php $stt=0;
                  if($thongbao2){ 
                  foreach ($arr_tops as $arr_top)
                  { $stt++;
                  $IDYou=getIDYoutube($thongbao2[$arr_top]['NoiDung']);
                  echo '
                    <div class="rowitem">
                        <div class="avt">
                            <a href="/'.$u.'/'.$thongbao2[$arr_top]['IDBaiViet'].'/'.stripUnicode($thongbao2[$arr_top]['TieuDe']).'.html" title="'.$thongbao2[$arr_top]['TieuDe'].'"><img src="http://img.youtube.com/vi/'.$IDYou.'/0.jpg" height="86" width="86"></a>
                            <span class="time">'.getTimeYoutube($IDYou).'</span>
                            <a class="playicon" href="/'.$u.'/'.$thongbao2[$arr_top]['IDBaiViet'].'/'.stripUnicode($thongbao2[$arr_top]['TieuDe']).'.html" title="'.$thongbao2[$arr_top]['TieuDe'].'"></a>
                        </div>
                        <div class="info">
                            <h2 class="name opensansmedium"><a href="/'.$u.'/'.$thongbao2[$arr_top]['IDBaiViet'].'/'.stripUnicode($thongbao2[$arr_top]['TieuDe']).'.html" title="'.$thongbao2[$arr_top]['TieuDe'].'">'.$thongbao2[$arr_top]['TieuDe'].'</a></h2>
                        </div>
                    </div>
                    
                  ';
                  }
                  }
                  ?>