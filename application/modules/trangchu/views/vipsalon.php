<div class="chv_top">
        <div class="chv_title">Vip ShowRoom - Salon Ô tô </div>
      </div>
		<div class="vip_mid" style="text-align: left;">
        
            <?	
        $host=$_SERVER['HTTP_HOST'];
        $name_site=preg_replace('/([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z]+)/', '$1.$2.$3', $host);
                  if($vip){ 
                  foreach ($vip as $tintuc)
                  {
                    
                  $NoiDung=strip_tags($tintuc['GioiThieu']);
                                    $NoiDung=''.substr($NoiDung,0,100).'';
                                    $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  echo '
                  <div class="click" style="margin-bottom: 10px;">
		<a href="http://'.$tintuc['Domain'].'.'.$name_site.'" target="_blank" rel="follow">'.$tintuc['TenSalon'].'  </a>&nbsp; <b>[ '.$tintuc['TinhThanh'].' ]</b><br>	
	<div  class="car_code">'.$NoiDung.'</div>
	     	      </div>
                   ';
                  }
                   
                  }
                   
                  ?>                        
                                
		 
		</div>
        