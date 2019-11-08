<?
foreach($cnews as $key=>$tintuc){$stt++;
$NoiDung=strip_tags($tintuc['NoiDung']);
                  if($link_c=='video-o-to'){
                    $classs='video';
                    $play='<a class="playicon" href="'.base_url().''.$link_c.'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'"></a>';
                    $imges='http://img.youtube.com/vi/'.getIDYoutube($tintuc['NoiDung']).'/0.jpg';
                  }else{
                    $classs='';
                    $play='';
                    $imges=$stt==1?img_thumb_blog($tintuc['NoiDung'],'250x200'):img_thumb_blog($tintuc['NoiDung'],'120x120');
                  }
    if($stt==1){
        $NoiDung=''.substr($NoiDung,0,400).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
        echo '
               <div class="newspanel-big">
                   <div class="'.$classs.'">
                        <a href="'.base_url().''.$link_c.'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'"><img src="'.$imges.'" alt="'.$tintuc['TieuDe'].'" title="'.$tintuc['TieuDe'].'" /></a>
                        '.$play.'
                        <div class="name opensansmedium"><h3><a href="'.base_url().''.$link_c.'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">'.$tintuc['TieuDe'].'</a></h3></div>
                        <p class="date">04/09/2015</p>
                        <p style="text-align: justify;">'.$NoiDung.'</p>
                    </div>
                   </div>
                    <ul>
        ';
    }else{
        $NoiDung=''.substr($NoiDung,0,100).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
       echo '
              <li>
                      <div class="'.$classs.'">
                                <a href="'.base_url().''.$link_c.'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'"><img src="'.$imges.'" alt="'.$tintuc['TieuDe'].'" title="'.$tintuc['TieuDe'].'" /></a>
                                '.$play.'
                      </div>
                                <div class="content-li">
                                    <div class="name opensansmedium"><h3><a href="'.base_url().''.$link_c.'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">'.$tintuc['TieuDe'].'</a></h3></div>
                                    <p class="date">04/09/2015</p>
                                    <p style="text-align: justify;">'.$NoiDung.'</p>
                                </div>
                      
                            </li>
       ';
       if($stt-1==end(array_keys($cnews))){
        echo '<li>
                            <a class="viewmorenew" href="/'.$link_c.'" title="Xem thêm các tin cùng chuyên mục">» Xem thêm các tin cùng chuyên mục</a>
                        </li></ul>';
       }
    }
}