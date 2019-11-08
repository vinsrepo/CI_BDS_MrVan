<div class="chv_top">
        <div class="chv_title">Câu hỏi thường gặp </div>
      </div>
		<div class="vip_mid" style="text-align: left;">
                  <?	
                  if($menu){ 
                  foreach ($menu as $tintuc)
                  {
                    
                  echo '
                  <div class="click_normal" style="margin-bottom: 4px;">
		<a href="'.base_url().'huong-dan/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html" rel="nofollow"> <img style="border: 0px;" src="'.base_url().'style/images/dian_031.gif" /> '.$tintuc['TieuDe'].'  </a> 
	         	</div>
                   ';
                  }
                   
                  }
                   
                  ?> 
		</div>