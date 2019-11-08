<div class="rightboxnews shadowbox2" style="margin-top: 20px;padding: 10px;width: 93%;">
    <h3 class="title title-right">
            <a href="/mua-xe">Tin mua ô tô</a>
        <a href="/mua-xe" class="viewmoretitle">» Xem tất cả</a>
        
    </h3>

    <div class="content-boxnews">
        <ul>
               <?	
       
         if($menu){ 
                  foreach ($menu as $tintuc)
                  {
                    
                  $NoiDung=strip_tags($tintuc['NoiDung']);
                                    $NoiDung=''.substr($NoiDung,0,100).'';
                                    $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  echo '
                   <li>
                     
                    <div class="content-li-boxnews" style=" width: 93%;">
                        <div class="name opensansmedium">
                            <h3>
                                <a href="'.base_url().'mua-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDMaTin'].'.html" title="'.$tintuc['TieuDe'].'">
                                    '.$tintuc['TieuDe'].' - '.$tintuc['GiaTien'].'  <b style="color: black;">[ '.$tintuc['TinhThanh'].' ]</b> 
                                </a>
                            </h3>
                        </div>
                        <div class="date opensansmedium">
                            '.$NoiDung.'
                        </div>
                    </div>
                </li>
                <li class="line" style=" width: 93%;"></li>
                        ';
                  }
                   
                  }
                   
                  ?> 
               
            </ul>
    </div>

</div>
 