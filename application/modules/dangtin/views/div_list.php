<?php 
  $xe_view='pr';
    if($dulieu) 
      foreach ($dulieu as $tintuc) :
?>
<? 
  $c_HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);		
									
  $link='/'.stripUnicode($c_HangXe['TieuDe']).'-'.stripUnicode($tintuc['NamSX']).'-'.stripUnicode($tintuc['DoiXe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$xe_view.$tintuc['IDMaTin'].'.html';
  include 'vip.php';
?>
<li>
  <a href="<? echo $link;?>"><img id="ContentPlaceHolder1_ProductSearchResult1_rpProductList_imgAvatar_0" title="<? echo $tintuc['TieuDe'];?>" width="140" height="104" src="<?php echo get_first_img($tintuc['AlbumAnh'],'170x115');?>" alt="<? echo $tintuc['TieuDe'];?>" /></a>
  <div class="desc">
    <h4>
      <a class="<? echo $divType;?> text-success" title="<? echo $tintuc['TieuDe'];?>" href="<? echo $link;?>"><? echo $tintuc['TieuDe'];?></a>
    </h4>
    <div class="other">
      <div class="price"><label>Giá<span>:</span></label>
        <? echo ($tintuc['GiaTien']==0?'':$tintuc['GiaTien']);?> <? echo $tintuc['SoKM'];?>
          <!-- <i style="float: right;color: black;">Mã tin: <? //echo $tintuc['IDMaTin'];?> </i>    -->
      </div>
      <div class="area"><label>Diện tích<span>:</span></label>
        <? echo $tintuc['NgoaiThat'];?> m²
      </div>
      <div class="location"><label>Vị trí<span>:</span></label>
        <? echo $tintuc['NamSX'];?> - <? echo $tintuc['DoiXe'];?>
      </div>
    </div>
    <span class="date">
      <? echo date('d/m/Y',strtotime($tintuc['NgayDang']));?></span>
  </div>
</li>                       
			
<?php endforeach;?>
<?php 
  if($dulieu==''){
    echo '<div class="note note-warning" style="margin:0px;margin-top: -10px;width:93.3%!important"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
  }
?>