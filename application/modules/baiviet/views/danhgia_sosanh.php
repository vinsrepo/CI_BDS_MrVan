<div class="hotnew-righthome rightboxnews dgx">
    <div class="tabs_item oswaldlarge-tab">
        <h2 id="hotnews" class="activetab">Đánh giá xe</h2>
        <h2 id="weeknews">So sánh xe</h2>
    </div>
    <div class="containertab">
        <div class="hotnews box content-boxnews" style="display:block">
            <ul>
            <?
$danhgiaxes=Modules::run('trangchu/getList','baiviet',4,0,'NgayGui desc','IDBaiViet',array('Loai'=>'DanhGiaXe'));
foreach($danhgiaxes as $tintuc){
    echo '
               <li>
                        <a href="/danh-gia-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">
                            <img src="'.img_thumb_blog($tintuc['NoiDung'],'120x120').'" alt="'.$tintuc['TieuDe'].'" title="'.$tintuc['TieuDe'].'" />
                        </a>
                        <div class="content-li-boxnews">
                            <div class="name">
                                <h3>
                                    <a class="opensansmedium" href="/danh-gia-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">
                                        '.$tintuc['TieuDe'].'
                                    </a>
                                </h3>
                            </div>
                            
                        </div>
                    </li>
                        <li class="line"></li>
    ';
}
?>
                    
                   
            </ul>

            <div class="morehotnews" style="margin-top: 10px;">
                <a href="/danh-gia-xe">» Xem thêm các tin khác</a>
            </div>
        </div>
        <div class="content-boxnews weeknews box">
            <ul>
                  <?
$sosanhxes=Modules::run('trangchu/getList','baiviet',4,0,'NgayGui desc','IDBaiViet',array('Loai'=>'SoSanhXe'));
foreach($sosanhxes as $tintuc){
    echo '
               <li>
                        <a href="/so-sanh-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">
                            <img src="'.img_thumb_blog($tintuc['NoiDung'],'120x120').'" alt="'.$tintuc['TieuDe'].'" title="'.$tintuc['TieuDe'].'" />
                        </a>
                        <div class="content-li-boxnews">
                            <div class="name">
                                <h3>
                                    <a class="opensansmedium" href="/so-sanh-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">
                                        '.$tintuc['TieuDe'].'
                                    </a>
                                </h3>
                            </div>
                            
                        </div>
                    </li>
                        <li class="line"></li>
    ';
}
?>
            </ul>

            <div class="morehotnews" style="margin-top: 10px;">
                <a href="/so-sanh-xe">» Xem thêm các tin khác</a>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
        $(".tabs_item h2").tabautodgx();  
</script>