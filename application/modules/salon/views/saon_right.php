<div class="focussalon">
    <h2 class="title title-right"><a href="/salon-oto">Salon ô tô tiêu biểu</a> <a href="/salon-oto" class="viewmoretitle">» Xem thêm</a></h2>
    <div class="content-focussalon">     
                   
        <ul>  
        <?
        $salon_data=Modules::run('trangchu/getList','salon',3,0,'NgayTao asc','IDSalon',"AlbumAnh != '|undefined' and TrangThai=1");	
                  $host=$_SERVER['HTTP_HOST'];
                   $name_site=preg_replace('/([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z]+)/', '$2.$3.$4', $host);
                  if($salon_data){ 
                  foreach ($salon_data as $tintuc)
                  { 
                             
                   $NoiDung=strip_tags($tintuc['GioiThieu']);
                                    $NoiDung=''.substr($NoiDung,0,100).'';
                                    $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  echo '
                  <li>
                            <a target="_blank" href="http://'.$tintuc['Domain'].'.'.$name_site.'"><img width="85" height="85" src="'.get_first_img($tintuc['AlbumAnh'],$thumb='150x150').'" alt="'.$tintuc['TenSalon'].'" title="'.$tintuc['TenSalon'].'"></a>
                            <div class="name opensansmedium"><h3><a target="_blank" href="http://'.$tintuc['Domain'].'.'.$name_site.'">'.$tintuc['TenSalon'].'</a></h3></div>
                            <div class="contact opensansmedium">
                                '.$tintuc['DiaChi'].'
                                <br>
                                '.$tintuc['DienThoai'].'
                            </div>
                        </li>
                        <div class="line"></div>
                 
                   ';
                  }
                   
                  }
                   
                  ?>           
                        
                      
        </ul>
    </div>
</div>
