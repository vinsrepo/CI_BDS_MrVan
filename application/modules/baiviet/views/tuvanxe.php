<div class="rightboxnews">
    <h3 class="title title-right">
            <a href="/tu-van-xe">Tư vấn xe</a>
        
        
    </h3>

    <div class="content-boxnews">
        <ul>
               <?
$tintucs=Modules::run('trangchu/getList','baiviet',4,0,'NgayGui desc','IDBaiViet',array('Loai'=>'TuVanXe'));
foreach($tintucs as $tintuc){
    echo '
               <li>
                    <a href="/tu-van-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">
                        <img src="'.img_thumb_blog($tintuc['NoiDung'],'120x120').'" alt="'.$tintuc['TieuDe'].'" title="'.$tintuc['TieuDe'].'">
                    </a>
                    <div class="content-li-boxnews">
                        <div class="name opensansmedium">
                            <h3>
                                <a href="/tu-van-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">
                                    '.$tintuc['TieuDe'].'
                                </a>
                            </h3>
                        </div>
                        <div class="date opensansmedium">
                            ('.date("d/m/Y", strtotime($tintuc['NgayGui'])).')
                        </div>
                    </div>
                </li>
                <li class="line"></li>
    ';
}
?>
        </ul>
    </div>

</div>        