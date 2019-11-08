<div class="most-read">
            <div class="title">
                <h3>Tin xem nhiều</h3>
            </div>
            <ul>
    <? $stt1=0;
$tintucs=Modules::run('trangchu/getList','baiviet',5,0,'LuotXem desc','IDBaiViet',"Loai IN ('TinTuc') and TrangThai=1");
foreach($tintucs as $tintuc){$stt1++;
        $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintuc['MenuCha']);
        $fir=$stt1==1?' class="first"':'';
    echo '
               <li '.$fir.'>
                        <h4><a href="/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">'.$tintuc['TieuDe'].'</a></h4>
                    </li>
    ';
}
?>
        
        </ul> 
    </div>