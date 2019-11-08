       
<div class="rightboxnews">
    <h2 class="title title-right">
        
        <a title="Đánh giá xe" href="/danh-gia-xe">Đánh giá xe</a>
        <a class="viewmoretitle" title="Xem thêm đánh giá xe" href="/danh-gia-xe">» Xem thêm</a>
    </h2>

    <div class="content-boxnews">
        <ul>
                <?
$tintucs=Modules::run('trangchu/getList','baiviet',4,0,'NgayGui desc','IDBaiViet',array('Loai'=>'DanhGiaXe'));
foreach($tintucs as $tintuc){
    echo '
               <li>
                    <a href="/danh-gia-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">
                        <img src="'.img_thumb_blog($tintuc['NoiDung'],'120x120').'" alt="'.$tintuc['TieuDe'].'" title="'.$tintuc['TieuDe'].'">
                    </a>
                    <div class="content-li-boxnews">
                        <div class="name opensansmedium">
                            <h3>
                                <a href="/danh-gia-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">
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
        