<?php 
$xe_view='pr';
                  if($dulieu) 
                  foreach ($dulieu as $tintuc) :
                  ?>
                  <? 
                    $c_HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);
                    $link='/'.stripUnicode($c_HangXe['TieuDe']).'-'.stripUnicode($tintuc['NamSX']).'-'.stripUnicode($tintuc['DoiXe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$xe_view.$tintuc['IDMaTin'].'.html';
                    ?>
                    <li>
                            <div class="pr-item">
                                <div class="pr-item-title">
                                    <a href="<? echo $link;?>" title="<? echo $tintuc['TieuDe'];?>"><? echo $tintuc['TieuDe'];?></a>
                                </div>
                                <div class="pr-item-img">
                                    <a href="<? echo $link;?>" title="<? echo $tintuc['TieuDe'];?>">
                                        <img src="<?php echo get_first_img($tintuc['AlbumAnh'],'170x115');?>" alt="<? echo $tintuc['TieuDe'];?>">
                                    </a>
                                </div>
                                <div class="pr-item-text">
                                    <div>
                                        <label>Giá bán:</label>
                                        <span>
                                            <? echo ($tintuc['GiaTien']==0?'':$tintuc['GiaTien']);?> <? echo $tintuc['SoKM'];?></span>
                                    </div>
                                    <div>
                                        <label>Diện tích:</label>
                                        <? echo $tintuc['NgoaiThat'];?> m²
                                    </div>
                                    <div>
                                        <label>Địa chỉ:</label><? echo $tintuc['NamSX'];?> - <? echo $tintuc['DoiXe'];?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                    
                     
			<?php endforeach;?>
			
							     
                                <?php 
                  if($dulieu==''){
                    echo '<div class="note note-warning" style="margin:0px;margin-top: -10px;width:93.3%!important"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
                  }
                  
                  ?>