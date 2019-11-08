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
	<div class="div_proitem">
        <a title="<? echo $tintuc['TieuDe'];?>" class="avatar" href="<? echo $link;?>">
            <h1>
                <a class="<? echo $divType;?>" title="<? echo $tintuc['TieuDe'];?>" href="<? echo $link;?>"><? echo $tintuc['TieuDe'];?> <span style="color:#17a2b8;font-size:14px;font-weight:normal;"></span></a></h1>
            <div class="padding">
                <div class="div_itemimg">
                    <a href="<?php echo $link ?>" alt="<? echo $tintuc['TieuDe'];?>">
                        <img src="<?php echo get_first_img($tintuc['AlbumAnh'],'170x115');?>" />
                    </a>
                </div>
                <table>
                    <tr>
                        <td class="label" style="width:30px; color: #20c997; font-weight: 600;">Giá: </td>
                        <td>
                            <span style="color: #37a344;"><? echo ($tintuc['GiaTien']==0?'':number_format($tintuc['GiaTien'],0,',','.'));?></span> <small><? echo $tintuc['SoKM'];?></small>
                        </td>
                    </tr>
                    </table>
                <table>
                    <tr>
                        <td class="label" style="width:67px; color: #20c997; font-weight: 600;">Diện tích: </td>
                        <td><? echo $tintuc['NgoaiThat'];?> m²</td>
                    </tr>
                    </table>
                <table>
                    <tr>
                        <td class="label" style="width:40px; color: #20c997; font-weight: 600;">Vị trí: </td>
                        <td><? echo $tintuc['NamSX'];?> - <? echo $tintuc['DoiXe'];?></td>
                    </tr>
                </table>
                <span class="sp-info-date">
                    <? echo date('d/m/Y',strtotime($tintuc['NgayDang']));?></span></span>
            </div>
        </a>
    </div>
<?php endforeach ?>
<?php 
    if($dulieu==''){
        echo '<div class="note note-warning" style="margin:0px;margin-top:10px;width:93.3%!important"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
    }         
?>