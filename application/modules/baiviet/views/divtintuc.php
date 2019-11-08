<div class="left1_top">
					<div class="left1_title">Tin tức ô tô</div>
				</div>
			
<div class="left1_mid">

       <?	
       
         if($menu){ 
                  foreach ($menu as $tintuc)
                  {
                    
                  $NoiDung=strip_tags($tintuc['NoiDung']);
                                    $NoiDung=''.substr($NoiDung,0,100).'';
                                    $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  echo '
                  <div class="tinbds">
		<div class="tinbds_title">
			<a href="'.base_url().'tin-tuc/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html" title="'.$tintuc['TieuDe'].'">
				<h2>'.$tintuc['TieuDe'].'</h2>			</a>
		</div>
		<p>
			<img class="tinbds_img" src="'.getImage($tintuc['NoiDung']).'"  width="60" align="left" height="60" alt="'.$tintuc['TieuDe'].'"/> 
		</p>
		<div class="tinbds_text">
			'.$NoiDung.'			
		</div>
	             </div>
      ';
                  }
                   
                  }
                   
                  ?> 
       
  	  
   
  
	  	<div class="tinbds_text">
			<a href="<? echo base_url();?>tin-tuc" title="Xem tiếp" style="color:#054AAF;float:right;font-weight:bold">Xem tiếp
			<img src="<? echo base_url();?>style/images/tab_icon.gif" width="5" height="9" /> 
			</a> 
			
		</div>
</div>