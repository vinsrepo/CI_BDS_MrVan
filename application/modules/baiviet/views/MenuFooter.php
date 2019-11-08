<div class="menu-bottom">
  <ul>
    <?	
      if($menu){ 
        foreach ($menu as $tintuc)
        {
          if($tintuc['Link']!=''){
            $Link=$tintuc['Link'];
          }else{
            $Link='/'.stripUnicode($tintuc['TieuDe']);
          }
            echo '<li><a href="'.$Link.'" rel="nofollow">'.$tintuc['TieuDe'].'</a></li>';
          }                   
        }?> 
  </ul>
  <div class="clear"></div>
</div>
 