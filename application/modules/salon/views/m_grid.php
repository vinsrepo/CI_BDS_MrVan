<?	
                   $stt=0;
                  if($salon_data){ 
                  foreach ($salon_data as $tintuc)
                  {$stt++;
                     
                      $region=$stt%2!=0?'<div class="clear dis-none"></div>':'<div class="clear "></div>';
                      $region2=$stt%2!=0?'pjl-item':'pjl-item pjl-right';
                             
                   $Link='/'.stripUnicode($tintuc['TenSalon']).'-pj'.$tintuc['IDSalon'].'.html';
                  echo ' 
                  
                 <div class="'.$region2.'">
                <div class="pjl-img">
                    <a href="'.$Link.'" title="'.$tintuc['TenSalon'].'">
                        <img src="'.get_first_img($tintuc['LoGo'],$thumb='170x115').'" alt="'.$tintuc['TenSalon'].'" />
                    </a>
                </div>
                <div class="pjl-desc">
                    <div class="project-name">
                        <h4><a href="'.$Link.'" title="'.$tintuc['TenSalon'].'">'.$tintuc['TenSalon'].'</a></h4>
                    </div>
                    <div class="project-address">
                        <span>Địa chỉ: </span>
                        <p>'.$tintuc['DiaChi'].'</p>
                    </div>
                    <div class="project-address">
                        <span>Điện thoại: </span>
                        <p>'.$tintuc['DienThoai'].'</p>
                    </div>
                    <div class="project-address">
                        <span>Website: </span>
                        <p>'.$tintuc['Website'].'</p>
                    </div>
                    <div class="project-address">
                        <span>Email: </span>
                        <p>'.$tintuc['Email'].'</p>
                    </div>
                </div>
            </div>'.$region.'
                   ';
                  }
                   
                  }else{
                    echo '<div class="note note-warning" style="margin-top:20px;overflow:hidden"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
                  }
                   
                  ?> 