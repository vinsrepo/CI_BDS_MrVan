<?php  
$stt=0;
foreach($dulieu as $tintuc){$stt++;
// if($stt % 2 == 0){
//     $right='pd-other-r';
// }else{
//     $right='';
// }
// $TieuDe=strip_tags($tintuc['ThongTinMota']);
// $TieuDe=''.substr($TieuDe,0,90).'';
// $TieuDe=substr($TieuDe, 0, strrpos($TieuDe, ' ')).'...';
?>
<? 
    $c_HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);
    $link='/'.stripUnicode($c_HangXe['TieuDe']).'-'.stripUnicode($tintuc['NamSX']).'-'.stripUnicode($tintuc['DoiXe']).'/'.stripUnicode($tintuc['TieuDe']).'-pr'.$tintuc['IDMaTin'].'.html';
    ?>
<div class="pd-other-unit <? echo $right;?>">
    <div class="unitimg">
        <a href='<? echo $link;?>' title='<? echo $tintuc['TieuDe'];?>'>
            <img src="<?php echo get_first_img($tintuc['AlbumAnh'],'624x476');?>" alt="<? echo $tintuc['TieuDe'];?>" />
        </a>
    </div>
    <div class="unittitle">
       <a class='vip5' title="<? echo $tintuc['TieuDe'];?>" href="<? echo $link;?>"><? echo $tintuc['TieuDe'];?></a>
    </div>
    <div class="divtext">
        <div>
            <label>Giá:</label>
            <span>
                <? echo ($tintuc['GiaTien']==0?'':$tintuc['GiaTien']);?> <? echo $tintuc['SoKM'];?></span>
        </div>
        <div>
            <label>Diện tích:</label>
            <? echo $tintuc['NgoaiThat'];?> m²
        </div>
        <div>
            <label>Mặt tiền:</label><? echo $tintuc['HopSo'];?>
        </div>
        <div>
            <label>Hướng:</label><? echo $tintuc['NoiThat'];?>
        </div>
        <div>
            <label>Vị trí:</label><? echo $tintuc['NamSX'];?> - <? echo $tintuc['DoiXe'];?>
        </div>
    </div>
</div>	   
<?}?>