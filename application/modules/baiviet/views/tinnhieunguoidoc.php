<div class="news-hightlight">
    <div class="nh-title">
        <h3><a href="javascript:">Tin tức nổi bật</a></h3>
    </div>
    <div class="nh-content">
        <ul>
             <?
$tintucs=Modules::run('trangchu/getList','baiviet',6,0,'NgayGui desc','IDBaiViet',"Loai IN ('TinTuc') and TrangThai=1");
foreach($tintucs as $tintuc){
        $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintuc['MenuCha']);
    echo '
               <li>
                        <a href="/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html" title="'.$tintuc['TieuDe'].'">'.$tintuc['TieuDe'].'</a>
                    </li>
    ';
}
?>
                    
        </ul>
        <div class="clear"></div>
    </div>
</div>